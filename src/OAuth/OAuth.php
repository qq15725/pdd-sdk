<?php

namespace Pdd\OAuth;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Pdd\BaseClient;

/**
 * 用户授权
 *
 * @see https://mai.pinduoduo.com/autopage/83_static_3/index.html
 */
class OAuth extends BaseClient
{
    const BASE_URIS = [
        'mms' => 'https://mms.pinduoduo.com/open.html', // 商家授权正式环境
        'mai' => 'https://mai.pinduoduo.com/h5-login.html', // 移动端授权正式环境
        'jinbao' => 'https://jinbao.pinduoduo.com/open.html', // 多多客授权正式环境
    ];

    /**
     * @param string $url
     * @param array $data
     *
     * @return array
     */
    protected function httpPost(string $url, array $data = [])
    {
        $handler = HandlerStack::create($this->getGuzzleHandler());
        if ($this->app->logger) {
            $handler->push($this->logMiddleware(), 'log');
        }

        $client = new Client([
            'base_uri' => 'http://open-api.pinduoduo.com',
        ]);

        try {
            $response = $client->post($url, [
                'handler' => $handler,
                'json' => $data,
            ]);
            $response->getBody()->rewind();
        } catch (GuzzleException $e) {
            $this->handleRequestException($e);
        }

        return $this->unwrapResponse($response);
    }

    /**
     * 获取授权 base uri
     *
     * @param string $type
     *
     * @return mixed
     */
    public function getBaseURI($type = 'jinbao')
    {
        return self::BASE_URIS[$type];
    }

    /**
     * 获取授权链接
     *
     * @param string|null $redirectUri
     * @param string|null $state
     * @param string|null $clientId
     * @param string|null $view
     * @param string $type
     *
     * @return string
     */
    public function getAuthorizeUrl(
        string $redirectUri = null,
        string $view = 'web',
        string $type = 'jinbao',
        string $state = null,
        string $clientId = null
    )
    {
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => $clientId ?: $this->app->config->get('appkey'),
            'redirect_uri' => $redirectUri,
            'view' => $view,
            'state' => $state,
        ]);

        return $this->getBaseURI($type) . '?' . $query;
    }

    /**
     * 通过 code 获取 access_token
     *
     * @param string $code
     * @param string|null $clientId
     * @param string|null $clientSecret
     *
     * @return array
     */
    public function parseAccessToken(string $code, string $clientId = null, string $clientSecret = null)
    {
        return $this->httpPost('oauth/token', [
            'client_id' => $clientId ?: $this->app->config->get('appkey'),
            'client_secret' => $clientSecret ?: $this->app->config->get('appsecret'),
            'code' => $code,
            'grant_type' => 'authorization_code',
        ]);
    }

    /**
     * 刷新 access_token
     *
     * @param string $refreshToken
     * @param string|null $clientId
     * @param string|null $clientSecret
     *
     * @return array
     */
    public function refreshAccessToken(string $refreshToken, string $clientId = null, string $clientSecret = null)
    {
        return $this->httpPost('oauth/token', [
            'client_id' => $clientId ?: $this->app->config->get('appkey'),
            'client_secret' => $clientSecret ?: $this->app->config->get('appsecret'),
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token',
        ]);
    }
}
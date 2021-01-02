<?php

namespace Pdd\Auth;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use SDK\Kernel\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    /**
     * @param \Psr\Http\Message\RequestInterface $request
     * @param array $requestOptions
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    public function applyToRequest(RequestInterface $request, array $requestOptions = []): RequestInterface
    {
        try {
            parse_str($request->getBody()->getContents(), $data);
        } catch (\Exception $e) {
            $data = [];
        }

        $data += [
            'client_id' => $this->app->config->get('appkey'),
            'version' => $this->app->config->get('version'),
            'data_type' => $this->app->config->get('data_type'),
            'timestamp' => time(),
        ];

        $data['sign'] = $this->generateSign($data, $this->app->config->get('appsecret'));

        return $request->withBody(Utils::streamFor(http_build_query($data)));
    }

    protected function generateSign($params, $secretKey)
    {
        ksort($params);
        $stringToBeSigned = $secretKey;
        foreach ($params as $k => $v) {
            if (!is_array($v) && ($v !== '' && $v !== null)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $secretKey;
        return strtoupper(md5($stringToBeSigned));
    }
}
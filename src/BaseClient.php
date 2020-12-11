<?php

namespace Pdd;

use SDK\Kernel\BaseClient as KernelBaseClient;

class BaseClient extends KernelBaseClient
{
    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @param bool $returnRaw
     * @param bool $withSession
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SDK\Kernel\Exceptions\InvalidConfigException
     */
    protected function request(string $url, string $method = 'GET', array $options = [], $returnRaw = false)
    {
        if ($method == 'POST') {
            $options['form_params']['type'] = $url;
        }
        return parent::request('', $method, $options, $returnRaw);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array|mixed|null|object|\Psr\Http\Message\ResponseInterface|string|\SDK\Kernel\Support\Collection
     * @throws \SDK\Kernel\Exceptions\InvalidConfigException
     */
    protected function unwrapResponse(\Psr\Http\Message\ResponseInterface $response)
    {
        $res = parent::unwrapResponse($response);

        if ($error = $res['error_response'] ?? null) {
            return $error;
        }

        return current($res);
    }
}
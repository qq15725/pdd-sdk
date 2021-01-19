<?php

namespace Pdd;

use SDK\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \Pdd\Ddk\Ddk $ddk
 * @property \Pdd\OAuth\OAuth $oauth
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        Ddk\ServiceProvider::class,
        OAuth\ServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $defaultConfig = [
        'version' => 'V1',
        'data_type' => 'JSON',
        'http' => [
            'timeout' => 20.0,
            'base_uri' => 'https://gw-api.pinduoduo.com/api/router',
            'headers' => [
                'Pdd-Sdk-Type' => 'PHP',
            ]
        ],
    ];

    public function __construct(
        string $appkey = null,
        string $appsecret = null,
        array $config = [],
        array $prepends = []
    )
    {
        parent::__construct(
            array_merge([
                'appkey' => $appkey,
                'appsecret' => $appsecret,
            ], $config),
            $prepends
        );
    }

    public function getConfig()
    {
        $config = parent::getConfig();

        $config['http']['headers']['Pdd-Sdk-Version'] = $config['version'];

        $config['http']['headers']['User-Agent'] = sprintf(
            'PopSDK/%s (%s) PHP/%s CURL/%s %s',
            $config['version'],
            PHP_OS,
            PHP_VERSION,
            curl_version()['version'] ?? '',
            $config['appkey']
        );

        return $config;
    }
}
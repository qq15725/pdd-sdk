<?php

namespace Pdd\Ddk\Resource\Url;

use Pdd\BaseClient;

class Url extends BaseClient
{
    /**
     * 生成多多进宝频道推广
     *
     * 本接口用于进行平台大促活动（如618、双十一活动）、平台优惠频道转链（电器城、限时秒杀等）（入参resource_type：4-限时秒杀,39997-充值中心, 39998-活动转链，39996-百亿补贴，40000-领券中心）
     *
     * @param string $pid 推广位
     * @param null|int $resourceType 频道来源：4-限时秒杀,39997-充值中心, 39998-活动转链，39996-百亿补贴，40000-领券中心
     * @param array $optional
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.resource.url.gen
     *
     * @return array
     */
    public function gen(string $pid, ?int $resourceType = null, $optional = [])
    {
        $optional += [
            'pid' => $pid,
            'resource_type' => $resourceType
        ];

        return $this->httpPost('pdd.ddk.resource.url.gen', $optional);
    }
}
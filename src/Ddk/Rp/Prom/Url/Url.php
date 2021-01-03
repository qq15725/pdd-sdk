<?php

namespace Pdd\Ddk\Rp\Prom\Url;

use Pdd\BaseClient;

class Url extends BaseClient
{
    /**
     * 生成营销工具推广链接
     *
     * 本接口用于您生成多多进宝营销工具的推广链接。（入参channel_type：-1-活动列表，0-默认红包，2–新人红包，3-刮刮卡，5-员工内购，6-购物车，7-大促会场，8-直播间列表集合页，10-生成绑定备案链接，12-砸金蛋）
     *
     * @param string $pIdList 推广位列表，例如：["60005_612"]
     * @param null|int $channelType -1-活动列表，0-默认红包，2–新人红包，3-刮刮卡，5-员工内购，6-购物车，7-大促会场，8-直播间列表集合页，10-生成绑定备案链接，12-砸金蛋
     * @param array $optional
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.rp.prom.url.generate
     *
     * @return array
     */
    public function generate(array $pIdList, ?int $channelType = null, $optional = [])
    {
        $optional += [
            'p_id_list' => $pIdList,
            'channel_type' => $channelType
        ];

        return $this->httpPost('pdd.ddk.rp.prom.url.generate', $optional);
    }
}
<?php

namespace Pdd\Ddk\Cms\Prom\Url;

use Pdd\BaseClient;

class Url extends BaseClient
{
    /**
     * 生成商城-频道推广链接
     *
     * @param string $pIdList 推广位列表，例如：["60005_612"]
     * @param null|int $channelType 0, "1.9包邮"；1, "今日爆款"； 2, "品牌清仓"； 4,"PC端专属商城"；不传值为默认商城
     * @param array $optional
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.cms.prom.url.generate
     *
     * @return array
     */
    public function generate(array $pIdList, ?int $channelType = null, $optional = [])
    {
        $optional += [
            'p_id_list' => $pIdList,
            'channel_type' => $channelType
        ];

        return $this->httpPost('pdd.ddk.cms.prom.url.generate', $optional);
    }
}
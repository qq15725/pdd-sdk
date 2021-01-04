<?php

namespace Pdd\Ddk\Goods\Recommend;

use Pdd\BaseClient;

class Recommend extends BaseClient
{
    /**
     * 多多进宝商品推荐API
     *
     * 本接口用于查询进宝频道推广商品（入参channel_type：0-1.9包邮, 1-今日爆款, 2-品牌好货,3-相似商品推荐,4-猜你喜欢,5-实时热销,6-实时收益,7-今日畅销,8-高佣榜单，默认5。）
     *
     * @param int|null $channelType 进宝频道推广商品，0-1.9包邮, 1-今日爆款, 2-品牌好货,3-相似商品推荐,4-猜你喜欢,5-实时热销榜,6-实时收益榜,7-今日热销榜,8-高佣榜单，默认值5
     * @param array $query
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.recommend.get
     *
     * @return array
     */
    public function get(?int $channelType = null, array $query = [])
    {
        $query += [
            'channel_type' => $channelType,
        ];

        return $this->httpPost('pdd.ddk.goods.recommend.get', $query);
    }
}
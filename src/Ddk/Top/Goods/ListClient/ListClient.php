<?php

namespace Pdd\Ddk\Top\Goods\ListClient;

use Pdd\BaseClient;

class ListClient extends BaseClient
{
    /**
     * 多多客获取爆款排行商品接口
     *
     * @param int|null $offset 从多少位置开始请求；默认值 ： 0，offset需是limit的整数倍，仅支持整页翻页
     * @param int|null $limit 请求数量；默认值 ： 400
     * @param array $query
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.top.goods.list.query
     *
     * @return array
     */
    public function query(?int $offset = 0, ?int $limit = 400, array $query = [])
    {
        $query += [
            'offset' => $offset,
            'limit' => $limit,
        ];

        return $this->httpPost('pdd.ddk.top.goods.list.query', $query);
    }
}
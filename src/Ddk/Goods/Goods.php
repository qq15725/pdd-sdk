<?php

namespace Pdd\Ddk\Goods;

use Pdd\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Pdd\Ddk\Goods\Zs\Zs $zs
 * @property \Pdd\Ddk\Goods\Promotion\Promotion $promotion
 * @property \Pdd\Ddk\Goods\Recommend\Recommend $recommend
 */
class Goods extends BaseClient
{
    /**
     * 多多进宝商品查询
     *
     * @param int $page 默认值1，商品分页数
     * @param int $perPage 默认100，每页商品数量
     * @param array $query
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.search
     *
     * @return array
     */
    public function search(int $page = 1, int $perPage = 20, $query = [])
    {
        $query += [
            'page' => $page,
            'page_size' => $perPage,
        ];

        return $this->httpPost('pdd.ddk.goods.search', $query);
    }

    /**
     * 多多进宝商品详情查询
     *
     * @param string $goodsSign
     * @param array $query
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.detail
     *
     * @return array
     */
    public function detail($goodsSign, $query = [])
    {
        $query += [
            'goods_sign' => $goodsSign,
        ];

        return $this->httpPost('pdd.ddk.goods.detail', $query);
    }

    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["ddk.goods.{$property}"])) {
            return $this->app["ddk.goods.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Pdd.Ddk.Goods service named "%s".', $property));
    }
}
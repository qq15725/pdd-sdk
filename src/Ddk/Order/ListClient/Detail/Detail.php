<?php

namespace Pdd\Ddk\Order\ListClient\Detail;

use Pdd\BaseClient;

class Detail extends BaseClient
{
    /**
     * 查询订单详情
     *
     * 本接口用于查询单笔订单详情，接口场景：当您出现疑似丢单情况，即用户产生的订单在您的订单库或者接口里没有捞取到，此时，您可用这个接口进行验证，传入该笔订单号，若返回的所有字段皆不为空，则该笔订单归属为你，您可再次通过订单接口捞取确认；若返回部分字段为空，则该笔订单不归属于您
     *
     * @param string $orderSn 订单号
     * @param int|null $queryOrderType 订单类型：1-推广订单；2-直播间订单
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.order.detail.get
     *
     * @return array
     */
    public function get(string $orderSn, ?int $queryOrderType = null)
    {
        return $this->httpPost('pdd.ddk.order.detail.get', [
            'order_sn' => $orderSn,
            'query_order_type' => $queryOrderType,
        ]);
    }
}
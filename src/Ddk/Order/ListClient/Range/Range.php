<?php

namespace Pdd\Ddk\Order\ListClient\Range;

use Pdd\BaseClient;

class Range extends BaseClient
{
    /**
     * 用时间段查询推广订单接口
     *
     * 本接口可以订单支付时间为维度供您同步订单，一般情况下，您用上述增量订单更新接口同步即可，在每月月结等有大量订单发生更新的情况，如您用上述接口同步压力较大，可更换为此接口同步。
     *
     * @param null|string $lastOrderId 上一次的迭代器id(第一次不填)
     * @param int|null $pageSize 每次请求多少条，建议300
     * @param null|string $startTime 支付起始时间，如2019-05-07 00:00:00
     * @param null|string $endTime 支付结束时间，如2019-05-07 00:00:00
     * @param array $query
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.order.list.range.get
     *
     * @return array
     */
    public function get(
        ?string $lastOrderId = null,
        ?int $pageSize = 300,
        ?string $startTime = null,
        ?string $endTime = null,
        array $query = []
    )
    {
        $query += [
            'last_order_id' => $lastOrderId,
            'page_size' => $pageSize,
            'end_time' => $endTime ?: date('Y-m-d H:i:s'),
            'start_time' => $startTime ?: date('Y-m-d H:i:s', time() - 86400),
        ];

        return $this->httpPost('pdd.ddk.order.list.range.get', $query);
    }
}
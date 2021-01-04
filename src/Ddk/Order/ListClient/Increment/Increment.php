<?php

namespace Pdd\Ddk\Order\ListClient\Increment;

use Pdd\BaseClient;

class Increment extends BaseClient
{
    /**
     * 最后更新时间段增量同步推广订单信息
     *
     * 1）订单信息主要包括：
     * 订单状态以及各状态变更时间
     * 订单支付金额、佣金比例以及金额
     * 订单所属商品编号、标题、缩略图
     *
     * 2）订单状态包括：
     * 已支付
     * 已成团：单人团支付成功后会状态会马上置为成团；双人团支付后需有其他人参团状态才会置为成团
     * 确认收货
     * 审核成功：确认收货15天后若未发生售后，订单状态会置为审核成功
     * 审核失败（不可提现）：若订单发生售后成功，订单状态会置为审核失败。
     * 已经结算：每月20号会结算当月15号及以前审核通过的订单，状态并置为已结算
     * 非多多进宝商品（无佣金订单）：用户访问推广链接时，该商品不在多多进宝推广计划中，因此购买商品产生的订单为非多多进宝订单。
     * 已处罚：当判定某个pid在拼多多主站站内导流，该pid所有的订单均不会结算佣金，并会置为已处罚状态。
     *
     * @param int|null $page 第几页，从1到10000，默认1，注：使用最后更新时间范围增量同步时，必须采用倒序的分页方式（从最后一页往回取）才能避免漏单问题。
     * @param int|null $pageSize 返回的每页结果订单数，默认为100，范围为10到100，建议使用40~50，可以提高成功率，减少超时数量。
     * @param int|null $startUpdateTime 最近90天内多多进宝商品订单更新时间--查询时间开始。note：此时间为时间戳，指格林威治时间 1970 年01 月 01 日 00 时 00 分 00 秒(北京时间 1970 年 01 月 01 日 08 时 00 分 00 秒)起至现在的总秒数
     * @param int|null $endUpdateTime 查询结束时间，和开始时间相差不能超过24小时。note：此时间为时间戳，指格林威治时间 1970 年01 月 01 日 00 时 00 分 00 秒(北京时间 1970 年 01 月 01 日 08 时 00 分 00 秒)起至现在的总秒数
     * @param array $query
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.order.list.increment.get
     *
     * @return array
     */
    public function get(
        ?int $page = 1,
        ?int $pageSize = 100,
        ?int $startUpdateTime = null,
        ?int $endUpdateTime = null,
        array $query = []
    )
    {
        $query += [
            'page' => $page,
            'page_size' => $pageSize,
            'end_update_time' => $endUpdateTime = $endUpdateTime ?: time(),
            'start_update_time' => $startUpdateTime ?: ($endUpdateTime - 86400),
        ];

        return $this->httpPost('pdd.ddk.order.list.increment.get', $query);
    }
}
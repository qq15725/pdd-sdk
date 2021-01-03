<?php

namespace Pdd\Goods;

use SDK\Kernel\Support\Collection;

class Converter
{
    public static function convert(array $raw): array
    {
        $data = new Collection($raw);

        $shopId = $data->get('mall_id');
        $productId = $data->get('goods_id');

        return [
            'channel' => 'pdd',
            'product' => [
                'id' => $productId,
                'shop_id' => $shopId,
                'category_id' => $data->get('cat_id'),
                'title' => $data->get('goods_name'),
                'short_title' => $data->get('goods_name'),
                'desc' => $data->get('goods_desc'),
                'cover' => $data->get('goods_image_url'),
                'banners' => $data->get('goods_gallery_urls'),
                'sales_count' => ((int)$data->get('sales_tip')) * 10000,
                'rich_text_images' => [],
                'url' => null,
            ],
            'coupon_product' => [
                'price' => $price = (float)($data->get('min_group_price') / 100),
                'original_price' => $price,
                'commission_rate' => $commissionRate = (float)($data->get('promotion_rate') / 1000),
                'commission_amount' => (float)bcmul(
                    $price,
                    bcdiv(
                        $commissionRate,
                        100,
                        2
                    ),
                    2
                ),
            ],
            'coupon' => [
                'id' => null,
                'shop_id' => $shopId,
                'product_id' => $productId,
                'amount' => (float)($data->get('coupon_discount') / 100),
                'rule_text' => (float)($data->get('coupon_min_order_amount') / 100),
                'stock' => (int)$data->get('coupon_remain_quantity'),
                'total' => (int)$data->get('coupon_total_quantity'),
                'started_at' => $data->get('coupon_start_time'),
                'ended_at' => $data->get('coupon_end_time'),
                'url' => null,
                'raw' => $raw,
            ],
            'shop' => [
                'id' => $shopId,
                'logo' => null,
                'name' => $data->get('mall_name'),
                'type' => $data->get('merchant_type'),
            ]
        ];
    }
}
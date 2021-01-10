<?php

namespace Pdd;

use SDK\Kernel\Support\Collection;

class Converter
{
    /**
     * 商品数据转换成统一的数据格式
     *
     * @param array $raw
     * @param null $apiType
     * @param bool $retainRaw
     *
     * @return array
     */
    public static function product(array $raw, $apiType = null, $retainRaw = true): array
    {
        if (!$raw) {
            return [];
        }

        if (isset($raw[0])) {
            foreach ($raw as &$itemRaw) {
                $itemRaw = self::product($itemRaw, $apiType, $retainRaw);
            }
            return $raw;
        }

        $data = new Collection($raw);

        switch ($apiType) {
            case 'pdd.ddk.goods.search':
            case 'pdd.ddk.goods.detail':
            case 'pdd.ddk.goods.recommend.get':
            default:
                $shopId = $data->get('mall_id');
                $productId = $data->get('goods_id');

                $salesCount = $data->get('sales_tip');
                if (strpos($salesCount, '万') === false) {
                    $salesCount = (int)$salesCount;
                } else {
                    $salesCount = (float)str_replace('万', '', $salesCount) * 10000;
                }

                $data = [
                    'id' => $productId,
                    'shop_id' => $shopId,
                    'category_id' => $data->get('cat_ids.2'),
                    'category_name' => $data->get('category_name'),
                    'title' => $data->get('goods_name'),
                    'short_title' => $data->get('goods_name'),
                    'desc' => $data->get('goods_desc'),
                    'cover' => $data->get('goods_image_url'),
                    'banners' => $data->get('goods_gallery_urls'),
                    'sales_count' => $salesCount,
                    'rich_text_images' => [],
                    'url' => null,
                    'coupons' => [
                        [
                            'id' => null,
                            'shop_id' => $shopId,
                            'product_id' => $productId,
                            'amount' => (float)($data->get('coupon_discount') / 100),
                            'rule_text' => (float)($data->get('coupon_min_order_amount') / 100),
                            'stock' => (int)$data->get('coupon_remain_quantity'),
                            'total' => (int)$data->get('coupon_total_quantity'),
                            'started_at' => $data->get('coupon_start_time')
                                ? date('Y-m-d H:i:s', $data->get('coupon_start_time'))
                                : null,
                            'ended_at' => $data->get('coupon_end_time')
                                ? date('Y-m-d H:i:s', $data->get('coupon_end_time'))
                                : null,
                            'url' => null,
                            'coupon_product' => [
                                'price' => $price = (float)($data->get('min_group_price') / 100),
                                'original_price' => $price,
                                'commission_rate' => $commissionRate = (float)($data->get('promotion_rate') / 10),
                                'commission_amount' => (float)bcmul(
                                    $price,
                                    bcdiv(
                                        $commissionRate,
                                        100,
                                        3
                                    ),
                                    2
                                ),
                            ],
                        ]
                    ],
                    'shop' => [
                        'id' => $shopId,
                        'logo' => null,
                        'name' => $data->get('mall_name'),
                        'type' => $data->get('merchant_type'),
                    ]
                ];
                break;
        }

        if ($retainRaw) {
            $data['raw'] = $raw;
        }

        return $data;
    }

    public static function order($raw): array
    {
        return $raw;
    }
}
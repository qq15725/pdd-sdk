<?php

namespace Pdd\Ddk\Goods\Promotion\Url;

use Pdd\BaseClient;

class Url extends BaseClient
{
    /**
     * 多多进宝推广链接生成
     *
     * 1）目前支持生成单人团商品推广链接和双人团推广链接。二者的区别是:
     *    单人团是用户可以无需拼团，只接用拼团价购买商品
     *    双人团是用户开团后分享给好友参团，好友参团后推手可获得双份佣金
     * 2）推广链接类型有2种：普通链接、唤起拼多多app链接。其中，
     *    普通链接用于微信内环境使用
     *    唤起拼多多app链接用于非微信内环境。目前支持两种方式唤醒拼多多APP：唤起APPH5和schemaURL，您可根据推广方式自由选择。
     *
     * @param string $pId 推广位ID
     * @param array|null $goodsSignList 商品goodsSign列表，支持批量生链。goodsSign是加密后的goodsId, goodsId已下线，请使用goodsSign来替代。使用说明：https://jinbao.pinduoduo.com/qa-system?questionId=252
     * @param array $optional
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.promotion.url.generate
     *
     * @return array
     */
    public function generate(string $pId, array $goodsSignList = null, $optional = [])
    {
        $optional += [
            'p_id' => $pId,
            'goods_sign_list' => $goodsSignList,
        ];

        return $this->httpPost('pdd.ddk.goods.promotion.url.generate', $optional);
    }
}
<?php

namespace Pdd\Ddk\Goods\Pid;

use Pdd\BaseClient;

class Pid extends BaseClient
{
    /**
     * 创建多多进宝推广位
     *
     * 本接口用于您创建推广位。
     *
     * 推广位的用途：
     * 1、与自己的用户体系进行关联，做代理/分销模式。 举例：多多客为推手用户A生成一个pid =1_1 , 为推手用户B生成pid=1_2。若A是B的上级，当用户通过pid=1_2的推广链接买了商品。由于用户和pid进行了映射关系，所以可以实现结算部分佣金给到A。
     * 2、用于识别各投放资源位效果。 举例：将投放至群A的推广链接由pid=1_1生成，投放至群B的推广链接由pid=1_2生成。由于订单查询接口可以区分订单由某个pid推广产生，因此多多客可以统计查看群A和群B的推广效果数据。
     *
     * @param int $number 要生成的推广位数量，默认为10，范围为：1~100
     * @param array|null $pIdNameList 推广位名称，例如["1","2"]
     * @param int|null $mediaId 媒体id
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.pid.generate
     *
     * @return array
     */
    public function generate(int $number = 10, ?array $pIdNameList = null, ?int $mediaId = null)
    {
        return $this->httpPost('pdd.ddk.goods.pid.generate', [
            'number' => $number,
            'p_id_name_list' => $pIdNameList,
            'media_id' => $mediaId,
        ]);
    }

    /**
     * 查询已经生成的推广位信息
     *
     * 本接口用于您创建推广位。
     *
     * 本接口用于您查询已经生成的推广位信息（推广位列表、推广位名称、剩余可用推广位数量，请注意，您的推广位数量有限，初始只有30万个，请谨慎使用）
     *
     * @param int|null $page 返回的页数
     * @param int|null $pageSize 返回的每页推广位数量
     * @param array|null $pidList 推广位id列表
     * @param int|null $status 推广位状态：0-正常，1-封禁
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.pid.query
     *
     * @return array
     */
    public function query(?int $page = null, ?int $pageSize = null, ?array $pidList = null, ?int $status = null)
    {
        return $this->httpPost('pdd.ddk.goods.pid.query', [
            'page' => $page,
            'page_size' => $pageSize,
            'pid_list' => $pidList,
            'status' => $status,
        ]);
    }
}
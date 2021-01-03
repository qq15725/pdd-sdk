<?php

namespace Pdd\Ddk\Goods\Zs\Unit\Url;

use Pdd\BaseClient;

class Url extends BaseClient
{
    /**
     * 多多进宝转链接口
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.goods.zs.unit.url.gen
     *
     * @param string $sourceUrl 需转链的链接【重要：2020年8月24号后不再支持长链】
     * @param string $pid 渠道id
     * @param array|null $customParameters 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，必填； sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key
     *
     * @return array
     */
    public function gen(string $sourceUrl, string $pid, array $customParameters = null)
    {
        return $this->httpPost('pdd.ddk.goods.zs.unit.url.gen', [
            'source_url' => $sourceUrl,
            'pid' => $pid,
            'custom_parameters' => $customParameters,
        ]);
    }
}
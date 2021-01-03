<?php

namespace Pdd\Ddk\Member\Authority;

use Pdd\BaseClient;

class Authority extends BaseClient
{
    /**
     * 查询是否绑定备案
     *
     * 本接口用于通过pid和自定义参数来查询是否已经绑定备案
     *
     * @param string $pid 推广位id
     * @param string $customParameters 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，必填； sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.member.authority.query
     *
     * @return array
     */
    public function query(string $pid, array $customParameters)
    {
        return $this->httpPost('pdd.ddk.member.authority.query', [
            'pid' => $pid,
            'custom_parameters' => $customParameters,
        ]);
    }
}
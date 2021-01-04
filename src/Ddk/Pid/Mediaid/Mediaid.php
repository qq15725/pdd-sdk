<?php

namespace Pdd\Ddk\Pid\Mediaid;

use Pdd\BaseClient;

class Mediaid extends BaseClient
{
    /**
     * 批量绑定推广位的媒体id
     *
     * @param int $mediaId 媒体id
     * @param array $pidList pid列表，最多支持同时传入1000个
     *
     * @link https://jinbao.pinduoduo.com/third-party/api-detail?apiName=pdd.ddk.pid.mediaid.bind
     *
     * @return array
     */
    public function bind(int $mediaId, array $pidList)
    {
        return $this->httpPost('pdd.ddk.pid.mediaid.bind', [
            'media_id' => $mediaId,
            'pid_list' => $pidList,
        ]);
    }
}
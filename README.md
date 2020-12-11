<p>
  <a href="https://github.com/qq15725/taobao-sdk" target="_blank">
    <img alt="Php-Version" src="https://img.shields.io/packagist/php-v/wxm/pdd-sdk.svg" />
  </a>
  <a href="https://github.com/qq15725/pdd-sdk" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="https://github.com/qq15725/pdd-sdk/graphs/commit-activity" target="_blank">
    <img alt="Maintenance" src="https://img.shields.io/badge/Maintained%3F-yes-green.svg" />
  </a>
  <a href="https://github.com/qq15725/pdd-sdk/blob/master/LICENSE" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

拼多多 SDK 封装, 调用简单、语义化增强。支持 Laravel/Lumen。 

## 安装

```bash
composer require wxm/pdd-sdk
```

## 使用

```php
<?php

use Pdd\Application;

$pdd = new Application('app_key', 'secret_key');

// 例如 pdd.ddk.goods.search 其他接口同理
$pdd->ddk->goods->search();
```

## 已封装

- pdd.ddk.goods.search 多多进宝商品查询
- pdd.ddk.goods.zs.unit.url.gen 多多进宝转链接口
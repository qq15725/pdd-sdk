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

### PHP 

```php
$pdd = new \Pdd\Application('client_id', 'client_secret');

// 例如 pdd.ddk.goods.search 其他接口同理
$pdd->ddk->goods->search();
```

### Laravel

1. 注册 ServiceProvider:
    ```php
    \Pdd\ServiceProvider::class
    ```
    
2. 发布配置：
    ```shell
    php artisan vendor:publish --provider="\Pdd\ServiceProvider" --force
    ```
    
3. 配置.env
    ```dotenv
    PDD_APPKEY=client_id
    PDD_APPSECRET=client_secret
    ```
    
3. 使用
    ```php
    // 例如 pdd.ddk.goods.search 其他接口同理
    \Pdd\Facades\Pdd::ddk()->goods->search();
    ```
    
### Lumen

1. 注册 ServiceProvider:
   
    `bootstrap/app.php` 下添加

    ```php
    $app->register(\Pdd\ServiceProvider::class);
    ``` 
2. 手动复制配置文件

3. 配置.env
    ```dotenv
    PDD_APPKEY=client_id
    PDD_APPSECRET=client_secret
    ```

3. 使用
    ```php
    // 例如 pdd.ddk.goods.search 其他接口同理
    \Pdd\Facades\Pdd::ddk()->goods->search();
    ```

## API

### [多多客API](https://jinbao.pinduoduo.com/third-party/rank)

推广位PID管理

- [x] pdd.ddk.goods.pid.generate 创建多多进宝推广位
- [x] pdd.ddk.goods.pid.query 查询已经生成的推广位信息
- [x] pdd.ddk.pid.mediaid.bind 用于存量推广位批量绑定媒体备案id

授权备案

- [x] pdd.ddk.rp.prom.url.generate 生成备案链接
- [x] pdd.ddk.member.authority.query 查询是否绑定备案

获取商品信息

- [x] pdd.ddk.goods.search 商品搜索
- [x] pdd.ddk.goods.recommend.get 商品推荐
- [x] pdd.ddk.top.goods.list.query 查询爆款排行商品
- [x] pdd.ddk.goods.detail 商品详情

商品推广

- [x] pdd.ddk.goods.promotion.url.generate 生成普通商品推广链接

营销工具

- [x] pdd.ddk.rp.prom.url.generate 生成营销工具推广链接
- [x] pdd.ddk.cms.prom.url.generate 生成商城推广链接

频道推广

- [x] pdd.ddk.resource.url.gen 生成拼多多主站频道推广链接

转链

- [x] pdd.ddk.goods.zs.unit.url.gen 转链

订单数据

- [x] pdd.ddk.order.list.increment.get 按更新时间同步已支付后的订单
- [x] pdd.ddk.order.list.range.get 按支付时间段查询订单
- [x] pdd.ddk.order.detail.get 查询订单详情 
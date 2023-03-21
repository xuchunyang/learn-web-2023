<?php

$env = [];
foreach (array_map(
             fn($line) => explode('=', $line),
             explode("\n", file_get_contents(__DIR__ . '/.env'))
         ) as $item) {
    [$k, $v] = $item;
    $env[$k] = $v;
}

// 确定 App 的云 API 密钥
$secret_id = $env['SECRET_ID'];
$secret_key = $env['SECRET_KEY'];


// 确定签名的当前时间和失效时间
$current = time();
$expired = $current + 86400;  // 签名有效期：1天


// 向参数列表填入参数
$arg_list = array(
    "secretId" => $secret_id,
    "currentTimeStamp" => $current,
    "expireTime" => $expired,
    "random" => rand());


// 计算签名
$original = http_build_query($arg_list);
$signature = base64_encode(hash_hmac('SHA1', $original, $secret_key, true) . $original);


echo $signature;
echo "\n";


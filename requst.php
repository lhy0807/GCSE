<?php
header("Content-type: text/html; charset=utf-8");
$header[] = "Ocp-Apim-Subscription-Key: 84a314765fc244bf871d6fea394c2a2c";
$header[] = "charset=UTF-8";
$q = "美国队长";
$q = urlencode($q);
$url = "https://bingapis.azure-api.net/api/v5/search/?q=$q&count=5&offset=0&mkt=zh-CN&safesearch=Moderate";
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // 获取数据返回  
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTP_VERSION, 1.1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_ENCODING, "");
$output = curl_exec($ch);
print_r($output);
?>
<?php

//echo $_GET['phone'];die;
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
$options['accountsid']='7cff5b8c02ec3e843a6f5bd6d6b7b66c';
$options['token']='7295308a38d9ea027da7ce4fb419b797';


//初始化 $options必填
$ucpass = new Ucpaas($options);

//开发者账号信息查询默认为json或xml
header("Content-Type:text/html;charset=utf-8");

//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
$appId = "1b2e6a8f0db44977aede369a8ef582a0";
//给那个手机号发送
$to = $_GET['phone'];

$templateId = "257875";

//封装验证码
$str = '1234567890123567654323894325789';
$code = substr(str_shuffle($str),0,5);
$_SESSION['code']=$code;
//这就是验证码
$param=$code;

echo $ucpass->templateSMS($appId,$to,$templateId,$param);
<?php


session_start();

$num=$_POST['tel'];

$SoftVersion = '2014-06-30';

$Account = 'Accounts';

$accountSid = '';

$function= 'Messages';

$operation ='templateSMS';

$token = '';

$time = date("YmdHis");

$SigParameter	 = strtoupper(md5($accountSid.$token.$time));

$Authorization = base64_encode($accountSid.":".$time);
$header = [
	'Accept:application/json',
	'Content-Type:application/json;charset=utf-8',
	'Authorization:'.$Authorization,
];

$str='0123456789';

$str1=substr(str_shuffle($str) , 0, 4);

$_SESSION['checkmobile']=$str1;

$data = [
	'templateSMS'=>[
		'appId'=>'',
		'param'=>"$str1",
		'templateId'=>'',
		'to'=>"$num",
	]
];



$body = json_encode($data);

$url = 'https://api.ucpaas.com/'.$SoftVersion.'/'.$Account . '/' . $accountSid . '/'. $function
	.'/' . $operation . '?sig=' .  $SigParameter;
 $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
          
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
          
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            curl_close($ch);
			


			




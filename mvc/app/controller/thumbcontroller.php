<?php
namespace controller;
use controller\controller;
use model\thumbmodel;

class thumbcontroller extends controller
{
	public function __construct()
	{
		parent::__construct();
		$this->user = new thumbmodel();
	}
	
	//给文章点赞方法
	public function thumb()
	{
		//检测上级来源是否存在
		$this->checkorig();
		
		//检查用户是否登录
		$this->islogin();
		
		//检查用户是否收藏过
		$username = $_SESSION['username'];
		$tid = $_REQUEST['id'];
		$where = "username = '$username' && tid = $tid && type = 0";
		$table = 'thumb';
		$result = $this->user->doselect($table , $where);
		
		if($result){
			$msg = '您已经点赞过了';
			$this->error($msg , $this->url);
		}else{
			$data['username'] = $_SESSION['username'];
			$data['addtime'] = time();
			$data['tid'] = $_REQUEST['id'];
			$data['type'] = 0;
			$result = $this->user->doinsert($data);
			if($result){
				$msg = '点赞成功';
				$this->error($msg,$this->url);
			}
		}
	}
	//收藏文章方法
	public function favirote()
	{	
		// 检测上级来源页是否存在
		$this->checkorig();

		//检查用户是否登录
		$this->islogin();

		//判断用户是否点赞过
		$username = $_SESSION['username'];
		$tid =  $_REQUEST['id'];
		$where = "username = '$username' && tid = $tid && type = 1";
		$table = 'thumb';
		$result = $this->user->doselect($table,$where);
		
		if($result){
			$msg = '你已经收藏过该文章了';
			$this->error($msg,$this->url);
		}else{
			$data['username'] = $_SESSION['username'];
			$data['addtime'] = time();
			$data['tid'] = $_REQUEST['id'];
			$data['type'] = 1;
			$result = $this->user->doinsert($data);
			if($result){
				$msg = '收藏成功';
				$this->error($msg,$this->url);
			}
			
		}
	}


	//检测上级来源页是否存在d的方法
	protected function checkorig()
	{
		if(empty($_SERVER['HTTP_REFERER'])){
		$this->error('禁止非法操作','index.php',2);
			
		}else{
			$this->url = $_SERVER['HTTP_REFERER'];

		}
	}
	
}
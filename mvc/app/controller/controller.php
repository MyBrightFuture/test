<?php
//这是一个基础的控制器
namespace controller;
use framework\tpl;
use framework\page;
use model\msgmodel;
use model\articlemodel;
use model\thumbmodel;


class controller extends tpl
{
	public function __construct()
	{
		parent::__construct($GLOBALS['config']['TPL_CACHE_DIR'],$GLOBALS['config']['TPL_DIR'],$GLOBALS['config']['TPL_LIFETIME']);


	//查询用户信息
		
		if(!empty($_SESSION['username'])){
			$user = new MsgModel();
			$username = $_SESSION['username'];
			$where = "username = '$username'";
			
			$this->userinfo = $user->where($where)->table('user')->fields()->select();
			//var_dump($this->userinfo);

			//查询该用户收藏的文章详情
			$table = 'thumb as t,blog_article as a';
			$fields = 'a.*';
			$where2 = "t.username = '$username' && t.type = 1 && t.tid = a.id";
			$this->collection = $user->where($where2)->fields($fields)->table($table)->select();

			$this->uid = $this->userinfo[0]['id'];

			//查询关注的用户
			$this->focus = $user->where($where)->table('focus')->select();

			
			$this->assign('userinfo',$this->userinfo);
			$this->assign('collection',$this->collection);
			$this->assign('focus',$this->focus);
			$this->assign('picture',$this->userinfo[0]['picture']);

		}else{
			$this->uid = null;
			$this->assign('picture','public/images/201710091321426416_s.jpg');
		}	

		
		//查询热门文章
		$article = new articlemodel();
		
		//文章总数
		$total = $article->dototal($where = 'first = 1')[0]['c'];

	
		$page = new Page($total,5);

		//获取分页
		$result = $page->rander();

		// var_dump($result);
		
		// var_dump($result);die;
		//查询所有博客所有信息
		$hotinfo = $article->bloginfo($limit = $result['offset'],$table = 'article',$where = 'first = 1',$order='hits desc');
		
		$this->assign('hotinfo',$hotinfo);
	}
	
	public function display($filePath = null , $isExcute = true)
	{
		
		if (is_null($filePath)) {
			$filePath = $_GET['m'] . '/' . $_GET['a'] . '.html';

		}
		
		parent::display($filePath , $isExcute);
	}
	
	
	public function success($msg = null , $url = null , $time = 3)
	{
		
		$this->assign('title' , '成功页面');
		$this->assign('msg' , $msg);
		$this->assign('url' , $url);
		$this->assign('time' , $time);
		
		$this->display('User/success.html');
		exit;
	}
	public function error($msg = null , $url = null ,$time = 3)
	{
		
		
		
		$this->assign('title' , '失败页面');
		$this->assign('msg' , $msg);
		$this->assign('url' , $url);
		$this->assign('time' , $time);
		
		$this->display('User/error.html');
		exit;
	}
	
	//检查是否登录方法
	public function islogin()
	{
		if(empty($_SESSION['username'])){
			$msg = '请先登录';
			$this->error($msg,'index.php?m=user&a=login');
		}
	}

	
}
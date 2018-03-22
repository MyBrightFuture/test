<?php
namespace controller;
use controller\controller;
use model\adminmodel;
use framework\page;



class admincontroller extends controller
{	

	public $user;
	protected $url;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new adminmodel();


	}

	public function adislogin()
	{
		if(empty($_SESSION['ad_username'])){
			$msg = '请先登录';
			$this->error($msg,'index.php?m=admin&a=login');
		}
	}

	public function index()
	{	
		$this->adislogin();
		//查询所有正常博客的信息
		$table = 'article';
		$where = "first = 1 && isdel = 0";
		$total = $this->user->dototal($where,$table)[0]['c'];

		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		// var_dump($result);die;
		$order = 'id';
		
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	}

	//把博客放入回收站方法
	public function dodel()
	{	
		$data['isdel'] = 1;
		$id = $_REQUEST['id'];

		$where = "id = $id";
		$table = 'article';
		$result = $this->user->doupdate($data,$where,$table);
		
		if($result[0]){
			$msg = '放入回收站成功';
			$this->success($msg,'index.php?m=admin&a=index');
		}else{
			$msg = '放入回收站失败';
			$this->error($msg,'index.php?m=admin&a=index');
		}
	}

	//恢复博客的方法
	public function replyblog()
	{
		$data['isdel'] = 0;
		$id = $_REQUEST['id'];

		$where = "id = $id";
		$table = 'article';
		$result = $this->user->doupdate($data,$where,$table);
		
		if($result[0]){
			$msg = '恢复成功';
			$this->success($msg,'index.php?m=admin&a=bh');
		}else{
			$msg = '恢复失败';
			$this->error($msg,'index.php?m=admin&a=bh');
		}
	}

	//把评论放入回收站的方法
	public function delreply()
	{
		$data['isdel'] = 1;
		$id = $_REQUEST['id'];

		$where = "id = $id";
		$table = 'article';
		$result = $this->user->doupdate($data,$where,$table);
		// var_dump($result);die;
		if($result[0]){
			$msg = '放入回收站成功';
			$this->success($msg,'index.php?m=admin&a=pg');
		}else{
			$msg = '放入回收站失败';
			$this->error($msg,'index.php?m=admin&a=pg');
		}
	}

	//恢复评论的方法
	public function recovery_reply()
	{
		$data['isdel'] = 0;
		$id = $_REQUEST['id'];

		$where = "id = $id";
		$table = 'article';
		$result = $this->user->doupdate($data,$where,$table);
		
		if($result[0]){
			$msg = '恢复评论成功';
			$this->success($msg,'index.php?m=admin&a=ph');
		}else{
			$msg = '恢复评论失败';
			$this->error($msg,'index.php?m=admin&a=ph');
		}
	}

	//把留言放入回收站的方法
	public function delmessage()
	{
		$data['isdel'] = 1;
		$id = $_REQUEST['id'];
		// echo $id;die;
		$where = "id = $id";
		$table = 'article';
		$result = $this->user->doupdate($data,$where,$table);
		
		if($result[0]){
			$msg = '放入回收站成功';
			$this->success($msg,'index.php?m=admin&a=lg');
		}else{
			$msg = '放入回收站失败';
			$this->error($msg,'index.php?m=admin&a=lg');
		}
	}

	//恢复留言的方法
	public function reco_message()
	{
		$data['isdel'] = 0;
		$id = $_REQUEST['id'];
		// echo $id;die;
		$where = "id = $id";
		$table = 'article';
		$result = $this->user->doupdate($data,$where,$table);
		// var_dump($result);die;
		if($result[0]){
			$msg = '恢复留言成功';
			$this->success($msg,'index.php?m=admin&a=lh');
		}else{
			$msg = '恢复留言失败';
			$this->error($msg,'index.php?m=admin&a=lh');
		}
	}

	//锁定用户的方法
	public function lock()
	{
		$data['isban'] = 1;
		$id = $_REQUEST['id'];

		$where = "id = $id";
		$table = 'user';
		$result = $this->user->doupdate($data,$where,$table);
		
		if($result[0]){
			$msg = '锁定成功';
			$this->success($msg,'index.php?m=admin&a=user');
		}else{
			$msg = '锁定失败';
			$this->error($msg,'index.php?m=admin&a=user');
		}
	}

	//锁定用户的方法
	public function relieve()
	{
		$data['isban'] = 0;
		$id = $_REQUEST['id'];

		$where = "id = $id";
		$table = 'user';
		$result = $this->user->doupdate($data,$where,$table);
		
		if($result[0]){
			$msg = '解除锁定成功';
			$this->success($msg,'index.php?m=admin&a=dark');
		}else{
			$msg = '解除锁定失败';
			$this->error($msg,'index.php?m=admin&a=dark');
		}
	}
	//退出后台
	public function loginout()
	{
		unset($_SESSION['ad_username']);
		$msg = '退出后台成功';
		$this->success($msg,'index.php?m=admin&a=login');
	}

	//分页
	protected function page($total,$num)
	{
		$this->page = new Page($total,$num);

		//获取分页
		$result = $this->page->rander();

		return $result;
	}

	public function bh()
	{	
		$this->adislogin();
		//查询所有被删除博客的信息
		$table = 'article';
		$where = "first = 1 && isdel = 1";
		$total = $this->user->dototal($where,$table)[0]['c'];

		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	}

	//评论管理页面
	public function pg()
	{	
		$this->adislogin();
		//查询所有正常评论的信息
		$table = 'article';
		$where = "first = 0 && isdel = 0";
		$total = $this->user->dototal($where,$table)[0]['c'];

		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	
	}

	//评论回收站页面
	public function ph()
	{	
		$this->adislogin();
		//查询所有被删除评论的信息
		$table = 'article';
		$where = "first = 0 && isdel = 1";
		$total = $this->user->dototal($where,$table)[0]['c'];

		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
		
	}
	//留言管理页面
	public function lg()
	{	
		$this->adislogin();
		//查询所有正常留言的信息
		$table = 'article';
		$where = "first = 2 && isdel = 0";
		$total = $this->user->dototal($where,$table)[0]['c'];

		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	}	

	//留言回收站
	public function lh()
	{	
		$this->adislogin();
		//查询所有被删除留言的信息
		$table = 'article';
		$where = "first = 2 && isdel = 1";
		$total = $this->user->dototal($where,$table)[0]['c'];

		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	}

	//用户管理页面
	public function user()
	{	
		$this->adislogin();
		//查询所有用户的信息
		$table = 'user';
		$where = "isban = 0";
		$total = $this->user->dototal($where,$table)[0]['c'];
		// var_dump($total);die;
		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	}

	//小黑屋页面
	public function dark()
	{	
		$this->adislogin();
		//查询所有用户的信息
		$table = 'user';
		$where = "isban = 1";
		$total = $this->user->dototal($where,$table)[0]['c'];
		// var_dump($total);die;
		//分页
		$result = $this->page($total,2);
		$limit = $result['offset'];
		
		$order = 'id';
		// var_dump($result);die;
		$info = $this->user->getInfo($table,$where,$order,$limit);
		// var_dump($info);die;
		$this->assign('info',$info);
		$this->assign('fenye',$result);
		$this->display();
	}


	//登录页面
	public function login()
	{
		$this->display();
	}

	//执行登录的方法
	public function dologin()
	{	
		//检查上级来源页是否存在
		$this->checkorig();

		//判断用户名或密码是否为空
		if(empty($_POST['username']) || empty($_POST['password'])){
			$msg = '用户名或密码不能为空';
			$this->error($msg,$this->url);
		}

		//判断用户名与密码是否一致
		$this->isagree();
		
	}

	//判断密码是否与用户名一致的方法
	protected function isagree()
	{	
		$username = $_SESSION['username'];
		$table = 'user';
	
		$where = "username = '$username'";
		
		$userinfo = $this->exists_username($table,$where);

		
		if(!empty($userinfo)){

				if($userinfo[0]['password'] == md5($_POST['password'] ) && $userinfo[0]['udertype'] == 1){
				$msg = '登陆成功';
				$_SESSION['ad_username'] = $_POST['username'];
				$this->success($msg,'index.php?m=admin&a=index');
				}else{
					$msg = '登录失败<br />密码错误或您不是管理员';
					$this->error($msg,$this->url);
				}
		}else{
			$msg = '登录失败<br />用户名不存在';
			$this->error($msg,$this->url);
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

	//检测用户名是否存在的方法
	protected function exists_username($table,$where)
	{
		$userinfo = $this->user->doselect($table,$where);
			
		return $userinfo;
	}

}
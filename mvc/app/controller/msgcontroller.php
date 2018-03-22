<?php
namespace controller;
use controller\controller;
use model\msgmodel;
use framework\upload;



class msgcontroller extends controller
{	

	public $user;
	protected $url;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = new msgmodel();
		
		
	}

	//资料主页
	public function index()
	{	$this->islogin();
		$this->display();
	}

	//上传头像页面
	public function photo()
	{	
		//检查是否登录
		$this->islogin();
		$username = $_SESSION['username'];

		
		//查询用户当前信息
	 $userinfo = $this->getuserinfo($where = "username ='$username'",$table = 'user');



	$this->assign('picture',$userinfo[0]['picture']);
		$this->display();
	}

	//修改密码
	public function password()
	{	
		
		$this->islogin();
		$this->display();
	}

	//修改密码方法
	public function dopassword()
	{	
		//检查是否登录
		$this->checkorig();

		//检查内容是否为空
		if(empty($_POST['password']) || empty($_POST['newpassword']) || empty($_POST['repassword'])){
			$msg = '所有内容不能为空';
			$this->error($msg,'index.php?m=msg&a=password');
		}

		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$newpassword = $_POST['newpassword'];

		//检查密码是否输入合法
		$this->checkPassword($newpassword,$repassword);
		
		//检查旧密码是否输入正确
		if($this->userinfo[0]['password'] !== md5($password)){
			$msg = '旧密码输入错误';
			$this->error($msg,$this->url);
		}

		//修改密码
		$data['password'] = md5($repassword);
		$username = $_SESSION['username'];

		$result = $this->user->doupdate($data,$where = "username = '$username'");

		if($result){
			$msg = "密码修改成功";
			$this->success($msg,$this->url);
		}else{
			$msg = '修改密码失败';
			$this->error($msg,$this->url);
		}

	}
	//检测密码是否合法的方法
	protected function checkpassword($newpassword,$repassword)
	{	
		//检查密码长度是否小于6位或者大于16位
		if(strlen($newpassword)<6 || strlen($newpassword) >16){

			$msg = '修改失败<br />新密码密码长度错误：由6到14个字符组成';
			
			$this->error($msg,$this->url);
			}
	
		//检查两次密码是否输入一致
		

		if(strcmp($newpassword,$repassword)){
			
			$msg = '修改失败<br />两次密码输入不一致';
			$this->error($msg,$this->url);
		}

		//判断密码是否为纯数字

		if(is_numeric($repassword)){
			$msg = '修改失败<br />新密码不能为纯数字';
			$this->error($msg,$this->url);
		 }

	}

	//修改资料
	public function update()
	{	
		//检查是否登录
		$this->islogin();

		//检查生日是否为空
		if(empty($this->userinfo[0]['brithday'])){
			$brithday = '未设置';
		}else{
			$brithday = $this->userinfo[0]['brithday'];
		}
		$this->assign('brithday',$brithday);
		// var_dump($this->userinfo);die;
		$this->display();
	}

	//执行修改的方法
	public function doupdate()
	{
		//判断是否修改了信息，如果没修改直接返回页面
		if( empty($_POST['email'] ) && empty($_POST['sex'])  && empty($_POST['place'] && empty($_POST['tel']))){
			if( empty($_POST['brithyear']) || empty($_POST['brithmonth']) || empty($_POST['brithday'])){

				header('location:'.$this->url.'');
				exit;
			}
		}

		//判断性别是否被修改
		if(!empty($_POST['sex'])){
			$data['sex'] = $_POST['sex'];
			
		}

		//判断生日是否被修改
		if(!empty($_POST['brithyear']) && !empty($_POST['brithmonth']) && !empty($_POST['brithday']) ){
			$data['brithday'] = $_POST['brithyear'] .'-'.$_POST['brithmonth'].'-'.$_POST['brithday'];

		}

		//判断籍贯是否被修改
		if(!empty($_POST['place'])){

			$data['province'] = $_POST['place'];
		
		}

		//判断邮箱是否被修改
		if(!empty($_POST['email'])){

			$data['email'] = $_POST['email'];

			
		}

		//判断手机号码是否输入正确
		if(!empty($this->checkTel())){
			$data['tel'] = $_POST['tel'];

		}

		// var_dump($data);
		//把修改的数据插入数据库
		$username = $_SESSION['username'];
		$where = "username = '$username'";
		$result = $this->user->doupdate($data,$where);

		if($result){
			$msg = '修改资料成功';
			$this->success($msg,'index.php?m=msg&a=update');
		}else{
			$msg = '修改失败';
			
			$this->error($msg,'index.php?m=msg&a=update');
		}

	}

	//检查手机格式是否输入正确
	protected function checkTel()
	{
		if(!empty($_POST['tel'])){

		//判断输入的手机号码是否存在
		$tel = $_POST['tel']; 
		if (strlen($tel) == "11" || !is_numeric($tel)) {
		
		 $pattern = preg_match_all("/13[0123456789]{1}\d{8}|14[57]\d{8}|15[012356789]\d{8}|17[56]\d{8}|18[0123456789]\d{8}/", $tel, $array);
		
		  if(empty ($array[0])){
		  		$msg = '你输入的手机号码不存在';
		  		$this->error($msg,'index.php?m=msg&a=update');
		  }else{
		  		return true;
		  }
		   
		} else {
		  	$msg = '你输入的手机号码格式不正确';
		  	$this->error($msg,'index.php?m=msg&a=update');
		}
	 }
	}

	//个性签名
	public function autograph()
	{
		//检查是否登录
		$this->islogin();

		
		//修改个人签名
		if(!empty($_POST['autograph'])){
			$data['autograph'] = $_POST['autograph'];
			$username = $_SESSION['username'];
			$where = "username = '$username'";
			$result = $this->user->doupdate($data,$where);

				if($result){
				$msg = '修改个人签名成功';
				$this->success($msg,'index.php?m=msg&a=autograph');
			}else{
				$msg = '修改个人签名失败';
				
				$this->error($msg,'index.php?m=msg&a=autograph');
			}
		}
		$this->display();
	}

	//执行上传头像的方法
	public function doupload()
	{	
		$up = new upload(['path' => 'public/upload']);

		//上传头像
		$result = $up->up('fields');

		//把上传成功的头像路径存入数据库
		$data['picture'] = 'public/upload/'.$result;

		$username = $_SESSION['username'];

		$res = $this->user->doupdate($data,$where = "username = '$username'");
		
		if($res[1] == 0){
			$msg = '上传头像成功';
			$this->success($msg,'index.php?m=msg&a=photo');
		}else{
			$msg = '头像上传失败';
			$this->error($msg,'index.php?m=msg&a=photo');
		}
		
	}

	//查询用户信息的方法
	protected function getuserinfo($where,$table)
	{	

		return $this->user->getuserinfo($where,$table);
	}



	//检测上级来源页是否存在d的方法
	protected function checkorig()
	{
		if(empty($_SERVER['HTTP_REFERER'])){
		$this->error('禁止非法操作','index.php',2);
			
		}else{
			$this->url = $_SERVER['HTTP_REFERER'];

		}
			//检查是否登录
		if(empty($_SESSION['username'])){

			$msg = '请先登录';
			$this->error($msg,'index.php?m=user&a=login');
		}

	}	

}
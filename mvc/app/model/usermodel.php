<?php
namespace model;
use framework\model;

class usermodel extends model
{
	//这是模型了
	
	public function doadd($data)
	{
		
		
		$result = $this->add($data);
		
		return $result;
		
	}
	
	public function dofind($data)
	{
		

		$userinfo = $this->where("username = '$data'")->select();
		
		return $userinfo;
	}

	public function find($where)
	{
		$userinfo = $this->where($where)->select();
		
		return $userinfo;
	}

	//修改方法
	public function doupdate($data,$where)
	{
		$result = $this->where($where)->update($data);

		return $result;
	}
}
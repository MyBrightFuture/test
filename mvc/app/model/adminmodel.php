<?php
namespace model;
use framework\model;

class adminmodel extends model
{
	
	public function doselect($table,$where)
	{
		

		$userinfo = $this->table($table)->where($where)->select();
		
		return $userinfo;
	}
	

	public function getinfo($table,$where,$order,$limit)
	{
		return $this->table($table)->fields()->where($where)->order($order)->limit($limit)->select();
	}

	//求最大值方法
	public function dototal($where,$table)
	{
		return $this->table($table)->fields('id')->where($where)->total();
	}

	//执行修改方法
	public function doupdate($data,$where,$table)
	{
		return $this->table($table)->where($where)->update($data);
	} 
}
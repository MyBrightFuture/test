<?php
namespace Model;
use framework\model;

class thumbmodel extends model
{
	public function doselect($table , $where)
	{
		$userinfo = $this->table($table)->where($where)->select();
		
		return $userinfo;
	}
	
	public function doinsert($data)
	{
		$result = $this->add($data);
		return $result;
	}
}
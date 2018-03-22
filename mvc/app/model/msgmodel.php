<?php
namespace model;
use framework\model;

class msgmodel extends model
{
	//查询方法
	public function getuserinfo($where , $table)
	{
		return $this->where($where)->table($table)->fields()->select();
	}
	
	//修改方法
	public function doupdate($data , $where)
	{
		$result = $this->table('user')->where($where)->update($data);
		return $result;
	}
}

<?php
/**
 * 类名：BacksatagesLoginModel
 * 功能：后台登陆
 * 版本：V1.0
 * 作者：王长先
 * 时间：2014-07-02
 */
class BacksatagesLoginModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 功能：获取管理员信息
	 * @prama array
	 * @return string
	 * @author wcx
	 */
	public function getAdmin($field='*', $where='1', $sort=' order by id desc ',$page=1, $perpage=50){
		$sql  = 'SELECT '.$field.' FROM `dp_admin` WHERE '.$where;
		return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('mysql'));
		//return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('cache', 'mysql'));
	}	
	
	
}
?>
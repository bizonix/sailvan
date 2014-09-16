<?php
/**
 * OpenServiceModel我的授权
 * @author wcx
 */
class OpenServiceModel extends CommonModel{
	
	
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 获取认证状态
	 * @return int
	 * @author wcx
	 */
	public function getOpenService($field='*', $where='1', $sort=' order by id asc ',$page=1, $perpage=50){
	    $sql  = 'SELECT '.$field.' FROM `dp_open_service` WHERE '.$where;
		return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->key('id')->select(array('mysql'));
	}
	public function getOpenServiceNyName(){
	    $sql  = 'SELECT * FROM `dp_open_service`';
	    return $this->sql($sql)->sort("order by id asc")->key('en_name')->select(array('mysql'));;
	}
	
}
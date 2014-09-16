<?php
/**
 * 类名：ApiModel
 * 功能：Api管理
 * 版本：V1.0
 * 作者：邹军荣
 * 时间：2014-07-09
 */
 
class ApiModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}
	
	/* 
	 * 功能：获取Api信息
	 * zjr
	 */
	public function getApi($field='*', $where='1', $sort=' order by id desc ',$page=1, $perpage=20) {
		$sql = 'SELECT '.$field.' FROM `'.C("DB_PREFIX").'api` WHERE '.$where;
		return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('mysql'));
	}
	
	/*
	 * 功能：修改申请的api
	 * zjr
	 */
	public 	static function updateApplyApi($newApplyApi=array(), $where='0') {
		$tableName = $this->getTableName();
		$newApplyApi = $this->formatUpdateField($tableName, $newApplyApi);
		if(!$newApplyApi){
			self::$errMsg =   $this->validatemsg;
			return false;
		}
		$updateApplyApi = ''; 
		foreach($newApplyApi as $k=>$v) {
			$updateApplyApi .= ($k.'="'.$v.'",');
		}
		$updateApplyApi = rtrim($updateApplyApi,',');
		$sql = 'UPDATE `'.C("DB_PREFIX").'call_api` SET '.$updateApplyApi.' WHERE '.$where;
		return $this->sql($sql)->update();
	}
	
	
}
?>
<?php
/**
 * 类名：CallApiModel
 * 功能：开发者调用api关系管理
 * 版本：V1.0
 * 作者：邹军荣
 * 时间：2014-07-19
 */
 
class CallApiModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}
	
	//功能：获取开发者调用api信息
	public function getDeveloperCallApi($field='*', $where='1',$sort='',$page=1, $perpage=20) {
		$sql = 'SELECT '.$field.' FROM `'.C("DB_PREFIX").'call_api` AS a		      
			   LEFT JOIN `'.C("DB_PREFIX").'api` AS b ON b.id = a.api_id
			   WHERE '.$where;
		return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array( 'mysql'));
	}
	
	//功能：修改开发者申请api信息
	public function updateDeveloperCallApi($newDeveloperCallApi = array(), $where='0') {
		$tableName = $this->getTableName();
		$newDeveloperCallApi = $this->formatUpdateField($tableName, $newDeveloperCallApi);
		if(!$newDeveloperCallApi){
		    self::$errMsg =   $this->validatemsg;
		    return false;
		}
		$updateDeveloperCallApi = ''; 
		foreach($newDeveloperCallApi as $k=>$v) {
			$updateDeveloperCallApi .= ($k.'="'.mysql_real_escape_string($v).'",');
		}
		$updateDeveloperCallApi = rtrim($updateDeveloperCallApi,',');
		$sql = 'UPDATE `'.C("DB_PREFIX").'call_api` SET '.$updateDeveloperCallApi.' WHERE '.$where;
		return $this->sql($sql)->update();
	}
	
}
?>
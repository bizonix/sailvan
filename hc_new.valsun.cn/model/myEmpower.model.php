<?php
/**
 * 类名：MyEmpowerModel
 * 功能：我的授权
 * 版本：V1.0
 * 作者：王长先
 * 时间：2014-07-02
 */
class MyEmpowerModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 功能：获取我的授权信息
	 * @prama array
	 * @return string
	 * @author wcx
	 */
	public function getMyEmpower($field='*', $where='1', $sort=' order by id desc ',$page=1, $perpage=50){
		$sql  = 'SELECT '.$field.' FROM `dp_empower` WHERE '.$where;
		return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->key("open_service_id")->select(array('mysql'));
		//return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('cache', 'mysql'));
	}	
	/**
	 * 功能：获取我的授权信息
	 * @prama array
	 * @return string
	 * @author wcx
	 */
	public function getAllEmpower($where='1', $sort=' order by id desc ',$page=1, $perpage=50){
	    $sql  = 'select e.dp_id as dpId,e.id as id,d.company,o.cn_name,d.email,e.apply_time,e.`status` from dp_empower as e LEFT JOIN dp_open_service as o on e.open_service_id=o.id LEFT JOIN dp_developer as d on d.id=e.dp_id  WHERE '.$where;
	    return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->key("open_service_id")->select(array('mysql'));
	    //return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('cache', 'mysql'));
	}
	/**
	 * 功能：获取我的授权信息
	 * @prama array
	 * @return string
	 * @author wcx
	 */
	public function getAllEmpowerCount($where){
	    $sql  = 'select count(*) as count from dp_empower as e LEFT JOIN dp_open_service as o on e.open_service_id=o.id LEFT JOIN dp_developer as d on d.id=e.dp_id  WHERE '.$where;
	    return $this->sql($sql)->count(array('mysql'));
	}
	/**
	 * 根据我的授权信息
	 * @param string $column
	 * @param string $columnVal
	 * @param array $data
	 * @author wcx
	 */
	public function updateMyEmpower($whereArr,$data){
	    $where =   '1';
	    foreach($whereArr as $k=>$v){
	        $where .=  " AND $k='".mysql_real_escape_string($v)."'";
	    }
	    $updateMyEmpower   =   '';
		foreach($data as $k=>$v)
		{
			$updateMyEmpower .= ($k.'="'.mysql_real_escape_string($v).'",');
		}
		$updateMyEmpower = rtrim($updateMyEmpower,',');
		//echo "UPDATE `dp_developer` SET ".$updateDeveloper." WHERE {$column}='{$columnVal}'";exit;
		return $this->sql("UPDATE `dp_empower` SET ".$updateMyEmpower." WHERE $where")->update();
	    
	}
	public function insertEmpowerData($fdata){
	    return $this->sql("INSERT INTO dp_empower SET ".array2sql($fdata))->insert();
	}
	
}
?>
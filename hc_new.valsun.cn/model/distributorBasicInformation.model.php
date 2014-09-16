<?php
/*
 *分销商基础信息管理
 *add by wcx @ 20140627
 */
class DistributorBasicInformationModel extends CommonModel{	

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 根据平台Id和accountid获取账号信息 分页显示
	 * @param array $data   
	 * @return array 
	 * @author yxd
	 */
	public function modifyDistributorBasicInformation($data){
		$table = C('DB_PREFIX').'developer';
		$fdata = $this->formatInsertField($table, $data);
		if ($fdata===false){
		    $this::$errMsg    =   $this->validatemsg;
		    return false;
		}
		$result = $this->sql("INSERT INTO {$table} SET ".array2sql($fdata))->insert();
		if ($result) $this->_orderid = $this->getLastInsertId();
		return $result;
		
	}
	
}
?>	
	
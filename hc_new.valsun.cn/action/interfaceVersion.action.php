<?php
/**
 * 类名：InterfaceVersionAct
 * 功能：接口管理（提供）
 * 版本：v1.0
 * 作者：wcx
 * 时间：2014/08/09
 * errCode：
 */
class InterfaceVersionAct extends CheckAct {
	public function __construct(){
		parent::__construct();
	}
	/*
	 * 获取列表数据
	 */
	public function act_getDataList(){
	    
	    return M($this->act_getModel())->getData("*",$this->act_getDataWhere(),'order by id desc',$this->page,$this->perpage);
	}
	/*
	 * 获取总的记录个数
	 */
	public function act_getDataCount(){
	    return M($this->act_getModel())->getDataCount($this->act_getDataWhere());
	}
	/*
	 * 查询条件组装
	 */
	public function act_getDataWhere(){
	    $where             =   "1 ";
	    $id                =   @trim($_REQUEST['id']);
	    $requestname       =   @trim($_REQUEST['requestname']);
	    $rule              =   @trim($_REQUEST['rule']);
	    $version           =   @trim($_REQUEST['version']);
	    $extend_package    =   @trim($_REQUEST['extend_package']);
	    $extend_transform  =   @trim($_REQUEST['extend_transform']);
	    $is_disable        =   @trim($_REQUEST['is_disable']);

	    if(!empty($id)){
	        $where .=  " AND id = '".mysql_real_escape_string($id)."'";
	    }
	    if(!empty($requestname)){
	        $where .=  " AND requestname like '%".mysql_real_escape_string($requestname)."%'";
	    }
	    if($rule!=''){
	        $where .=  " AND rule like '%".mysql_real_escape_string($rule)."%'";
	    }
	    if($version!=''){
	        $where .=  " AND version like '".mysql_real_escape_string($version)."'";
	    }
	    if($extend_package!=''){
	        $where .=  " AND extend_package='%".mysql_real_escape_string($extend_package)."%'";
	    }
	    if($extend_transform!=''){
	        $where .=  " AND extend_transform='%".mysql_real_escape_string($extend_transform)."%'";
	    }
	    if($is_disable!=''){
	        $where .=  " AND is_disable='".mysql_real_escape_string($is_disable)."'";
	    }
	    return $where." AND is_delete='0'";
	}
	
	/*新增接口
	 * 
	 */
	public function act_addData(){
		$data =   array(
		        "requestname"         =>  @trim($_REQUEST['requestname']),
		        "rule"                =>  @trim($_REQUEST['rule']),
		        "version"             =>  @trim($_REQUEST['version']),
		        "extend_package"      =>  @trim($_REQUEST['extend_package']),
		        "extend_transform"    =>  @trim($_REQUEST['extend_transform']),
		        "is_disable"          =>  @trim($_REQUEST['is_disable']),
		        "note"                =>  @trim($_REQUEST['note']),
		);
		return M($this->act_getModel())->insertData($data);
	}
	/*
	 * 更新接口
	 */
	public function act_updateData(){
	    $id    =   $_REQUEST['id'];
	    $data =   array(
	            "requestname"         =>  @trim($_REQUEST['requestname']),
		        "rule"                =>  @trim($_REQUEST['rule']),
		        "version"             =>  @trim($_REQUEST['version']),
		        "extend_package"      =>  @trim($_REQUEST['extend_package']),
		        "extend_transform"    =>  @trim($_REQUEST['extend_transform']),
	            "is_disable"          =>  @trim($_REQUEST['is_disable']),
		        "note"                =>  @trim($_REQUEST['note']),
	    );
// 	    if(!$this->act_InterfaceVersionDataCheck($data)){
// 	    	return false;
// 	    }
	    //var_dump($data);exit;
	    return M($this->act_getModel())->updateData($id,$data);
	}
	/*
	 * 启用接口
	*/
	public function act_disableData(){
	    $id    =   $_REQUEST['id'];
	    return M($this->act_getModel())->updateData($id,array("is_disable"=>"1"));
	}
	/*
	 * 禁用接口
	*/
	public function act_notDisableData(){
	    $id    =   $_REQUEST['id'];
	    return M($this->act_getModel())->updateData($id,array("is_disable"=>"2"));
	}
	/*
	 * 删除接口
	 */
	public function act_delData(){
	    $id    =   $_REQUEST['id'];
	    return M($this->act_getModel())->deleteData($id);
	}
}

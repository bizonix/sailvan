<?php
/**
 * 类名：PromptMsgAct
 * 功能：错误码管理
 * 版本：v1.0
 * 作者：wcx
 * 时间：2014/08/09
 * errCode：
 */
class PromptMsgAct extends CheckAct {
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
	    $where             =   "1";
	    $id                =   @trim($_REQUEST['id']);
	    $type              =   @trim($_REQUEST['type']);
	    $errormsg          =   @trim($_REQUEST['errormsg']);
	    $creatorName       =   @trim($_REQUEST['creatorName']);
	    $lastmodifyName    =   @trim($_REQUEST['lastmodifyName']);
	    if(!empty($id)){
	        $where .=  " AND id = '".mysql_real_escape_string($id)."'";
	    }
	    if(!empty($type)){
	        $where .=  " AND type like '%".mysql_real_escape_string($type)."%'";
	    }
	    if($errormsg!=''){
	        $where .=  " AND errormsg like '%".mysql_real_escape_string($errormsg)."%'";
	    }
	    if($creatorName!=''){
	        $where .=  " AND creatorName like '%".mysql_real_escape_string($creatorName)."%'";
	    }
	    if($lastmodifyName!=''){
	        $where .=  " AND lastmodifyName like '%".mysql_real_escape_string($lastmodifyName)."%'";
	    }
	    return $where." AND is_delete='0'";;
	}
	
	/*新增接口
	 * 
	 */
	public function act_addData(){
		$data =   array(
		        "type"            =>  trim($_REQUEST['type']),
		        "status"          =>  $_REQUEST['status']=='1'?'1':'2',
		        "errormsg"        =>  trim($_REQUEST['errormsg']),
		        "creatorName"     =>  $this->act_getAdminInfor(),
		        "createTime"      =>  time(),
		        "lastmodifyName"  =>  $this->act_getAdminInfor(),
		        "lastmodefyTime"  =>  time(),
		);
		
		return M($this->act_getModel())->insertData($data);
	}
	/*
	 * 更新接口
	 */
	public function act_updateData(){
	    $id    =   @$_REQUEST['id'];
	    $data =   array(
	            "type"            =>  @trim($_REQUEST['type']),
		        "status"          =>  @$_REQUEST['status']=='1'?'1':'2',
		        "errormsg"        =>  @trim($_REQUEST['errormsg']),
		        "lastmodifyName"  =>  $this->act_getAdminInfor(),
		        "lastmodefyTime"  =>  time(),
	    );
	    return M($this->act_getModel())->updateData($id,$data);
	}
	
	/*
	 * 删除接口
	 */
	public function act_delData(){
	    $id    =   $_REQUEST['id'];
	    return M($this->act_getModel())->deleteData($id);
	}
}

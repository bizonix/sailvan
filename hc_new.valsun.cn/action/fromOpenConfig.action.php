<?php
/**
 * 类名：FromOpenConfigAct
 * 功能：接口管理
 * 版本：v1.0
 * 作者：wcx
 * 时间：2014/08/09
 * errCode：
 */
class FromOpenConfigAct extends CheckAct {
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
	    $functionname      =   @trim($_REQUEST['functionname']);
	    $method            =   @trim($_REQUEST['method']);
	    $v                 =   @trim($_REQUEST['v']);
	    $username          =   @trim($_REQUEST['username']);

	    if(!empty($id)){
	        $where .=  " AND id = '".mysql_real_escape_string($id)."'";
	    }
	    if(!empty($functionname)){
	        $where .=  " AND functionname like'%".mysql_real_escape_string($functionname)."%'";
	    }
	    if($method!=''){
	        $where .=  " AND method like'%".mysql_real_escape_string($method)."%'";
	    }
	    if($v!=''){
	        $where .=  " AND v like'%".mysql_real_escape_string($v)."%'";
	    }
	    if($username!=''){
	        $where .=  " AND username like'%".mysql_real_escape_string($username)."%'";
	    }
	    return $where." AND is_delete='0'";
	}
	
	/*新增接口
	 * 
	 */
	public function act_addData(){
		$data =   array(
		        "functionname"    =>  trim($_REQUEST['functionname']),
		        "name"            =>  trim($_REQUEST['name']),//函数说明
		        "requesturl"      =>  trim($_REQUEST['requesturl']),
		        "method"          =>  trim($_REQUEST['method']),//请求API
		        "format"          =>  trim($_REQUEST['format']),//返回数据格式
		        "v"               =>  trim($_REQUEST['v']),//v
		        "username"        =>  empty($_REQUEST['username'])?'purchase':$_REQUEST['username'],//开放系统用户默认是purchase
		        "getOrPost"       =>  $_REQUEST['getOrPost']=='2'?'2':'1',//发送请求，默认为1，GET，2为POST
		        "cachetime"       =>  (int)$_REQUEST['cachetime'],
		);
		$ret  =   M($this->act_getModel())->getData("*","functionname='".mysql_real_escape_string($data['functionname'])."' or method='".mysql_real_escape_string($data['method'])."'");
		if(!empty($ret)){
		    self::$errMsg[10119]    =   get_promptmsg(10119,"函数名称或请求API");
			return false;
		}
		return M($this->act_getModel())->insertData($data);
	}
	/*
	 * 更新接口
	 */
	public function act_updateData(){
	    $id    =   $_REQUEST['id'];
	    $data =   array(
	            "functionname"    =>  trim($_REQUEST['functionname']),
	            "name"            =>  trim($_REQUEST['name']),//函数说明
	            "requesturl"      =>  trim($_REQUEST['requesturl']),
	            "method"          =>  trim($_REQUEST['method']),//请求API
	            "format"          =>  trim($_REQUEST['format']),//返回数据格式
	            "v"               =>  trim($_REQUEST['v']),//v
	            "username"        =>  empty($_REQUEST['username'])?'purchase':$_REQUEST['username'],//开放系统用户默认是purchase
	            "getOrPost"       =>  $_REQUEST['getOrPost']=='2'?'2':'1',//发送请求，默认为1，GET，2为POST
	            "cachetime"       =>  (int)$_REQUEST['cachetime'],
	    );
	    $ret  =   M($this->act_getModel())->getData("id","functionname='".mysql_real_escape_string($data['functionname'])."' or method='".mysql_real_escape_string($data['method'])."'");
	    foreach ($ret as $k=>$v){
	        if($v['id']!=$id){
	            self::$errMsg[10119]    =   get_promptmsg(10119,"函数名称或请求API");
	            return false;
	        }
	    }
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

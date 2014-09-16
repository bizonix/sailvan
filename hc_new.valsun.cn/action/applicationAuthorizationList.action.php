<?php
/**
 * ApplicationAuthorizationListAct分销商授权列表
 * @author wcx
 */
class ApplicationAuthorizationListAct extends CheckAct{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 分销商授权列表
	 * @author wcx
	 */
	public function act_applicationAuthorizationList(){
	    return M('MyEmpower')->getAllEmpower($this->act_applicationAuthorizationWhere(),'order by id desc',$this->page,$this->perpage);
	}
	/**
	 * 分销商授权列表数量
	 * @author wcx
	 */
	public function act_applicationAuthorizationListCount(){
	    return M('MyEmpower')->getAllEmpowerCount($this->act_applicationAuthorizationWhere());
	}
	/**
	 * 分销商授权列表条件组装
	 * @author wcx
	 */
	private function act_applicationAuthorizationWhere(){
	    $where             =   "1 ";
	    $type              =   @trim($_REQUEST['applyType']);
	    $status            =   @trim($_REQUEST['status']);
	    $company           =   @trim($_REQUEST['company']);
	    if(!empty($type)){
	        $where .=  " AND e.open_service_id='$type'";
	    }
	    if($status!=''){
	        $where .=  " AND e.status='$status'";
	    }
	    if($company!=''){
	        $where .=  " AND company='$company' ";
	    }
	    return $where;
	}
}
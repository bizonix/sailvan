<?php
/**
 * MyEmpowerAct我的授权
 * @author wcx
 */
class MyEmpowerAct extends CheckAct{
	
	
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 获取认证状态
	 * @return int
	 * @author wcx
	 */
	public function act_getAuthentication(){
	    $getData   =   M("Developer");
		$where    =   "id='".$this->act_getUserInfor('id')."'";
		$data     =   $getData->getDeveloper("status",$where);
		return $data[0]['status'];
	}
	/**
	 * 获取申请产品信息
	 * @return array
	 * @author wcx
	 */
	public function act_getIntentionProducts(){
	    $getData  =   M('Developer');
	    $where    =   "email='".$this->act_getUserInfor('email')."'";
	    $data     =   $getData->getDeveloper("intention_products",$where);
	    $data     =   $data[0]['intention_products'];
	    if($data===false){
	        $this::$errMsg[10131] =   get_promptmsg(10131,'分销类目');
	        return false;
	    }
	    $data     =   json_decode($data,true);
	    if(empty($data)){
	    	return false;
	    }else{
	    	return $data;
	    }
	}
	/**
	 * 更新申请产品信息
	 * @return array
	 * @author wcx
	 */
	public function act_updateIntentionProducts(){
        $intentionProducts  =   json_encode($_REQUEST['intentionProducts']);//主销产品
        if(empty($intentionProducts)){
            $this::$errMsg[10115] =   get_promptmsg(10115);
        	return false;
        }
        $data   =   array(
                'intention_products'    => $intentionProducts,
        );
	    return M('Developer')->updateDataByColumn("email",$this->act_getUserInfor('email'),$data);
	}
	/**
	 * 更新首次申请产品信息
	 * @return array
	 * @author wcx
	 */
	public function act_updateMyEmpowerByFirst(){
	    $type  =   trim($_REQUEST['type']);
	    $openService   =   M('OpenService')->getOpenServiceNyName();
	    if(isset($openService[$type])){//
	        $ret   =   M('MyEmpower')->getMyEmpower('status,id',"open_service_id='".$openService[$type]['id']."' and dp_id='".$this->act_getUserInfor('id')."'");
	        if(empty($ret)){
	            $data  =   array(
	            	
	                    'dp_id'            =>  $this->act_getUserInfor('id'),
	                    'open_service_id'  =>  $openService[$type]['id'],
	                    'status'           =>  '2',
	                    'apply_time'       =>  time(),
	            );
	            return M('MyEmpower')->insertEmpowerData($data);
	        }
	        $data  =   array(
	                'status'           =>  '2',
	                'apply_time'       =>  time(),
	        );
	        return M('MyEmpower')->updateMyEmpower(array("id"=>$ret[0]['id']),$data);
	    }
	    $this::$errMsg[10132]  =   get_promptmsg(10132);
	    return false;
	}
	/**
	 * 获取授权信息
	 * @return array
	 * @author wcx
	 */
	public function act_getMyEmpower(){
	    $ret           =   M('MyEmpower')->getMyEmpower("*","dp_id='".$this->act_getUserInfor('id')."'");
	    $openService   =   M('OpenService')->getOpenService();
	    $retData       =   array();
	    if(empty($ret)){
	        foreach($openService as $k=>$v){
	            $retData[$v['en_name']]   =   '1';
	        }
	    }else{
    	    foreach($openService as $k=>$v){
    	        $status    =   !empty($ret[$k]['status'])?$ret[$v['id']]['status']:'1';
    	        if($status=='5'){
    	            $status    =   '2';
    	        }
    	        $retData[$v['en_name']]   =   $status;
    	    }
	    }
	    //var_dump($retData);exit;
	    return $retData;
	}
	/**
	 * 获取授权状态信息
	 * @return array
	 * @author wcx
	 */
	public function act_getStatus(){
	    $type          =   $_REQUEST['type'];
	    $openService   =   M('OpenService')->getOpenServiceNyName();
	    if(isset($openService[$type])){//
	        $ret   =   M('MyEmpower')->getMyEmpower('status',"open_service_id='".$openService[$type]['id']."' and dp_id='".$this->act_getUserInfor('id')."'");
	        if(empty($ret)){
	            return '1';
	        }
	        if($ret[0]['status']=='5'){
	        	return '2';
	        }
	        return $ret[0]['status'];
	    }
	    $this::$errMsg[10132]  =   get_promptmsg(10132);
	    return false;
	}
	/**
	 * 获取账号和密码信息
	 * @return array
	 * @author wcx
	 */
	public function act_getAccountAndPwd(){
	    $type  =   $_REQUEST['type'];
	    $openService   =   M('OpenService')->getOpenServiceNyName();
	    if(isset($openService[$type])){//
	        $ret   =   M('Developer')->getDeveloper("*","email='".$this->act_getUserInfor('email')."'");
	        if(empty($ret)){
	            return false;
	        }
	        $retData   =   array();
	        switch($type){
	        	case 'api_open'://
	        	    $retData  =   array($ret[0]['token'],$ret[0]['app_key']);
	        	    break;
	        	case 'pc_data_open':
	        	    $retData  =   array($ret[0]['erp_account'],$ret[0]['ftp_pwd']);
	        	    break;
        	    case 'pic_sys_open':
        	        $retData  =   array($ret[0]['email'],$ret[0]['login_internal_pwd']);
        	        break;
    	        case 'ebay_sys_open':
    	            $retData  =   array($ret[0]['email'],$ret[0]['login_internal_pwd']);
    	            break;
    	        default:
    	            $this::$errMsg[10132]  =   get_promptmsg(10132);
    	            return  false;
	        }
	        return $retData;
	    }
	}
	/**
	 * 获取留言信息
	 * @return array
	 * @author wcx
	 */
	public function act_getReason(){
	    $type  =   $_REQUEST['type'];
	    $openService   =   M('OpenService')->getOpenServiceNyName();
	    if(isset($openService[$type])){//
	        $where =   " dp_id='".$this->act_getUserInfor('id')."' and open_service_id='".$openService[$type]['id']."'";
	        $ret   =   M('MyEmpower')->getMyEmpower("manager_message",$where);
	        if(empty($ret)){
	            return false;
	        }
	        $msg   =   array_pop($ret);
	        return $msg['manager_message'];
	    }
	}
	/**
	 * 修改某个账户店铺状态为待审核
	 * @return bool
	 * @author wcx
	 */
	public function act_updateShop(){
	    $shopStatusArr =   $_REQUEST['shop'];
        foreach($shopStatusArr as $k=>$v){
            if(!M("DistributorShop")->updateDataByIds($v,array("status"=>"2"))){
            	return false;
            }
        }
        return true;
	}
	/**
	 * 更新开发者留言
	 * @return array
	 * @author wcx
	 */
	public function act_updateDistributorMessage(){
	    $type  =   trim($_REQUEST['type']);
	    $openService   =   M('OpenService')->getOpenServiceNyName();
	    if(isset($openService[$type])){
	        $data  =   array(
	                "distributor_message" =>  trim($_REQUEST['message']),
	        );
	        $whereArr  =   array(
	        	
	                'dp_id' => $this->act_getUserInfor('id'),
	                'open_service_id' =>   $openService[$type]['id'],
	        );
	        return M('MyEmpower')->updateMyEmpower($whereArr,$data);
	    }
	    $this::$errMsg[10132]  =   get_promptmsg(10132);
	    return false;
	}
	
	/**
	 * 获取所有开放服务
	 * @return array
	 * @author wcx
	 */
	public function act_getAllOpenService(){
		return  M('OpenService')->getOpenService();
	}
    /**
	 * 根据鉴权的公司ID更新本地ebay申请状态
	 * @return array
	 * @author wcx
	 */
	public function act_updateOpenServiceStatus(){
	    $companyId     =   trim($_REQUEST['companyId']);
	    $serverId      =   trim($_REQUEST['serverId']);
	    $status        =   trim($_REQUEST['status']);
	    $allInfo       =   M("InterfacePower")->getCompanyInfo();
	    $company       =   "";
	    foreach($allInfo as $k=>$v){
	    	if($v['companyId']==$companyId){
	    	    $company  =   $v['companyName'];
	    		break;
	    	}
	    }
	    if(empty($company)){
	        self::$errMsg[10133] =   get_promptmsg(10133);
	    	return false;
	    }
	    $ret   =   M("Developer")->getDeveloper("id","company='$company'");
	    if(empty($ret)){
	        self::$errMsg[10134] =   get_promptmsg(10134);
	        return false;
	    }else{
	        $whereData =   array(
	                "dp_id"            =>   $ret[0]['id'],
	                "open_service_id"  =>   $serverId,
	        );
	        $data  =   array(
	                'status'           =>  $status,
	                'apply_time'       =>  time(),
	        );
	        return M('MyEmpower')->updateMyEmpower($whereData,$data);
	    }
		
	}
	public function act_gotoDown(){
		F("dp");
		$getData   =   M("Developer");
		$where    =   "id='".$this->act_getUserInfor('id')."'";
		$data     =   $getData->getDeveloper("ftp_url,erp_account,ftp_pwd",$where);
		//var_dump(WEB_PATH.$data[0]['ftp_url']);exit;
		downFile(WEB_PATH.$data[0]['ftp_url'],"资料下载.zip");
	}
	
}
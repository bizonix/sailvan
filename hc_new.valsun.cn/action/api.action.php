<?php
/**
 * 类名：APIAct
 * 功能：登录
 * 版本：v1.0
 * 作者：邹军荣
 * 时间：2014/07/09
 * errCode：
 */
class ApiAct extends CheckAct {
	public function __construct(){
		parent::__construct();
	}

	/*
	 * 获取地址列表信息
	 */
	public function act_dpApiList() {
		$dpInfor     			= json_decode(_authcode($_COOKIE['hcUser']),true);
		$field 		 			= 'a.`id`,a.`application_date`,b.`api_name`,a.`callback_url`,a.`api_call_times`,a.`status`';
		$where		 			= 'a.developer_id='.$dpInfor['id'];
		$getDeveloperCallApi 	= M('CallApi')->getDeveloperCallApi($field, $where);
		return $getDeveloperCallApi;
	}
	
	/* 
	 * 功能：用户申请api
	 */
	public function act_applyApi() {
		$dpInfor				= json_decode(_authcode($_COOKIE['hcUser']),true);
		$field    				= 'a.`api_id`,a.`callback_url`,b.`api_name`,b.`api_desc`';
		$where    				= 'a.is_delete=0 AND a.developer_id='.$dpInfor['id'];
		$getDeveloperCallApi	= M('CallApi')->getDeveloperCallApi($field, $where);
		$data = array();
		if($getDeveloperCallApi) {
			foreach($getDeveloperCallApi as $v) {
				$data[$v['api_name']] = $v['callback_url'];
			}
		}
	
		$where = 'is_delete=0';
		$field = '`id`,`api_name`,`api_desc`';
		$getApi = M('Api')->getApi($field, $where);
		if($getApi) {
			foreach($getApi as $k1=>$v1) {
				$getApi[$k1]['callback_url'] = $data[$v1['api_name']];
			}
		}
		return $getApi;
	}
	
	/* 
	 * 功能：更新用户申请api信息
	 */
	public function act_updateCallApi() {
		$dpInfor	= json_decode(_authcode($_COOKIE['hcUser']),true);
		foreach($_POST as $k=>$v) {
			$where = 'a.is_delete=0 AND a.api_id='.mysql_real_escape_string($k).'
			         AND a.developer_id='.$dpInfor['id'];
			$getApi = M('CallApi')->getDeveloperCallApi('count(*) AS num', $where);
			if($getApi[0]['num']) {  // print_r($getApi); exit;
				$callUrl = mysql_real_escape_string($this->act_filterScript($v));
				if(!empty($callUrl)){
					$newApplyApi = array(
							'callback_url' => $callUrl,
							'application_date' => time(),
					);
					$where2 = 'is_delete=0 AND api_id='.mysql_real_escape_string($k).'
			         AND developer_id='.$dpInfor['id'];
					
					$updateDeveloperCallApi = M('CallApi')->updateDeveloperCallApi($newApplyApi, $where2);
					if(!$updateDeveloperCallApi) {
						self::$errMsg[10137] = get_promptmsg(10137);
						return false;
					}else{
						self::$errMsg[200] = get_promptmsg(200);
					}
				}else{
					self::$errMsg[10138] = '申请失败,请检查输入的字符';
					return false;
				}
			}else if(trim($v)) {
				$v = mysql_real_escape_string($this->act_filterScript($v));
				if(!empty($v)){
					$newApplyApi = array(
							'callback_url' => $v,
							'api_id'       => mysql_real_escape_string($k),
							'developer_id' => $dpInfor['id'],
							'application_date' => time(),
							'status'       => 1,
					);
					$addDeveloperCallApi = M('CallApi')->insertData($newApplyApi);
					if(!$addDeveloperCallApi) {
						self::$errMsg[10137] = get_promptmsg(10137);
						return false;
					}else{
						self::$errMsg[200] = get_promptmsg(200);
						return true;
					}
				}else{
					self::$errMsg[10139] = get_promptmsg(10139);
					return false;
				}
			}
		}		
		return true;
	}

	/*
	 * 功能：更新用户的API
	 * zjr
	 */
	public function act_modifyApplyApi(){
		if($_POST) {
			$data = trim($this->act_filterScript($_POST['url']));
			if(!empty($data)){
				$newData = array(
						'callback_url' => $data
				);
				$where = 'id='.$_POST['id'];
				$updateDeveloperCallApi = M('CallApi')->updateDeveloperCallApi($newData, $where);
				if(!$updateDeveloperCallApi) {
					self::$errMsg[10140] = get_promptmsg(10140);
					return false;
				}
				return true;
			}else{
				self::$errMsg[10141] = get_promptmsg(10141);
				return false;
			}
		}
	}
}

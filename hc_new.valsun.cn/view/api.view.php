<?php
/**
 * 功能：控制ApI相关的一系列动作
 * @author 邹军荣
 * v 1.0
 * 时间：2014/07/07
 *
 */
class ApiView extends BaseView {
	
	public function __construct(){
		parent::__construct();
		$this->smarty->assign("progressInfor", A('Public')->act_getInforProgress());
	}
	/*
	 * 申请API
	 * zjr
	 */
	public function view_applyApi() {
		$this->smarty->assign(array(
            'developerCallApi' => A('Api')->act_applyApi(),
		));
        $this->smarty->display('applyAPI.html');
	}
	
	/*
	 * 申请API的Post请求
	* zjr
	*/
	public function view_applyApiPost() {
		echo $this->ajaxReturn(A('Api')->act_updateCallApi());
	}
	
	/*
	 * 我的API
	 * zjr
	 */
	public function view_myApi() {
		$this->smarty->assign(array(
				'developerCallApi' => A('Api')->act_dpApiList(),
				'account_status'   => C('API_STATUS'),
		));
        $this->smarty->display('MyAPI.html');
	}
	
	/*
	 * 功能：更新用户单个api申请
	 * zjr
	 */
	public function view_modifyApplyApiPost() {
		echo $this->ajaxReturn(A('Api')->act_modifyApplyApi());
	}

}
?>
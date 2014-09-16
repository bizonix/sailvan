<?php
/**
 * 功能：控制修改密码相关的一系列动作
 * @author 邹军荣
 * v 1.0
 * 时间：2014/07/21
 *
 */
class BasicInforView extends BaseView {
	
	public function __construct(){
		parent::__construct();
		$this->smarty->assign("progressInfor", A('Public')->act_getInforProgress());
	}
	/*
	 * 修改密码显示
	 * zjr
	 */
	public function view_changePwd() {
        $this->smarty->display('changePassword.html');
	}
	
	/*
	 * 修改密码提交处理
	 */
	public function view_changePost() {
		echo $this->ajaxReturn(A("BasicInfor")->act_changePassWord());
	}

}
?>
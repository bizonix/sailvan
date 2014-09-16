<?php
/**
 * PublicView
 * 功能：用于公共的ajax处理控制
 * @author 邹军荣
 * v 1.0
 * 2014/06/26  
 */
class PublicView extends BaseView {
	
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 验证验证码
	 */
	public function view_checkCode() {
		echo $this->ajaxReturn(A('Public')->act_checkCode());
	}
	
	/**
	 * 邮箱证码
	 */
	public function view_checkEmail() {
		echo $this->ajaxReturn(A('Public')->act_checkCode());
	}
	
	/**
	 * 认证认证分销商
	 */
	public function view_checkDistribution() {
		echo $this->ajaxReturn(A('Public')->act_checkDistributor());
	}

}
?>
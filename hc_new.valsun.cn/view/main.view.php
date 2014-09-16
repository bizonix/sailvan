<?php
/**
 * 功能：控制登录后的一系列动作
 * @author 邹军荣
 * v 1.0
 * 时间：2014/06/27
 *
 */
class MainView extends BaseView {

	/*
	 * 主页的显示
	 * zjr
	 */
	public function view_main() {
		$userInfo = json_decode(_authcode($_COOKIE['hcUser']),true);
// 		print_r($userInfo);exit;
		$this->smarty->assign('user', $userInfo);
        $this->smarty->display('basicInformation.html');
	}

}
?>
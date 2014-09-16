<?php
/**
 * ApplicationAuthorizationListView
 * 功能：授权列表
 * @author wcx
 * 2014/07/15
 *
 */
class ApplicationAuthorizationListView extends AdminBaseView {
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }
	public function view_index() {
	    $list              =   A("ApplicationAuthorizationList")->act_applicationAuthorizationList();
	    $authorizationList =   A("MyEmpower")->act_getAllOpenService();
	    $perpage           =   A("ApplicationAuthorizationList")->act_getPerpage();
	    $count             =   A("ApplicationAuthorizationList")->act_applicationAuthorizationListCount();
	    $this->smarty->assign(array(
	            'list'                 =>  $list,
	            'authorizationstatus'  =>  C('AUTHORIZATIONSTATUS'),
	            'authorizationList'    =>  $authorizationList,
	            "show_page"            =>  $this->getPageformat($count,$perpage),
	    ));
	    $this->smarty->display('applicationAuthorizationList.html');
	}
}
?>
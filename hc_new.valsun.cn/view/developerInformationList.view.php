<?php
/**
 * DeveloperInformationListView
* 功能：开发者信息列表
* @author wcx
* 2014/07/04
*
*/
class DeveloperInformationListView extends AdminBaseView {
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }
    public function view_index() {
        $listInfo       =   A('DistributorBasicInformation');
        $list           =   $listInfo->act_getAllDistributorBasicInformation();
        $perpage        =   $listInfo->act_getPerpage();
        $count          =   $listInfo->act_getAllDistributorBasicInformationCount();
        $this->smarty->assign(array(
        	"list"         =>  $list,
            "accountStatus"=>  C("ACCOUNT_STATUS"),
            "show_page"    =>  $this->getPageformat($count,$perpage),
        ));
        $this->smarty->display('developerInformationList.html');
    }
    public function view_changeAccountStatus(){
        echo $this->ajaxReturn(A("DistributorBasicInformation")->act_changeAccountStatus());
    }
}
         
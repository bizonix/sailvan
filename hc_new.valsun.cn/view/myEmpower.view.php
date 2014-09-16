<?php
/**
 * MyEmpowerView
 * 功能：我的授权页面-申请授权
 * @author wcx
 * 2014/07/01
 *
 */
class MyEmpowerView extends BaseView {
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
        $this->smarty->assign("progressInfor", A('Public')->act_getInforProgress());
    }
    /*
     * 授权申请页面
     */
	public function view_index() {

	    $MyEmpower =   A('MyEmpower')->act_getMyEmpower();
	    $authorizationStatus   =   C('AUTHORIZATIONSTATUS');
	    $authorizationAct      =   C('AUTHORIZATIONAct');
	    $this->smarty->assign($MyEmpower);
	    $this->smarty->assign(array(
	            "authorizationStatus"  =>  $authorizationStatus,
	            "authorizationAct"     =>  $authorizationAct,
	    ));
	    $this->smarty->display('myEmpower.html');
	}
	/*
	 * 判断是否认证通过
	 */
	public function view_getAuthentication(){
		$apiInfo  =   A("MyEmpower");
		$data     =   $apiInfo->act_getAuthentication();
		if($data===false){
			echo $this::ajaxReturn();
		}else{
			echo $this::ajaxReturn(array("status"=>$data));
		}
	}
	/*
	 * 获取分销产品
	*/
	public function view_getIntentionProducts(){
	    $apiInfo  =   A("MyEmpower");
	    $data     =   $apiInfo->act_getIntentionProducts();
	    if($data===false){
	        echo $this::ajaxReturn();;
	    }else{
	        echo $this::ajaxReturn(array("status"=>$data));
	    }
	}
	/*
	 * 获取分类
	*/
	public function view_getCategory(){
	    $pcApi     =   A('DistributorBasicInformation');
	    $category  =   $pcApi->act_getRootCategoryInfo();
	    if(empty($category)){
	        echo $this->ajaxReturn();
	    }else{
	    	echo $this->ajaxReturn($category);
	    }
	}
	/*
	 * 更新分销类目
	*/
	public function view_updateIntentionProducts(){
		$api  =   A('MyEmpower');
		$ret  =   $api->act_updateIntentionProducts();
		if(empty($ret)){
			echo $this->ajaxReturn();
		}else{
		    $ret  =   $api->act_updateMyEmpowerByFirst();
		    echo $this->ajaxReturn();
		}
	}
	/*
	 * 更新授权状态
	*/
	public function view_updateStatus(){
	    $api  =   A('MyEmpower');
	    $ret  =   $api->act_updateMyEmpowerByFirst();
	    echo $this->ajaxReturn();
	}
	/*
	 * 获取授权状态
	*/
    public function view_getStatus(){
    	echo $this->ajaxReturn(A('MyEmpower')->act_getStatus());

    }
    /*
     * 获取账号密码
    */
    public function view_getAccountAndPwd(){
        echo $this->ajaxReturn(A('MyEmpower')->act_getAccountAndPwd());
    }
    /*
     * 获取类目id对应的名字
    */
    public function view_getIntentionProductsDetail(){
        $apiInfo  =   A("MyEmpower");
        $data     =   $apiInfo->act_getIntentionProducts();
        if(empty($data)){
            echo $this::ajaxReturn();;
        }else{
            $pcApi     =   M('InterfacePc');
            $category  =   $pcApi->getRootCategoryInfo();
            $strArr    =   array();
            foreach($data as $k){
                $strArr[] =  $category[$k].' ';
            }
            echo $this::ajaxReturn(implode(',', $strArr));
        }
    }
    /*
     * 获取不通过原因
    */
    public function view_getReason(){
        echo $this::ajaxReturn(A("MyEmpower")->act_getReason());
    }
    /*
     * 获取有效店铺
    */
    public function view_getShop(){
        echo $this::ajaxReturn(A("DistributorBasicInformation")->act_getValidShopByDpId());
    }
    /*
     * 更新分销类目和店铺状态
    */
    public function view_updateIntentionProductsAndShop(){
        $api  =   A('MyEmpower');
        $ret  =   $api->act_updateIntentionProducts();
        if(empty($ret)){
            echo $this->ajaxReturn();
        }else{
            $ret  =   $api->act_updateMyEmpowerByFirst();
            if(empty($ret)){
                echo $this->ajaxReturn();
            }else{
                $ret    =   $api->act_updateShop();
                echo $this->ajaxReturn();
            }
        }
    }
    /*
     * 更新店铺状态
    */
    public function view_updateIntentionShop(){
        if(A('MyEmpower')->act_updateMyEmpowerByFirst()){
            echo $this->ajaxReturn(A('MyEmpower')->act_updateShop());
        }else{
            echo $this->ajaxReturn();
        }
    }
    /*
     * 申请调整留言
    */
    public function view_adjustmentIntention(){
        if(A("MyEmpower")->act_updateIntentionProducts()){
            echo $this->ajaxReturn(A("MyEmpower")->act_updateDistributorMessage());
        }else{
            echo $this->ajaxReturn();
        }
    }
    /*
     * 下载资料
    */
    public function view_gotoDown(){
        echo $this->ajaxReturn(A("MyEmpower")->act_gotoDown());
    }
}
?>
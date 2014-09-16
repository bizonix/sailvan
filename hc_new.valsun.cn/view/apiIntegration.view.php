<?php
/**
 * 功能：控制ApI相关的一系列动作
 * @author 邹军荣
 * v 1.0
 * 时间：2014/07/12
 *
 */
class ApiIntegrationView extends AdminBaseView {
	
	public function __construct(){
		parent::__construct();
	}
	
	/*
	 * 触发通过按钮时，后台的整合动作
	 * zjr
	 */
	public function view_complexIntegration(){
		$ai		=	A('ApiIntegration');
		//部署图片水印
		$res 	= 	$ai->act_picIntegtation();
		if(!empty($res)){
			//将用户账号信息同步到开放系统内外网
			$res 	= 	$ai->act_accountInforIntegation();
			if(!empty($res)){
				//提供接口给开放系统，用于拉取可运送国家和不可运送国家
				$res 	= 	$ai->act_synDistributorShopInfoToPaSys();
			}
		}
		echo $this->ajaxReturn($res);
	}
	
	/*
	 * 部署图片水印
	 * zjr
	 */
	public function view_picIntegrationPost() {
		echo $this->ajaxReturn(A('ApiIntegration')->act_picIntegtation());
	}
	
	/*
	 * 整合鉴权
	* wcx
	*/
	public function view_powerAddDeveloper(){
        echo $this->ajaxReturn(A("ApiIntegration")->act_powerAddDeveloper());
	}
	/*
	 * 整合ebay数据库
	* wcx
	*/
	public function view_insertNewEbayDB(){
        echo $this->ajaxReturn(A("ApiIntegration")->act_insertNewEbayDB());
	}
	/*
	 * 将用户账号信息同步到开放系统内外网
	 * zjr
	 */
	public function view_synAccountInfoToOpenSystemPost() {
		echo $this->ajaxReturn(A('ApiIntegration')->act_accountInforIntegation());
	}
	
	/*
	 * 提供接口给开放系统，用于拉取可运送国家和不可运送国家
	 * zjr
	 */
	public function view_synDistributorShopInfoToPaSysPost() {
		echo $this->ajaxReturn(A('ApiIntegration')->act_synDistributorShopInfoToPaSys());
	}
	/*
	 * 用于生成分销商的开放类别信息到pa系统
	 * zjr
	 */
	public function view_synDistributorOpenCategoryToPaSysPost() {
		echo $this->ajaxReturn(A('ApiIntegration')->act_synDistributorOpenCategoryToPaSys());
	}
	
	/*
	 * 用于同步分销商已有信息进入分销商系统
	 * 备注：请勿调用，仅本次使用
	 * zjr  
	 */
	public function view_synDistributorInfoToLocalSys() {
		$disInfo = A('ApiIntegration')->_fenxiaoinfo();
	}
	
	public function view_getSkuStockInfo() {
		$disInfo = A('ApiOpen')->act_getSkuStock();
		echo json_encode($disInfo);
	}

}
?>
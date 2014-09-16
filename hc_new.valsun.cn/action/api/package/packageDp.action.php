<?php
/*
 *通用验证方法类
 *@add by : linzhengxiang ,date : 20140523
 */
class PackageDpAct extends PackageAct{
	
	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
	}
	
	public function act_packageUpdateOpenServiceStatus($datas){
		return $datas;
	}
	
	/*
	 * 返回分销商的开放类别信息
	 * zjr
	 */
	public function act_packageOpenCategory($datas){
		return $datas;
	}
	/*
	 * 返回分销商信息
	 */
	public function act_packageGetDeveloperInfo($datas){
	    return $datas;
	}
	
	/**
	 * 返回分销商列表
	 * @param array $datas
	 * @return array
	 * @author jbf
	 */
	public function act_packageFindDistributor($datas) {
		return $datas;
	}
}
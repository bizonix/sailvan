<?php
/*
 *产品中心相关接口操作类(model)
 *@add by : linzhengxiang ,date : 20140528
 */
defined('WEB_PATH') ? '' : exit;
class InterfacePaModel extends InterfaceModel {
	
	public function __construct(){
		parent::__construct();
	}
    
	/**
     * 获取不运送国家
	 * @param int $siteId
	 * @return array
	 * @author zjr
     */
	public function getExcludeShippingCountry($siteID){
		$conf = $this->getRequestConf(__FUNCTION__);
		$conf['siteId'] = $siteID;
		$result = callOpenSystem($conf);
		$data = json_decode($result,true);
		if ($data['errCode']>0) self::$errMsg[$data['errCode']] = "[{$data['errCode']}]{$data['errMsg']}";
		return $this->changeArrayKey($data['data']);
    }
    
	/**
     * 获取运送国家
	 * @param int $siteId
	 * @return array
	 * @author zjr
     */
	public function getShippingCountry($siteID){
		$conf = $this->getRequestConf(__FUNCTION__);
		$conf['siteId'] = $siteID;
		$result = callOpenSystem($conf);
		$data = json_decode($result,true);
		if ($data['errCode']>0) self::$errMsg[$data['errCode']] = "[{$data['errCode']}]{$data['errMsg']}";
		return $this->changeArrayKey($data['data']);
    }
    
	/**
     * 同步分分销商店铺信息
	 * @param int $siteId
	 * @return array
	 * @author zjr
     */
	public function synDistributorShopInfor($compayId,$shopInfo){
		$conf = $this->getRequestConf(__FUNCTION__);
		$conf['compayId'] 	= $compayId;
		$conf['dpShopInfo'] = $shopInfo;
		$result = callOpenSystem($conf);
		$data = json_decode($result,true);
		if ($data['errCode']>0) self::$errMsg[$data['errCode']] = "[{$data['errCode']}]{$data['errMsg']}";
		return $this->changeArrayKey($data['data']);
    }
	/**
     * 同步分分销商开放类目信息
	 * @param int $siteId
	 * @return array
	 * @author zjr
     */
	public function synDistributorOpenCategory($compayId,$category){
		$conf = $this->getRequestConf(__FUNCTION__);
		$conf['companyId'] 	= $compayId;
		$conf['category'] = $category;
		$result = callOpenSystem($conf);
		$data = json_decode($result,true);
		if ($data['errCode']>0) self::$errMsg[$data['errCode']] = "[{$data['errCode']}]{$data['errMsg']}";
		return $this->changeArrayKey($data['data']);
    }
    /**
     * 整合ebay刊登系统的数据库（建库，分配权限，屏蔽价格，屏蔽分类）
     * @param int $compayId
     * @return array
     * @author wcx
     */
    public function createEbayDB($compayId,$cateIds){
        $conf = $this->getRequestConf(__FUNCTION__);
        $conf['compayId'] = $compayId;
        $conf['cateIds']  = $cateIds;
        $result = callOpenSystem($conf);

        $data = json_decode($result,true);
        if ($data['errCode']>0) self::$errMsg[$data['errCode']] = "[{$data['errCode']}]{$data['errMsg']}";
        return $this->changeArrayKey($data['data']);
    }
    /**
     * 整合ebay刊登系统的数据库（获取log和整合情况）
     * @param int $compayId
     * @return array
     * @author wcx
     */
    public function getCreateEbayDBInfo($compayId,$cateIds){
        $conf = $this->getRequestConf(__FUNCTION__);
        $conf['compayId'] = $compayId;
        $result = callOpenSystem($conf);
        $data = json_decode($result,true);
        if ($data['errCode']>0) self::$errMsg[$data['errCode']] = "[{$data['errCode']}]{$data['errMsg']}";
        return $this->changeArrayKey($data['data']);
    }
    
}
?>
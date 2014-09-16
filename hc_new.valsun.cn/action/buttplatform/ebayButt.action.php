<?php
/*
 * ebay平台对接接口
 * add by: linzhengxiang @date 20140618
 */
class EbayButtAct extends CheckAct{
	
	private $authorize = array();
	
	public function __construct(){
		parent::__construct();
	}
	
	public function setToken($account){
		######################以后扩展到接口获取 start ######################
		$siteID =0;
		$production  = false;
		$compatabilityLevel = 765;
		$devID		= "c979de22-fe99-4d93-b417-940c637d38bb";
		$appID		= "Shenzhen-f583-48e8-95ed-0f88fabff4ee";
		$certID		= "45c0312b-ed8d-4274-b037-1107e1d63d25";
		$serverUrl	= "https://api.ebay.com/ws/api.dll";
		$userToken 	= 'AgAAAA**AQAAAA**aAAAAA**MojnUQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AEkICjD5OKpQ6dj6x9nY+seQ**J+gBAA**AAMAAA**j/TkaXLF/w3zv+FnwuaFIedPpZ/Q7K45cB9aIzu3mWMLFY9h/wewKQh6AGmYBnYOGjAnDxkee8g0JCus8arGJU338tnJ8rxzEdGx9BrFVaRGI8+1vzZAYW04lu3PTlotvan0mIP6H2OzbrQ7871ob3N7KaqSBcDeYYQGLwbHX8n+rK26Dl8umlZQW8aKSNb2qk3ZFB3HqlnDk65WgbxUpQrQalcvA+J0sEoNO6ThIQNJttTmtVPsF4cx5lBJmx7peWrHJvcv6ABiD6QmtC78OAa/j/68iZ2mD+CDgU/OhlC17S2DpdzHTHpL8A2X88y1KSL7VRKpUB77MS+MgybSVrNkMkI4eeVktjkal+OFAHnXfnWOfevc8UJRqSMSeyBv54+hoi+llEpsqcrVBPxkMGbjoD3zv3wOpHb+NOSU/DKCXRP5qIc0rF4kqSL72MDHu4SJCA4Oc4mPrQwQ2grqIAwq675zsPC1Bt3TDrvyEtfNfBAiydQKrmv1h5TvbvSDAuvIkDNMJi7TtG0Kl7cJ/7SBO+RhQX0Xyp+PaXlfMEKAfubSSFIlwoiwivm+sg0YcB2TC8Fi35vkO3sFFkfzVTPE8NGTfJ9NZOnkToAzBMCSd3NoJ50ZNjCMGzaJqYJdnsmhxSzfDxmud48RT3e7QxYsqZrRflbMsAFIICt0U5EzuoD52DX8XrMdH9bUU9+Woy5fkYl8YG6x7QAQSl++CTcHKzFfwATbLHtAdJuhg9jJ30aPD97MM3HCnZv+16xO';
		######################以后扩展到接口获取  end  ######################
		$this->authorize = array(	
									'userToken'				=>$userToken,
									'devID'					=>$devID,
									'appID'					=>$appID,
									'certID'				=>$certID,
									'serverUrl'				=>$serverUrl,
									'compatabilityLevel'	=>$compatabilityLevel,
									'siteID'				=>$siteID,
									'account'				=>$account,
							);
	}
	
	/**
	 * 根据开始和结束时间，抓取订单抓取号
	 * @param datetime $starttime
	 * @param datetime $endtime
	 * @return bool
	 * @author lzx
	 */
	public function spiderOrderId($starttime, $endtime){
	
		$OrderObject = F('ebay.package.GetOrders');
		$OrderObject->setRequestConfig($this->authorize);
		$page = 1;
		$hasmore = true;
		$simplelists = array();
		while ($hasmore){
			$receivelists = $OrderObject->getOrderIds($starttime, $endtime, $page);
			if (!isset($receivelists['GetOrdersResponse']['Ack'])||$receivelists['GetOrdersResponse']['Ack']=='Failure'){
				self::$errMsg[10095] = get_promptmsg(10095);
				break;
			}
			if ($receivelists['GetOrdersResponse']['PaginationResult']['TotalNumberOfPages']<$page){
				self::$errMsg[10096] = get_promptmsg(10096, $page, $receivelists['GetOrdersResponse']['PaginationResult']['TotalNumberOfPages']);
				break;
			}
			$page++;
			$hasmore	= $receivelists['GetOrdersResponse']['HasMoreOrders']=='true' ? true : false;
			foreach( $receivelists['GetOrdersResponse']['OrderArray']['Order'] as $simpleorder){
				/*参考变量
				 * $orderid = $simpleorder['OrderID'];
				$eBayPaymentStatus = $simpleorder['CheckoutStatus']['eBayPaymentStatus'];
				$OrderStatus = $simpleorder['CheckoutStatus']['Status'];
				$PaidTime = $simpleorder['PaidTime'];
				$ShippedTime = isset($simpleorder['ShippedTime']) ? $simpleorder['ShippedTime'] : '';*/
				if ($simpleorder['CheckoutStatus']['Status']!='Complete') {
					continue;
				}
				/*//如果要抓取刷单的这里需要做修改
				if ($simpleorder['CheckoutStatus']['eBayPaymentStatus']!='NoPaymentFailure') {
					break;
				}*/
				$simplelists[] = array('ebay_orderid'=>$simpleorder['OrderID'], 'ebay_account'=>$this->authorize['account']);
			}
		}
		return $simplelists;
	}
	
	/**
	 * 根据订单号抓取订单列表
	 * @param array $orderids
	 * @return array
	 * @author lzx
	 */
	public function spiderOrderLists($orderids){
		$OrderObject = F('ebay.package.GetOrders');
		$OrderObject->setRequestConfig($this->authorize);
		$receivelists = $OrderObject->getOrderLists($orderids);
		//将这个抓取的数组格式化为清庭订单新增的标准话格式
		return $receivelists;
	}
	
	public function markOrderShipped($trans){
		$OrderObject = F('ebay.package.GetOrders');
		$OrderObject->setRequestConfig($this->authorize);
		$resve = $OrderObject->getOrderLists($trans);
		return true; 
	}
}
?>	
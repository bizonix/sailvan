<?php
/*
 * 获取订单抓取ID列表
 * @add lzx, date 20140612
 */
include_once "../eBaySession.php";
class GetOrders extends eBaySession{
	
	private $verb = 'GetItem';
	
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 获取订单当前收款的邮箱
	 * @param int $itemid
	 * @return array
	 * @author lzx
	 */
	public function getPayPalEmailAddress($itemid){			
		$requestXmlBody = ' <?xml version="1.0" encoding="utf-8"?>
			<'.$this->verb.'Request xmlns="urn:ebay:apis:eBLBaseComponents">
				<RequesterCredentials>
					<eBayAuthToken>'.$this->token.'</eBayAuthToken>
				</RequesterCredentials>
				<OutputSelector>Item.PayPalEmailAddress</OutputSelector>
				<ItemID>'.$itemid.'</ItemID>
				<WarningLevel>High</WarningLevel>
			</'.$this->verb.'Request>';
		return XML_unserialize($this->sendHttpRequest($requestXmlBody));
	}
}
?>
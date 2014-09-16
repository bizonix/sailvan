<?php
/**
 * ApiOpen
 * 功能：用于对外提供的接口（分销商）
 * @author 邹军荣
 * v 1.0
 * 2014/09/09 
 */
class ApiOpenAct extends CheckAct {
	
	public function __construct(){
		parent::__construct();
	}
	
	/*
	 * 功能：实时拉取库存接口
	 * by: 邹军荣
	 */
	public function act_getSkuStock(){
			$sku = $_REQUEST['sku'];
			$skuInfo	= M('InterfaceOldErp')->getOldErpSkuStockInfo($sku);
			if($skuInfo['res_code'] == "200"){
				return $skuInfo['data'];
			}else{
				self::$errMsg[$skuInfo['res_code']] = $skuInfo['res_msg'];
				return false;
			}
	}
	
	/*
	 * 功能：获取分销商推送过来的订单信息
	 * by: 邹军荣
	 */
	public function act_reciveOrder(){
		$orderdatas = $_REQUEST['orderdatas'];
		$orderdatas = '[{"companyName":"sailvan","orderId":"CN1000031167","paymentType":"","tradeID":"123","gmtCreate":"2014-08-18 03:43:34","receiptAddress":{"zip":"518111","address1":"shenzhen","address2":null,"country":"US","city":"Corvallis","phoneNumber":"11111111","province":"Oregon","contactPerson":"test MM"},"buyerInfo":{"lastName":"MM","firstName":"test","email":"zuzige@163.com","country":"US"},"orderMsgList":"","sellerMsgList":"","transportType":"chinapost","orderAmount":{"amount":"48.23","currencyCode":"USD","symbol":"$"},"childOrderList":[{"lotNum":1,"productAttributes":{"sku":"19588","itemPrice":"1.06","skuUrl":"http:\/\/testbeta.cndirect.com\/create_order_details_files_index.php\/waterproof-lipstick-gloss-velvet-matte-vitality-cerise-star-11.html","itemTitle":"Waterproof Lipstick Gloss Velvet Matte Vitality Cerise Star"}},{"lotNum":1,"productAttributes":{"sku":"19588","itemPrice":"2.97","skuUrl":"http:\/\/testbeta.cndirect.com\/create_order_details_files_index.php\/test7.html","itemTitle":"Test7"}}]},{"companyName":"sailvan","orderId":"CN100002051","paymentType":"","tradeID":"21222","gmtCreate":"2014-08-13 09:06:05","receiptAddress":{"zip":"518111","address1":"shenzhen","address2":null,"country":"US","city":"Corvallis","phoneNumber":"11111111","province":"Oregon","contactPerson":"test MM"},"buyerInfo":{"lastName":"MM","firstName":"test","email":"zuzige@163.com","country":"US"},"orderMsgList":"","sellerMsgList":"","transportType":"chinapost","orderAmount":{"amount":"155.79","currencyCode":"USD","symbol":"$"},"childOrderList":[{"lotNum":1,"productAttributes":{"sku":"SV002551_R","itemPrice":"2.30","skuUrl":"http:\/\/testbeta.cndirect.com\/create_order_details_files_index.php\/waterproof-lipstick-gloss-velvet-matte-vitality-cerise-star-11.html","itemTitle":"Ultra Thin Transparent Crystal Clear Hard TPU Case Cover For iPhone 5 \/ 5S"}},{"lotNum":2,"productAttributes":{"sku":"YY001","itemPrice":"21.56","skuUrl":"http:\/\/testbeta.cndirect.com\/create_order_details_files_index.php\/waterproof-lipstick-gloss-velvet-matte-vitality-cerise-star-11.html","itemTitle":"test1234"}},{"lotNum":1,"productAttributes":{"sku":"YY001","itemPrice":"21.56","skuUrl":"http:\/\/testbeta.cndirect.com\/create_order_details_files_index.php\/waterproof-lipstick-gloss-velvet-matte-vitality-cerise-star-11.html","itemTitle":"test1234"}}]}]';
		$orderdatas = json_decode($orderdatas,true);
		if(empty($orderdatas)){
			self::$errMsg[1236] = '数据格式有误！';
			return false;
		}
		//组装好的数据
		$endOrderDatas = array();
		
		foreach ($orderdatas as $key=>$val){
			//订单的基本信息
			$order = array(
					"recordNumber"	=> $val['orderId'],		//订单在平台的记录号
					"account"		=> "hello",		//分销商的店铺账号
					"ordersTime"	=> $val['gmtCreate'],		//下单时间
					"paymentMethod"	=> $val['paymentType'] ? $val['paymentType'] : "paypal",		//支付方式
					"paymentTime"	=> '2014-08-03 18:58:23',		//订单支付时间
					"onlineTotal"	=> $val['orderAmount']['amount'],		//总价
					"currency"		=> $val['orderAmount']['currencyCode'],		//币种
					"actualShipping"=> "22.777",		//运费
					"ORtransport"	=> $val['transportType']		//用户所选运输方式类型
			);
			
			//分销商的一些基本信息
			$orderExtension = array(
					"companyId"			=> "",		//分销商公司ID
					"valsunPlatform"	=> "ebay",		//分销商订单所属平台
					"payPalPaymentId"	=> $val['tradeID'],		//交易id
					"orderId"			=> "",		//分销商订单编号
					"feedback"			=> $val['orderMsgList']."  ".$val['sellerMsgList']		//买家在平台上的留言 或则是分销商留言
			);
			//下单用户的基本信息
			$orderUserInfo = array(
					"username"			=> $val['receiptAddress']['contactPerson'],		//收件人
					"platformUsername"	=> $val['buyerInfo']['firstName'].$val['buyerInfo']['lastName'],		//下单平台上用户名称
					"email"				=> $val['buyerInfo']['email'],		//下单平台用户的邮箱
					"countryName"		=> $val['receiptAddress']['country'],		//收件国家
					"countrySn"			=> $val['receiptAddress']['country'],		//
					"currency"			=> $val['orderAmount']['currencyCode'],		//
					"state"				=> $val['receiptAddress']['province'],		//收件州
					"city"				=> $val['receiptAddress']['city'],		//收件城市
					"county"			=> "",		//区或县
					"address1"			=> $val['receiptAddress']['address1'],		//收件地址1
					"address2"			=> $val['receiptAddress']['address2'],		//收件地址2
					"address3"			=> "",		//收件地址3
					"phone"				=> $val['receiptAddress']['phoneNumber'],		//收人人电话
					"zipCode"			=> $val['receiptAddress']['zip']		//收件地址邮编
			);
			
			// 报关使用的信息  可以不填写，如果填写则必须填写必填项      （老版本未启用）
			$orderDeclarationContent =array(
					array(
							"spu"		=> "SV003829",		//申报料号
							"amount"	=> 10,		//申报数量
							"price"		=> 100,		//申报价值（美金）
							"enTitle"	=> "T-Shirt",		//申报名称（英文）
							"cnTitle"	=> "T恤",		//申报名称（中文）
							"hamcodes"	=> "8531100000",		//海关编码
							"cnMaterial"=> "棉",		//中申报材质
							"brand"		=> "xx",		//商标  如"NIKE"  非必填
							"material"	=> "main",		//申报材质
							"unit"		=> "pics"		//计量单位
					),
			);
			
			
			// 订单详细信息
			$orderDetails = array();
			foreach ($val['childOrderList'] as $k=>$v){
				$orderDetails[] = array(
							"orderDetail" => array(
									"recordNumber"	=> $val['orderId'],		//成交listing记录号
									"itemPrice"		=> $v['productAttributes']['itemPrice'],		//listing的价格
									"itemId"		=> "",		//listingID
									"sku"			=> $v['productAttributes']['sku'],		//
									"onlinesku"		=> "",		//在线料号
									"amount"		=> $v['lotNum'],		//购买数量
									"shippingFee"	=> "12.22",		//listing运费
									"createdTime"	=> ""		//
							),
							"orderDetailExtension" => array(
									"itemTitle"	=> $v['productAttributes']['itemTitle'],		//listing标题
									"itemURL"	=> $v['productAttributes']['skuUrl']		//listing链接
							),
					);
			}
			
			$endOrderDatas[] = array(   //一条订单信息
							"order" => $order,   // 订单基本信息
							"orderExtension" => $orderExtension,		//分销商基本信息
							"orderUserInfo" => $orderUserInfo,		// 用户信息（购买者信息）
// 							"orderDeclarationContent" => $orderDeclarationContent,		//报关专用信息
							"orderDetails" => $orderDetails,		//订单详情
					);
		}
		
		$endOrderDatas = json_encode($endOrderDatas);
		$ret = M('InterfaceOrder')->synOrderInfoToOrderSys($endOrderDatas);
		var_dump($ret);exit;
		
	}
}
	
<?php
if (!defined('WEB_PATH')) exit();
//全局配置信息
return  array(
	//运行相关
	"RUN_LEVEL"		=>	"DEV",		//	运行模式。 DEV(开发)，GAMMA(测试)，IDC(生产)

	//日志相关
	"LOG_RECORD"	=>	true,		//	开启日志记录
	"LOG_TYPE"		=>	3,			//	1.mail  2.file 3.api
	"LOG_PATH"	    =>	WEB_PATH."/log/",	//文件日志目录
	"LOG_FILE_SIZE"	=>	2097152,
	"LOG_DEST"		=>	"",			//	日志记录目标
	"LOG_EXTRA"		=>	"",			//	日志记录额外信息

	//数据接口相关
	"DATAGATE"		=>	"db",		//	数据接口层 cache, db, socket
	"DB_TYPE"		=>	"mysql",	//	mysql	mssql	postsql	mongodb

	//mysql db	配置
	"DB_CONFIG"		=>	array(
	    "master1"	=>	array("192.168.200.198","root","123456","3306","opensystem")//主DB
		//"master1"	=>	array("localhost","developer_121","M4+{m@.Blq(%","3306","opensystem")//主DB
		//"slave1"	=>	array("localhost", "root", "", "3306")		//从DB
	),

	"CACHE_CONFIG"	=>	array(
		array("192.168.200.198", "11211"),
		//array("112.124.41.121", "11211")
	),

	"LANG"	=>	"zh",	//语言版本开关  zh , en

	"CACHEGROUP" => 'order_system_info',   //memcache上的保存组名
    "CACHELIFETIME" => 7200,     //memcache 过期时间默认为 两小时
	'DB_PREFIX'=>'dp_',            //数据库默认前缀

	//mysql db	配置
	"RMQ_CONFIG"		=>	array(//队列配置
		"hcMakePicDir"	=>	array('198.23.70.50','valsun_picture','picture123%','5672','valsun_picture'),			                //测试机RabbitMQ
		//"fetchOrder"	=>	array("112.124.41.121","valsun_order","order%123","5672","order"),			            //生产环境RabbitMQ 获取订单
		//"fetchPower"	=>	array("115.29.188.246","valsun_power","power%123","5672","power"),			            //生产环境RabbitMQ 获取权限
		//"sendOrder"     =>	array("112.124.41.121","valsun_sendOrder","sendOrder%123","5672","sendOrder")			//生产环境RabbitMQ 获取权限
	),
	//图片系统配置
	'PICS_SYS_URL_LOCAL' => 'http://pics.valsun.cn/json.php?',//开放系统内网地址
	//开放系统配置
	'OPEN_SYS_URL_LOCAL' => 'http://gw.open.valsun.cn:88/router/rest?',//开放系统内网地址
	'OPEN_SYS_URL' 		 => 'http://idc.gw.open.valsun.cn/router/rest?',//开放系统外网地址
	'OPEN_SYS_USER'		 => 'Purchase',//开放系统用户名
	'OPEN_SYS_TOKEN' 	 => 'a6c94667ab1820b43c0b8a559b4bc909',//开放系统用户token

	//鉴权系统相关配置
	//'AUTH_HTML_EXT' 	 => '.htm',//模版后缀
	'AUTH_SYSNAME' 		 => 'hc',//系统名称
	'AUTH_SYSTOKEN' 	 => 'f27a4b69900d34567f1db100099beca6',//系统token

	//自动加载文件目录配置--关联F函数
	'AUTO_DIR' 		 => array('functions'=>'file', 'class'=>'object', 'api'=>'object'),//文件目录


	'IS_DEBUG' 			 => false,    //用户管理DEBUG
	'IS_AUTH_ON' 		 => true,	// 是否开启验证
	'USER_AUTH_TYPE'	 => 2,		// 验证模式1为登录时验证，2为实时验证
	'USER_AUTH_ID'		 => 'userId', // 储存userId的SESSION 的 keyy
	'USER_COM_ID'		 => 'companyId', // 储存companyId的SESSION 的 key
	'USER_AUTH_KEY'		 => 'userpowers',
	'USER_GO_URL'		 => 'index.php?mod=Order&act=index&ostatus=100&otype=101',
	'NOT_AUTH_NODE' 	 => 'index-index,login,register,backstagesLogin,backstagesIndex',	// 默认无需认证模块
	'AUTH_COMPANY_ID'    => 1,

	//+++++++++++++++begin  发送邮件的配置
	'EMAIL'	=> array(
			'user'		=> "message@valsun.cn",
			'password'	=> "!Dq7bFcBZZtK",
			'smtp'		=> "smtp.valsun.cn",
			'port'		=> "25",		//465 or 587
	),
	'COMPANYNAME'	=> "华成云商",
	//+++++++++++++++end  发送邮件的配置
	'EMAILCONTENTS'	=> "<table width='100%' border=1 cellpadding=0 cellspacing=0 style='border-collapse:collapse'>
							<tr>
								<td>动作</td>
								<td>SPU</td>
								<td>虚拟SKU</td>
								<td>真实SKU</td>
								{sellerFields}
								<td>采购人</td>
								<td>可用库存数</td>
								{availableInventoryDaysFields}
								<td>缺货天数</td>
								<td>仓位</td>
							</tr>
							{values}
						</table>",

	//开发者身份证,营业执照,税务登记证等关键信息图片目录
	'DISTRIBUTOR_KEY_PICTURE_DIR'    =>  WEB_PATH."html/images/distributor/",

    //开发者授权状态
    "AUTHORIZATIONSTATUS"   =>  array(
		"1"   =>  "未申请",
		"2"   =>  "等待审核",
		"3"   =>  "已授权",
		"4"   =>  "审核不通过",
		"5"   =>  "授权中",
	),

	//不同授权状态触发的动作
	"AUTHORIZATIONACT"   =>  array(
	        "1"   =>  "申请授权",
	        "2"   =>  "查看",
	        "3"   =>  "查看授权",
	        "4"   =>  "查看",
	),

	//账户状态开发者账户状态：0.未申请,已认证,1审核中(授权中)，2通过审核(通过授权)，3未通过审核(未通过授权)，4停用该账户,5没激活,6.未认证
	"ACCOUNT_STATUS"   =>  array(
            "0"   =>  "已认证",
	        "1"   =>  "审核中",//(授权中)
	        "2"   =>  "通过审核",//(通过授权)
	        "3"   =>  "未通过审核",//(未通过授权)
	        "4"   =>  "停用该账户",
	        "5"   =>  "邮箱没激活",
	        "6"   =>  "未认证",
	),
	//API审核状态：1审核中(授权中)，2通过审核(通过授权)，3未通过审核(未通过授权)
	"API_STATUS"   =>  array(
            "1"   =>  "审核中",
	        "2"   =>  "审核通过",
	        "3"   =>  "未通过审核",
	),
	'PLATFORMS'	=> array(
		'1'		=> 'ebay',
		'2'		=> '速卖通',
		'3'		=> '天猫',
		'4'		=> '亚马逊',
	),
	'SITES'		=> array(
		'0'    	=> '美国',
		'2'    	=> '加拿大',
		'3'    	=> '英国',
		'15'    => '澳大利亚',
		'77'    => '德国',
		'71'    => '法国',
		'186'   => '西班牙',
		'101'   => '意大利',
		'216'   => '新加坡',
		'211'   => '菲律宾',
		'100'   => 'eBay摩托',
		'207'   => '马来西亚',
	),
	'SITESSIMPLE'		=> array(
			'0'    	=> 'US',
			'2'    	=> 'Canada',
			'3'    	=> 'UK',
			'15'    => 'Australia',
			'77'    => 'Germany',
			'71'    => 'France',
			'186'   => 'Spain',
			'101'   => 'Italy',
			'216'   => 'Singapore',
			'211'   => 'Philippines',
			'100'   => 'eBayMotors',
			'207'   => 'Malaysia',
	),
	'SHOPSTATUS'	=> array(
		"1"   =>  "未申请",
		"2"   =>  "待审核",
		"3"   =>  "已通过",
		"4"   =>  "未通过",
		"5"   =>  "授权中",
	),
	'EMAILADDRESS' => array(
		"sailvan.com"		=>	'http://exmail.qq.com/login',
		"qq.com"			=>	'http://mail.qq.com',
		"vip.qq.com"		=>	'http://mail.vip.qq.com',
		"foxmail.com"		=>	'http://www.foxmail.com',
		"163.com"			=>	'http://mail.163.com',
		"gmail.com"			=>	'http://gmail.google.com',
		"126.com"			=>	'http://www.126.com',
		"yahoo.com"			=>	'http://mail.yahoo.com',
		"yahoo.com.cn"		=>	'http://mail.yahoo.com',
		"sohu.com"			=>	'http://mail.sohu.com',
		"sina.com"			=>	'http://mail.sina.com.cn',
		"aliyun.com"		=>	'http://mail.aliyun.com',
		"tom.com"			=>	'http://web.mail.tom.com',
		"outlook.com"		=>	'http://www.outlook.com',
		"139.com"			=>	'http://mail.10086.cn',
		"189.cn"			=>	'http://mail.189.cn',
		"21cn.com"			=>	'http://mail.21cn.com',
		"263.com"			=>	'http://mail.263.com',
		"263.net"			=>	'http://mail.263.net',
		"263.net.cn"		=>	'http://mail.263.net',
		"wo.com.cn"			=>	'http://mail.wo.com.cn/mail/login.action',
		"wo.cn"				=>	'http://mail.wo.com.cn',
		"188.com"			=>	'http://www.188.com',
		"yeah.net"			=>	'http://yeah.net',
		"hotmail.com"		=>	'http://mail.live.com',
		"cntv.cn"			=>	'http://mail.cntv.cn',
		"eyou.com"			=>	'http://mail.eyou.com',
		"mail.com"			=>	'http://mail.com',
		"4399.com"			=>	'http://mail.4399.com',
		"china.com"			=>	'http://mail.china.com',
		"china-channel.com"	=>	'http://mail.35.com',
		"aol.com"			=>	'http://mail.aol.com',
		"**.edu.cn"			=>	'http://mail.**.edu.cn',
	),

	'COUNTRY_MAP'	=> array(
		'CN'	=> 	'China',
		'US'	=>	'USA',
		'AU'	=>	'Australia',
		'DE'	=>	'Germany',
		'MY'	=>	'Malaysia',
		'SG'	=>	'Singapore',
		'HK'	=>	'HongKong',
	)
);

?>

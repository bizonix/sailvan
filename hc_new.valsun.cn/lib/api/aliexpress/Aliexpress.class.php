<?php
class Aliexpress{

	var $server			=	'https://gw.api.alibaba.com';
	var $rootpath		=	'openapi';					//openapi,fileapi
	var $protocol		=	'param2';					//param2,json2,jsonp2,xml2,http,param,json,jsonp,xml
	var $ns				=	'aliexpress.open';
	var $version		=	1;
	var $appKey			=	'895611';					//���Լ���
	var $appSecret		=	'EcwaA6#3H:p';				//���Լ���
	var $refresh_token	=	"96f3a689-a9a8-4858-bd37-7d53d673c39b";//���Լ���
	var $callback_url	=	"http://202.103.191.209:88/aliexpress/callback.php";

	//var $access_token = 'd43bc953-7b74-4bc4-9ec6-7176bf5288a5';
	var $access_token ;

	function __construct() {
	}

	function setConfig($appKey,$appSecret,$refresh_token){
		$this->appKey		=	$appKey;
		$this->appSecret	=	$appSecret;
		$this->refresh_token=	$refresh_token;
	}	

	function doInit(){
		$token	=	$this->getToken();       
		$this->access_token	=	$token->access_token;       
	}

	function Curl($url,$vars=''){
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($vars));
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		$content=curl_exec($ch);
		curl_close($ch);
		return $content;
	}
	
	//����ǩ��
	function Sign($vars){
		$str='';
		ksort($vars);
		foreach($vars as $k=>$v){
			$str.=$k.$v;
		}
		return strtoupper(bin2hex(hash_hmac('sha1',$str,$this->appSecret,true)));
	}
	
    //����ǩ��
	function getCode(){
		$getCodeUrl = $this->server .'/auth/authorize.htm?client_id='.$this->appKey .'&site=aliexpress&redirect_uri='.$this->callback_url.'&_aop_signature='.$this->Sign(array('client_id' => $this->appKey,'redirect_uri' =>$this->callback_url,'site' => 'aliexpress'));
		return '<a href="javascript:void(0)" onclick="window.open(\''.$getCodeUrl.'\',\'child\',\'width=500,height=380\');">���ȵ�½����Ȩ</a>';
	}
	
	//��ȡ��Ȩ
	function getToken(){
		if(!empty($this->refresh_token)){
			$getTokenUrl="{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/system.oauth2/refreshToken/{$this->appKey}";
			$data =array(
				'grant_type'		=>'refresh_token',		//��Ȩ����
				'client_id'			=>$this->appKey,				//appΨһ��ʾ
				'client_secret'		=>$this->appSecret,			//app��Կ
				'refresh_token'		=>$this->refresh_token,		//app��ڵ�ַ
			);
			$data['_aop_signature']=$this->Sign($data); 
			return json_decode($this->Curl($getTokenUrl,$data));
			
		}else{
			$getTokenUrl="{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/system.oauth2/getToken/{$this->appKey}";
			$data =array(
				'grant_type'		=>'authorization_code',	//��Ȩ����
				'need_refresh_token'=>'true',				//�Ƿ���Ҫ���س�Чtoken
				'client_id'			=>$this->appKey,				//appΨһ��ʾ
				'client_secret'		=>$this->appSecret,			//app��Կ
				'redirect_uri'		=>$this->redirectUrl,			//app��ڵ�ַ
				'code'				=>$_SESSION['code'],	//bug
			);
			return json_decode($this->Curl($getTokenUrl,$data));
		}
	}
	
	/**********************��ȡ������Ϣ**********************/
	function findOrderListQuery(){
		$data	=	array(
			'access_token'	=>$this->access_token,
			'page'			=>'1',
			'pageSize'		=>'50',
			//'createDateStart'	=>	'08/29/2013',
			//'createDateEnd'	=>	'09/26/2013',
			'orderStatus'	=>'WAIT_SELLER_SEND_GOODS'
			//'orderStatus'	=>'WAIT_BUYER_ACCEPT_GOODS'
		);
		
		$url		=	"{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/{$this->ns}/api.findOrderListQuery/{$this->appKey}";
	/*
        echo $url;
        $List    	=	$this->Curl($url,$data);
        var_dump($List);
        exit;
        $List		=	json_decode($List,true);
    */
        
    	$List		=	json_decode($this->Curl($url,$data),true);
        
		$orderList	=	array();
		if(!empty($List["orderList"])){
			foreach($List["orderList"] as $k=>$v){
				$orderId	=	$v["orderId"];
				//if($orderId != "15009394248946") continue;
				$orderList[$orderId]['detail']	=	$this->findOrderById($orderId);
				$orderList[$orderId]['v']		=	$v;
			}
			
			for($i=2;$i<=ceil($List["totalItem"]/$data['pageSize']);$i++){
				$data['page']=$i;
				$List=json_decode($this->Curl($url,$data),true);
				foreach($List["orderList"] as $k=>$v){
					$orderId	=	$v["orderId"];
					//if($orderId != "15009394248946") continue;
					$orderList[$orderId]['detail']	=	$this->findOrderById($orderId);
					$orderList[$orderId]['v']		=	$v;
				}
			}
			
		}
		unset($List);
		return $orderList;
		
	}
	
	function findOrderById($orderId){
		$data=array(
			'access_token'	=>$this->access_token,
			'orderId'			=>$orderId,
		);
		$url="{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/{$this->ns}/api.findOrderById/{$this->appKey}";
		return json_decode($this->Curl($url,$data),true);
	}
	/**********************��ȡ��Ʒ��Ϣ**********************/
	function findProductInfoListQuery(){
		$data=array(
			'access_token'	=>$this->access_token,
			'page'			=>'1',
			'pageSize'		=>'100',
			'productStatusType'	=>'onSelling',
		);
		$url="{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/{$this->ns}/api.findProductInfoListQuery/{$this->appKey}";
		$List=json_decode($this->Curl($url,$data));
		$ProductList='';
		if(!empty($List->aeopAEProductDisplayDTOList)){
			foreach($List->aeopAEProductDisplayDTOList as $k=>$v){
				$ProductList[]=$this->findAeProductById($v->productId);
			}
			
			for($i=2;$i<=$List->totalPage;$i++){
				$data['page']=$i;
				$List=json_decode($this->Curl($url,$data));
				foreach($List->aeopAEProductDisplayDTOList as $k=>$v){
					$ProductList[]=$this->findAeProductById($v->productId);
				}
			}
			
		}
		return $ProductList;
	}
	
	
	function findAeProductById($productId){
		$data=array(
			'access_token'	=>$this->access_token,
			'productId'		=>$productId,
		);
		$url="{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/{$this->ns}/api.findAeProductById/{$this->appKey}";
		return json_decode($this->Curl($url,$data));
	}

	
	
	/********************************************************
	 *	�Զ�Ӧ������Ƿ��ţ� ֧��ȫ�������� ���ַ���
	 *	var	serviceName	����������
	 *	var	logisticsNo	����׷�ٺ�
	 *	var	sendType	���ͷ�ʽ��all,part��
	 *	var	outRef		��Ӧ�Ķ�����
	 */
	function sellerShipment($serviceName, $logisticsNo, $sendType, $outRef, $description=""){
		$data	=	array(
			'access_token'	=>	$this->access_token,
			'serviceName'	=>	$serviceName,
			'logisticsNo'	=>	$logisticsNo,
			'sendType'		=>	$sendType,
			'outRef'		=>	$outRef
		);
		
		if(!empty($description)){
			$data['description']	=	$description;
		}
		$url	=	"{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/{$this->ns}/api.sellerShipment/{$this->appKey}";
		return json_decode($this->Curl($url,$data),true);	

	}


	/***********************************************************
	 *	��ȡaliexpress֧�ֵ�������Ϣ
	 *
	 */
	 function listLogisticsService(){
		$data	=	array(
			'access_token'	=>$this->access_token
		); 
		$url	=	"{$this->server}/{$this->rootpath}/{$this->protocol}/{$this->version}/{$this->ns}/api.listLogisticsService/{$this->appKey}";
		return json_decode($this->Curl($url,$data),true);	
	 }

}
?>

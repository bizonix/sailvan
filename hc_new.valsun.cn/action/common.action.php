<?php
/*
 *Action公用的方法类
 *@add by : Herman.Xi ,date : 20090926
 *@modify by : linzhengxiang ,date : 20140525
 */
class CommonAct{

	protected $page 			= 0;
	protected $perpage  		= 0;

	protected static $errMsg 	= array();
	//构造函数
	public function __construct(){
		if (@$_GET['rc']==='reset') M($this->act_action2Model())->resetCache();
		$this->page 		= 	isset($_GET['page'])&&intval($_GET['page'])>0 ? intval($_GET['page']) : 1;
		$this->perpage 		= 	isset($_GET['pnum'])&&intval($_GET['pnum'])>0 ? intval($_GET['pnum']) : 10;
		@register_shutdown_function(array($this, '__destruct'));
	}

	/**
	 * 析构函数，赋值模型中执行错误信息
	 */
	/*public function __destruct(){
		$errMsgs = M('common')->getErrorMsg();
		if (!empty($errMsgs)){
			foreach ($errMsgs AS $code=>$errMsg){
				self::$errMsg[$code] = $errMsg;
			}
		}
	}*/

	/**
	 * 获取错误信息
	 * @return array
	 * @author lzx
	 */
	public function act_getErrorMsg(){
		$errMsgs = M('common')->getErrorMsg();
		if (!empty($errMsgs)){
			foreach ($errMsgs AS $code=>$errMsg){
			    if(!isset(self::$errMsg[$code])){
			        self::$errMsg[$code] = $errMsg;
			    }
			}
		}
		return self::$errMsg;
	}

	/**
	 * 获取当前页数
	 * @return int
	 * @author lzx
	 */
	public function act_getPage(){
		return $this->page;
	}

	/**
	 * 获取当前每页数量
	 * @return int
	 * @author lzx
	 */
	public function act_getPerpage(){
		return $this->perpage;
	}

	/**
	 * 根据控制获取对应的模型
	 * @return string
	 * @author lzx
	 */
	private function act_action2Model(){
		$childname = get_class($this);
		return substr($childname, 0, strlen($childname)-3);
	}

	/**
	 * 返回分销商信息
	 * @return string
	 * @author wcx
	 */
	public function act_getDevelopeLoginEmail(){

	    $data  =   json_decode(_authcode($_COOKIE['hcUser']),true);
		return    $data['email'];
	}

	/**
	 * 返回分销商信息
	 * @return string
	 * @author zjr
	 */
	public function act_getUserInfor($flag){
	    $data  =   json_decode(_authcode($_COOKIE['hcUser']),true);
		return    $data[$flag];
	}

	/**
	 * 返回分销商一部分信息
	 * @return string
	 * @author zjr
	 */
	public function act_getUserSomeInfor($flag){
		return    isset($_SESSION[$flag]) ? $_SESSION[$flag] : 1;
	}

	/**
	 * 设置分销商部分信息
	 * @return string
	 * @author wcx
	 */
	public function act_setUserSomeInfor($flag,$val){
	    $_SESSION[$flag] 	= 	$val;
	    return true;
	}

	/*
	 * 获取action对应的model
	 */
	public function act_getModel(){
	    return str_replace("Act", "", get_class($this));
	}

	public function act_getAdminInfor($flag='userCnName'){
	    $data  =   json_decode(_authcode($_COOKIE['hcAdmin']),true);
	    return    $data[$flag];
	}

}
?>
<?php
/**
 * 类名：DeveloperModel
 * 功能：开发者信息管理
 * 版本：V1.0
 * 作者：邹军荣
 * 时间：2014-06-25
 */
class DistributorShopModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 功能：保存店铺信息，存在更新，不存在插入
	 * @prama array
	 * @return string
	 * @author zjr
	 */
	public function saveShopInfo($dpId,$shopId, $data){
		$tableName = $this->getTableName();
		if(!$this->formatWhereField($tableName, array('dp_id'=>$dpId))){
		    self::$errMsg =   $this->validatemsg;
		    return false;
		}
		$check = $this->sql("SELECT COUNT(*) AS count FROM {$tableName} WHERE dp_id ={$dpId} and id = '{$shopId}' and is_delete=0")->count();
		if ($check == 0) {
			$rowAffacted = $this->insertData($data);
			if($rowAffacted > 0){
				$lastRow = $this->sql("SELECT id FROM {$tableName} where is_delete=0 order by id desc")->page(1)->perpage(1)->select();
			}
			return $lastRow[0]['id'];
		}else{
		    $data =   $this->formatUpdateField($tableName,$data);
		    if(!$data){
		        self::$errMsg =   $this->validatemsg;
		        return false;
		    }
			return $this->sql("UPDATE ".$tableName." SET ".array2sql($data)." WHERE dp_id ={$dpId} and id = '{$shopId}' and is_delete=0")->update();
		}
	}
	
	
	/**
	 * 获取店铺信息
	 * @param string $field
	 * @param string $where
	 * @author zjr
	 */
	public function getShopInfo($field='*', $where='1', $sort=' order by id desc ',$page=1, $perpage=10){

	    $sql  = 'SELECT '.$field.' FROM `'.C('DB_PREFIX').'distributor_shop` WHERE '.$where.' and is_delete=0';
	    $data = $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array( 'mysql'));
		return $data;
	}
	
	/**
	 * 删除店铺信息
	 * @param string $field
	 * @param string $where
	 * @author zjr
	 */
	public function deleteShopInfo($id=0, $dpId=0){
		$id 	= intval($id);
		$dpId 	= intval($dpId);
		if ($id == 0 || $dpId == 0){
		    $this::$errMsg[10117]    =   get_promptmsg(10117,'店铺');
			return false;
		}
		return $this->sql("UPDATE ".$this->getTableName()." SET is_delete=1 WHERE id={$id} and dp_id={$dpId} and is_delete=0")->delete();
	}
	
	/**
	 * 根据平台，审核状态统计数量
	 * @param int $dpId 开发者ID
	 * @author lgy
	 */
	public function getPlatNum($dpId){
	    $data  =   $this->formatWhereField("dp_distributor_shop",array("dp_id"=>$dpId));
	    if(!$data){
	        self::$errMsg =   $this->validatemsg;
	        return false;
	    }
	    $dpId  =   $data['dp_id'];
		$sql	= "SELECT plat_form_id AS platId,status,COUNT(*) AS num FROM `dp_distributor_shop` WHERE dp_id = {$dpId} and is_delete=0 GROUP BY plat_form_id,status";
		return $this->sql($sql)->select(array( 'mysql'));
	}
	
	/**
	 * 获取分销商店铺数 通过输入where条件
	 * zjr
	 */
	public function getShopListCountByWhere($where){
		return $this->sql($this->replaceSql2Count($this->getShoplistSqlByWhere($where)))->count();
	}
	
	/**
	 * 组装count sql 语句 通过输入where条件
	 * zjr
	 */
	public function getShoplistSqlByWhere($where="1"){
		return "SELECT * FROM ".C('DB_PREFIX')."distributor_shop WHERE ".$where." and is_delete=0";
	}
		
	/**
	 * 根据查询条件组装查询SQL语句
	 * @prama array
	 * @return string
	 * @author zjr
	 */
	private function getWhereSql($data){
		$where                = implode(" AND ", array2where($data));
		return $where ;
	}
	public function getShopStatusByDpId($id){
	    $sql   =   'SELECT * FROM `'.C('DB_PREFIX').'distributor_shop` WHERE dp_id="'.$id.'" and is_delete=0';
	    $data  =   $this->sql($sql)->select(array( 'mysql'));
	    if(empty($data)){
	        $this::$errMsg[10118]    =   get_promptmsg(10118,'店铺状态');
	    	return false;
	    }
	    foreach ($data as $k=>$v){
	    	if($this::checkShopInfo($v)){
	    		return true;
	    	}
	    }
	    return false;
	}
	public function updateDataByIds($id,$data){
		return $this->updateData($id, $data);
	}
	private function checkShopInfo($data){
		if(empty($data['plat_form_id'])){
		    $this::$errMsg[10117]    =   get_promptmsg(10117,'平台');
			return false;
		}
		switch($data['plat_form_id']){
		    //ebay
			case '1':
		    case '4':
	        case '6':
            case '7':
                if(empty($data['shop_watermark'])){
                    return false;
                }
                if(empty($data['goods_location'])){
                    return false;
                }
                if(empty($data['ship_country'])){
                    return false;
                }
                if(empty($data['no_ship_country'])){
                    return false;
                }
                if(empty($data['apply_listing_config'])){
                    return false;
                }
                $config   =   json_decode($data['apply_listing_config'],true);
                $config   =   $config[0];
                if(empty($config['shopToken'])){
                    return false;
                }
                if(empty($config['siteID'])){
                    return false;
                }
                if(empty($config['devID'])){
                    return false;
                }
                if(empty($config['appID'])){
                    return false;
                }
                if(empty($config['certID'])){
                    return false;
                }
                if(empty($config['serverUrl'])){
                    return false;
                }
                if(empty($data['b_paypal_account'])){
                    return false;
                }
                if(empty($data['s_paypal_account'])){
                    return false;
                }
                if(empty($data['site_id'])&&$data['site_id']!=0){
                    return false;
                }
			    break;
			    //速卖通
		    case '2':
		        
		        //break;
		        //天猫
	        case '3':
	            //break;
	            //亚马逊
            case '5':
                break;
			                
		}
		if(empty($data['shop_account'])){
		    return false;
		}
		if(empty($data['listing_address'])){
		    return false;
		}
		return true;
	}
	
}
?>
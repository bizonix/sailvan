<?php
/**
 * 类名：DeveloperModel
 * 功能：开发者信息管理
 * 版本：V1.0
 * 作者：邹军荣
 * 时间：2014-06-25
 */
class DeveloperModel extends CommonModel{

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 功能：获取开发者相关信息
	 * @prama array
	 * @return string
	 * @author zjr
	 */
	public function getDeveloper($field='*', $where='1', $sort=' order by id desc ',$page=1, $perpage=50){
		$sql  = 'SELECT '.$field.' FROM `'.C("DB_PREFIX").'developer` WHERE '.$where;
		return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array( 'mysql'));
		//return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('cache', 'mysql'));
	}	
	
	/**
	 * 功能：通过Sql获取开发者相关信息  主要用于多表查询
	 * @prama array
	 * @return string
	 * @author zjr
	 */
	public function getDeveloperInfoBySql($sql){
		return $this->sql($sql)->page(1)->perpage(500)->select(array( 'mysql'));
		//return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('cache', 'mysql'));
	}	
	
	
	/**
	 * 根据列名更新信息
	 * @param string $column
	 * @param string $columnVal
	 * @param array $data
	 * @author zjr
	 */
	public function updateDataByColumn($column,$columnVal,$data){
		$tableName = $this->getTableName();
		$data = $this->formatUpdateField($tableName, $data);
		if(!$data){
			self::$errMsg =   $this->validatemsg;
			return false;
		}
		$columnVal = mysql_real_escape_string($columnVal);
		$updateDeveloper = '';
		foreach($data as $k=>$v)
		{
			$updateDeveloper .= ($k.'="'.$v.'",');
		}
		$updateDeveloper = rtrim($updateDeveloper,',');
		return $this->sql("UPDATE `".C("DB_PREFIX")."developer` SET ".$updateDeveloper." WHERE {$column}='{$columnVal}'")->update();
	}
	/**
	 * 功能：获取开发者数
	 * @param string $where
	 */
	public function getDeveloperCount($where='1'){
	    $sql  = 'SELECT count(*) as count FROM `dp_developer` WHERE '.$where;
		return $this->sql($sql)->count();
	}
	
	/**
	 * 根据查询条件组装查询SQL语句
	 * @prama array
	 * @return string
	 * @author zjr
	 */
	private function getWhereSql($data){
		$where	= implode(" AND ", array2where($data));
		return $where ;
	}
	/**
	 * 功能：获取审核列表
	 * @prama array
	 * @return string
	 * @author wcx
	 */
	public function getApplicationAuthorizationList($where='1', $sort=' order by m.id desc ',$page=1, $perpage=50){
	    $sql   =   "SELECT d.company,d.email,m.api_open_status,m.pc_data_open_status,m.pic_sys_open_status,ebay_sys_open_status,m.apply_time from dp_myEmpower as m LEFT JOIN dp_developer as d on m.email=d.email WHERE d.is_delete=0 and d.`status`!=4 AND d.`status`!=5 AND d.`status`!=6 ";
	    return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array( 'mysql'));
	}
	/*
	 * 获取分销商信息和授权情况
	 */
	public function getDeveloperAndPower(){
		$sql  =   "SELECT * FROM `dp_developer` as d LEFT JOIN dp_empower as e on d.id=e.dp_id where d.is_delete='0'";
		return $this->sql($sql)->select(array('cache','mysql'));
	}
	
	/**
	 * 功能：获取开发者列表（分销商列表）
	 * @param array $where
	 * @return array
	 * @author jbf
	 */
	public function findDistributorList($where, $sort=' ORDER BY create_time ASC', $page=1, $perpage=200) {
		$sql = "SELECT `id`, `type`, `level`, `token`, `company`, `intention_products` FROM `dp_developer` " . self::buildWhereSql(self::addWhereToFindDistributorWhere($where));
		return $this -> sql($sql) -> sort($sort) -> page($page) -> perpage($perpage) -> select(array('mysql'));
	}
	
	/**
	 * 功能：计算符合条件的开发者数量
	 * @param array|string $where
	 * @return int
	 * @author jbf
	 */
	public function findDistributorCount($where) {
		$sql = "SELECT count(*) AS `count` FROM `dp_developer` " . self::buildWhereSql(self::addWhereToFindDistributorWhere($where));
		return $this -> sql($sql) -> count(array('mysql'));
	}
	
	/**
	 * 功能：在现有查询条件中，增加常态查询条件
	 * @param string|array $where
	 * @return string|array
	 * @author jbf
	 */
	private function addWhereToFindDistributorWhere($where) {
			if (!empty($where) && is_string($where)) {
				$where .= "AND `is_delete` = '0' AND `status` = '2'";
			} else {
				$where['is_delete']	= '0';
				$where['status']	= '2';
			}
		
			return $where;
	}
	
	/**
	 * 功能：格式化Where数组为SQL字符串
	 * @param string|array $wheres
	 * @return string
	 * @author jbf
	 */
	public function buildWhereSql($wheres) {
		$where = '';
		
		if (!empty($wheres)) {
			if (is_array($wheres)) {
				foreach ($wheres AS $key => $value) {
					if (isset($value) && $value !== null && $value !== ''){
						if (is_array($value)) {
							$equ = buildEquation($value);
							if ($equ !== false) $where .= 'AND `'.$key.'`' . $equ .' ';
						} else $where .= 'AND `'.$key."` = '".$value."' ";
					}
				}
				
				$where = strlen($where) > 0 ? 'WHERE ' . substr($where, 3) : '';
			} else {
				if(strpos($wheres, 'WHERE')) $where = $wheres;
				else $where = 'WHERE ' . $wheres;
			}
		}
		
		return $where;
	}
}
?>
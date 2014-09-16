<?php
/*
*模板通用操作类
*@add by : linzhengxiang ,date : 20140525
*/

class CommonModel extends ValidateModel{

	public function __construct(){
		parent::__construct();
	}
	/**
	 * 插入信息
	 * @param array $data
	 * @author lzx
	 */
	public function insertData($data){
		$fdata = $this->formatInsertField($this->getTableName(), $data);
		if ($fdata===false){
			self::$errMsg = $this->validatemsg;
			return false;
		}
		if ($this->checkIsExists($fdata)){
			return false;
		}
		return $this->sql("INSERT INTO ".$this->getTableName()." SET ".array2sql($fdata))->insert();
	}

	/**
	 * 根据id更新信息
	 * @param array $data
	 * @author lzx
	 */
	public function updateData($id, $data){
		$id = intval($id);
		if ($id==0){
		        self::$errMsg[10110] = get_promptmsg(10110,'更新');
			return false;
		}
		$fdata = $this->formatUpdateField($this->getTableName(), $data);
		if ($fdata===false){
			self::$errMsg = $this->validatemsg;
			return false;
		}
		return $this->sql("UPDATE ".$this->getTableName()." SET ".array2sql($fdata)." WHERE id={$id}")->update();
	}
	/**
	 * 获取信息
	 * @author wcx
	 */
	public function getData($fieldArr='*', $whereArr='1', $sort=' order by id desc ',$page=1, $perpage=20){
	    if(empty($fieldArr)){
	        $field  =   "*";
	    }else{
	        if(is_array($fieldArr)){
    	        $field =   '`'.implode('`,`', $fieldArr).'`';
	        }else{
	            $field =   $fieldArr;
	        }
	    }
	    if(empty($whereArr)){
	        $where  =   "1";
	    }else{
	        if(is_array($whereArr)){
	            $whereArr  =   $this->formatWhereField($this->getTableName(), $whereArr);
	            if(empty($whereArr)){
	                $this::$errMsg =   $this->validatemsg;
	            	return false;
	            }
	            $where =   "1";
	            foreach($whereArr as $k=>$v){
	                $where .=  " AND `$k`='$v'";
	            }
	        }else{
	            $where =   $whereArr;
	        }
	    }

	    $sql = 'SELECT '.$field.' FROM `'.$this->getTableName().'` WHERE '.$where;
	    return $this->sql($sql)->sort($sort)->page($page)->perpage($perpage)->select(array('mysql'));
	}
	/**
	 *  获取单个信息
	 *  @author wcx
	*/
	public function getSingleData($fieldArr='*',$whereArr='1'){
	    $ret   =   $this->getData($fieldArr,$whereArr);
	    if(empty($ret)){
	    	return $ret;
	    }else{
	    	return $ret[0];
	    }
	}
	/**
	 * 更新多条信息
	 * @author wcx
	 */
	public function updateDataWhere($data,$whereArr='0'){
	    if(!is_array($whereArr)){
	        $where =   '';
	        $where .=  $whereArr;
	    }else{
	        $where =   '1';
    	    foreach($whereArr as $k=>$v){
    	        $where .=  " AND $k='".mysql_real_escape_string($v)."'";
    	    }
	    }
	    $fdata = $this->formatUpdateField($this->getTableName(), $data);

	    if ($fdata===false){
	        self::$errMsg = $this->validatemsg;
	        return false;
	    }
	    return $this->sql("UPDATE ".$this->getTableName()." SET ".array2sql($fdata)." WHERE $where")->update();
	}
	public function replaceData($id, $data, $column='id'){
		$id = intval($id);
		$column = addslashes($column);
		if ($id==0){
		    self::$errMsg[10110] = get_promptmsg(10110,'更新或插入');
			return false;
		}
		$fdata = $this->formatUpdateField($this->getTableName(), $data);
		if ($fdata===false){
			self::$errMsg = $this->validatemsg;
			return false;
		}
		if (!$this->checkIsExists($fdata)){
			return false;
		}
		$check = $this->sql("SELECT COUNT(*) AS count FROM {$this->getTableName()} WHERE {$column}={$id}")->count();
		if ($check==0) {
			$fdata[$column] = $id;
			return $this->insertData($fdata);
		}else{
			return $this->sql("UPDATE ".$this->getTableName()." SET ".array2sql($fdata)." WHERE {$column}={$id}")->update();
		}
	}

	/**
	 * 删除信息
	 * @param array $data
	 * @author lzx
	 */
	public function deleteData($id){
		$id = intval($id);
		if ($id==0){
		    self::$errMsg[10110] = get_promptmsg(10110,'删除');
			return false;
		}
		return $this->sql("UPDATE ".$this->getTableName()." SET is_delete=1 WHERE id={$id}")->delete();
	}

	/*
	 * 获取记录条数
	 */
	public function getDataCount($whereArr='1'){
	    $num   =   $this->getSingleData("COUNT(*) as count",$whereArr);
	    if(empty($num)){
	    	return 0;
	    }else{
	    	return $num['count'];
	    }
	}
	/**
	 * sql记录条数统计
	 * @param array $data
	 * @author lzx
	 */
	public function replaceSql2Count($sql){
		if (preg_match("/(`[a-z]*`)\.\*/", $sql)>0){
			return preg_replace("/(`[a-z]*`)\.\*/", "COUNT(\$1.id) AS count", $sql);
		}else if(preg_match("/^SELECT\s*\*/i", $sql)>0){
			return preg_replace("/^SELECT\s*\*/i", "SELECT COUNT(*) AS count", $sql);
		}else{
		    self::$errMsg[10111] = get_promptmsg(10111);
			return false;
		}
	}

	public function checkIsExists($data){
	    //self::$errMsg[10109] = get_promptmsg(10109);
		return false;
	}

	public function resetCache(){
		$this->recache = true;
	}

	public function getErrorMsg(){
		return self::$errMsg;
	}
}
?>
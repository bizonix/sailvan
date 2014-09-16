<?php

class Log {

    // 日志级别 从上到下，由低到高
    const ERR     = 'ERR';		// 一般错误: 一般性错误
    const WARN    = 'WARN';		// 警告性错误: 需要发出警告的错误
    const NOTICE  = 'NOTIC';	// 通知: 程序可以运行但是还不够完美的错误
    const INFO    = 'INFO';		// 信息: 程序输出信息
    const DEBUG   = 'DEBUG';	// 调试: 调试信息
    const SQL     = 'SQL';		// SQL：SQL语句 注意只在调试模式开启时有效

    // 日志记录方式
    const MAIL	= 1;
    const FILE	= 3;
	const API	= 4;

    // 日志信息
    static $log =   array();

    // 日期格式
    static $format =  '[ c ]';

    /**
     +----------------------------------------------------------
     * 记录日志 并且会过滤未经设置的级别
     * @static
     * @access public
     * @param string $message 日志信息
     * @param string $level  日志级别
     * @param boolean $record  是否强制记录
     * @return void
     +----------------------------------------------------------
     */
    static function record($message,$level=self::ERR,$record=false) {
        if($record || strpos(C('LOG_LEVEL'),$level)) {
            $now = date(self::$format);
			if(!isset($_SERVER['REQUEST_URI'])){
				$_SERVER['REQUEST_URI'] = '';
			}
            self::$log[] =   "{$now} ".$_SERVER['REQUEST_URI']." | {$level}: {$message}\r\n";
        }
    }

    /**
     +----------------------------------------------------------
     * 日志保存
     * @static
     * @access public
     * @param integer $type 日志记录方式
     * @param string $destination  写入目标
     * @param string $extra 额外参数
     * @return void
     +----------------------------------------------------------
     */
    static function save($type='',$destination='',$extra='') {
        $type = $type?$type:C('LOG_TYPE');
        if(self::FILE == $type) { // 文件方式记录日志信息
            if(empty($destination))
                $destination = C('LOG_PATH').date('y_m_d').'.log';
            //检测日志文件大小，超过配置大小则备份日志文件重新生成
            if(is_file($destination) && floor(C('LOG_FILE_SIZE')) <= filesize($destination) )
                  rename($destination,dirname($destination).'/'.time().'-'.basename($destination));
        }else{
            $destination   =   $destination?$destination:C('LOG_DEST');
            $extra   =  $extra?$extra:C('LOG_EXTRA');
        }
        error_log(implode('',self::$log), $type,$destination ,$extra);
        // 保存后清空日志缓存
        self::$log = array();
        //clearstatcache();
    }

    /**
     +----------------------------------------------------------
     * 日志直接写入
     * @static
     * @access public
     * @param string $message 日志信息
     * @param string $level  日志级别
     * @param integer $type 日志记录方式
     * @param string $destination  写入目标
     * @param string $extra 额外参数
     * @return void
     +----------------------------------------------------------
     */
    static function write($message,$level=self::ERR,$type='',$destination='',$extra='') {
        $now = date(self::$format);
        $type = $type?$type:C('LOG_TYPE');
        if(self::FILE == $type) { // 文件方式记录日志
            if(empty($destination))
                $destination = C('LOG_PATH').date('y_m_d').'.log';
            //检测日志文件大小，超过配置大小则备份日志文件重新生成
            if(is_file($destination) && floor(C('LOG_FILE_SIZE')) <= filesize($destination) )
                  rename($destination,dirname($destination).'/'.time().'-'.basename($destination));
        }else{
            $destination   =   $destination?$destination:C('LOG_DEST');
            $extra   =  $extra?$extra:C('LOG_EXTRA');
        }
		if(!isset($_SERVER['REQUEST_URI'])){
			$_SERVER['REQUEST_URI'] = '';
		}
		if(C("IS_DEBUG")){
            echo "{$now} ".$_SERVER['REQUEST_URI']." | {$level}: {$message}\r\n";
            error_log("{$now} ".$_SERVER['REQUEST_URI']." | {$level}: {$message}\r\n", $type,$destination,$extra );
		}else{
            error_log("{$now} ".$_SERVER['REQUEST_URI']." | {$level}: {$message}\r\n", $type,$destination,$extra );
		}
    }
}
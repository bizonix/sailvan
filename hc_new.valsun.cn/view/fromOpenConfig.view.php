<?php
/**
 * 功能：接口管理
 * @author wcx
 * v 1.0
 * 时间：2014/08/20
 *
 */
class FromOpenConfigView extends AdminBaseView {
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }
    /*
     * 列表显示
     */
	public function view_index() {
        $this->view_listShow();
        $this->smarty->display('fromOpenConfig.html');
	}
}
?>
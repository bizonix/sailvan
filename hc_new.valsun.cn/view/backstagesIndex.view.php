<?php
class BackstagesIndexView extends AdminBaseView {
	
	public function __construct(){
		parent::__construct();
	}
	public function view_index() {
        $this->smarty->display('backstagesHomePage.html');
	}
	
}
?>
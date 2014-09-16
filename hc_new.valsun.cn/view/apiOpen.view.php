<?php
class ApiOpenView extends BaseView {
	public function view_index() {
		$api = A('apiOpen');
		
		die(var_dump($api -> act_findDistributorList()));
	}
}
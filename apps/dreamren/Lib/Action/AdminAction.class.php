<?php
class AdminAction extends AdministratorAction{
	public function index(){
		return $this->display("index");
	}
}

?>
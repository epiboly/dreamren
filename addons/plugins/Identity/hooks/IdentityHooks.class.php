<?php
class IdentityHooks extends Hooks{
	
	
	public function home_account_tab(&$param)
	{
		$param['menu'][] = array('act' => 'medals', 'name' => '实名认证','param'=>array('addon'=>'Identity','hook'=>'home_account_show'));
	}
	
	
	public function home_account_show($param)
	{
    	echo "fdsfdsfdsfdsfds";
    }
	
	public function identityAdmin(){
		$this->display("index");
	}
}


?>
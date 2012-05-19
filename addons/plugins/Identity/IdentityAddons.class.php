<?php
class IdentityAddons extends  NormalAddons{
	protected $version = '1.0';
	protected $author  = '黄卫立';
	protected $site    = 'http://www.wekit.org';
	protected $info    = '用户实名认证管理';
	protected $pluginName = '实名认证';
	protected $tsVersion  = "1.0";                               // ts核心版本号

	
  /**
     * getHooksInfo
     * 获得该插件使用了哪些钩子聚合类，哪些钩子是需要进行排序的
     * @access public
     * @return void
     */
    public function getHooksInfo(){
        $hooks['list'] = array('IdentityHooks');
        return $hooks;
    }

    public function adminMenu(){
    	$menu = array(
    		'identityAdmin' => '实名认证管理'
    	);
        return $menu;
    }

    public function start()
    {
        return true;
    }

	public function install()
	{
		
	}

	public function uninstall()
	{
		
	}
}

?>
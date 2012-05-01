<?php
class HomeAction extends AdministratorAction
{
	// 统计信息
	public function statistics()
	{
		$statistics = array();
		$site_version = model('Xdata')->get('siteopt:site_system_version');
		$serverInfo['核心版本']        	= 'Wekit ' . $site_version;
        $serverInfo['服务器系统及PHP版本']	= PHP_OS.' / PHP v'.PHP_VERSION;
        $serverInfo['服务器软件'] 			= $_SERVER['SERVER_SOFTWARE'];
        $serverInfo['最大上传许可']     	= ( @ini_get('file_uploads') )? ini_get('upload_max_filesize') : '<font color="red">no</font>';

        $mysqlinfo = M('')->query("SELECT VERSION() as version");
        $serverInfo['MySQL版本']			= $mysqlinfo[0]['version'] ;

        $t = M('')->query("SHOW TABLE STATUS LIKE '".C('DB_PREFIX')."%'");
        foreach ($t as $k){
            $dbsize += $k['Data_length'] + $k['Index_length'];
        }
        $serverInfo['数据库大小']			= byte_format( $dbsize );
        $statistics[' 服务器信息'] = $serverInfo;
        unset($serverInfo);

        // 用户信息
        $user['当前在线'] = getOnlineUserCount();
        $user['全部用户'] = M('user')->count();
        $user['有效用户'] = M('user')->where('`is_active` = 1 AND `is_init` = 1')->count();
        $statistics[' 用户信息'] = $user;
        unset($user);

        // 应用统计
        $applist = array();
        $res = model('App')->where('`statistics_entry`<>""')->field('app_name,app_alias,statistics_entry')->order('display_order ASC')->findAll();
        foreach ($res as $v) {
        	$d = explode('/', $v['statistics_entry']);
        	$d[1] = empty($d[1]) ? 'index' : $d[1];
        	$statistics[$v['app_alias']] = D($d[0], $v['app_name'])->$d[1]();
        }

       

        $this->assign('statistics', $statistics);
        $this->display();
	}


}
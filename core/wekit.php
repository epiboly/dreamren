<?php
$GLOBALS['_beginTime'] = microtime(TRUE);


if(!defined('SITE_PATH'))		define('SITE_PATH'	, dirname(getcwd()));
if(!defined('CORE_PATH'))		define('CORE_PATH'	, SITE_PATH.'/core');
if(!defined('APPS_PATH'))		define('APPS_PATH'	, SITE_PATH.'/apps');
if(!defined('ADDON_PATH'))		define('ADDON_PATH'	, SITE_PATH.'/addons');
if(!defined('SITE_DATA_PATH'))	define('SITE_DATA_PATH'	, SITE_PATH.'/data');
if(!defined('UPLOAD_PATH'))		define('UPLOAD_PATH'	, SITE_DATA_PATH.'/uploads');

if(isset($_GET['app'])){
	$app_name	=	strtolower(str_replace(array('/','\\'),'',strip_tags(urldecode($_GET['app']))));
}else{
	$app_name = 'home';
}

if(!defined('APP_NAME'))			define('APP_NAME' , $app_name);
if(!defined('APP_PATH'))			define('APP_PATH' , APPS_PATH.'/'.APP_NAME);
if(!defined('THINK_PATH'))			define('THINK_PATH' , CORE_PATH.'/ThinkPHP');
if(!defined('RUNTIME_PATH'))		define('RUNTIME_PATH' , SITE_PATH.'/_runtime/~'.APP_NAME);
if(!defined('RUNTIME_ALLINONE'))	define('RUNTIME_ALLINONE', true);

if (!is_dir(RUNTIME_PATH)) {
	require_once SITE_PATH . '/addons/libs/Io/Dir.class.php';
	$dirs    = new Dir(SITE_PATH.'/apps/');
	$dirs    = $dirs->toArray();
	$in_dirs = false;
	foreach ($dirs as $v)
		if (APP_NAME == $v['filename'])
			$in_dirs = true;

	if ($in_dirs)
		mkdir(RUNTIME_PATH,0777,true);
}

//检查编译文件
if(RUNTIME_ALLINONE && is_file(RUNTIME_PATH.'/~allinone.php')) {
    // ALLINONE 模式直接载入allinone缓存
    $result   =  require RUNTIME_PATH.'/~allinone.php';
    C($result);
    // 自动设置为运行模式
    define('RUNTIME_MODEL', true);
}else{
    if(version_compare(PHP_VERSION,'5.0.0','<'))  die('require PHP > 5.0 !');
    // ThinkPHP系统目录定义
    if(is_file(RUNTIME_PATH.'/~runtime.php')) {
        // 加载框架核心编译缓存
        require RUNTIME_PATH.'/~runtime.php';
    }else{
        // 加载编译函数文件
        require CORE_PATH."/sociax/runtime.php";
        // 生成核心编译~runtime缓存
        build_runtime();
    }
}

// 记录加载文件时间
$GLOBALS['_loadTime'] = microtime(TRUE);
$GLOBALS['_lang'] = array();
?>
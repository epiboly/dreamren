<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: CacheXcache.class.php 2504 2011-12-28 07:35:29Z liu21st $

/**
 +------------------------------------------------------------------------------
 * Xcache缓存类
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Think
 * @subpackage  Util
 * @author    liu21st <liu21st@gmail.com>
 * @version   $Id: CacheXcache.class.php 2504 2011-12-28 07:35:29Z liu21st $
 +------------------------------------------------------------------------------
 */
class CacheXcache extends Cache {

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function __construct($options='') {
        if ( !function_exists('xcache_info') ) {
            throw_exception(L('_NOT_SUPPERT_').':Xcache');
        }
        if(!empty($options)) {
            $this->options =  $options;
        }
        $this->options['expire'] = isset($options['expire'])?$options['expire']:C('DATA_CACHE_TIME');
        $this->options['length']  =  isset($options['length'])?$options['length']:0;
    }

    /**
     +----------------------------------------------------------
     * 读取缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return mixed
     +----------------------------------------------------------
     */
    public function get($name) {
        $this->N('cache_read',1);
        if (xcache_isset($name)) {
            return xcache_get($name);
        }
        return false;
    }

    /**
     +----------------------------------------------------------
     * 写入缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     * @param mixed $value  存储数据
     * @param integer $expire  有效时间（秒）
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function set($name, $value,$expire=null) {
        $this->N('cache_write',1);
        if(is_null($expire)) {
            $expire = $this->options['expire'] ;
        }
        if(xcache_set($name, $value, $expire)) {
            if($this->options['length']>0) {
                // 记录缓存队列
                $this->queue($name);
            }
            return true;
        }
        return false;
    }

    /**
     +----------------------------------------------------------
     * 删除缓存
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param string $name 缓存变量名
     +----------------------------------------------------------
     * @return boolen
     +----------------------------------------------------------
     */
    public function rm($name) {
        return xcache_unset($name);
    }

}
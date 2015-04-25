<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
$domain = $_SERVER ['HTTP_HOST']; // < 判断是从哪个域名访问过来
define('__ROOT__','./'.$domain);

define('PROJECT_PATH', '../myfolder/'.$domain.'/');

require PROJECT_PATH.'admin.php';
<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Author: jiangjiaquan <540747521@qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
$domain = $_SERVER ['HTTP_HOST']; // < 判断是从哪个域名访问过来
define('__ROOT__','./'.$domain);

define('PROJECT_PATH', '../myfolder/'.$domain.'/'); // < myfolder 此目录自行定义

require PROJECT_PATH.'admin.php';
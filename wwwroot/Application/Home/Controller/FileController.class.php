<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 文件控制器
 * 主要用于下载模型的文件上传和下载
 */

class FileController extends HomeController {
	/* 文件上传 */
	public function upload(){
		$return  = array('status' => 1, 'info' => '上传成功', 'data' => '');
		/* 调用文件上传组件上传文件 */
		$File = D('File');
		$file_driver = C('DOWNLOAD_UPLOAD_DRIVER');
		$info = $File->upload(
			$_FILES,
			C('DOWNLOAD_UPLOAD'),
			C('DOWNLOAD_UPLOAD_DRIVER'),
			C("UPLOAD_{$file_driver}_CONFIG")
		);

		/* 记录附件信息 */
		if($info){
			$return['data'] = think_encrypt(json_encode($info['download']));
		} else {
			$return['status'] = 0;
			$return['info']   = $File->getError();
		}

		/* 返回JSON数据 */
		$this->ajaxReturn($return);
	}

	/* 下载文件 */
	public function download($id = null){
		if(empty($id) || !is_numeric($id)){
			$this->error('参数错误！');
		}

		$logic = D('Download', 'Logic');
		if(!$logic->download($id)){
			$this->error($logic->getError());
		}
		
	}

	/**
	 * 读取图片
	 * @author jiangjiaquan <540747521@qq.com>
	 */
	public function readFile( $filename = ''){
		$filename = I('fullpath');
		// 限制只能读取Uploads目录下的文件
		$filename = PROJECT_PATH.'Uploads/'.$filename;
		// 取图片类型
		$type = end(preg_split('/\./', $filename));

		if(is_file($filename)){
			header('Content-Length:'.filesize($filename));
			header('Content-Type:image/'.$type);
			readfile($filename);
		}else{
			send_http_status(404);
// 			header('Content-Length:'.filesize($filename));
// 			header('Content-Type:image/'.$type);
// 			readfile('no.jpg');
		}
	}
}

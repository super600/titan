<?php
/**
 * 文件控制器
 */
class Files extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this -> load -> library('resize_img');
		$this -> load -> model('Files_model');
	}

	/**
	 * 文件上传
	 * 设置返回格式：POST字段ret_type，默认js回调，传json时返回json格式
	 *
	 * @desc 上传多个图片需要注意， 如果使用swfupload可以直接调用这个方法，如果使用原生的input上传多个图片需要重写一个方法
	 */
	
	//会展文章图片
	public function base(){
		//图片上传路径
		//var_dump($_FILES);
		//exit();
		$upload_path = './static/base/';
		$save_path = $upload_path . date('Y/n/j/');
		if (!is_dir($save_path)) {
			mkdir($save_path, 0777, true);
		}
		$config['upload_path'] = $save_path;
		$config['allowed_types'] = 'gif|jpg|png|swf';
		$config['max_size'] = '1024';

		$config['file_name'] = time().rand(0,90);
		$this -> load -> library('upload', $config);

		if (!$this -> upload -> do_upload()) {
			$error = array('error' => $this -> upload -> display_errors());
			echo $error['error'];
		} else {
			//生成 图片
			$data = array('upload_data' => $this -> upload -> data());
			//$this->make_img($data['upload_data']['full_path']
			//	,$config['upload_path']."/".$config['file_name']
			//	,$data['upload_data']['file_ext']);
			
			$pattern = '/(^.)/i';
			$replacement = '';
			//返回json数据
			$outarr=array(
				"error"=>0,
				"url"=>base_url().preg_replace($pattern, $replacement, $save_path).$config['file_name'].$data['upload_data']['file_ext'],
				"message"=>"no"
			);
			
			$out=json_encode($outarr);
			//file_put_contents("./os.txt", $out);
			echo $out;
		}
	}



	
	function make_img($img, $file_name,$ext) {
		//$this -> resize_img -> make($img, "1024", "720", "0", $file_name."_d".$ext);//大图
		$this -> resize_img -> make($img, "512", "310", "0",  $file_name."_z".$ext);//中图
	}
	private function publicimg($upload_path,$allowed_types,$max_size){
		$save_path = $upload_path . date('Y/n/j/');
		if (!is_dir($save_path)) {
			mkdir($save_path, 0777, true);
		}
		$config['upload_path'] = $save_path;
		$config['allowed_types'] = $allowed_types;
		$config['max_size'] = $max_size;

		$config['file_name'] = time().rand(0,90);
		$this -> load -> library('upload', $config);

		if (!$this -> upload -> do_upload()) {
			$error = array('error' => $this -> upload -> display_errors());
			echo $error['error'];
		} else {
			//生成 图片
			$data = array('upload_data' => $this -> upload -> data());
			$this->make_img_($data['upload_data']['full_path']
				,$config['upload_path']."/".$config['file_name']
				,$data['upload_data']['file_ext']);
			
			$pattern = '/(^.)/i';
			$replacement = '';
			//返回json数据
			$outarr=array(
				"url"=>base_url().preg_replace($pattern, $replacement, $save_path).$config['file_name'],
				"ext"=>$data['upload_data']['file_ext']
			);
			
			$out=json_encode($outarr);
			//file_put_contents("./os.txt", $out);
			echo $out;
		}
	}
	 
	 public function img(){
	 	
		$this->way=__METHOD__;
	 	//公司banner上传
		$upload_path = './static/banner/';
		$allowed_types="jpg|jpeg|png|gif";
		$max_size="1024";
		$this->publicimg($upload_path, $allowed_types, $max_size);
	 }
	 
	 private function make_img_($img, $file_name,$ext) {
		switch($this->way){
			case "banner":
				$this -> resize_img -> make($img, "100", "100", "0",  $file_name."_x".$ext);//小图
				break;
			case "img":
				$this -> resize_img -> make($img, "1024", "720", "0", $file_name."_d".$ext);//大图
				$this -> resize_img -> make($img, "300", "300", "0",  $file_name."_z".$ext);//小图
				$this -> resize_img -> make($img, "100", "100", "0",  $file_name."_x".$ext);//小图
				break;
			case "logo":
				$this -> resize_img -> make($img, "100", "100", "0",  $file_name."_x".$ext);//小图
				break;
			case "projectimg":
				$this -> resize_img -> make($img, "100", "100", "0",  $file_name."_x".$ext);//小图
				break;
			default:
				$this -> resize_img -> make($img, "1024", "720", "0", $file_name."_d".$ext);//大图
				$this -> resize_img -> make($img, "300", "300", "0",  $file_name."_z".$ext);//小图
				$this -> resize_img -> make($img, "100", "100", "0",  $file_name."_x".$ext);//小图
				break;
		}

	}

}

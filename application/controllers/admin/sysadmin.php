<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class sysadmin extends CI_Controller {

	/**
	 * @todo 打开系统的 管理页面
	 * @author neo 2012-8-9
	 * */
    public function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->model("admin/public_model");
        header("content-type: text/html; charset=utf-8");
    }
	
	

	//系统内页
	public function index(){
		//加载 登陆文件
		//不能有任何输出
		
		$this->user_alert->is_login();
		$this->load->view('index');
	}

	public function left(){
		$this->user_alert->is_login();
		$this->load->view('left');
	}
	
	//打开 页面 right 并检查 用户的登陆情况
	public function right(){
		$this->user_alert->is_login();
		$this->load->library('conn');
		$conn=$this->conn->con();
		$this->load->view('right',$conn);
	}
	
	//打开 登陆页面
	public function login(){
		$this->load->view('login');	
	}

    //验证码 调用 lib
    public function code(){
        $this->load->library('checkcode');
        $this->checkcode->show();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
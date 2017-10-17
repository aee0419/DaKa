<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/17
 * Time: 15:21
 */
class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');
        $this->load->model('Login_model','login');
    }

    public function index(){//显示登陆页面
        $this->load->view('login/index');
    }

    public function login(){//执行用户登陆
        $id = $this->input->post('xuan');
        $this->valid->set_rules('username','用户名','required',array('required'=>'%s不能为空！'));
        $this->valid->set_rules('password','密码','required',array('required'=>'%s不能为空！'));
        if($this->valid->run()) {
            if ($id == 1) {
                $where['name'] = $this->input->post('username');
                $where['password'] = $this->input->post('password');
                $data = $this->login->find($where);
                $empno = $data['empno'];
                $att = $this->login->query($empno);
                $worktime = date("Y-m-d");
                if ($att['worktime'] != $worktime or $att == null) {
                    $attdata['empno'] = $empno;
                    $attdata['worktime'] = $worktime;
                    $this->login->addData($attdata);
                }
                if ($data) {
                    $this->session->set_userdata('name', $data['name']);
                    $this->session->set_userdata('empno', $data['empno']);
                    $this->session->set_userdata('flag', md5(time() . $data['name']));
                    redirect('att/index');
                } else {
                    redirect('login/index');
                }
            } else {
                $where['username'] = $this->input->post('username');
                $where['password'] = $this->input->post('password');
                $data = $this->login->admin($where);
                if ($data) {
                    $this->session->set_userdata('username', $data['username']);
                    $this->session->set_userdata('flag', md5(time() . $data['username']));
                    redirect('index/index');
                } else {
                    redirect('login/index');
                }
            }

        }else{
            redirect('login/index');
        }
    }

    public function changeadmin(){
        $where['username'] = $this->input->post('username');
        $where['password'] = $this->input->post('old_password');
        $data = $this->login->admin($where);
        if($data){
            $id = $data['id'];
            $change['password'] = $this->input->post('password');
            $change['username'] = $where['username'];
            $result = $this->login->updateadmin($id,$change);
            if($result){
                redirect('login/index');
            }
        }else{
            redirect('index/index');
        }
    }

    public function changeuser(){
        $where['name'] = $this->input->post('username');
        $where['password'] = $this->input->post('old_password');
        $user = $this->login->user($where);
        if($user){
            $id = $user['id'];
            $change['password'] = $this->input->post('password');
            $change['name'] = $where['name'];
            $result = $this->login->updateuser($id,$change);
            if($result){
                redirect('login/index');
            }
        }else{
            redirect('att/index');
        }
    }

    public function send(){
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['message'] = $this->input->post('message');
        $result = $this->login->add($data);
        if($result) {
            echo '<script>alert("我们已经收到了你的反馈！请等待我们处理...");location.href=site_url("att/index");</script>';
        }else{
            redirect('att/index');
        }
    }

    public function logout(){//用户注销
        if($this->session->has_userdata('username') or $this->session->has_userdata('name')){
            $this->session->unset_userdata('username');
            $this->session->sess_destroy();
            redirect('login/index');
        }
    }

}

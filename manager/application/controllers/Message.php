<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 21:02
 */

class Message extends CI_Controller{
    public $need_check;//是否需要检测
    public function __construct(){
        parent::__construct();
        $this->load->model('Message_model','message');
        $this->load->helper(array('url'));
        $this->load->library('form_validation',null,'valid');
        $this->load->library('pagination',null,'page');
        $this->need_check = true;
        $this->check_login();
    }

    public function check_login(){
        if($this->need_check){
            $checkData = $this->session->flag;
            if(!$checkData){
                redirect('login/index');
            }
        }
    }

    public function index(){
        $config['base_url'] = base_url()."index.php/edu/index";
        $config['total_rows'] = $this->message->getTotalRow();
        $config['per_page'] = 5;
        $config['next_link'] = "下一页";
        $config['prev_link'] = "上一页";
        $config['next_tag_open'] = '<td>';
        $config['next_tag_close'] = '</td>';
        $config['prev_tag_open'] = '<td>';
        $config['prev_tag_close'] = '</td>';
        $config['num_tag_open'] = '<td>';
        $config['num_tag_close'] = '</td>';
        $this->load->vars('config',$config);
        $this->page->initialize($config);
        $offset = $this->uri->segment(3);

        $data = $this->message->read($config['per_page'],$offset);
        $this->load->vars('link',$this->page->create_links());
        $this->load->vars('data',$data);
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('message/index');
        $this->load->view('config/footer');
    }

    public function del(){
        $id=$this->uri->segment(3);
        if($this->message->delData($id)){
            redirect('message/index');
        }else{
            show_error('删除数据不存在', 500, '错误如下:');
        }
    }

    public function show(){//显示添加数据
        $this->load->vars('login',$this->session->username);
        $data = $this->message->find();
        $this->load->vars('data',$data);
        $this->load->view('config/header');
        $this->load->view('message/show');
        $this->load->view('config/footer');
    }

}
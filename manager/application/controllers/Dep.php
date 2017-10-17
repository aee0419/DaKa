<?php
/*
header("content-type:text/html;charset=utf-8");
学生：符之谋
20141764
QQ：82127686
*/
/**
 * Created by PhpStorm.
 * User: FZM
 * Date: 2017/8/17
 * Time: 10:48
 */

class Dep extends CI_Controller{
    public $need_check;//是否需要检测
    public function __construct()
    {
        parent::__construct();
        $this->need_check = true;
        $this->check_login();
        $this->load->model('Dep_model','dep');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');
        $this->load->library('pagination',null,'page');
    }

    public function check_login(){
        if($this->need_check){
            $checkData = $this->session->flag;
            if(!$checkData){
                redirect('login/index');
            }
        }
    }

    public function index(){//显示数据
        $config['base_url'] = base_url().'index.php/dep/index';
        $config['total_rows'] = $this->dep->getTotalRow();
        $config['per_page'] = 5;
        $config['next_link'] = "下一页";
        $config['prev_link'] = "上一页";
        $config['next_tag_open'] = '<td>';
        $config['next_tag_close'] = '</td>';
        $config['prev_tag_open'] = '<td>';
        $config['prev_tag_close'] = '</td>';
        $config['num_tag_open'] = '<td>';
        $config['num_tag_close'] = '</td>';
        $this->page->initialize($config);
        $offset = $this->uri->segment(3);

        $data = $this->dep->read($config['per_page'],$offset);
        $this->load->vars('link',$this->page->create_links());
        $this->load->vars('data',$data);
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('dep/index');
        $this->load->view('config/footer');
    }

    public function add(){//显示添加数据
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('dep/add');
        $this->load->view('config/footer');
    }

    public function doadd(){//添加数据
        $this->valid->set_rules('depname', '编号', 'required|is_unique[dep.depname]', array('required' => '%s不能为空!','is_unique' => '%s已经存在!'));
        if ($this->valid->run() == false) {
            $this->load->view('dep/add');
        } else {
            $data['depname']=$this->input->post('depname');
            $id = $this->dep->addData($data);
            if($id){
                redirect('dep/index');
            }else{
                show_error('数据添加失败',500,'错误如下');
            }
        }
    }

    public function del(){//删除数据
        $id = $this->uri->segment(3);
        if($this->dep->delData($id)){
            redirect('dep/index');
        }else{
            show_error('删除失败！',500,'错误如下');
        }
    }

    public function edit(){//修改数据
        $id = $this->uri->segment(3);
        $data = $this->dep->find($id);
        $this ->session->set_userdata('id',$data['id']);
        $this->load->vars('id',$this->session->id);
        $this->load->vars('data',$data);
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('dep/edit');
        $this->load->view('config/footer');

    }

    public function doedit(){//保存修改的数据
        $this->valid->set_rules('depname','部门','required|is_unique[dep.depname]',array('required'=>'%s不能为空！','is_unique'=>'%s重复') );
        if($this->valid->run()){
            $id = $this->input->post('id');
            $data['depname'] = $this->input->post('depname');
            $result = $this->dep->updateData($id,$data);
            if($result){
                redirect('dep/index');
            }
        }else{
            redirect('dep/edit');
        }
    }
}
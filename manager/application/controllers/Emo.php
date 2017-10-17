<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/16
 *Time: 19:37
 */

class Emo extends CI_Controller{
    public $need_check;//是否需要检测
    public function __construct()
    {
        parent::__construct();
        $this->need_check = true;
        $this->check_login();
        $this->load->model('Emo_model','emo');
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
        $config['base_url'] = base_url().'index.php/emo/index';
        $config['total_rows'] = $this->emo->getTotalRow();
        $config['per_page'] = 5;
        $config['next_link'] = "下一页";
        $config['prev_link'] = "上一页";
        $this->page->initialize($config);
        $this->load->vars('config',$config);
        $offset = $this->uri->segment(3,0);

        $data = $this->emo->read($config['per_page'],$offset);
        //$data = $this->emo->query($config['per_page'],$offset);
        $this->load->vars('link',$this->page->create_links());
        $this->load->vars('data',$data);
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('emo/index');
        $this->load->view('config/footer');

    }

    public function add(){//显示添加数据
        $this->load->vars('login',$this->session->username);
        $dep = $this->emo->dep();
        $edu = $this->emo->edu();
        $pos = $this->emo->pos();
        $this->load->vars('dep',$dep);
        $this->load->vars('edu',$edu);
        $this->load->vars('pos',$pos);
        $this->load->view('config/header');
        $this->load->view('emo/add');
        $this->load->view('config/footer');
    }

    public function doadd(){//添加数据
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('emo/add');
        $this->load->view('config/footer');
            $data['empno']=$this->input->post('empno');
            $data['name']=$this->input->post('name');
            $data['password']=$this->input->post('password');
            $data['sex']=$this->input->post('sex');
            $data['birth']=$this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('day');
            $data['pos']=$this->input->post('pos');
            $data['edu']=$this->input->post('edu');
            $data['dep']=$this->input->post('dep');
            $data['tel']=$this->input->post('tel');
            $id = $this->emo->addData($data);
            if($id){
                redirect('emo/index');
            }else{
                show_error('数据添加失败',500,'错误如下');
            }
        }

    public function del(){//删除数据
        $id = $this->uri->segment(3);
        if($this->emo->delData($id)){
            redirect('emo/index');
        }else{
            show_error('删除失败！',500,'错误如下');
        }
    }

    public function edit(){//修改数据
        $id = $this->uri->segment(3);
        $data = $this->emo->find($id);
        $this->load->vars('data',$data);

        $dep = $this->emo->dep();
        $edu = $this->emo->edu();
        $pos = $this->emo->pos();
        $this->load->vars('dep',$dep);
        $this->load->vars('edu',$edu);
        $this->load->vars('pos',$pos);

        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('emo/edit');
        $this->load->view('config/footer');
    }

    public function doedit(){//保存修改的数据
        $this->valid->set_rules('name','用户名','required',array('required'=>'%s不能为空！') );
        if($this->valid->run()){
            $id = $this->input->post('id');
            $data['empno']=$this->input->post('empno');
            $data['name']=$this->input->post('name');
            $data['password']=$this->input->post('password');
            $data['sex']=$this->input->post('sex');
            $data['birth']=$this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('day');
            $data['pos']=$this->input->post('pos');
            $data['edu']=$this->input->post('edu');
            $data['dep']=$this->input->post('dep');
            $data['tel']=$this->input->post('tel');
            $result = $this->emo->updateData($id,$data);
            if($result){
                redirect('emo/index');
            }
        }else{
            redirect('emo/edit');
        }
    }
}
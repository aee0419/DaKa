<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 11:08
 */

class Index extends CI_Controller{
    public $need_check;//是否需要检测
    public function __construct(){

        parent::__construct();
        $this->load->model('Index_model','index');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');
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

    public function index(){//显示数据
       $this->load->vars('login',$this->session->username);
        //获取员工表总数
        $emo = $this->index->getemo();
        $this->load->vars('emo',$emo);
        //获取学历表总数
        $edu = $this->index->getedu();
        $this->load->vars('edu',$edu);
        //获取职位表总数
        $pos = $this->index->getpos();
        $this->load->vars('pos',$pos);
        //获取部门表总数
        $dep = $this->index->getdep();
        $this->load->vars('dep',$dep);

        $this->load->view('index/index');

    }
}
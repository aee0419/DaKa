<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 15:15
 */


class config extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model','config');
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation',null,'valid');
    }

    public function index(){//显示数据
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
    }

}
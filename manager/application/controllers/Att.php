<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/17
 * Time: 8:52
 */
class Att extends CI_Controller{
    public $need_check;
    public function __construct()
    {
        parent::__construct();
        $this->need_check = true;
        $this->load->model('Att_model','att');//加载模型后给模型取别名
        $this->load->helper(array('url','form'));//辅助函数
        $this->load->library('form_validation',null,'valid');
        $this->load->library('pagination',null,'page');
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

    public function att(){
        /*$config['base_url'] = base_url().'index.php/att/index';
        $config['total_rows'] = $this->att->getTotalRow();
        $config['per_page'] = 2;
        $config['next_link'] = "下一页";
        $config['prev_link'] = "上一页";
        $config['next_tag_open'] = '<p>';
        $config['next_tag_close'] = '</p>';
        $config['prev_tag_open'] = '<p>';
        $config['prev_tag_close'] = '</p>';
        $config['num_tag_open'] = '<p>';
        $config['num_tag_close'] = '</p>';
        $config['cur_tag_open'] = '<p>';
        $config['cur_tag_close'] = '</p>';
        $this->page->initialize($config);
        $offset = $this->uri->segment(3);*/

        //$data = $this->att->read($config['per_page'],$offset);
        //$this->load->vars('link',$this->page->create_links());
        //$this->load->vars('data',$data);
        //$this->load->vars('user',$this->session->name);

        $data = $this->att->read();
        $this->load->vars('data',$data);
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('att/att');
        $this->load->view('config/footer');

    }

    public function index(){
        $this->load->vars('login',$this->session->name);
        $username = $this->session->name;
        $empno = $this->session->empno;
        $where['name'] = $username;
        $emodata = $this->att->find($where);

        //$data = $this->att->findmore($username);

        $data['pos'] = $this->att->select($emodata['pos'],'pos');
        $data['edu'] = $this->att->select($emodata['edu'],'edu');
        $data['dep'] = $this->att->select($emodata['dep'],'dep');

        $userdata = $this->att->getAll($empno);

        $where1['empno'] = $empno;
        $where1['worktime'] = date("Y-m-d",time());
        $row = $this->att->find1($where1);

        $this->load->vars('row',$row);
        $this->load->vars('userdata',$userdata);
        $this->load->vars('emodata',$emodata);
        $this->load->vars('username',$username);
        $this->load->vars('data',$data);

        $this->load->view('att/index');

    }

    public function clock(){//打卡功能
        $empno = $this->session->empno;
        //$empno = "258369";
        $where['empno'] = $empno;
        $where['worktime'] = date("Y-m-d",time());
        $att = $this->att->find1($where);
        $id = $att['id'];
        if($att){
            if($att['s_status']==0){
                $data['start'] = time();
                $data['s_status'] = "1";
                $result = $this->att->updateData($id,$data);
                if($result){
                    redirect('att/index');
                }
            }

            //打卡下班
            if($att['s_status']==1 && $att['e_status']==0){
                if(time()-$att['start']<=3600*6){
                    show_error('最少工作六小时后才能下班!',null,"错误如下:");
                }else{
                    $data['end'] = time();
                    $data['e_status'] = "1";
                    $result = $this->att->updateData($id,$data);
                    if($result){
                        redirect('att/index');
                    }
                }
            }

            if($att['s_status']==1 && $att['e_status']==1){
                show_error('您已打卡下班，请勿重复打卡！',null,"错误如下:");
            }

        }

    }
}




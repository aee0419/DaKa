<?php
header("content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: zjm
 * Date: 2017/8/16
 * Time: 19:19
 */
class Pos extends CI_Controller{

    public $need_check;//是否需要检测
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pos_model','pm');    //加载模型
        $this->load->helper(array('url'));     //加载url辅助函数
        $this->load->library('form_validation',null,'valid');   //加载表单验证类
        $this->load->library('pagination',null,'page');     //加载分页类
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

     public function index(){  //显示数据
         $config['base_url'] = base_url()."index.php/pos/index";   //分页所在控制器的完整路径
         $config['total_rows'] = $this->pm->getTotalRow();     //数据库得到的所有数据的总行数
         $config['per_page'] = 5;            //一页所显示的行数
         $config['next_link'] = "下一页";
         $config['prev_link'] = "上一页";
         $config['next_tag_open'] = '<td>';
         $config['next_tag_close'] = '</td>';
         $config['prev_tag_open'] = '<td>';
         $config['prev_tag_close'] = '</td>';
         $config['num_tag_open'] = '<td>';
         $config['num_tag_close'] = '</td>';

         $this->page->initialize($config);    //将配置参数传给initialize方法，至少需要三个参数
         $offset = $this->uri->segment(3);     //指定uri在哪一段包含页数

         $data = $this->pm->read($config['per_page'],$offset);     //将数据读取出来
         $this->load->vars('link',$this->page->create_links());   //将分页显示赋给模板变量，在没有分页显示时会显示空白
         $this->load->vars('data',$data);
         $this->load->vars('login',$this->session->username);
         $this->load->view('config/header');
         $this->load->view('pos/index');
         $this->load->view('config/footer');

     }

    public function add(){   //显示增加数据的页面
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('pos/add');
        $this->load->view('config/footer');

    }

    public function doadd(){    //增加数据
        //设置表单验证规则
        $this->valid->set_rules('posname', '新职位', 'required|is_unique[pos.posname ]', array('required' => '%s不能为空!', 'is_unique' => '%s已经存在!'));
        if($this->valid->run() == false){    //调用验证规则
            $this->add();
        }else{
            $data['posname']=$this->input->post('posname');    //访问表单数据
            $id = $this->pm->addData($data);       //调用模型方法，将数据加入数据库
            if($id){           //判断数据是否已经将数据加入到数据库中
                redirect('pos/index');
            }else{
                show_error('职位添加失败', 500, '错误如下:');
            }
        }
    }

    public function del(){           //删除数据
        $id=$this->uri->segment(3);     //获取要删除数据的id
        if($this->pm->delData($id)){       //删除数据库中的数据
            redirect('pos/index');
        }else{
            show_error('删除数据不存在', 500, '错误如下:');
        }
    }

    public function edit(){     //显示编辑页面
        $id = $this->uri->segment(3);     //获取要修改数据的id
        $data = $this->pm->find($id);      //获取要修改数据的原来的值
        $this->load->vars('data',$data);   //将原来的数据赋给模板变量显示出来
        $this->load->vars('login',$this->session->username);
        $this->load->view('config/header');
        $this->load->view('Pos/edit');
        $this->load->view('config/footer');

    }

    public function doedit(){    //修改数据
        $this->valid->set_rules('posname', '职位', 'required|is_unique[pos.posname ]', array('required' => '%s不能为空!', 'is_unique' => '%s已经存在!'));
        if($this->valid->run()){     //调用规则
            $id = $this->input->post('id');    //获取表单数据的id
            $data['posname'] = $this->input->post('posname');  //获取表单数据的内容
            $result = $this->pm->updateData($id,$data);    //调用模型的方法修改数据库中的数据
            if($result){     //判断数据是否被修改
                redirect('pos/index');
            }
        }else{
            $this->edit();   //返回修改页面
        }
    }
}
<?php
class Edu extends CI_Controller{
	public $need_check;//是否需要检测
	public function __construct(){
		parent::__construct();
		$this->load->model('Edu_model','em');
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
		$config['total_rows'] = $this->em->getTotalRow();
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
		
		$data = $this->em->read($config['per_page'],$offset);
		$this->load->vars('link',$this->page->create_links());
		$this->load->vars('data',$data);
		$this->load->vars('login',$this->session->username);
		$this->load->view('config/header');
		$this->load->view('edu/index');
		$this->load->view('config/footer');
	}
	
	public function add(){   //显示增加数据的页面
		$this->load->vars('login',$this->session->username);
		$this->load->view('config/header');
		$this->load->view('edu/add');
		$this->load->view('config/footer');
	}
	
	public function doadd(){
		$this->valid->set_rules('eduname', '新学历', 'required|is_unique[edu.eduname ]', array('required' => '%s不能为空!', 'is_unique' => '%s已经存在!'));
		if($this->valid->run() == false){
			$this->load->view('edu/add');
		}else{
			$data['eduname']=$this->input->post('eduname');
			$id = $this->em->addData($data);
			if($id){
				redirect('edu/index');
			}else{
				show_error('职位添加失败', 500, '错误如下:');
			}
		}
	}
	
	public function del(){
		$id=$this->uri->segment(3);
		if($this->em->delData($id)){
			redirect('edu/index');
		}else{
			show_error('删除数据不存在', 500, '错误如下:');
		}
	}
	
	public function edit(){
		$id = $this->uri->segment(3);
		$data = $this->em->find($id);
		$this->session->set_userdata('id',$data['id']);
		/*echo $this->session->id;
		 die;*/
		$this->load->vars('id',$this->session->id);
		$this->load->vars('data',$data);
		$this->load->vars('login',$this->session->username);
		$this->load->view('config/header');
		$this->load->view('edu/edit');
		$this->load->view('config/footer');

	}
	
	public function doedit(){
		$this->valid->set_rules('eduname', '学历', 'required|is_unique[edu.eduname ]', array('required' => '%s不能为空!', 'is_unique' => '%s已经存在!'));
		if($this->valid->run()){
			$id = $this->input->post('id');
			$data['eduname'] = $this->input->post('eduname');
			$result = $this->em->updateData($id,$data);
			if($result){
				redirect('edu/index');
			}
		}else{
			redirect('edu/edit');
		}
	}
}
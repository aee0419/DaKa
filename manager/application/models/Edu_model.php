<?php
header("content-type:text/html;charset=utf-8");

class Edu_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function  read($per_page,$offset){
		$data = $this->db->limit($per_page,$offset)->get('edu');
		return $data->result();
	}
	
	public function addData($data = array()){
		if($this->db->insert('edu',$data)){
			return $this->db->insert_id();
		}else{
			return 0;
		}
	}
	
	public function delData($id){
		return $this->db->delete('edu',array('id'=>$id));
	}
	
	public function find($id){
		$data = $this->db->where('id',$id)->get('edu');
		return $data->row_array();
	}
	
	public function updateData($id,$data = array()){  //更新数据
		return $this->db->where('id',$id)->update('edu',$data);
	}
	
	public function getTotalRow(){
		return $this->db->count_all('edu');
	}
}
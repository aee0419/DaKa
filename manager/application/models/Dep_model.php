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
 * Time: 10:38
 */

class Dep_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function read($per_page,$offset){//读取数据
        $data = $this->db->limit($per_page,$offset)->get('dep');
        return $data->result();
    }

     public function addData($data=array()){//添加数据
         if($this->db->insert('dep',$data)){
             return $this->db->insert_id();
         }else{
             return 0;
         }
     }

     public function delData($id){//删除数据
         return $this->db->delete('dep',array('id'=>$id));
     }

     public function find($id){//读取单条记录
         $data = $this->db->where('id',$id)->get('dep');
         return $data->row_array();
     }

     public function updateData($id,$data=array()){//更新数据
         return $this->db->where('id',$id)->update('dep',$data);
     }

    public function getTotalRow(){
        return $this->db->count_all('dep');
    }

}
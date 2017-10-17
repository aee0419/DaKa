<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 21:04
 */


class Message_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function  read($per_page,$offset){
        $data = $this->db->limit($per_page,$offset)->get('message');
        return $data->result();
    }

    public function getTotalRow(){
        return $this->db->count_all('message');
    }

    public function delData($id){
        return $this->db->delete('message',array('id'=>$id));
    }

    public function find(){
        $data = $this->db->get('message');
        return $data->row_array();
    }
}
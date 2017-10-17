<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/16
 *Time: 10:57
 */
class Login_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function find($data = array()){//执行用户的查找
        $data = $this->db->where($data)->get('emo');
        return $data->row_array();
    }

    public function admin($data = array()){//执行用户的查找
        $data = $this->db->where($data)->get('admin');
        return $data->row_array();
    }

    public function user($data = array()){//执行用户的查找
        $user = $this->db->where($data)->get('emo');
        return $user->row_array();
    }

    public function query($empno){//读取单条记录
        $data = $this->db->where('empno',$empno)->order_by('id','desc')->get('att');
        return $data->row_array();
    }

    public function addData($attdata=array()){//添加数据
        $this->db->insert('att',$attdata);
    }

    public function updateadmin($id,$change=array()){//更新数据
        return $this->db->where('id',$id)->update('admin',$change);
    }

    public function updateuser($id,$change=array()){//更新数据
        return $this->db->where('id',$id)->update('emo',$change);
    }

    public function add($data=array()){//添加员工反馈
        $this->db->insert('message', $data);
    }
}
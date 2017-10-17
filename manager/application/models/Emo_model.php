<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/16
 *Time: 19:45
 */

class Emo_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function read($per_page,$offset){//读取数据
        $data = $this->db->query("select e.id,e.empno,e.name,e.sex,d.eduname,e.edu,p.posname,e.pos,de.depname,e.dep,e.tel from emo e inner join edu d on d.id=e.edu inner join pos p on p.id=e.pos inner join dep de on de.id=e.dep limit {$offset},{$per_page}");
        return $data->result();
    }

    public function dep(){
        $dep = $this->db->get('dep');
        return $dep->result();
    }
    public function edu(){
        $edu = $this->db->get('edu');
        return $edu->result();
    }
    public function pos(){
        $pos = $this->db->get('pos');
        return $pos->result();
    }

    public function addData($data=array()){//添加数据
        if($this->db->insert('emo',$data)){
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }

    public function delData($id){//删除数据
        return $this->db->delete('emo',array('id'=>$id));
    }

    public function find($id){//读取单条记录
        $data = $this->db->where('id',$id)->get('emo');
        return $data->row_array();
    }

    public function updateData($id,$data=array()){//更新数据
        return $this->db->where('id',$id)->update('emo',$data);
    }

    public function getTotalRow(){
        return $this->db->count_all('emo');
    }

}
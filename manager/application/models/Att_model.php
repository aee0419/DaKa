<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/17
 * Time: 8:59
 */
class Att_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    /*public function read($per_page,$offset){//读取数据
        $data = $this->db->limit($per_page,$offset)->get('att');
        return $data->result();
    }*/

    public function read(){//读取数据
        $data = $this->db->query("select e.*,a.*,p.posname,de.depname,d.eduname from emo e inner join att a on a.empno=e.empno inner join edu d on d.id=e.edu inner join pos p on p.id=e.pos inner join dep de on de.id=e.dep order by a.worktime desc");
        return $data->result();
    }

    public function select($id,$p){
        $name = $p."name";
        $sql = "select $name from $p where id=$id";
        $data = $this->db->query($sql);
        return $data->row_array();//返回数组
    }

    public function getAll($empno){
        $sql="select * from att where empno=$empno";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function find($data=array()){//从emo中执行用户的查找
        $data = $this->db->where($data)->get('emo');
        //return $data->result();//返回数组对象
        return $data->row_array();
    }

    public function find1($data=array()){//从att中执行用户的查找
        $data = $this->db->where($data)->get('att');
        return $data->row_array();//返回数组
    }

    /*public function get($data=array()){
        $data = $this->db->where($data)->get('att');
        return $data->result();//返回数组对象
    }*/

    /*public function addData($data=array()){//登陆后插入一条记录信息
        if($this->db->insert('att',$data)){
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }*/

    public function updateData($id,$data=array()){//更新或更改数据
        return $this->db->where('id',$id)->update('att',$data);
    }

    public function getTotalRow(){
        return $this->db->count_all('att');
    }
}


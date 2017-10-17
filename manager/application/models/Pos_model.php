<?php
header("content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: zjm
 * Date: 2017/8/16
 * Time: 19:22
 */
class Pos_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function read($per_page,$offset){    //读取数据表中的数据  参数1：每一页的行数  参数2：偏移量
        $data = $this->db->limit($per_page,$offset)->get('pos');    //获取pos表中的所有数据
        return $data->result();     //将数据作为一个对象数组返回
    }

    public function addData($data=array()){    //将数据加入数据表
        if($this->db->insert('pos',$data)){    //调用insert方法将数据插入pos表，判断数据是否已经插入数据表
            return $this->db->insert_id();     //成功返回新插入行的id
        }else{
            return 0;
        }
    }

    public function delData($id){          //删除数据库的数据
        return $this->db->delete('pos',array('id'=>$id));  //调用delete方法将pos表的数据删除
    }

    public function find($id){         //查询单条数据
        $data = $this->db->where('id',$id)->get('pos');   //调用where方法和get方法获取pos表的单条记录
        return $data->row_array();
    }

    public function updateData($id,$data = array()){      //更新数据
        return $this->db->where('id',$id)->update('pos',$data);      //调用where方法和update方法获取pos表的单条记录
    }

    public function getTotalRow(){        //获取数据表中数据的总数
        return $this->db->count_all('pos');    //调用count_all方法获取数据表中数据的总数
    }
}
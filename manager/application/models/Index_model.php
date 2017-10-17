<?php
/*
 *Developer: The陈铭
 *Date: 2017/8/18
 *Time: 11:08
 */


class Index_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function getemo(){
        return $this->db->count_all('emo');
    }
    public function getedu(){
        return $this->db->count_all('edu');
    }
    public function getdep(){
        return $this->db->count_all('dep');
    }
    public function getpos(){
        return $this->db->count_all('pos');
    }

}
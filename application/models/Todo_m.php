<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 5:02
 */
Class Todo_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     * READ
     */
    function get_lists(){
        $sql = 'select * from items order by id desc';
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; // 객체 배열 반환
    }

    /**
     * @param $id
     * @return mixed
     * READ by ID
     */
    function get_view($id)
    {
        $sql = "select * from items where id='" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * @param $content
     * @param $created_on
     * @param $due_date
     */
    function insert_todo($content, $created_on, $due_date)
    {
        $sql = "insert into items (`content`, `created_on`, `due_date`) VALUE ('".$content."', '".$created_on."', '".$due_date."');";
        $query = $this->db->query($sql);

    }

    /**
     * @param $id
     * @param $content
     * @param $created_on
     * @param $due_date
     */
    function update_todo($id, $content, $created_on, $due_date)
    {
        $sql = "update items set `content`='".$content."', `created_on`='".$created_on."', `due_date`='".$due_date."' where id='". $id . "'";
        $query = $this->db->query($sql);
    }


    function delete_todo($id)
    {
        $sql = "delete from items where id='" . $id . "'";
        $query = $this->db->query($sql);
    }

}
<?php

/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 8:22
 */
class Board_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $table
     * @param string $type
     * @param string $offest
     * @param string $limit
     * @return mixed
     * TODO 파라미터에 기본값을 설정해놓은 것이 실제 사용이 되지 않는 문제가 발생한다.
     */
    function get_list($table='ci_board', $type='', $offest='', $limit='')
    {
        $limit_query = 'limit 0, 5'; // default

        if($limit != '' or $offest != '')
        {
            $limit_query = " limit ".$offest.", " . $limit;
        }

        // 게시물 개수를 반환한다.
        if($type == 'count')
        {
            $sql = "select * from " . $table . " where board_pid='0'";
            $query = $this->db->query($sql);
            $result = $query->num_rows(); // 게시물 전체 개수 반환.
        }
        else
        {
            $sql = "select * from " . $table . " where board_pid='0' order by board_id DESC " . $limit_query;
            $query = $this->db->query($sql);
            $result = $query->result();
        }

        return $result;
    }

    function getListById($id)
    {
        $sql = "select * from `ci_board` where board_id=" . $id;
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    function deleteById($id)
    {
        $sql = "delete from `ci_board` where board_id=" . $id;
        $this->db->query($sql);
    }

    function insert_board($user_id, $user_name, $subject, $contents)
    {
        $sql = "insert into `ci_board` (`user_id`,`user_name`,`subject`,`contents`, `reg_date`) 
          values ('".$user_id."', '".$user_name."', '".$subject."', '".$contents."', '".date('Y-m-d H:i:s')."');";
        $this->db->query($sql);
    }

    function update_board($board_id, $user_id, $subject, $contents)
    {
        $sql = "update `ci_board` set `subject`='".$subject."', `contents`='".$contents."' where `board_id`='".$board_id."' and `user_id`='".$user_id."' ";
        $this->db->query($sql);
    }

    /**
     * 조회수 올리기
     * @param $id
     */
    function update_hits($id)
    {
        $sql = "update `ci_board` set `hits`= `hits` + 1 where `board_id`='".$id."' ";
        $this->db->query($sql);
    }
}
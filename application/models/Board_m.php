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



}
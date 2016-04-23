<?php

/**
 * Created by PhpStorm.
 * User: yijaejun
 * Date: 2016. 4. 23.
 * Time: 오후 8:10
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('board_m');
        $this->load->library('pagination');
        // 불필요한 부분까지 로딩되지 않도록 한다.
    }

    function index()
    {
        $this->lists();
    }

    /**
     * @param $method
     * 헤더와 푸터가 자동으로 추가될 수 있도록 한다.
     */
    function _remap($method)
    {
        $this->load->view('commons/header');
        if(method_exists($this, $method))
        {
            $this->{"{$method}"}(); // ??
        }
        $this->load->view('commons/footer');
    }

    /**
     * 목록 가져오기
     */
    function lists()
    {
        $limit = 2;
        $offset=$this->uri->segment(3);
        $offset == null or '' ? 0 : $offset;
        $config['base_url'] = site_url('/board/lists/'); // 페이징 주소
        $config['total_rows'] = $this->board_m->get_list('ci_board', 'count');
        $config['per_page'] = $limit; // 페이지당 표시할 게시물
        $config['uri_segment'] = 1; // 페이지 번호가 위치한 세그먼트?
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $data = array(
            'list' => $this->board_m->get_list('ci_board', '', $offset, $limit), // 현재 페이지 글 가져오기
            'pagination' => $this->pagination->create_links() // 페이징
        );
        $this->load->view('board/list', $data);
    }

}
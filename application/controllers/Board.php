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

        $TOTAL_COUNT = $this->board_m->get_list('ci_board', 'count'); // 총 글 개수
        $LIMIT = 5;
        $offset = ($this->uri->segment(3) - 1) * $LIMIT;
        if($offset < 0 or $offset == null)
        {
            $offset = 0;
        }

        $current_page = $this->uri->segment(3);
        $current_page < 1 ? 1: $current_page;

        $total_page = Ceil($TOTAL_COUNT/$LIMIT);
        $prev = $current_page - 1;
        $next = $current_page + 1;

        if($current_page <= 1 )
        {
            $prev = 1;
        }

        if($next >= $total_page)
        {
            $next = $total_page;
        }

        // 여러 개의 변수에 값을 담아서 보내기 위해서는 아래와 같이 배열 안에 전달하는 것이 좋다 각자 전달하게 되면 정의가 안된 것으로 처리된다.
        $data = array(
            'list' => $this->board_m->get_list('ci_board', '', $offset, $LIMIT), // 현재 페이지 글 가져오기
            'total_page' => $total_page,
            'current_page' => $current_page,
            'prev' => $prev,
            'next' => $next

        );

        $this->load->view('board/list', $data);
    }
    
    function view()
    {
        $id = $this->uri->segment(3);
        $data['views'] = $this->board_m->getListById($id);
        $data['id'] = $id;

        if(!empty($data['views']))
        {
            $this->board_m->update_hits($id);
            $this->load->view('board/view', $data);
        }
        else{
            redirect('/board/lists/1');
        }
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->board_m->deleteById($id);
        redirect('/board/lists/1');
    }

    function write()
    {
        if($_POST)
        {
            $user_id = 'advisor';
            $user_name = 'jaejun';
            $subject = $this->input->post('subject', true);
            $contents = $this->input->post('contents', true);

            $this->board_m->insert_board($user_id, $user_name, $subject, $contents);
            redirect('/board/lists/1');
            exit;
        }
        else
        {
            $this->load->view('board/write');
        }
    }

    function modify()
    {
        if($_POST)
        {
            // TODO 내용 업데이트한다.
            $board_id = $this->input->post('board_id', true);
            $user_id = $this->input->post('user_id', true);
            $subject = $this->input->post('subject', true);
            $contents = $this->input->post('contents', true);
            $this->board_m->update_board($board_id, $user_id, $subject, $contents);

            redirect('/board/view/' . $board_id);
            exit;
        }
        else
        {
            $id = $this->uri->segment(3);
            $data['view'] = $this->board_m->getListById($id);
            $this->load->view('board/write', $data);
        }

    }


}
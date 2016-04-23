<?php
// XX.php로 접속시도할 경우 프로그램 실행을 막아준다.
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Main
 *
 */
class Main extends CI_Controller {

    /**
     * Main constructor.
     * 컨트롤러 내부에서 사용할 변수나 라이브러리 모델, 헬퍼를 로딩할 수 있다.
     */
    function __construct()
    {
        parent::__construct();
        // 서버자원 낭비 방지를 위해서 모두 로딩하고 사용한다.
        $this->load->database(); // 데이터베이스 로딩
        $this->load->model('todo_m'); // 모델을 로딩

        

        // $this->load->helper('date'); // autoload.php에서 미리 로드하므로 주석처리했다.
        // $this->load->helper('url'); // url 헬퍼를 로딩 redirect() 등의 함수를 사용하게 위해서 로딩한다.
        // $this->load->helper('form');
    }

    function index()
    {
        $this->lists();
    }

    function lists()
    {
        $data['list'] = $this->todo_m->get_lists(); // to-do 목록 내용을 가져와서 담는다.
        $this->load->view('todo/list_v', $data); // view에 데이터 전달
    }

    function view()
    {
        $id = $this->uri->segment(3);
        $data['views'] = $this->todo_m->get_view($id);

        if(!empty($data['views']))
        {
            $this->load->view('todo/view_v', $data);
        }
        else{
            redirect('/main/lists');
        }
    }

    function write()
    {
        if($_POST) 
        {
            $content = $this->input->post('content', true); // 두 번째 파라미터는 XSS공격을 막아준다.(true)
            $created_on = $this->input->post('created_on', true);
            $due_date = $this->input->post('due_date', true);
            
            $this->todo_m->insert_todo($content, $created_on, $due_date);
            redirect('/main/lists');
            exit;
        } 
        else 
        {
            $this->load->view('todo/write');    
        }
        
    }

    function modify()
    {
        if($_POST)
        {
            $id = $this->input->post('id', true);
            $content = $this->input->post('content', true);
            $created_on = $this->input->post('created_on', true);
            $due_date = $this->input->post('due_date', true);

            $this->todo_m->update_todo($id, $content, $created_on, $due_date);

            redirect('/main/view/' . $id);
            exit;
        }
        else
        {
            $id = $this->uri->segment(3);
            $data['views'] = $this->todo_m->get_view($id);
            $this->load->view('todo/modify', $data);
        }


    }

//    function update()
//    {
//        // 수정후 저장
//    }

    function delete()
    {
        // 삭제 후 리다이렉션
        $id = $this->uri->segment(3);
        $this->todo_m->delete_todo($id);
        redirect('/main/lists');
    }

}

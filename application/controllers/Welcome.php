<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/**
	 * 에러 방지를 위해서 항상 index() 메서드를 만들어준다.
	 */
	public function index()
	{
        // views폴더의 welcome_message.php파일을 읽게 한다.
		//$this->load->view('welcome_message');
        $this->lists();
	}

    public function lists()
    {
        $this->load->view('/exercise/list'); // 폴더/파일 형식으로 적어주면 해당 파일을 인식한다.
    }
}

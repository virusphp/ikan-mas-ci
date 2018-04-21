<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
        parent::__construct();
    }

    function index() {
        //$this->load->view('auth/index');
        //var_dump($this->session->userdata());
        $this->template->display('home/index');
    }

    

}
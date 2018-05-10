<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('bcrypt');
        $this->load->model('M_auth');
    }

    function index() {
        $cek=$this->session->userdata('status_login');        
        if($cek==TRUE){
            redirect('home');
        }else{
            $this->load->view('auth/index');
        }        
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');            
            $this->M_auth->login($username, $password);            
        }
    }

    function logout() 
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
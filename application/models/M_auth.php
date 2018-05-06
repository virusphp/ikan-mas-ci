<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('bcrypt');
    }

    function login($username, $hash) {        
        $result = $this->db->get_where('users', array('username' => $username,'status'=>'Aktif'))->row();        
        if ($result) {            
            $paswd = $result->password;
            if ($this->bcrypt->check_password($hash, $paswd)) {
                $group=$this->db->get_where('groups',array('gid'=>$result->gid))->row();
                $data = array(  
                    'username'=>$result->username,                                    
                    'nama_pengguna' => $result->nama_pengguna,
                    'last_login' => $result->last_login,
                    'usergroup'=>$group->usergroup,
                    'uid'=>$result->id_user,
                    'gid' => $result->gid,                    
                    'status_login' =>TRUE
                );
                $this->session->set_userdata($data);                
                redirect('home', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'User atau  Password salah, Silahkan coba lagi ');
                //$this->load->view('auth/index');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', 'User atau  Password salah, Silahkan coba lagi ');
            redirect(base_url());
        }
    }

   

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() 
    {
        parent::__construct();       
        $this->load->model('M_user');
        $this->load->helper('project');
        $this->load->library('bcrypt');
    }

    public function index() 
    {
              
        $this->template->display('user/list_user');
    }

    public function view_data() {
        $no = 1;
        $getdata = $this->M_user->get_all();
        foreach ($getdata as $q) {    
            $query[] = array(
                'no' => $no++,
                'username'=>$q->username,               
                'nama_pengguna' => $q->nama_pengguna, 
                'status' => $q->status,                       
                'aksi' => array(
                    anchor('user/update/' . $q->id_user, '<i class="fa fa-pencil-square-o " data-toggle="tooltip" title="Edit"></i>', 'class="btn btn-warning btn-sm"') . ' ' . 
                    anchor('user/delete/' . $q->id_user, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete" onclick="javasciprt: return confirm(\'Data Akan Dihapus ?\')"')
                ),
            );
        }
        $result = array('data' => $query);
        echo json_encode($result);
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('user/create_action'),
            'username' => set_value('username'),
            'password' => set_value('password'),  
            'nama_pengguna' => set_value('nama_pengguna'),          
            'status' => set_value('status'),
            'groups_selected' => set_value('groupds_select') 
        );              
        $data['groups'] = $this->M_user->PilihGroups();
        $this->template->display('user/form_user',$data);
    }

    public function create_action() {
        // var_dump($this->input->post());
        $this->set_rules(); 
        $this->form_validation->set_message('is_unique', '%s Sudah Digunakan');  
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');        
        if ($this->form_validation->run() == FALSE) {
           $this->create();           
        } else {
            $data = array(                
                'username' => $this->input->post('username', TRUE),
                'nama_pengguna' => $this->input->post('nama_pengguna', TRUE),
                'password' => $this->bcrypt->hash_password($this->input->post('password', TRUE)),             
                'status' => $this->input->post('status', TRUE),                               
                'gid' => $this->input->post('gid', TRUE)
            );
            var_dump($data);
            
            $this->M_user->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }

    public function update($id) {
        $row = $this->M_user->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
                'id_user' => set_value('id_user', $row->id_user),
                'username' => set_value('username', $row->username), 
                'password' => set_value('password'),  
                'nama_pengguna' => set_value('nama_pengguna', $row->nama_pengguna),               
                'status' => set_value('status', $row->status),           
                'groups_selected' => set_value('groupds_select', $row->gid) 
            );       
            $data['groups'] = $this->M_user->PilihGroups();
            $this->template->display('user/form_user', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function update_action() {
        $this->set_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $id=$this->input->post('id_user', TRUE);
            $data = array( 
                'username' => $this->input->post('username', TRUE),   
                'nama_pengguna' => $this->input->post('nama_pengguna', TRUE),             
                'password' => $this->bcrypt->hash_password($this->input->post('password', TRUE)),  
                'status' => $this->input->post('status', TRUE),
                'gid' => $this->input->post('gid', TRUE)            
            );
            $this->M_user->update($id,$data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }

    public function delete($id) {
        $row = $this->M_user->get_by_id($id);
        if ($row) {
            $this->M_user->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function set_rules() { 
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('gid', 'Golongan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

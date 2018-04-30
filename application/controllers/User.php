<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() 
    {
        parent::__construct();       
        $this->load->model('M_user');
        $this->load->helper('project');
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
            'gld' => set_value('gld') 
        );              
        $this->template->display('user/form_user',$data);
    }

    public function create_action() {
        $this->set_rules(); 
        $this->form_validation->set_message('is_unique', '%s Sudah Digunakan');  
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');       
        if ($this->form_validation->run() == FALSE) {
           $this->create();           
        } else {
            $data = array(                
                'username' => $this->input->post('username', TRUE),
                'nama_pengguna' => $this->input->post('nama_pengguna', TRUE),
                'password' => $this->input->post('password', TRUE),             
                'status' => $this->input->post('status', TRUE),                               
                'gld' => $this->input->post('gld', TRUE),                               
            );
            $this->M_user->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }

    public function update($id) {
        $row = $this->M_kualitas->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kualitas/update_action'),
                'kd_kualitas' => set_value('kd_kualitas', $row->kd_kualitas),
                'persentase' => set_value('persentase', $row->persentase_kualitas), 
                'harga_jual' => set_value('harga_jual', $row->harga_jual),               
                'keterangan' => set_value('keterangan', $row->keterangan_kualitas),                
            );       
            $this->template->display('kualitas/form_kualitas', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kualitas'));
        }
    }

    public function update_action() {
        $this->set_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_kualitas', TRUE));
        } else {
            $id=$this->input->post('kd_kualitas', TRUE);
            $data = array( 
                'persentase_kualitas' => $this->input->post('persentase', TRUE),   
                'harga_jual' => $this->input->post('harga_jual', TRUE),             
                'keterangan_kualitas' => $this->input->post('keterangan', TRUE)            
            );
            $this->M_kualitas->update($id,$data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kualitas'));
        }
    }

    public function delete($id) {
        $row = $this->M_kualitas->get_by_id($id);
        if ($row) {
            $this->M_kualitas->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kualitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kualitas'));
        }
    }

    public function set_rules() { 
        $this->form_validation->set_rules('persentase', 'Persentase Kualitas', 'trim|required|numeric');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

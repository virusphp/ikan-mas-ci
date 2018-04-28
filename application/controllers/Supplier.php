<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller {

    function __construct() 
    {
        parent::__construct();       
        $this->load->model('M_supplier');
    }

    public function index() 
    {
              
        $this->template->display('supplier/list_supplier');
    }

    public function view_data() {
        $no = 1;
        $getdata = $this->M_supplier->get_all();
        foreach ($getdata as $q) {    
            $query[] = array(
                'no' => $no++,
                'kd_supplier'=>$q->kd_supplier,               
                'nama_supplier' => $q->nama_supplier,
                'no_telp' => $q->telp_supplier,
                'alamat' => $q->alamat_supplier,                
                'keterangan'=>$q->keterangan_supplier,
                'aksi' => array(anchor('supplier/update/' . $q->kd_supplier, '<i class="fa fa-pencil-square-o " data-toggle="tooltip" title="Edit"></i>', 'class="btn btn-primary btn-sm"') . ' ' . anchor('supplier/delete/' . $q->kd_supplier, '<i class="fa fa-trash"></i>', 'class="btn btn-primary btn-sm" data-toggle="tooltip" title="delete" onclick="javasciprt: return confirm(\'Data Akan Dihapus ?\')"')),
            );
        }
        $result = array('data' => $query);
        echo json_encode($result);
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('supplier/create_action'),
            'kd_supplier' => set_value('kd_supplier'),
            'nama_supplier' => set_value('nama_supplier'),
            'alamat' => set_value('alamat'),
            'no_telp' => set_value('no_telp'),
            'keterangan' => set_value('keterangan'), 
        );              
        $this->template->display('supplier/form_supplier',$data);
    }

    public function create_action() {
        $this->set_rules(); 
        $this->form_validation->set_message('is_unique', '%s Sudah Digunakan');  
        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'trim|required|is_unique[supplier.kd_supplier]');       
        if ($this->form_validation->run() == FALSE) {
           $this->create();           
        } else {
            $data = array(                
                'kd_supplier' => $this->input->post('kd_supplier', TRUE),
                'nama_supplier' => $this->input->post('nama_supplier', TRUE),
                'alamat_supplier' => $this->input->post('alamat', TRUE),
                'telp_supplier' => $this->input->post('no_telp', TRUE),
                'keterangan_supplier' => $this->input->post('keterangan', TRUE),                               
            );
            $this->M_supplier->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }

    public function update($id) {
        $row = $this->M_supplier->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('supplier/update_action'),
                'kd_supplier' => set_value('kd_supplier', $row->kd_supplier),
                'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
                'alamat' => set_value('alamat', $row->alamat_supplier),               
                'no_telp' => set_value('no_telp', $row->telp_supplier),
                'keterangan' => set_value('keterangan', $row->keterangan_supplier),                
            );       
            $this->template->display('supplier/form_supplier', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function update_action() {
        $this->set_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_supplier', TRUE));
        } else {
            $id=$this->input->post('kd_supplier', TRUE);
            $data = array( 
                'nama_supplier' => $this->input->post('nama_supplier', TRUE),
                'alamat_supplier' => $this->input->post('alamat', TRUE),
                'telp_supplier' => $this->input->post('no_telp', TRUE),
                'keterangan_supplier' => $this->input->post('keterangan', TRUE)                
            );
            $this->M_supplier->update($id,$data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }

    public function delete($id) {
        $row = $this->M_supplier->get_by_id($id);
        if ($row) {
            $this->M_supplier->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function set_rules() { 
        $this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telpn', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

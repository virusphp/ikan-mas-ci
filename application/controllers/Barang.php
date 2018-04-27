<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct() 
    {
        parent::__construct();       
        $this->load->model('M_barang');
    }

    public function index() 
    {
              
        $this->template->display('barang/list_barang');
    }

    public function view_data() {
        $no = 1;
        $getdata = $this->M_barang->get_all();
        foreach ($getdata as $q) {
            $kualitas = $this->db->get_where('kualitas', array('kd_kualitas' => $q->kd_kualitas))->row();            
            $query[] = array(
                'no' => $no++,
                'kd_barang'=>$q->kd_barang,               
                'nama_barang' => $q->nama_barang,
                'satuan' => $q->satuan_barang,
                'kualitas' => $kualitas->persentase_kualitas,
                'harga_jual' => $q->harga_jual,
                'keterangan'=>$q->keterangan_barang,
                'aksi' => array(anchor('barang/update/' . $q->kd_barang, '<i class="fa fa-pencil-square-o " data-toggle="tooltip" title="Edit"></i>', 'class="btn btn-primary btn-sm"') . ' ' . anchor('barang/delete/' . $q->kd_barang, '<i class="fa fa-trash"></i>', 'class="btn btn-primary btn-sm" data-toggle="tooltip" title="delete" onclick="javasciprt: return confirm(\'Data Akan Dihapus ?\')"')),
            );
        }
        $result = array('data' => $query);
        echo json_encode($result);
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('barang/create_action'),
            'kd_barang' => set_value('kd_barang'),
            'nama_barang' => set_value('nama_barang'),
            'satuan' => set_value('satuan'),
            'kualitas_selected' => set_value('kualitas_selected'),
            'harga_jual' => set_value('harga_jual'),
            'keterangan' => set_value('keterangan'), 
        );      
        $data['kualitas'] = $this->M_barang->PilihKualitas();
        $this->template->display('barang/form_barang',$data);
    }

    public function create_action() {
        $this->set_rules(); 
        $this->form_validation->set_message('is_unique', '%s Sudah Digunakan');  
        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'trim|required|is_unique[barang.kd_barang]');       
        if ($this->form_validation->run() == FALSE) {
           $this->create();           
        } else {
            $data = array(                
                'kd_barang' => $this->input->post('kd_barang', TRUE),
                'nama_barang' => $this->input->post('nama_barang', TRUE),
                'satuan_barang' => $this->input->post('satuan', TRUE),
                'kd_kualitas' => $this->input->post('kd_kualitas', TRUE),
                'keterangan_barang' => $this->input->post('keterangan', TRUE),
                'harga_jual' => $this->input->post('harga_jual', TRUE),                
            );
            $this->M_barang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }

    public function update($id) {
        $row = $this->M_barang->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
                'kd_barang' => set_value('kd_barang', $row->kd_barang),
                'nama_barang' => set_value('nama_barang', $row->nama_barang),
                'satuan' => set_value('satuan', $row->satuan_barang),
                'kualitas_selected' => set_value('kualitas_selected', $row->kd_kualitas),
                'harga_jual' => set_value('harga_jual', $row->harga_jual),
                'keterangan' => set_value('keterangan', $row->keterangan_barang),                
            );
            $data['kualitas'] = $this->M_barang->PilihKualitas();           
            $this->template->display('barang/form_barang', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function update_action() {
        $this->set_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_barang', TRUE));
        } else {
            $id=$this->input->post('kd_barang', TRUE);
            $data = array( 
                'nama_barang' => $this->input->post('nama_barang', TRUE),
                'satuan_barang' => $this->input->post('satuan', TRUE),
                'kd_kualitas' => $this->input->post('kd_kualitas', TRUE),
                'keterangan_barang' => $this->input->post('keterangan', TRUE),
                'harga_jual' => $this->input->post('harga_jual', TRUE),                
            );
            $this->M_barang->update($id,$data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }

    public function delete($id) {
        $row = $this->M_barang->get_by_id($id);
        if ($row) {
            $this->M_barang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function set_rules() { 
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('kd_kualitas', 'Kualitas Barang', 'trim|required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    function __construct() 
    {
        parent::__construct();       
        $this->load->model('M_transaksi');
        $this->load->model('M_barang');
    }

    public function index() 
    {                     
        $this->template->display('transaksi/penjualan/list_penjualan');
    }

    public function view_data() {
        $no = 1;
        $getdata = $this->M_transaksi->getall_penjualan();
        
        foreach ($getdata as $q) {
            $query[] = array(
                'no' => $no++,
                'no_transaksi'=>$q->no_transaksi,
                'tanggal_transaksi' => $q->tanggal_transaksi,
                'grand_total' => rupiah($q->grand_total),
                'nama_customer' => $q->nama_customer,
                'keterangan' => $q->keterangan_lain,
                'kasir'=>$q->nama_pengguna,
                'aksi' => array(anchor('penjualan/update/' . $q->no_transaksi, '<i class="fa fa-pencil-square-o " data-toggle="tooltip" title="Edit"></i>', 'class="btn btn-warning btn-sm"') . ' ' . anchor('penjualan/delete/' . $q->no_transaksi, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete" onclick="javasciprt: return confirm(\'Data Akan Dihapus ?\')"')),
            );
        }
        $result = array('data' => $query);
        echo json_encode($result);
    }

    public function create()
    {        
        $data['barang']=$this->db->get('barang')->result();
        $this->template->display('transaksi/penjualan/form_penjualan',$data);
    }

    public function addbarang_ajax()
    {        
        $berat=$this->input->get('berat');
        $qty=$this->input->get('qty');
        $harga=$this->input->get('harga');
        $data=array(
            'kd_detail_transaksi'=>$this->M_transaksi->kd_detail_trans(),
            'kd_barang'=>$this->input->get('kdbarang'),
            'berat_transaksi'=>$this->input->get('berat'),
            'qty_transaksi'=>$this->input->get('qty'),
            'harga_satuan'=>$this->input->get('harga'),
            'harga_total'=>$berat*$qty*$harga,
        );
        $this->db->insert('detail_transaksi',$data);
    }

    public function load_temp_barang(){
        $data= $this->M_transaksi->get_data_temp();
        foreach ($data as $q){            
            echo "
                <tr id='data$q->kd_detail_transaksi'>
                    <td>$q->kd_barang</td>
                    <td>$q->nama_barang</td>                
                    <td>$q->berat_transaksi</td>
                    <td>$q->qty_transaksi</td>
                    <td>$q->harga_satuan</td>
                    <td>$q->harga_total</td>
                    <td><a role='button' onClick='delete_temp($q->kd_detail_transaksi)' class='btn btn-sm btn-outline-danger'><i class='fa fa-trash-o'></i></a></td>
                </tr>";
        }
    }

    public function harga_jual()
    {
        $kd_barang=$this->input->get('kdbarang');
        if(!empty($kd_barang)){
            $cari=$this->M_barang->get_barang($kd_barang);
            echo $cari->harga_jual;
		}else{
			echo '';
		}
    }

    function hapus_temp() {
        $id=$this->input->get('id');
        $this->M_transaksi->hapus_temp($id);        
    }

    public function create_action() 
    {
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
                // 'harga_jual' => $this->input->post('harga_jual', TRUE),                
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
                // 'harga_jual' => set_value('harga_jual', $row->harga_jual),
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
                // 'harga_jual' => $this->input->post('harga_jual', TRUE),                
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
        // $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

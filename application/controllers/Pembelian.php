<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    function __construct() 
    {
        parent::__construct();       
        $this->load->model('M_transaksi');
        $this->load->model('M_barang');
    }

    public function index() 
    {                     
        $this->template->display('pembelian/list_pembelian');
    }

    public function view_data() {
        $no = 1;
        $getdata = $this->M_transaksi->getall_pembelian();        
        foreach ($getdata as $q) {
            $query[] = array(
                'no' => $no++,
                'no_transaksi'=>anchor('pembelian/detail/'.$q->no_transaksi,$q->no_transaksi,''),
                'tanggal' => tgl_lengkap($q->tanggal_transaksi),
                'grand_total' => rupiah($q->grand_total),
                'nama_supplier' => $q->nama_supplier,
                'keterangan' => $q->keterangan_lain,
                'user'=>$q->nama_pengguna,
                'aksi' => array(anchor('pembelian/delete/' . $q->no_transaksi, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm" data-toggle="tooltip" title="delete" onclick="javasciprt: return confirm(\'Data Akan Dihapus ?\')"')),
            );
        }
        $result = array('data' => $query);
        echo json_encode($result);
    }

    public function create()
    {   
        $data['no_nota']=$this->M_transaksi->nota_pembelian();     
        $data['supplier']=$this->db->get('supplier')->result();
        $data['barang']=$this->db->get('barang')->result();
        $this->template->display('pembelian/form_pembelian',$data);
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
            'id_user'=>$this->session->userdata('uid'),
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
                    <td>".rupiah($q->harga_satuan)."</td>
                    <td>".rupiah($q->harga_total)."</td>
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

    function hitung_total() {        
       $total= $this->M_transaksi->total_harga(); 
       if(!empty($total->jumlah_total)){
            echo $total->jumlah_total; 
       }else{
            echo '0';
       }   
         
    }

    public function transaksi() 
    {
        $this->set_rules();               
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => false, 'pesan' => validation_errors('')));        
        } else {
            $keterangan=$this->input->post('keterangan', TRUE);
            $data = array(                
                'no_transaksi' => $this->input->post('no_nota', TRUE),
                'kd_tipe_transaksi' => 'BL0001',
                'tanggal_transaksi' => tgl_db($this->input->post('tanggal', TRUE)),
                'grand_total' => $this->input->post('grand_total', TRUE),
                'kd_supplier' => $this->input->post('kd_supplier', TRUE),
                'id_user' => $this->session->userdata('uid'),                
            );
            if(!empty($keterangan)){
                $data['keterangan_lain']=$keterangan;
            }
            $no_nota=$this->input->post('no_nota', TRUE);
            $this->M_transaksi->insert($data);
            $this->M_transaksi->update_temp($no_nota); 
            echo json_encode(array("status" => true,'pesan'=>'Transaksi Anda Berhasil'));
        }
    }

    public function detail($id)
    {
        $row = $this->M_transaksi->get_by_id($id);
        if ($row) {
            $data['transaksi'] = $this->M_transaksi->getdetail_id($id);
            $data['detail'] = $this->M_transaksi->getdetail_all($id);
            $this->template->display('pembelian/detail_pembelian',$data);
        }else{
            redirect('pembelian');
        }
        
    }

    public function delete($id) {
        $row = $this->M_transaksi->get_by_id($id);
        if ($row) {
            $this->M_transaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function set_rules() { 
        $this->form_validation->set_message('is_unique', '%s Sudah Digunakan');  
        $this->form_validation->set_rules('no_nota', 'No Transaksi', 'trim|required|is_unique[transaksi.no_transaksi]');
        $this->form_validation->set_rules('kd_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('grand_total', 'Transaksi Barang', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Transaksi', 'trim|required');
        $this->form_validation->set_message('required', '%s harus diisi');       
        //$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    function kd_detail_trans() 
    {        
        $jenis = date('ymd');
        $query = $this->db->query("SELECT max(kd_detail_transaksi) as maxID FROM detail_transaksi WHERE kd_detail_transaksi LIKE '$jenis%'")->row_array();
        $idMax = $query['maxID'];
        $noUrut = (int) substr($idMax, 6, 4);
        $noUrut++;
        $newID = $jenis . sprintf("%04s", $noUrut);
        return $newID;       
    }

    function get_data_temp()
    {
        $this->db->select('b.kd_barang,b.nama_barang,d.kd_detail_transaksi,d.berat_transaksi,d.qty_transaksi,d.harga_satuan,d.harga_total');
        $this->db->from('detail_transaksi as d'); 
        $this->db->join('barang as b','b.kd_barang = d.kd_barang');
        $this->db->where('status',0);
        $this->db->order_by('kd_detail_transaksi','DESC');
        return $this->db->get()->result();  
    }

    function hapus_temp($id){
        $this->db->where('kd_detail_transaksi',$id);
        $this->db->delete('detail_transaksi');
    }

}

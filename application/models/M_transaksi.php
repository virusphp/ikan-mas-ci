<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_transaksi extends CI_Model 
{
    public $table = 'transaksi';
    public $id = 'no_transaksi';

    function getall_penjualan()
    {
        $this->db->select('t.no_transaksi,t.tanggal_transaksi,t.grand_total,t.customer,t.keterangan_lain,u.nama_pengguna');
        $this->db->from('transaksi as t');
        $this->db->join('users as u','t.id_user=u.id_user');
        $this->db->where('t.kd_tipe_transaksi','JL0001');
        $this->db->order_by('created-at','DESC');
        return $this->db->get()->result();  
    }

    function getall_pembelian()
    {
        $this->db->select('t.no_transaksi,t.tanggal_transaksi,t.grand_total,t.keterangan_lain,u.nama_pengguna,s.nama_supplier');
        $this->db->from('transaksi as t');
        $this->db->join('users as u','t.id_user=u.id_user');
        $this->db->join('supplier as s','t.kd_supplier=s.kd_supplier');
        $this->db->where('t.kd_tipe_transaksi','BL0001');
        $this->db->order_by('created-at','DESC');
        return $this->db->get()->result();  
    }

    function nota_penjualan() 
    {        
        $jenis = "TRJ".date('ymd');
        $query = $this->db->query("SELECT max(no_transaksi) as maxID FROM transaksi WHERE no_transaksi LIKE '$jenis%'")->row_array();
        $idMax = $query['maxID'];
        $noUrut = (int) substr($idMax, 9, 4);
        $noUrut++;
        $newID = $jenis . sprintf("%04s", $noUrut);
        return $newID;       
    }

    function nota_pembelian() 
    {        
        $jenis = "TRB".date('ymd');
        $query = $this->db->query("SELECT max(no_transaksi) as maxID FROM transaksi WHERE no_transaksi LIKE '$jenis%'")->row_array();
        $idMax = $query['maxID'];
        $noUrut = (int) substr($idMax, 9, 4);
        $noUrut++;
        $newID = $jenis . sprintf("%04s", $noUrut);
        return $newID;       
    }

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
        $uid=$this->session->userdata('uid');
        $this->db->select('b.kd_barang,b.nama_barang,d.kd_detail_transaksi,d.berat_transaksi,d.qty_transaksi,d.harga_satuan,d.harga_total');
        $this->db->from('detail_transaksi as d'); 
        $this->db->join('barang as b','b.kd_barang = d.kd_barang');
        $this->db->where('status',0);
        $this->db->where('id_user',$uid);
        $this->db->order_by('kd_detail_transaksi','DESC');
        return $this->db->get()->result();  
    }

    function total_harga()
    {
        $uid=$this->session->userdata('uid');
        $this->db->select('Sum(d.harga_total) AS jumlah_total');
        $this->db->from('detail_transaksi as d');         
        $this->db->where('status',0);
        $this->db->where('id_user',$uid);        
        return $this->db->get()->row();  
    }


    function hapus_temp($id)
    {
        $this->db->where('kd_detail_transaksi',$id);
        $this->db->delete('detail_transaksi');
    }

    function insert($data)
    {
        $this->db->insert('transaksi', $data);        
    }

    function update_temp($no_nota) {
        $uid=$this->session->userdata('uid');
        $data=array('no_transaksi'=>$no_nota,'status'=>1);
        $this->db->where('id_user', $uid);
        $this->db->where('status',0);
        $this->db->update('detail_transaksi', $data);
    }

     // get data by id
     function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //get transaksi detail
    function getdetail_id($id)
    {
        $this->db->select('t.no_transaksi,t.tanggal_transaksi,t.grand_total,t.customer,t.keterangan_lain,u.nama_pengguna,tp.kd_tipe_transaksi,tp.nama_transaksi');
        $this->db->from('transaksi as t');
        $this->db->join('users as u','t.id_user=u.id_user');
        $this->db->join('tipe_transaksi as tp','tp.kd_tipe_transaksi=t.kd_tipe_transaksi');
        $this->db->where($this->id,$id);
        return $this->db->get()->row();  
    }

    function getdetail_all($id)
    {        
        $this->db->select('b.kd_barang,b.nama_barang,d.kd_detail_transaksi,d.berat_transaksi,d.qty_transaksi,d.harga_satuan,d.harga_total');
        $this->db->from('detail_transaksi as d'); 
        $this->db->join('barang as b','b.kd_barang = d.kd_barang');
        $this->db->where('status',1);
        $this->db->where('no_transaksi',$id);
        $this->db->order_by('kd_detail_transaksi','DESC');
        return $this->db->get()->result();  
    }

     // delete data
     function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        $this->db->where($this->id, $id);
        $this->db->delete('detail_transaksi');
    }

}

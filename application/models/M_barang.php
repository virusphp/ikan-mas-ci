<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_barang extends CI_Model {

    public $table = 'barang as b';
    public $table_join = 'kualitas as k';
    public $id = 'kd_barang';
    public $order = 'ASC';

    function PilihKualitas()
    {              
        $result = $this->db->get('kualitas');      
        $data[''] = '- Pilih Kualitas -';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $data[$row->kd_kualitas] = $row->persentase_kualitas.' % '.$row->keterangan_kualitas;
            }
        }
        return $data;
    }

    // get all relasi
    function get_all() {
//        $this->db->order_by($this->id, $this->order);
        $this->db->select('b.kd_barang,b.nama_barang,b.satuan_barang,b.keterangan_barang,k.persentase_kualitas,k.harga_jual');
        $this->db->from($this->table);
   //     $this->db->select('presentase_kualitas,harga_jual');
    //    $this->db->from($this->table_join);
        $this->db->join($this->table_join,'k.kd_kualitas = b.kd_kualitas');
        return $this->db->get()->result();
       // return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data) 
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

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

   public function create()
   {
        $this->template->display('barang/form_barang');
   }

}

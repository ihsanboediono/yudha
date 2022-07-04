<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'base' => 'dashboard',
            'title' => 'Dashboard',
            'trs' => $this->m_transaksi->CountSelesai(),
            'pms' => $this->m_pemasok->CountPemasok(),
            'ksm' => $this->m_konsumen->CountKonsumen(),
            'brg' => $this->m_barang->CountBarang()
        ];
        $this->load->view('base/base', $data);
    }
}

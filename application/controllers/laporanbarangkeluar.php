<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'laporan/laporanbarangkeluar',
            'title' => 'Laporan Data Barang keluar',
            'brgklr' => $this->m_barangkeluar->getBarangkeluar()
        ];
        $this->load->view('base/base', $data);
    }
}

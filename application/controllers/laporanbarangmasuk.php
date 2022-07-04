<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'laporan/laporanbarangmasuk',
            'title' => 'Laporan Data Barang Masuk',
            'brgmsk' => $this->m_barangmasuk->getBarangmasuk()
        ];
        $this->load->view('base/base', $data);
    }
}

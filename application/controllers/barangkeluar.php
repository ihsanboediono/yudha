<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'barangkeluar/manage_barangkeluar',
            'title' => 'Manage Data Barang keluar',
            'brgklr' => $this->m_barangkeluar->getBarangkeluar()
        ];
        $this->load->view('base/base', $data);
    }
    public function tambah_barangkeluar()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal keluar', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'barangkeluar/tambah_barangkeluar',
                'title' => 'Tambah Data Barang keluar'
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'jumlah' => $this->input->post('jumlah', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
            ];
            $this->m_barangkeluar->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang keluar Berhasil Ditambahkan</div>');
            redirect('barangkeluar/');
        }
    }

    public function edit_barangkeluar($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'barangkeluar/edit_barangkeluar',
                'title' => 'Edit Data Barang keluar',
                'brgklr' => $this->m_barangkeluar->getBarangkeluar($id)[0]
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'jumlah' => $this->input->post('jumlah', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
            ];
            $this->m_barangkeluar->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang keluar Berhasil Diedit</div>');
            redirect('barangkeluar/');
        }
    }
    public function editbarangkeluar($id = NULL)
    {
        $data = [
            'base' => 'editBarangkeluar',
            'title' => 'Edit Data Barang keluar',
            'brgklr' => $this->m_barangkeluar->getBarangkeluar($id)
        ];
        $this->load->view('base/base', $data);
    }

    public function hapus_barangkeluar($id)
    {
        $where = array('idbarang_keluar' => $id);
        $this->m_barangkeluar->delete($where, 'barang_keluar');
        redirect('barangkeluar');
    }
}

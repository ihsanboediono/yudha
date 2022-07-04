<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'base' => 'barangmasuk/manage_barangmasuk',
            'title' => 'Manage Data Barang Masuk',
            'brgmsk' => $this->m_barangmasuk->getBarangmasuk()
        ];
        $this->load->view('base/base', $data);
    }
    public function tambah_barangmasuk()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'barangmasuk/tambah_barangmasuk',
                'title' => 'Tambah Data Barang Masuk'
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'jumlah' => $this->input->post('jumlah', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
            ];
            $this->m_barangmasuk->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Masuk Berhasil Ditambahkan</div>');
            redirect('barangmasuk/');
        }
    }

    public function edit_barangmasuk($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'barangmasuk/edit_barangmasuk',
                'title' => 'Edit Data Barang Masuk',
                'brgmsk' => $this->m_barangmasuk->getBarangmasuk($id)[0]
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'jumlah' => $this->input->post('jumlah', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
            ];
            $this->m_barangmasuk->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Masuk Berhasil Diedit</div>');
            redirect('barangmasuk/');
        }
    }
    public function editbarangmasuk($id = NULL)
    {
        $data = [
            'base' => 'editBarangmasuk',
            'title' => 'Edit Data Barang Masuk',
            'brgmsk' => $this->m_barangmasuk->getBarangmasuk($id)
        ];
        $this->load->view('base/base', $data);
    }

    public function hapus_barangmasuk($id)
    {
        $where = array('idbarang_masuk' => $id);
        $this->m_barangmasuk->delete($where, 'barang_masuk');
        redirect('barangmasuk');
    }
}

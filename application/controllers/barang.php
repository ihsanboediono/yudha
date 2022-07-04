<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'barang/manage_barang',
            'title' => 'Manage Data Barang',
            'brg' => $this->m_barang->getBarang()
        ];
        // var_dump($data['brg']);
        // die;
        $this->load->view('base/base', $data);
    }
    public function tambah_barang()
    {
        $this->form_validation->set_rules('kayu', 'Nama Kayu', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Kayu', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'barang/tambah_barang',
                'title' => 'Tambah Data Barang',
                'kayunya' => $this->m_kayu->getKayu(),
                'jenisnya' => $this->m_jenis->getjenis(),
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'kayu_id' => $this->input->post('kayu', true),
                'jenis_id' => $this->input->post('jenis', true),
                'deskripsi_barang' => $this->input->post('deskripsi', true),
                'harga' => $this->input->post('harga', true),
                'stok' => $this->input->post('stok', true),
                // 'status' => $this->input->post('status', true)
            ];
            // var_dump($data);
            // die();
            $this->m_barang->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
            redirect('barang/');
        }
    }

    public function hapus_barang($id)
    {
        $where = array('id_barang' => $id);
        $this->m_barang->delete($where, 'barang');
        redirect('barang');
    }

    public function edit_barang($id = null)
    {
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kayu', 'Nama Kayu', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Kayu', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'barang/edit_barang',
                'title' => 'Edit Data Barang',
                'brg' => $this->m_barang->getBarang($id)[0],
                'kayunya' => $this->m_kayu->getKayu(),
                'jenisnya' => $this->m_jenis->getjenis(),
            ];
            // var_dump($data['brg']);
            // die();
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'kayu_id' => $this->input->post('kayu', true),
                'jenis_id' => $this->input->post('jenis', true),
                'deskripsi_barang' => $this->input->post('deskripsi', true),
                'harga' => $this->input->post('harga', true),
                'stok' => $this->input->post('stok', true),
                // 'status' => $this->input->post('status', true)
            ];
            $this->m_barang->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Diedit</div>');
            redirect('barang/');
        }
    }


    public function getBarang($id = NULL)
    {
        $data = [
            'base' => 'editBarang',
            'title' => 'Edit Data Barang',
            'barang' => $this->m_barang->getBarang($id)
        ];
        $this->load->view('base/base', $data);
    }
}

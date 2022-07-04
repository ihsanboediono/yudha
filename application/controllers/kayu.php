<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kayu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'kayu/manage_kayu',
            'title' => 'Manage Data Kayu',
            'ky' => $this->m_kayu->getKayu()
        ];
        $this->load->view('base/base', $data);
    }
    public function tambah_kayu()
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'kayu/tambah_kayu',
                'title' => 'Tambah Data Jenis'
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama_kayu' =>  ucwords($post['nama']),
                'deskripsi_kayu' => ucfirst($post['deskripsi']) 
            ];
            $this->m_kayu->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" style="margin-buttom: 50px;" role="alert">Data Kayu Berhasil Ditambahkan</div>');
            redirect('kayu/');
        }
    }

    public function edit_kayu($id = null)
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'kayu/edit_kayu',
                'title' => 'Edit Data Kayu',
                'ky' => $this->m_kayu->getKayu($id)[0]
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama_kayu' =>  ucwords($post['nama']),
                'deskripsi_kayu' => ucfirst($post['deskripsi']) 
            ];
            $this->m_kayu->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kayu Berhasil Diedit</div>');
            redirect('kayu/');
        }
    }
    public function editJenis($id = NULL)
    {
        $data = [
            'base' => 'editJenis',
            'title' => 'Edit Data Jenis',
            'jns' => $this->m_Jenis->getJenis($id)
        ];
        $this->load->view('base/base', $data);
    }

    public function hapus_kayu($id)
    {
        $where = array('id_kayu' => $id);
        $this->m_kayu->delete($where, 'kayu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kayu Berhasil DiHapus</div>');
        redirect('kayu');
    }
}

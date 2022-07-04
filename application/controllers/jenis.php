<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'jenis/manage_jenis',
            'title' => 'Manage Data jenis',
            'jns' => $this->m_jenis->getjenis()
        ];
        $this->load->view('base/base', $data);
    }
    public function tambah_jenis()
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'jenis/tambah_jenis',
                'title' => 'Tambah Data jenis'
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama_jenis' =>  ucwords($post['nama']),
                'deskripsi_jenis' => ucfirst($post['deskripsi']) 
            ];
            $this->m_jenis->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data jenis Berhasil Ditambahkan</div>');
            redirect('jenis/');
        }
    }

    public function edit_jenis($id = null)
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_message('required', 'Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'jenis/edit_jenis',
                'title' => 'Edit Data jenis',
                'jns' => $this->m_jenis->getjenis($id)[0]
            ];
            // var_dump($data['brg']);
            // die();
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama_jenis' =>  ucwords($post['nama']),
                'deskripsi_jenis' => ucfirst($post['deskripsi']) 
            ];
            $this->m_jenis->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data jenis Berhasil Diedit</div>');
            redirect('jenis/');
        }
    }
    public function editjenis($id = NULL)
    {
        $data = [
            'base' => 'editjenis',
            'title' => 'Edit Data jenis',
            'jns' => $this->m_jenis->getjenis($id)
        ];
        $this->load->view('base/base', $data);
    }

    public function hapus_jenis($id)
    {
        $where = array('id_jenis' => $id);
        $this->m_jenis->delete($where, 'jenis');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data jenis Berhasil DiHapus</div>');
        redirect('jenis');
    }
}

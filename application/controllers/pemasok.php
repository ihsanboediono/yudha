<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'pemasok/manage_pemasok',
            'title' => 'Manage Data Pemasok',
            'pmsk' => $this->m_pemasok->getPemasok()
        ];
        $this->load->view('base/base', $data);
    }
    public function nama_check()
    {
        $data = $this->input->post(null, true);
        $where = [
            'id_pengguna !=' =>  $data['id_pengguna'],
            'nama_pengguna' => $data['nama']
        ];
        $cek = $this->m_pemasok->cek_nama($where, 'pengguna');


        if ($cek != null) {
            $this->form_validation->set_message('nama_check', '{field} sudah digunakan oleh pemasok atau konsumen lain.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function telp_check($id)
    {
        $data = $this->input->post(null, true);
        $where = [
            'id_pengguna !=' =>  $data['id_pengguna'],
            'no_telp' => $data['no_telp']
        ];

        $cek = $this->m_pemasok->cek_nama($where, 'pengguna');
        if ($cek != null) {
            $this->form_validation->set_message('telp_check', '{field} sudah digunakan oleh yang pemasok atau konsumen lain.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function tambah_pemasok()
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[pengguna.nama_pengguna]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_unique[pengguna.no_telp]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} Sudah digunakan.');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'pemasok/tambah_pemasok',
                'title' => 'Tambah Data Pemasok'
            ];
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama_pengguna' => ucwords($post['nama']),
                'alamat' => ucfirst($post['alamat']),
                'no_telp' => $post['no_telp'],
                'deskripsi_pengguna' => ucfirst($post['deskripsi']),
                'status_pengguna' => "pemasok"
            ];
            $this->m_pemasok->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
            redirect('pemasok/');
        }
    }

    public function editPemasok($id = NULL)
    {
        $data = [
            'base' => 'editPemasok',
            'title' => 'Edit Data Pemasok',
            'pmsk' => $this->m_pemasok->getPemasok($id)
        ];
        $this->load->view('base/base', $data);
    }

    public function edit_pemasok($id = null)
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_nama_check');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|callback_telp_check');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'pemasok/edit_pemasok',
                'title' => 'Edit Data Pemasok',
                'pmsk' => $this->m_pemasok->getPemasok($id)[0]
            ];
            // var_dump($data['brg']);
            // die();
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama_pengguna' => ucwords($post['nama']),
                'alamat' => ucfirst($post['alamat']),
                'no_telp' => $post['no_telp'],
                'deskripsi_pengguna' => ucfirst($post['deskripsi'])
            ];
            $this->m_pemasok->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Diedit</div>');
            redirect('pemasok/');
        }
    }

    public function hapus_pemasok($id)
    {
        $where = array('id_pengguna' => $id);
        $this->m_pemasok->delete($where, 'pengguna');
        redirect('pemasok');
    }
}

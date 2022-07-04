<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'adminn/manage_admin',
            'title' => 'Manage Data Admin',
            'adm' => $this->m_admin->getAdmin()
        ];
        // var_dump($data['brg']);
        // die;
        $this->load->view('base/base', $data);
    }
    public function edit_admin($id = null)
    {
        $post = $this->input->post(null, true);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('katasandi', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'base' => 'adminn/edit_admin',
                'title' => 'Edit Data Admin',
                'adm' => $this->m_admin->getAdmin($id)[0]
            ];
            // var_dump($data['brg']);
            // die();
            $this->load->view('base/base', $data);
        } else {
            $data = [
                'nama' => ucwords($post['nama']),
                'username' => ucfirst($post['username']),
                'katasandi' => MD5($post['katasandi'])
            ];
            $this->m_admin->update($id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Admin Berhasil Diperbarui</div>');
            redirect('adminn/');
        }
    }
}

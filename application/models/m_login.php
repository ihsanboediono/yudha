<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    // Model Login Nitip
    public function cek_login($data)
    {
        $q = $this->db->get_where('admin', ['username' => $data['user']])->row_array();
        if (count($q) != 0) {
            if (password_verify($data['pasw'], $q['katasandi'])) {
                $user = [
                    'id' => $q['id_admin'],
                    'user' => $q['username'],
                    'nama' => $q['nama']
                ];
                $this->session->set_userdata($user);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat datang di Dashboard ' . $this->session->userdata('nama') . '!</div>');
                redirect('admin');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data yang Anda masukkan salah!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tang Anda masukkan tidak terdaftar!</div>');
            redirect('login');
        }
    }
}

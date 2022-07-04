<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'base' => "profile",
            'title' => 'Profile'
        ];
        // var_dump($this->session->userdata('id'));
        // die;
        $data['user'] = $this->m_pengguna->getbyid($this->session->userdata('id'));

        $this->load->view('base/base', $data);
    }

    public function ubah()
    {
        $input = $this->input->post(null, true);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_message('required', '{field} mohon diisi.');

        if ($this->form_validation->run() == false) {
            $array = array(
                'error'   => true,
                'nama_error' => form_error('nama'),
                'user_error' => form_error('user')
            );
        } else {
            $array = $this->input->post(null, true);
            // var_dump($array);die;
            $data = [
                'nama' => $array['nama'],
                'username' => $array['user']
            ];
            if ($array['passw'] != '') {
                $data['katasandi'] = password_hash($array['passw'], PASSWORD_DEFAULT);
            }

            $this->m_pengguna->update(1, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile berhasil diubah</div>');
        }
        echo json_encode($array);
    }
    function alpha_dash_space($fullname)
    {
        if (!preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_dash_space', '%s hanya dapat berisi karakter alphabet.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

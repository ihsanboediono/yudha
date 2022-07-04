<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Naive extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'base' => 'naive/index',
            'title' => 'Dashboard',
        ];
        $this->load->view('base/base', $data);
    }
}

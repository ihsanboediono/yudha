<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Heuristic extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'base' => 'heuristic/index',
            'title' => 'Dashboard',
        ];
        $this->load->view('base/base', $data);
    }
}

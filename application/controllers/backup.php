<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->database();
    }

    public function index()
    {
        $data = [
            'base' => 'backup/backup',
            'title' => 'Backup Database',
        ];
        $this->load->view('base/base', $data);
    }

    public function backup()
    {
        $NAME = $this->db->database;
        $this->load->dbutil();
        $prefs = array(
            'format' => 'zip',
            'filename' => $NAME . '.sql'
        );
        $backup = &$this->dbutil->backup($prefs);
        $db_name = $NAME . '.zip';
        $save = '/assets/' . $db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $this->load->helper('download');
        force_download($db_name, $backup);
    }
}

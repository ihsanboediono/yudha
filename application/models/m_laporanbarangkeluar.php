<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporanbarangkeluar extends CI_Model
{
    public function getLaporanarangkeluar($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('idbarang_keluar', $id);
        }
        $lprnbrgklr = $this->db->get('barang_keluar');
        return $lprnbrgklr->result_array();
    }
}

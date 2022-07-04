<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barangkeluar extends CI_Model
{
    public function getBarangkeluar($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('idbarang_keluar', $id);
        }
        $brgklr = $this->db->get('barang_keluar');
        return $brgklr->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('barang_keluar', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('idbarang_keluar', $id);
        $this->db->update('barang_keluar', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

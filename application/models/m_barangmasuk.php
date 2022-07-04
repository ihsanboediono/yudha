<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barangmasuk extends CI_Model
{
    public function getBarangmasuk($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('idbarang_masuk', $id);
        }
        $brgmsk = $this->db->get('barang_masuk');
        return $brgmsk->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('barang_masuk', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('idbarang_masuk', $id);
        $this->db->update('barang_masuk', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

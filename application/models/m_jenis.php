<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis extends CI_Model
{
    public function getjenis($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id_jenis', $id);
        }
        $jns = $this->db->get('jenis');
        return $jns->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('jenis', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_jenis', $id);
        $this->db->update('jenis', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

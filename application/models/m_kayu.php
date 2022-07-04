<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kayu extends CI_Model
{
    public function getKayu($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id_kayu', $id);
        }
        $jns = $this->db->get('kayu');
        return $jns->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('kayu', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_kayu', $id);
        $this->db->update('kayu', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

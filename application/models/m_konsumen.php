<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsumen extends CI_Model
{
    public function getKonsumen($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id_pengguna', $id);
        }
        $this->db->where('status_pengguna', "konsumen");
        $knsmn = $this->db->get('pengguna');
        return $knsmn->result_array();
    }
    public function CountKonsumen($value='')
    {
        return $this->db->get_where('pengguna', ['status_pengguna'=>"konsumen"])->num_rows();
    }

    public function insert($data)
    {
        $this->db->insert('pengguna', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

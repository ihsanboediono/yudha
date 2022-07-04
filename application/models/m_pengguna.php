<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{


    public function getbyid($id = '')
    {
        return $this->db->get_where('admin', ['id_admin' => $id])->row_array();
    }




    public function CountPemasok($value = '')
    {
        return $this->db->get_where('admin', ['status_admin' => "pemasok"])->num_rows();
    }

    public function insert($data)
    {
        $this->db->insert('admin', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cek_nama($where = null, $tabel = NULL)
    {
        $this->db->where($where);


        $this->db->from($tabel);

        $query = $this->db->get();
        return $query->result_array();
    }
}

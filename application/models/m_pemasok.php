<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pemasok extends CI_Model
{
    public function getPemasok($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id_pengguna', $id);
        }
        $this->db->where('status_pengguna', "pemasok");
        $pmsk = $this->db->get('pengguna');
        return $pmsk->result_array();
    }
    public function CountPemasok($value = '')
    {
        return $this->db->get_where('pengguna', ['status_pengguna' => "pemasok"])->num_rows();
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

    public function cek_nama($where = null, $tabel = NULL)
    {
        $this->db->where($where);


        $this->db->from($tabel);

        $query = $this->db->get();
        return $query->result_array();
    }
}

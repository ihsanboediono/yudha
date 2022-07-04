<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    public function getBarang($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id_barang', $id);
        }
        $this->db->select('kayu.*, jenis.*, barang.*');
        $this->db->from('barang');
        $this->db->join('kayu', 'kayu.id_kayu=barang.kayu_id');
        $this->db->join('jenis', 'jenis.id_jenis=barang.jenis_id');

        $brg = $this->db->get();
        return $brg->result_array();
    }
    public function CountBarang($value = '')
    {
        return $this->db->get('barang')->num_rows();
    }

    public function insert($data)
    {
        $this->db->insert('barang', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

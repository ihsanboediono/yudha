<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function getAdmin($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('id_admin', $id);
        }
        $adm = $this->db->get('admin');
        return $adm->result_array();
    }
    public function update($id, $data)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $data);
    }
}

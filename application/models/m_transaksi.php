<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function gettransaksi($id = NULL)
    {
        $trks = $this->db->get('transaksi');
        return $trks->result_array();
    }
    public function BelumSelesai($id = NULL)
    {
        $this->db->where('status', 'belum');
        $trks = $this->db->get('transaksi');
        return $trks->row_array();
    }
    public function MasukBelumSelesai($id = NULL)
    {
        $this->db->where('status', 'belum');
        $this->db->where('type', 'masuk');
        $trks = $this->db->get('transaksi');
        return $trks->row_array();
    }
    public function KeluarBelumSelesai($id = NULL)
    {
        $this->db->where('status', 'belum');
        $this->db->where('type', 'keluar');
        $trks = $this->db->get('transaksi');
        return $trks->row_array();
    }
    public function cek($id = NULL)
    {
        $this->db->where('transaksi_id', null);
        $this->db->where('barang_id', $id);
        $trks = $this->db->get('detail');
        return $trks->row_array();
    }
    public function CountSelesai($id = NULL)
    {
        $this->db->where('status', 'selesai');
        $trks = $this->db->get('transaksi');
        return $trks->num_rows();
    }


    public function insert($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getwhere($where, $table)
    {
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function cancel($type = null)
    {
        // var_dump($type);die;
        if ($this->delete(['status' => 'belum', 'type' => $type], 'transaksi') || $this->delete(['transaksi_id' => null, 'type' => $type], 'detail')) {
            return 'success';
        }
    }

    public function perubahan($type = null)
    {
        $barang = $this->db->get_where('detail', ['transaksi_id' => null, 'type' => $type])->result_array();
        // $type = $this->BelumSelesai();
        // if ($type != null) {
        foreach ($barang as $value) {
            $gets = $this->db->get_where('barang', ['id_barang' => $value['barang_id']])->row_array();
            if ($type == "masuk") {
                $stokBaru = [
                    'stok' => (int)$gets['stok'] + (int)$value['jumlah']
                ];
            } else {
                $stokBaru = [
                    'stok' => (int)$gets['stok'] - (int)$value['jumlah']
                ];
            }
            $this->db->where('id_barang', $value['barang_id']);
            $this->db->update('barang', $stokBaru);
        }

        // }


    }
}

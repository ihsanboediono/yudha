<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_detail extends CI_Model
{
    public function getDetail()
    {
        $post = $this->input->post();
        $this->db->order_by('waktu_transaksi', 'DESC');
        if (isset($post['cek'])) {
            // var_dump($post['awal']);die;
            $this->db->where('transaksi.waktu_transaksi >=', $post['awal']);
            $this->db->where('transaksi.waktu_transaksi <=', $post['akhir']);
        }
        $this->db->where('transaksi.status', "selesai");
        $this->db->select(' pengguna.nama_pengguna, transaksi.*');
        $this->db->from('transaksi');
        $this->db->join('pengguna', 'transaksi.kepada=pengguna.id_pengguna');
        $trks = $this->db->get();
        return $trks->result_array();
    }
    public function getCetak($id = null)
    {

        $this->db->where('transaksi.id_transaksi', $id);
        $this->db->where('transaksi.status', "selesai");
        $this->db->select('kayu.nama_kayu, jenis.nama_jenis, barang.*, detail.*, pengguna.nama_pengguna, transaksi.type, transaksi.waktu_transaksi');
        $this->db->from('detail');
        $this->db->join('transaksi', 'detail.transaksi_id=transaksi.id_transaksi');
        $this->db->join('pengguna', 'transaksi.kepada=pengguna.id_pengguna');
        $this->db->join('barang', 'detail.barang_id=barang.id_barang');
        $this->db->join('kayu', 'kayu.id_kayu=barang.kayu_id');
        $this->db->join('jenis', 'jenis.id_jenis=barang.jenis_id');
        $trks = $this->db->get();
        return $trks->result_array();
    }
    public function getDetailMasuk()
    {
        $post = $this->input->post();
        if (isset($post['cek'])) {
            // var_dump($post['awal']);die;
            $this->db->where('transaksi.waktu_transaksi >=', $post['awal']);
            $this->db->where('transaksi.waktu_transaksi <=', $post['akhir']);
        }
        $this->db->where('transaksi.type', "masuk");
        $this->db->where('transaksi.status', "selesai");
        $this->db->select('kayu.nama_kayu, jenis.nama_jenis, barang.*, detail.*, pengguna.nama_pengguna, transaksi.type, transaksi.waktu_transaksi');
        $this->db->from('detail');
        $this->db->join('transaksi', 'detail.transaksi_id=transaksi.id_transaksi');
        $this->db->join('pengguna', 'transaksi.kepada=pengguna.id_pengguna');
        $this->db->join('barang', 'detail.barang_id=barang.id_barang');
        $this->db->join('kayu', 'kayu.id_kayu=barang.kayu_id');
        $this->db->join('jenis', 'jenis.id_jenis=barang.jenis_id');
        $trks = $this->db->get();
        return $trks->result_array();
    }
    public function getDetailKeluar()
    {
        $post = $this->input->post();
        if (isset($post['cek'])) {
            // var_dump($post['awal']);die;
            $this->db->where('transaksi.waktu_transaksi >=', $post['awal']);
            $this->db->where('transaksi.waktu_transaksi <=', $post['akhir']);
        }
        $this->db->where('transaksi.type', "keluar");
        $this->db->where('transaksi.status', "selesai");
        $this->db->select('kayu.nama_kayu, jenis.nama_jenis, barang.*, detail.*, pengguna.nama_pengguna, transaksi.type, transaksi.waktu_transaksi');
        $this->db->from('detail');
        $this->db->join('transaksi', 'detail.transaksi_id=transaksi.id_transaksi');
        $this->db->join('pengguna', 'transaksi.kepada=pengguna.id_pengguna');
        $this->db->join('barang', 'detail.barang_id=barang.id_barang');
        $this->db->join('kayu', 'kayu.id_kayu=barang.kayu_id');
        $this->db->join('jenis', 'jenis.id_jenis=barang.jenis_id');
        $trks = $this->db->get();
        return $trks->result_array();
    }

    public function countDetail($id = null)
    {
        $this->db->where('transaksi_id', $id == null ? null : $id);
        $this->db->select('SUM(total) as total, SUM(jumlah) as jumlah');
        $trks = $this->db->get('detail');
        return $trks->row_array();
    }
    public function MasukcountDetail($id = null)
    {
        $this->db->where('type', 'masuk');
        $this->db->where('transaksi_id', $id == null ? null : $id);
        $this->db->select('SUM(total) as total, SUM(jumlah) as jumlah');
        $trks = $this->db->get('detail');
        return $trks->row_array();
    }
    public function KeluarcountDetail($id = null)
    {
        $this->db->where('type', 'keluar');
        $this->db->where('transaksi_id', $id == null ? null : $id);
        $this->db->select('SUM(total) as total, SUM(jumlah) as jumlah');
        $trks = $this->db->get('detail');
        return $trks->row_array();
    }

    public function MasukdetailTransaksi($id = null)
    {
        $this->db->where('detail.transaksi_id', $id);
        $this->db->where('detail.type', "masuk");
        $this->db->select('kayu.nama_kayu, jenis.nama_jenis, barang.*, detail.*');
        $this->db->from('detail');
        $this->db->join('barang', 'detail.barang_id=barang.id_barang');
        $this->db->join('kayu', 'kayu.id_kayu=barang.kayu_id');
        $this->db->join('jenis', 'jenis.id_jenis=barang.jenis_id');
        $trks = $this->db->get();
        return $trks->result_array();
    }
    public function KeluardetailTransaksi($id = null)
    {
        $this->db->where('detail.type', "keluar");
        $this->db->where('detail.transaksi_id', $id);
        $this->db->select('kayu.nama_kayu, jenis.nama_jenis, barang.*, detail.*');
        $this->db->from('detail');
        $this->db->join('barang', 'detail.barang_id=barang.id_barang');
        $this->db->join('kayu', 'kayu.id_kayu=barang.kayu_id');
        $this->db->join('jenis', 'jenis.id_jenis=barang.jenis_id');
        $trks = $this->db->get();
        return $trks->result_array();
    }




    public function BelumSelesai($id = NULL)
    {
        $this->db->where('status', 'belum');
        $trks = $this->db->get('detail');
        return $trks->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('detail', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_detail', $id);
        $this->db->update('detail', $data);
    }
    public function update2($id, $data)
    {
        $this->db->where($id);
        $this->db->update('detail', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }
    public function index()
    {
        $data = [
            'base' => 'transaksi/transaksi',
            'title' => 'Transaksi',
            'transaksi' => $this->m_transaksi->BelumSelesai(),
            'pemasoknya' => $this->m_pemasok->getPemasok(),
            'konsumennya' => $this->m_konsumen->getKonsumen(),
            'barangnya' => $this->m_barang->getBarang(),
            'details' => $this->m_detail->detailTransaksi(),
            'total' => $this->m_detail->countDetail()
        ];
        // var_dump($data['total']);die;
        $post = $this->input->post(null, true);
        if (isset($post['transaksi'])) {
            $this->form_validation->set_rules('kepada', 'Produsen atau Konsumen', 'required');
            $this->form_validation->set_rules('type', 'Tipe', 'required');
            $this->form_validation->set_message('required', '%s Tidak boleh kosong');
        } elseif (isset($post['tambahbarang'])) {
            $barang = $this->m_barang->getBarang($post['barang'])[0];

            $this->form_validation->set_rules('barang', 'Barang', 'required');
            if ($data['transaksi']['type'] == 'keluar') {
                $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|less_than_equal_to[' . $barang['stok'] . ']');
            } elseif ($data['transaksi']['type'] == 'masuk') {
                $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
            }
            $this->form_validation->set_message('required', '%s Tidak boleh kosong');
            $this->form_validation->set_message('less_than_equal_to', '%s Tidak boleh lebih dari ' . $barang['stok'] . '!');
        }
        if ($this->form_validation->run() == FALSE) {
            // var_dump($data['transaksi']);die;

            $this->load->view('base/base', $data);
        } else {
            if (isset($post['transaksi'])) {
                $data = [
                    'kepada' => $post['kepada'],
                    'type' => $post['type'],
                    'status' => "belum",
                ];
                $this->m_transaksi->insert($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Transaksi Berhasil Ditambahkan</div>');
            } elseif (isset($post['tambahbarang'])) {
                $barang = $this->m_barang->getBarang($post['barang'])[0];
                $cek = $this->m_transaksi->cek($post['barang']);
                if ($cek == null) {
                    $data1 = [
                        'barang_id' => $post['barang'],
                        'jumlah' => $post['jumlah'],
                        'total' => (int)$post['jumlah'] * (int)$barang['harga'],
                    ];
                    $this->m_detail->insert($data1);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
                } else {
                    $jumlah = (int)$post['jumlah'] + (int)$cek['jumlah'];
                    if ($jumlah < $barang['stok']) {
                        $data2 = [
                            'jumlah' => $jumlah,
                            'total' => $jumlah * (int)$barang['harga'],
                        ];
                        $this->m_detail->update($cek['id_detail'], $data2);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
                        // code...
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Jumlah barang yang di pesan melebihi stok</div>');
                    }
                }
            }
            redirect('transaksi/');
        }
    }
    public function selesai($type = null)
    {
        if ($type == null) {
            redirect('transaksi/masuk');
        }
        if ($type == 'masuk') {
            $transaksi = $this->m_transaksi->MasukBelumSelesai();
        } else {
            $transaksi = $this->m_transaksi->KeluarBelumSelesai();
        }
        $post = $this->input->post();
        // var_dump($post['kembalian']);die;
        $this->form_validation->set_rules('kepada', $type == 'masuk' ? 'Pemasok' : 'Konsumen', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('kembalian', 'Kembalian', 'required');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');
        if ($this->form_validation->run() == FALSE) {
            // var_dump(form_error('nominal'));die;
            if (form_error('kepada') != "") {
                $this->session->set_flashdata('kepada', '<small class="text-danger">' . form_error('kepada') . '</small>');
            }
            if (form_error('nominal') != "") {
                $this->session->set_flashdata('nominal', '<small class="text-danger">' . form_error('nominal') . '</small>');
            }
            if (form_error('kembalian') != "") {
                $this->session->set_flashdata('kembalian', '<small class="text-danger">' . form_error('nominal') . '</small>');
            }
            $this->session->set_flashdata('old_kepada', $post['kepada']);
            $this->session->set_flashdata('old_nominal', $post['nominal']);
            $this->session->set_flashdata('old_kembalian', $post['kembalian']);
            redirect('transaksi/' . $type);
        } else {
            $data = [
                'jumlah' => $post['jumlah'],
                'total' => $post['total'],
                'status' => 'selesai',
                'nominal' => $post['data1'],
                'kembalian' => $post['data2'],
                'keterangan' => $post['ket'],
                'kepada' => $post['kepada'],
                'type' => $type
            ];
            // var_dump($data);
            // die;

            $this->m_transaksi->perubahan($type);


            $this->m_transaksi->insert($data);

            $new = $this->m_transaksi->getwhere($data, 'transaksi');

            $data2 = [
                'transaksi_id' => $new[0]['id_transaksi']
            ];
            // var_dump($new[0]['id_transaksi']);die;

            $this->m_detail->update2(['transaksi_id' => null, 'type' => $type], $data2);
            redirect('laporan/');
        }
    }


    public function hapus_transaksi($id)
    {
        $where = array('id_transaksi' => $id);
        $this->m_transaksi->delete($where, 'transaksi');
        redirect('transaksi');
    }
    public function barang_hapus($id, $type)
    {
        $where = array('id_detail' => $id);
        $this->m_transaksi->delete($where, 'detail');
        redirect('transaksi/' . $type);
    }
    public function cancel($value = '')
    {
        if ($this->m_transaksi->cancel($value) == "success") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">berhasil membatalkan transaksi</div>');
            redirect('transaksi');
        } else {
            redirect('transaksi');
        }
    }

    public function masuk()
    {
        $data = [
            'base' => 'transaksi/masuk',
            'title' => 'Transaksi',
            'transaksi' => $this->m_transaksi->MasukBelumSelesai(),
            'pemasoknya' => $this->m_pemasok->getPemasok(),
            'barangnya' => $this->m_barang->getBarang(),
            'details' => $this->m_detail->MasukdetailTransaksi(),
            'total' => $this->m_detail->MasukcountDetail()
        ];
        // var_dump($data['total']);die;
        $post = $this->input->post(null, true);
        if (isset($post['tambahbarang'])) {
            $barang = $this->m_barang->getBarang($post['barang'])[0];
        }

        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if (isset($post['tambahbarang'])) {
            $this->form_validation->set_message('less_than_equal_to', '%s Tidak boleh lebih dari ' . $barang['stok'] . '!');
        }
        if ($this->form_validation->run() == FALSE) {
            // var_dump($data['transaksi']);die;

            $this->load->view('base/base', $data);
        } else {

            if (isset($post['tambahbarang'])) {
                $barang = $this->m_barang->getBarang($post['barang'])[0];
                $cek = $this->m_transaksi->cek($post['barang']);
                if ($cek == null) {
                    $data1 = [
                        'barang_id' => $post['barang'],
                        'jumlah' => $post['jumlah'],
                        'total' => (int)$post['jumlah'] * (int)$barang['harga'],
                        'type' => 'masuk'
                    ];
                    $this->m_detail->insert($data1);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
                } else {
                    $jumlah = (int)$post['jumlah'] + (int)$cek['jumlah'];
                    if ($jumlah < $barang['stok']) {
                        $data2 = [
                            'jumlah' => $jumlah,
                            'total' => $jumlah * (int)$barang['harga'],
                            'type' => 'masuk'
                        ];
                        $this->m_detail->update($cek['id_detail'], $data2);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
                        // code...
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Jumlah barang yang di pesan melebihi stok</div>');
                    }
                }
            }


            redirect('transaksi/masuk');
        }
    }
    public function keluar()
    {
        $data = [
            'base' => 'transaksi/keluar',
            'title' => 'Transaksi',
            'transaksi' => $this->m_transaksi->KeluarBelumSelesai(),
            'konsumennya' => $this->m_konsumen->getKonsumen(),
            'barangnya' => $this->m_barang->getBarang(),
            'details' => $this->m_detail->KeluardetailTransaksi(),
            'total' => $this->m_detail->KeluarcountDetail()
        ];
        $post = $this->input->post(null, true);
        if (isset($post['tambahbarang'])) {
            $barang = $this->m_barang->getBarang($post['barang'])[0];
        }

        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_message('required', '%s Tidak boleh kosong');

        if (isset($post['tambahbarang'])) {
            $this->form_validation->set_message('less_than_equal_to', '%s Tidak boleh lebih dari ' . $barang['stok'] . '!');
        }
        if ($this->form_validation->run() == FALSE) {
            // var_dump($data['transaksi']);die;

            $this->load->view('base/base', $data);
        } else {

            if (isset($post['tambahbarang'])) {
                $barang = $this->m_barang->getBarang($post['barang'])[0];
                $cek = $this->m_transaksi->cek($post['barang']);
                if ($cek == null) {
                    $data1 = [
                        'barang_id' => $post['barang'],
                        'jumlah' => $post['jumlah'],
                        'total' => (int)$post['jumlah'] * (int)$barang['harga'],
                        'type' => 'keluar'
                    ];
                    $this->m_detail->insert($data1);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
                } else {
                    $jumlah = (int)$post['jumlah'] + (int)$cek['jumlah'];
                    if ($jumlah < $barang['stok']) {
                        $data2 = [
                            'jumlah' => $jumlah,
                            'total' => $jumlah * (int)$barang['harga'],
                            'type' => 'keluar'
                        ];
                        $this->m_detail->update($cek['id_detail'], $data2);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Barang Berhasil Ditambahkan</div>');
                        // code...
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Jumlah barang yang di pesan melebihi stok</div>');
                    }
                }
            }


            redirect('transaksi/keluar');
        }
    }
}

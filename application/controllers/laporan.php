<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;



class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $post = $this->input->post();
        $data = [
            'base' => 'laporan/laporan_transaksi',
            'title' => 'Laporan Transaksi',
            // 'transaksinya' => $this->m_detail->getDetail()
        ];

        $data['transaksinya'] = $this->m_detail->getDetail();

        $this->load->view('base/base', $data);
    }
    public function masuk()
    {
        $data = [
            'base' => 'laporan/laporanbarangmasuk',
            'title' => 'Laporan Barang Masuk',
            'brgmsk' => $this->m_detail->getDetailMasuk()
        ];
        $this->load->view('base/base', $data);
    }
    public function keluar()
    {
        $data = [
            'base' => 'laporan/laporanbarangkeluar',
            'title' => 'Laporan Barang keluar',
            'brgklr' => $this->m_detail->getDetailKeluar()
        ];
        $this->load->view('base/base', $data);
    }

    function proses()
	{
        
		$config['upload_path']          = './assets/excel/';
		$config['allowed_types']        = 'xlsx|xls|csv';
		//$config['file_name']            = $this->$data['image'];
		$config['overwrite']			= false;
		$config['max_size']             = 3024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('excel')) {
			return $this->upload->data("file_name");
		}else{
            return null;
        }
	}
    
    public function laporan_input()
    {
        if ($_FILES['excel']['name'] != '') {
            $upload = $this->proses();
            // var_dump($upload);
            // die;
            if ($upload != null) {
                $path_xlsx = './assets/excel/'.$upload;
                $reader = new Xlsx();
                $spreadsheet = $reader->load($path_xlsx);
                $d = $spreadsheet->getSheet(0)->toArray();
                // var_dump($d);
                // die;
                unset($d[0]);
                $datas = array();
                foreach ($d as $t) {
                    
                    $data["nama_obat"] = $t[1];
                    $data["jumlah"] = $t[2];
                    $data["total"] = $t[3];
                    $data["waktu_transaksi"] = date('Y-m-d', strtotime($t[4])) ;
                    array_push($datas,$data);
                }
                // $result = $this->Mdl_product->add_data($datas);
                $result = $this->db->insert_batch("transaksi", $datas);
                if($result){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
                    redirect('laporan/');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Ditambahkan. mohon periksa data anda</div>');
                    redirect('laporan/');
                }
            }
        }
    }
    public function cetak($id = null)
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Transaksi';
        $this->data['transaksi'] = $this->m_transaksi->gettransaksi($id)[0];
        $this->data['detals'] = $this->m_detail->getCetak($id);
        $this->data['total'] = $this->m_detail->countDetail($id);
        // var_dump($this->data['transaksi']);
        // die;

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan_Transaksi';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('pdf', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}

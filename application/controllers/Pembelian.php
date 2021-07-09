<?php

use Dompdf\Dompdf;

class Pembelian extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_baku', 'm_baku');
		$this->load->model('M_pembelian', 'm_pembelian');
		$this->load->model('M_detail_pembelian', 'm_detail_pembelian');
		$this->data['aktif'] = 'pembelian';
	}

	public function index(){
		$this->data['title'] = 'Data Pembelian';
		$this->data['all_pembelian'] = $this->m_pembelian->lihat();
		$this->data['total_pembeliansum'] = $this->m_pembelian->pembeliansum();
		$this->data['total_pembeliansumperday'] = $this->m_pembelian->pembeliansumperday();
		$this->data['jumlahperday'] = $this->m_pembelian->jumlahperday();

		$this->load->view('pembelian/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Pembelian';
		$this->data['all_baku'] = $this->m_baku->lihat_stok();

		$this->load->view('pembelian/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_baku_dibeli = count($this->input->post('nama_baku_hidden'));
		
		$data_pembelian = [
			'no_pembelian' => $this->input->post('no_pembelian'),
			'nama_kasir' => $this->input->post('nama_kasir'),
			'tgl_pembelian' => $this->input->post('tgl_pembelian'),
			'jam_pembelian' => $this->input->post('jam_pembelian'),
			'total' => $this->input->post('total_hidden'),
		];

		$data_detail_pembelian = [];

		for ($i=0; $i < $jumlah_baku_dibeli ; $i++) { 
			array_push($data_detail_pembelian, ['nama_baku' => $this->input->post('nama_baku_hidden')[$i]]);
			$data_detail_pembelian[$i]['no_pembelian'] = $this->input->post('no_pembelian');
			$data_detail_pembelian[$i]['harga_baku'] = $this->input->post('harga_baku_hidden')[$i];
			$data_detail_pembelian[$i]['jumlah_baku'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_pembelian[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_pembelian[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}

		if($this->m_pembelian->tambah($data_pembelian) && $this->m_detail_pembelian->tambah($data_detail_pembelian)){
			for ($i=0; $i < $jumlah_baku_dibeli ; $i++) { 
				$this->m_baku->min_stok($data_detail_pembelian[$i]['jumlah_baku'], $data_detail_pembelian[$i]['nama_baku']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('pembelian');
		} else {
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('pembelian');
		}
	}

	public function detail($no_pembelian){
		$this->data['title'] = 'Detail Pembelian';
		$this->data['pembelian'] = $this->m_pembelian->lihat_no_pembelian($no_pembelian);
		$this->data['all_detail_pembelian'] = $this->m_detail_pembelian->lihat_no_pembelian($no_pembelian);
		$this->data['no'] = 1;

		$this->load->view('pembelian/detail', $this->data);
	}

	public function hapus($no_pembelian){
		if($this->m_pembelian->hapus($no_pembelian) && $this->m_detail_pembelian->hapus($no_pembelian)){
			$this->session->set_flashdata('success', 'Invoice Penjualan <strong>Berhasil</strong> Dihapus!');
			redirect('pembelian');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penjualan <strong>Gagal</strong> Dihapus!');
			redirect('pembelian');
		}
	}


	public function get_all_baku(){
		$data = $this->m_baku->lihat_nama_baku($_POST['nama_baku']);
		echo json_encode($data);
	}

	public function keranjang_baku(){
		$this->load->view('pembelian/keranjang');
	}


	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_pembelian'] = $this->m_pembelian->lihat();
		$this->data['title'] = 'Laporan Data Pembelian';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pembelian/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pembelian Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_pembelian){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['pembelian'] = $this->m_pembelian->lihat_no_pembelian($no_pembelian);
		$this->data['all_detail_pembelian'] = $this->m_detail_pembelian->lihat_no_pembelian($no_pembelian);
		$this->data['title'] = 'Laporan Detail Pembelian';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pembelian/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Pembelian Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
	
}
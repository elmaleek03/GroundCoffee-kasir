<?php

use Dompdf\Dompdf;

class Baku extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'baku';
		$this->load->model('M_baku', 'm_baku');
	}

	public function index(){
		$this->data['title'] = 'Data Bahan Baku';
		$this->data['all_baku'] = $this->m_baku->lihat();
		$this->data['no'] = 1;

		$this->load->view('baku/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('penjualan');
		}

		$this->data['title'] = 'Tambah Baku';

		$this->load->view('baku/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('penjualan');
		}

		$data = [
			'kode_baku' => $this->input->post('kode_baku'),
			'nama_baku' => $this->input->post('nama_baku'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
		];

		if($this->m_baku->tambah($data)){
			$this->session->set_flashdata('success', 'Data Bahan Baku <strong>Berhasil</strong> Ditambahkan!');
			redirect('baku');
		} else {
			$this->session->set_flashdata('error', 'Data Bahan Baku <strong>Gagal</strong> Ditambahkan!');
			redirect('baku');
		}
	}

	public function ubah($kode_baku){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('penjualan');
		}

		$this->data['title'] = 'Ubah Baku';
		$this->data['baku'] = $this->m_baku->lihat_id($kode_baku);

		$this->load->view('baku/ubah', $this->data);
	}

	public function proses_ubah($kode_baku){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('penjualan');
		}

		$data = [
			'kode_baku' => $this->input->post('kode_baku'),
			'nama_baku' => $this->input->post('nama_baku'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
		];

		if($this->m_baku->ubah($data, $kode_baku)){
			$this->session->set_flashdata('success', 'Data Bahan Baku <strong>Berhasil</strong> Diubah!');
			redirect('baku');
		} else {
			$this->session->set_flashdata('error', 'Data Bahan Baku <strong>Gagal</strong> Diubah!');
			redirect('baku');
		}
	}

	public function hapus($kode_baku){
		if ($this->session->login['role'] == 'kasir'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('penjualan');
		}
		
		if($this->m_baku->hapus($kode_baku)){
			$this->session->set_flashdata('success', 'Data Bahan Baku <strong>Berhasil</strong> Dihapus!');
			redirect('baku');
		} else {
			$this->session->set_flashdata('error', 'Data Bahan Baku <strong>Gagal</strong> Dihapus!');
			redirect('baku');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_baku'] = $this->m_baku->lihat();
		$this->data['title'] = 'Laporan Data Bahan Baku';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('baku/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Bahan Baku Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}
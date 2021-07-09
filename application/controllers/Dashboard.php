<?php

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'kasir' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_baku', 'm_baku');
		$this->load->model('M_kasir', 'm_kasir');
		$this->load->model('M_penjualan', 'm_penjualan');
		$this->load->model('M_pembelian', 'm_pembelian');
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_toko', 'm_toko');
	}
	public function index(){
		$this->data['title'] = 'Dashboard Ground Coffee';
		$this->data['jumlah_barang'] = $this->m_barang->jumlah();
		$this->data['jumlah_baku'] = $this->m_baku->jumlah();
		$this->data['jumlah_kasir'] = $this->m_kasir->jumlah();
		$this->data['total_penjualan'] = $this->m_penjualan->jumlah();
		$this->data['total_penjualanperday'] = $this->m_penjualan->jumlahperday();
		$this->data['total_pembelian'] = $this->m_pembelian->jumlah();
		$this->data['total_pembelianperday'] = $this->m_pembelian->jumlahperday();
		$this->data['total_pembeliansumperday'] = $this->m_pembelian->pembeliansumperday();
		$this->data['total_pembeliansum'] = $this->m_pembelian->pembeliansum();
		$this->data['total_penjualansumperday'] = $this->m_penjualan->penjualansumperday();
		$this->data['total_penjualansum'] = $this->m_penjualan->penjualansum();
		$this->data['jumlah_pengguna'] = $this->m_pengguna->jumlah();
		$this->data['toko'] = $this->m_toko->lihat();
		$this->load->view('dashboard', $this->data);
	}
}
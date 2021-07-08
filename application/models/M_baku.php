<?php

class M_baku extends CI_Model{
	protected $_table = 'baku';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok(){
		$query = $this->db->get_where($this->_table, 'stok > 0');
		return $query->result();
	}

	public function lihat_id($kode_baku){
		$query = $this->db->get_where($this->_table, ['kode_baku' => $kode_baku]);
		return $query->row();
	}

	public function lihat_nama_baku($nama_baku){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_baku' => $nama_baku]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function min_stok($stok, $nama_baku){
		$query = $this->db->set('stok', 'stok+' . $stok, false);
		$query = $this->db->where('nama_baku', $nama_baku);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $kode_baku){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_baku' => $kode_baku]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_baku){
		return $this->db->delete($this->_table, ['kode_baku' => $kode_baku]);
	}
}
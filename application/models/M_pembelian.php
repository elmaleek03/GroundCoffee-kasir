<?php

class M_pembelian extends CI_Model {
	protected $_table = 'pembelian';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function jumlahperday(){
		$sql = "SELECT count(*) as jumlah FROM pembelian WHERE DATE(`tgl_pembelian`) = CURDATE()";
		$result = $this->db->query($sql);
		return $result->row()->jumlah;
	}

	public function lihat_no_pembelian($no_pembelian){
		return $this->db->get_where($this->_table, ['no_pembelian' => $no_pembelian])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_pembelian){
		return $this->db->delete($this->_table, ['no_pembelian' => $no_pembelian]);
	}

	public function pembeliansum(){
		$sql = "SELECT sum(total) as total FROM pembelian";
		$result = $this->db->query($sql);
		return $result->row()->total;
	}

	public function pembeliansumperday(){
		$sql = "SELECT sum(total) as total FROM pembelian WHERE DATE(`tgl_pembelian`) = CURDATE()";
		$result = $this->db->query($sql);
		return $result->row()->total;
}

}

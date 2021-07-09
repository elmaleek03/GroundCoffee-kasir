<?php

class M_penjualan extends CI_Model {
	protected $_table = 'penjualan';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function jumlahperday(){
		$sql = "SELECT count(*) as jumlah FROM penjualan WHERE DATE(`tgl_penjualan`) = CURDATE()";
		$result = $this->db->query($sql);
		return $result->row()->jumlah;
	}

	public function lihat_no_penjualan($no_penjualan){
		return $this->db->get_where($this->_table, ['no_penjualan' => $no_penjualan])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_penjualan){
		return $this->db->delete($this->_table, ['no_penjualan' => $no_penjualan]);
	}

	public function penjualansum(){
		$sql = "SELECT sum(total) as total FROM penjualan";
		$result = $this->db->query($sql);
		return $result->row()->total;
	}

	public function penjualansumperday(){
		$sql = "SELECT sum(total) as total FROM penjualan WHERE DATE(`tgl_penjualan`) = CURDATE()";
		$result = $this->db->query($sql);
		return $result->row()->total;
	}

}
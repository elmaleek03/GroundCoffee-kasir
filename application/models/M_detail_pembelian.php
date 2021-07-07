<?php

class M_detail_pembelian extends CI_Model {
	protected $_table = 'detail_pembelian';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_pembelian($no_pembelian){
		return $this->db->get_where($this->_table, ['no_pembelian' => $no_pembelian])->result();
	}

	public function hapus($no_pembelian){
		return $this->db->delete($this->_table, ['no_pembelian' => $no_pembelian]);
	}
}
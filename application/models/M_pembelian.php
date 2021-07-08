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

	public function lihat_no_pembelian($no_pembelian){
		return $this->db->get_where($this->_table, ['no_pembelian' => $no_pembelian])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_pembelian){
		return $this->db->delete($this->_table, ['no_pembelian' => $no_pembelian]);
	}

public function hitung_total_pembelian()
{
   $this->db->select_sum('total');
   $query = $this->db->get('pembelian');
     return 0;
   }
}

<?php
	
	class Mahasiswa_model extends CI_model{
		public function getAllMahasiswa(){
			// get() untuk SELECT * FROM tbl_mahasiswa
			$query = $this->db->get("tbl_mahasiswa");
			// fetch data yang banyak result_array() / result()
			return $query->result();
		}
	}
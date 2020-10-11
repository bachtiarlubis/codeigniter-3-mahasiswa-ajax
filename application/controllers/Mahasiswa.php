<?php 
	
	class Mahasiswa extends CI_Controller{
		public function __construct(){
			parent::__construct();
			// $this->load->helper("url");
			// load model
			$this->load->model("Mahasiswa_model");
			$this->load->model("Jurusan_model");
		}

		public function index(){
			$data = [
				"judul" => "Halaman Mahasiswa",
				"mahasiswa" => $this->Mahasiswa_model->getAllMahasiswa(),
				"jurusan" => $this->Jurusan_model->getAllJurusan()
			];
			
			$this->load->view("templates/header", $data);
			$this->load->view("mahasiswa/index");
			$this->load->view("templates/footer");
		}

		public function detail($id){

			$data = [
				'judul' => 'Detail Mahasiswa',
				'mahasiswa' => $this->Mahasiswa_model->getMahasiswaById($id)
			];

			$this->load->view("templates/header", $data);
			$this->load->view("mahasiswa/detail");
			$this->load->view("templates/footer");
		}

		public function cari(){
			$keywoard = $this->input->post('keywoard');
			$data = [
				"judul" => "Daftar Mahasiswa",
				"mahasiswa" => $this->Mahasiswa_model->getMahasiswaByName($keywoard),
				"jurusan" => $this->Jurusan_model->getAllJurusan()
			];

			$this->load->view("templates/header", $data);
			$this->load->view("mahasiswa/index");
			$this->load->view("templates/footer");
		}

		public function tambah(){

			if ($this->Mahasiswa_model->tambahDataMahasiswa($_POST) !== false) {
				// redirect ke method index()
				header("location:".base_url("mahasiswa/index"));
			}else{
				// alert it we failed
			}
		}

		public function hapus(){
			$id = $this->input->post('id_mhs');
			if ($this->Mahasiswa_model->hapusDataMahasiswa($id) !== false) {
				// redirect ke method index()
				header("location:".base_url("mahasiswa/index"));
			}else{
				// alert it we failed
			}
		}
	}
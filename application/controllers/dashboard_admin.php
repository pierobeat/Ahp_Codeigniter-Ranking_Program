<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_admin extends CI_Controller {

	function __construct() {
        parent::__construct();
				$this->load->helper('url');
				$this->load->helper('form');
				$this->load->Model('Absen');
				$this->load->Model('Manager');
				$this->load->Model('Kriteria');
				$this->load->Model('Analisis_kriteria');
				$this->load->Model('Ankrit');
				$this->load->Model('Detkar');
				if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		}

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function Indikator()
	{
			$data['data_kriteria']=$this->Absen->get_asc();
			$this->load->view('admin/indikator',$data);
	}

	public function kriteria()
	{
		$data2['data_kriteria']=$this->Absen->get_data();
		$this->load->view('admin/kriteria',$data2);
	}

	public function tabelAnalisa()
	{
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('admin/Analisis_kriteria',$datb);
	}

	public function showTabel()
	{
		$cleT = $this->Ankrit->clearTB();
		$crit = $_POST['C'];
		$opt = $_POST['W'];
		$crib = $_POST['X'];
		foreach ($crit as $key => $vl) {
			$data = array(
				'kriteria_x'=>$vl,
				'nilai_krit'=>$opt[$key],
				'kriteria_y'=>$crib[$key]
			);
			$insert = $this->Ankrit->insertArray($data);
		}
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('admin/calculate-table',$datb);
	}

	// updateNIKR
		public function updateNiKr()
		{
			$idkr = $_POST['id_kriteria'];
			$nakr = $_POST['hasil'];
			foreach ($idkr as $ide => $al) {
				$datc = array(
					'jumlah_kriteria' => $nakr[$ide],
				);
				$this->Kriteria->updateKrit(array('id_kriteria'=>$al),$datc);
			}
			$datb['tabel'] = $this->Ankrit->get_data();
			$this->load->view('admin/calculate-table',$datb);
		}

		public function Calon()
		{
			$data['karyawan']=$this->Manager->getDataTableKaryawan()->result();
			$this->load->view('admin/data-rs-man',$data);
		}

		public function Addperson()
		{
			$data['data']=$this->Manager->getIDBaru();
			$this->load->view('admin/tambah-orang',$data);
		}

		public function insertKaryawan()
		{
			$id = $this->input->post('id_karyawan');
			$nama = $this->input->post('nama_karyawan');
			$nil = 0;
			$data = array(
				'id_karyawan' => $id,
				'nama_karyawan' => $nama,
			 );
			 $insert=$this->Manager->insertKaryawan($data);
			 redirect('dashboard_admin/Calon');
		}

		public function rank($value)
		{
			$data['nilK']=$this->Manager->get_id($value);
			$this->load->view('admin/nilai-karyawan-man',$data);
		}

		public function rankn($value)
		{
			$data['nilK']=$this->Manager->get_id($value);
			$this->load->view('admin/nilai-karyawan-man',$data);
		}

		public function UpdateNilai()
		{
			$idQ = $this->input->post('idqar');
			$this->Detkar->deltabID($idQ);
			$cRQ = $_POST['C'];
			$nLQ = $_POST['KR'];
			$niQ = $this->input->post('total');
			$data = array(
				'nilai'=>$niQ,
			);
			$update=$this->Manager->updateMan(array('id_karyawan'=>$idQ),$data);
			foreach ($cRQ as $Kr => $v) {
				$datb = array(
					'id_kriteria' => $v,
					'id_karyawan' => $idQ,
					'nilai_kriteria' => $nLQ[$Kr]
				);
				$this->Detkar->insertArray($datb);
			}
			redirect('dashboard_admin/Calon');
		}

		public function delKary($idKr)
		{
			$this->Manager->delKary($idKr);
			redirect('dashboard_admin/Calon');
		}

		public function Analisa_Calon()
		{
			$data['raK']=$this->Kriteria->get_data();
			$this->load->view('admin/ranking-calon', $data);
		}

		public function updateNiFi()
		{
			$idkr = $_POST['idK'];
			$nakr = $_POST['totalakhir'];
			foreach ($idkr as $ide => $al) {
				$datc = array(
					'final_nilai' => $nakr[$ide],
				);
				$this->Manager->updateMan(array('id_karyawan'=>$al),$datc);
			}
			redirect('dashboard_admin/Analisa_Calon');
		}

		public function finalView()
		{
			$data['hasil_akhir']=$this->Manager->get_by_jd();
			$data['hasil_akhir']=$this->Manager->get_try();
			$this->load->view('admin/final-karyawan',$data);
		}


}
?>

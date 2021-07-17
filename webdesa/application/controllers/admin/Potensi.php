<?php
class Potensi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if (!$this->session->userdata('nik_admin'))
		{
			redirect(base_url("admin/akun/masuk"));
		}
		$this->load->model('m_crud');
	}

	function index(){
		$title['judul'] = 'Daftar Potensi';
		$title['active'] = 'potensi';
		$tahun = strval(2020);

		$data['hasil'] = $this->m_crud->readBy('tbl_potensi', array('tahun'=>$tahun));
		$data['judul'] = 'potensi';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/potensi/v_potensi', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($action){
		if (isset($_POST['potensi'])) {
			$store['bidang'] = $_POST['bidang'];
			$store['omzet'] = $_POST['omzet'];
			$store['waktu_awal'] = $_POST['waktu_awal'];
			$store['waktu_akhir'] = $_POST['waktu_akhir'];
			// $store['tahun'] = $_POST['tahun'];
			$store['orang'] = $_POST['orang'];

			$store['tahun'] = 2020;

			if ($action=="tambah") {
				$pesan = $this->m_crud->save('tbl_potensi', $store);
			} else {
				$id = $this->uri->segment(5);
				$pesan = $this->m_crud->update('tbl_potensi', $store, array('id_potensi'=>$id));
			}

			if ($pesan==true) {
				redirect(base_url("admin/potensi"));
				die();
			}
		}

		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom('tbl_potensi');
			$detail = new stdClass();
			foreach ($kolom as $key => $value) {
				$detail->$value = '';
			}
			$data['detail'] = $detail;
		} elseif ($action=="ubah") {
			$id = $this->uri->segment(5);
			$detail = $this->m_crud->readBy('tbl_potensi',array('id_potensi'=>$id))[0];
			$data['detail'] = $detail;
		}

		$title['judul'] = 'Form Potensi';
		$title['active'] = 'potensi';
		$data['judul'] = 'potensi';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/potensi/v_potensi_form', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->delete('tbl_bumdes', array('id_bumdes'=>$id));
		redirect(base_url("admin/bumdes"));
	}
}

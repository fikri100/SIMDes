<?php
class Dana extends CI_Controller{
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
		$title['judul'] = 'Daftar Dana';
		$title['active'] = 'Dana';
		$tahun = '2020';

		$data['hasil'] = $this->m_crud->readBy('tbl_dana', array('status <>'=>-1, 'tahun'=>$tahun));
		$data['judul'] = 'dana';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/dana/v_dana', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($action){
		if (isset($_POST['dana'])) {
			$store['kode'] = $_POST['kode'];
			$store['nama'] = $_POST['nama'];
			$store['jumlah'] = $_POST['jumlah'];
			$store['tahun'] = $_POST['tahun'];

			if ($action=="tambah") {
				$pesan = $this->m_crud->save('tbl_dana', $store);
			} else {
				$id = $this->uri->segment(5);
				$pesan = $this->m_crud->update('tbl_dana', $store, array('kode'=>$id));
			}

			if ($pesan==true) {
				redirect(base_url("admin/dana"));
				die();
			}
		}


		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom('tbl_dana');
			$detail = new stdClass();
			foreach ($kolom as $key => $value) {
				$detail->$value = '';
			}
			$data['detail'] = $detail;
		} elseif ($action=="ubah") {
			$id = $this->uri->segment(5);
			$detail = $this->m_crud->readBy('tbl_dana',array('kode'=>$id))[0];
			$data['detail'] = $detail;
		}

		$data['judul'] = 'dana';

		$title['judul'] = 'Form Dana';
		$title['active'] = 'dana';
		$data['dana'] = $this->m_crud->read('tbl_dana');

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/dana/v_dana_form', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->delete('tbl_dana', array('kode'=>$id));
		redirect(base_url("admin/dana"));
	}
}

<?php
class Item extends CI_Controller{
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
		$title['judul'] = 'Daftar Item Barang';
		$title['active'] = 'item';

		$data['hasil'] = $this->m_crud->readByOrder('tbl_item', array('kode <>'=>0), "kode ASC");
		$data['judul'] = 'item';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/item/v_item', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($action){
		if (isset($_POST['dana'])) {
			// $store['kode'] = $_POST['kode'];
			$store['tipe'] = $_POST['tipe'];
			$store['uraian'] = $_POST['uraian'];
			$store['satuan'] = $_POST['satuan'];
			$store['hst'] = $_POST['hst'];
			// $store['sub_kategori'] = $_POST['sub_kategori'];

			if ($action=="tambah") {
				$pesan = $this->m_crud->save('tbl_item', $store);
			} else {
				$id = $this->uri->segment(5);
				$pesan = $this->m_crud->update('tbl_item', $store, array('kode'=>$id));
			}

			if ($pesan==true) {
				redirect(base_url("admin/item"));
				die();
			}
		}


		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom('tbl_item');
			$detail = new stdClass();
			foreach ($kolom as $key => $value) {
				$detail->$value = '';
			}
			$data['detail'] = $detail;
		} elseif ($action=="ubah") {
			$id = $this->uri->segment(5);
			$detail = $this->m_crud->readBy('tbl_item',array('kode'=>$id))[0];
			$data['detail'] = $detail;
		}

		$data['judul'] = 'item';

		$title['judul'] = 'Form Item Barang';
		$title['active'] = 'item';

		// $data['sub_kategori'] = $this->m_crud->readByOrder('tbl_item', array('sub_kategori'=>0), "kode ASC");

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/item/v_item_form', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->hard_delete('tbl_item', array('kode'=>$id));
		redirect(base_url("admin/item"));
	}
}

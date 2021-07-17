<?php
class Bumdes extends CI_Controller{
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
		$title['judul'] = 'Daftar BUMDes';
		$title['active'] = 'bumdes';

		$data['hasil'] = $this->m_crud->readBy('tbl_bumdes', array('status <>'=>-1));
		$data['judul'] = 'bumdes';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/bumdes/v_bumdes', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($action){
		$nik = $_SESSION['nik_admin'];
		if (isset($_POST['bumdes'])) {
			$store['nama'] = $_POST['nama'];
			$store['bidang'] = $_POST['bidang'];
			$store['ketua'] = $_POST['ketua'];
			$store['deskripsi'] = $_POST['deskripsi'];
			$store['tgl_berdiri'] = $_POST['tgl_berdiri'];
			$store['no_telp'] = $_POST['no_telp'];

			$status	= true;
			$post = "logo_file";

			if ($_FILES[$post]["name"]!="") {
				$filename = $_FILES[$post]['name'];
				$logo['upload_path']   = "./assets/img/bumdes/";
				$logo['allowed_types'] = 'jpg|png|jpeg';
				$logo['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, $post, $logo);
				if ($name==false) {
					$status = false;
				} else {
					$store[$post] = base_url("assets/img/bumdes/").$name;
				}
			}

			if ($status) {
				if ($action=="tambah") {
					$store[$post] = './assets/img/bumdes/default.jpg';
					$pesan = $this->m_crud->save('tbl_bumdes', $store);
				} else {
					$id = $this->uri->segment(5);
					$pesan = $this->m_crud->update('tbl_bumdes', $store, array('id_bumdes'=>$id));
				}

				if ($pesan==true) {
					redirect(base_url("admin/bumdes"));
					die();
				}
			}
		}

		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom('tbl_bumdes');
			$detail = new stdClass();
			foreach ($kolom as $key => $value) {
				$detail->$value = '';
			}
			$data['detail'] = $detail;
		} elseif ($action=="ubah") {
			$id = $this->uri->segment(5);
			$detail = $this->m_crud->readBy('tbl_bumdes',array('id_bumdes'=>$id))[0];
			$data['detail'] = $detail;
		}

		$title['judul'] = 'Form BUMDes';
		$title['active'] = 'bumdes';
		$data['judul'] = 'bumdes';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/bumdes/v_bumdes_form', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->delete('tbl_bumdes', array('id_bumdes'=>$id));
		redirect(base_url("admin/bumdes"));
	}
}

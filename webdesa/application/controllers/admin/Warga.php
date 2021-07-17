<?php
class Warga extends CI_Controller{
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
		$title['judul'] = 'Daftar Warga';
		$title['active'] = 'warga';

		$data['warga'] = $this->m_crud->readBy('tbl_warga', array('status <>'=>-1));
		$data['dusun'] = DUSUN;
		$data['judul'] = 'warga';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/warga/v_warga', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function detail($nik){
		$title['judul'] = 'Detail Warga';
		$title['active'] = 'warga';

		$warga = $this->m_crud->readBy('tbl_warga', array('nik'=>$nik));
		$data['warga'] = $warga[0];
		$data['judul'] = 'warga';
		$data['active'] = 'warga';
		$data['menu'] = 'warga';
		$data['dusun'] = DUSUN;

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/warga/v_detail_warga', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($action){
		if (isset($_POST['warga'])) {
			$nik = $_POST['nik'];
			$store['nik'] = $nik;
			$store['nama'] = $_POST['nama'];
			$store['email'] = $_POST['email'];
			$store['no_telp'] = $_POST['no_telp'];
			$store['tempat_lahir'] = $_POST['tempat'];
			$store['tgl_lahir'] = $_POST['tgl'];
			$store['jk'] = $_POST['jk'];
			$store['goldar'] = $_POST['goldar'];
			$store['agama'] = $_POST['agama'];
			$store['pendidikan'] = $_POST['pendidikan'];
			$store['pekerjaan'] = $_POST['pekerjaan'];
			$store['kawin'] = $_POST['kawin'];
			$store['rw'] = $_POST['rw'];
			$store['rt'] = $_POST['rt'];

			$status	= true;
			if ($_FILES["ktp"]["name"]!="") {
				$filename = $_FILES['ktp']['name'];
				$ktp_config['upload_path']   = "./assets/img/warga/ktp";
				$ktp_config['allowed_types'] = 'jpg|png|jpeg';
				$ktp_config['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, 'ktp', $ktp_config);
				if ($name==false) {
					$status = false;
				} else {
					$store['ktp_file'] = $name;
				}
			}

			if ($_FILES["kk"]["name"]!="") {
				$filename = $_FILES['kk']['name'];
				$kk_config['upload_path']   = "./assets/img/warga/kk";
				$kk_config['allowed_types'] = 'jpg|png|jpeg';
				$kk_config['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, 'kk', $kk_config);
				if ($name==false) {
					$status = false;
				} else {
					$store['kk_file'] = $name;
				}
			}

			if ($_FILES["foto"]["name"]!="") {
				$filename = $_FILES['foto']['name'];
				$foto_config['upload_path']   = "./assets/img/warga/foto";
				$foto_config['allowed_types'] = 'jpg|png|jpeg';
				$foto_config['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, 'foto', $foto_config);
				if ($name==false) {
					$status = false;
				} else {
					$store['foto_file'] = $name;
				}
			}

			if ($status) {
				if ($action=="tambah") {
					$store['pass'] = password_hash(kata_sandi, PASSWORD_DEFAULT);
					$pesan = $this->m_crud->save('tbl_warga', $store);
				} else {
					$id = $this->uri->segment(5);
					$pesan = $this->m_crud->update('tbl_warga', $store, array('nik'=>$id));
				}

				if ($pesan==true) {
					redirect(base_url("admin/warga"));
					die();
				}
			}
		}

		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom('tbl_warga');
			$warga = new stdClass();
			foreach ($kolom as $key => $value) {
				$warga->$value = '';
			}
			$data['warga'] = $warga;
		} elseif ($action=="ubah") {
			$nik = $this->uri->segment(5);
			$warga = $this->m_crud->readBy('tbl_warga',array('nik'=>$nik))[0];
			$data['warga'] = $warga;
		}

		$data['d_jk'] = JK;
		$data['d_goldar'] = GOLDAR;
		$data['d_agama'] = AGAMA;
		$data['d_pendidikan'] = PENDIDIKAN;
		$data['d_pekerjaan'] = PEKERJAAN;
		$data['d_rw'] = DUSUN;
		$data['judul'] = 'warga';
		$data['menu'] = 'warga';

		$title['judul'] = 'Form Warga';
		$title['active'] = 'warga';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/warga/v_warga_form', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->delete('tbl_warga', array('nik'=>$id));
		redirect(base_url("admin/warga"));
	}
}

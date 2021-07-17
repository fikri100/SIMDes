<?php
class Akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if (!$this->session->userdata('nik')){
			$allowed = array("index","masuk","registrasi");
			$method = $this->router->fetch_method();
			if(!in_array($method, $allowed)){
				redirect(base_url("akun/masuk"));
			}
		}
		$this->load->model('m_crud');
	}

	function index(){
		// $title['judul'] = 'Desa Pagerngumbuk';
		// $this->load->view('includes/v_header', $title);
		// $this->load->view('includes/v_banner');
		// $this->load->view('v_home');
		// $this->load->view('includes/v_footer');
		redirect("akun/profil");
	}

	function masuk(){
		if (isset($_POST['masuk'])) {
			$this->form_validation->set_rules('nik', 'NIK', 'required');
			$this->form_validation->set_rules('pass', 'Kata Sandi', 'required|min_length[6]',array('min_length'=>'Panjang Kata Sandi Minimal 6 Karakter'));

			if ($this->form_validation->run() != false){
				$nik = $_POST['nik'];
				$pass = $_POST['pass'];

				$warga = $this->m_crud->readBy('tbl_warga',array('nik'=>$nik));
				if(count($warga)>0){
					$warga = $warga[0];
					$hashpass = $warga->pass;
					$role = $warga->role;
					$nama = $warga->nama;
					$email = $warga->email;
					$notelp = $warga->no_telp;
					$foto = $warga->foto_file;
					$status = $warga->status;

					if (password_verify($pass,$hashpass)) {
						$this->session->set_userdata('nik', $nik);
						$this->session->set_userdata('nama', $nama);
						$this->session->set_userdata('role', $role);
						$this->session->set_userdata('email', $email);
						$this->session->set_userdata('foto', $foto);
						$this->session->set_userdata('notelp', $notelp);
						$this->session->set_userdata('status', $status);

						redirect(base_url("/"));
					} else {
						$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Kata Sandi Salah</div>');
					}
				} else {
					$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">NIK Tidak Terdaftar</div>');
				}
				// redirect(base_url("/akun/masuk"));
			}
		} else {
			if(isset($_SESSION['error'])){
				unset($_SESSION['error']);
			}
		}
		$title['judul'] = 'Masuk';
		$data = null;
		$this->load->view('includes/v_header', $title);
		$this->load->view('v_masuk', $data);
		$this->load->view('includes/v_footer');
	}

	function registrasi(){
		if (isset($_POST['registrasi'])) {
			$this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[tbl_warga.nik]', array('is_unique'=>'NIK Sudah Ada'));
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_warga.email]', array('is_unique'=>'Email Sudah Ada', 'valid_email'=>'Email Tidak Valid'));
			$this->form_validation->set_rules('pass', 'Kata Sandi', 'required|min_length[6]',array('min_length'=>'Panjang Kata Sandi Minimal 6 Karakter'));
			$this->form_validation->set_rules('conf', 'Konfirmasi', 'required|matches[pass]', array('matches'=>'Kata Sandi Tidak Sama'));

			if ($this->form_validation->run() != false){
				$data['nik'] = $_POST['nik'];
				$data['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
				$data['nama'] = $_POST['nama'];
				$data['email'] = $_POST['email'];
				$data['no_telp'] = $_POST['notelp'];

				$pesan = $this->m_crud->save('tbl_warga', $data);

				$this->session->set_userdata('nik', $data['nik']);
				$this->session->set_userdata('nama', $data['nama']);
				$this->session->set_userdata('email', $data['email']);
				$this->session->set_userdata('notelp', $data['notelp']);
				$this->session->set_userdata('role', 0);
				$this->session->set_userdata('foto', null);

				redirect(base_url("akun/profil"));
				die();
			}
		}

		$title['judul'] = 'Registrasi';
		$data = null;
		$this->load->view('includes/v_header', $title);
		$this->load->view('v_daftar', $data);
		$this->load->view('includes/v_footer');
	}

	function profil(){
		$nik = $_SESSION['nik'];
		if (isset($_POST['profil'])) {
			// $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[tbl_warga.nik]';
			// if ($this->form_validation->run() != false){

			// $profil['nik'] = $_POST['nik'];
			// $profil['nama'] = $_POST['nama'];
			// $profil['no_telp'] = $_POST['notelp'];
			// $profil['email'] = $_POST['email'];

			$profil['tempat_lahir'] = $_POST['tempat'];
			$profil['tgl_lahir'] = $_POST['tgl'];
			$profil['jk'] = $_POST['jk'];
			$profil['goldar'] = $_POST['goldar'];
			$profil['pendidikan'] = $_POST['pendidikan'];
			$profil['pekerjaan'] = $_POST['pekerjaan'];
			$profil['agama'] = $_POST['agama'];
			$profil['kawin'] = $_POST['kawin'];
			$profil['rw'] = $_POST['rw'];
			$profil['rt'] = $_POST['rt'];
			$profil['status'] = 1;

			$status	= true;
			// Upload KK
			$post = 'kk_file';
			if ($_FILES[$post]["name"]!="") {
				$filename = $_FILES[$post]['name'];
				$config['upload_path']   = "./assets/img/warga/kk";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
				if ($name=="default.jpg") {
					$status = false;
				} else {
					$profil[$post] = $config['upload_path'].'/'.$name;
				}
			}

			// Upload KTP
			$post = 'ktp_file';
			if ($_FILES[$post]["name"]!="") {
				$filename = $_FILES[$post]['name'];
				$config['upload_path']   = "./assets/img/warga/ktp";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
				if ($name=="default.jpg") {
					$status = false;
				} else {
					$profil[$post] = $config['upload_path'].'/'.$name;
				}
			}

			// Upload Foto
			$post = 'foto_file';
			if ($_FILES[$post]["name"]!="") {
				$filename = $_FILES[$post]['name'];
				$config['upload_path']   = "./assets/img/warga/foto";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
				if ($name=="default.jpg") {
					$status = false;
				} else {
					$profil[$post] = $config['upload_path'].'/'.$name;
				}
			}


			if ($status) {
				$pesan = $this->m_crud->update('tbl_warga', $profil, array('nik'=>$nik));
				if ($pesan==true) {
					redirect(base_url("akun/keluar"));
					die();
				}
			}

			// }
		}

		$title['judul'] = 'Profil';
		$warga = $this->m_crud->readBy('tbl_warga',array('nik'=>$nik))[0];
		$data['warga'] = $warga;

		$data['d_jk'] = JK;
		$data['d_goldar'] = GOLDAR;
		$data['d_agama'] = AGAMA;
		$data['d_pendidikan'] = PENDIDIKAN;
		$data['d_pekerjaan'] = PEKERJAAN;
		$data['d_rw'] = DUSUN;

		$this->load->view('includes/v_header', $title);
		$this->load->view('v_profil', $data);
		$this->load->view('includes/v_footer');
	}

	function ganti_pass(){
		if (isset($_POST['ganti'])) {
			$nik = $_SESSION['nik'];
			$lama = $_POST['lama'];
			$pass = $_POST['pass'];
			$conf = $_POST['conf'];

			$warga = $this->m_crud->readBy('tbl_warga',array('nik'=>$nik));
			if(count($warga)>0){
				$warga = $warga[0];
				$hashpass = $warga->pass;

				if (password_verify($lama,$hashpass)) {
					if ($pass==$conf) {
						$profil['pass'] = password_hash($pass, PASSWORD_DEFAULT);
						$pesan = $this->m_crud->update('tbl_warga', $profil, array('nik'=>$nik));
						if ($pesan==true) {
							redirect(base_url("/"));
							die();
						}
					} else {
						$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Kata Sandi Tidak Sama</div>');
					}
				} else {
					$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Kata Sandi Lama Salah</div>');
				}
			}
		}
		$title['judul'] = 'Ganti Kata Sandi';

		$this->load->view('includes/v_header', $title);
		$this->load->view('v_ganti');
		$this->load->view('includes/v_footer');
	}

	function keluar(){
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('notelp');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('foto');
		redirect(base_url("akun/masuk"));
	}
}

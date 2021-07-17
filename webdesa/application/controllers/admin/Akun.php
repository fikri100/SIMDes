<?php
class Akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('admin'))
		{
			$allowed = array("keluar");
			$method = $this->router->fetch_method();
			if(!in_array($method, $allowed)){
			    redirect(base_url("/"));
			}
		}
		$this->load->model('m_crud');
	}

	function index(){
		redirect(base_url("admin/akun/masuk"));
	}

	function masuk(){
		if (isset($_POST['masuk'])) {
			$this->form_validation->set_rules('nik', 'NIK', 'required');
			$this->form_validation->set_rules('pass', 'Kata Sandi', 'required|min_length[6]',array('min_length'=>'Panjang Kata Sandi Minimal 6 Karakter'));

			if ($this->form_validation->run() != false){
				$nik = $_POST['nik'];
				$pass = $_POST['pass'];

				$warga = $this->m_crud->readBy('tbl_warga',array('nik'=>$nik, 'role <>'=>0));
				if($warga){
					$warga = $warga[0];
					$hashpass = $warga->pass;
					$role = $warga->role;
					$nama = $warga->nama;
					$email = $warga->email;
					$notelp = $warga->no_telp;
					$foto = $warga->foto_file;
					$role = $warga->role;

					if (password_verify($pass,$hashpass)) {
						$this->session->set_userdata('admin_admin', $role);
						$this->session->set_userdata('nik_admin', $nik);
						$this->session->set_userdata('nama_admin', $nama);
						$this->session->set_userdata('role_admin', $role);
						$this->session->set_userdata('email_admin', $email);
						$this->session->set_userdata('foto_admin', $foto);
						$this->session->set_userdata('notelp_admin', $notelp);

						redirect(base_url("admin/dashboard/"));
						die();
					} else {
						$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Kata Sandi Salah</div>');
					}
				} else {
					$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">NIK Tidak Terdaftar</div>');
				}

			}
		}

		$data = null;
		$this->load->view('admin/v_masuk', $data);
	}

	function keluar(){
		$this->session->unset_userdata('admin_admin');
		$this->session->unset_userdata('nik_admin');
		$this->session->unset_userdata('nama_admin');
		$this->session->unset_userdata('role_admin');
		$this->session->unset_userdata('email_admin');
		$this->session->unset_userdata('foto_admin');
		$this->session->unset_userdata('notelp_admin');
		redirect(base_url("admin/akun/masuk"));
	}
}

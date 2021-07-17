<?php
class Berita extends CI_Controller{
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status')==0){
			redirect(base_url("akun/profil"));
		} elseif (!$this->session->userdata('nik')){
			$allowed = array("lihat","detail");
			$method = $this->router->fetch_method();
			if(!in_array($method, $allowed)){
				redirect(base_url("akun/masuk"));
			}
		}
		$this->load->model('m_crud');
	}

	function index(){
		$title['judul'] = 'Unggah Berita / Kegiatan';
		$data = null;
		$this->load->view('includes/v_header', $title);
		$this->load->view('berita/v_buat_berita', $data);
		$this->load->view('includes/v_footer');
	}

	function lihat($rubrik){
		$data['berita'] = $this->m_crud->readBy('detail_berita', array('rubrik'=>$rubrik, 'status'=>berita_valid));
		if ($rubrik=='umkm') {
			$active = 'umkm';
		} elseif($rubrik=='umum') {
			$active = 'umum';
		} else {
			$active = 'semua';
			$data['berita'] = $this->m_crud->readBy('detail_berita', array('status'=>berita_valid));
		}
		$data['active'] = $active;

		$title['judul'] = 'Lihat Berita / Kegiatan';
		$this->load->view('includes/v_header', $title);
		$this->load->view('berita/v_lihat_berita', $data);
		$this->load->view('includes/v_footer');
	}

	function buat(){
		$nik = $_SESSION['nik'];
		if (isset($_POST['berita'])) {
			$berita['judul'] = $_POST['judul'];
			$berita['rubrik'] = $_POST['kategori'];
			$berita['isi'] = $_POST['uraian'];
			$berita['nik'] = $nik;

			$config['upload_path']   = "./assets/img/berita/";
			$config['allowed_types'] = 'jpg|png|jpeg';

			// Upload Pengantar
			$post = 'cover_file';
			$berita[$post] = './assets/img/berita/default.jpg';

			$status = true;
			if ($_FILES[$post]["name"]!="") {
				$filename = $_FILES[$post]['name'];

				$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
				if ($name==false) {
					$status = false;
				} else {
					$berita[$post] = $config['upload_path'].$name;
				}
			}

			if ($status) {
				$pesan = $this->m_crud->save('tbl_berita', $berita);
				if ($pesan) {
					redirect(base_url("berita/riwayat"));
					die();
				}
			}
		}

		$title['judul'] = 'Unggah Berita / Kegiatan';
		$data = null;
		$this->load->view('includes/v_header', $title);
		$this->load->view('berita/v_buat_berita', $data);
		$this->load->view('includes/v_footer');
	}

	function riwayat(){
		$nik = $_SESSION['nik'];
		$data['berita'] = $this->m_crud->readBy('detail_berita', array('nik'=>$nik, 'status >='=>0));
		$data['cont'] = $this;
		$title['judul'] = 'Riwayat Berita';
		$this->load->view('includes/v_header', $title);
		$this->load->view('berita/v_riwayat_berita', $data);
		$this->load->view('includes/v_footer');
	}

	function detail($judul, $id){
		$detail = $this->m_crud->readBy('detail_berita', array('id_berita'=>$id));
		$title['judul'] = 'Detail Berita';
		$data['berita'] = $detail[0];
		$data['tanggapan'] = $this->m_crud->readBy('detail_tanggapan_berita', array('id_berita'=>$id));

		$this->load->view('includes/v_header', $title);
		$this->load->view('berita/v_detail_berita', $data);
		$this->load->view('includes/v_footer');
	}

	function tanggapan($id){
		if (isset($_POST['tanggapan'])) {
			$berita['tanggapan'] = $_POST['komen'];
			$berita['id_berita'] = $id;
			$berita['nik'] = $_SESSION['nik'];
			$pesan = $this->m_crud->save('tbl_tanggapan_berita', $berita);

			if ($pesan) {
				// redirect(base_url("berita/detail/$id"));
				redirect($_SERVER['HTTP_REFERER']);
				die();
			}
			// var_dump($pesan);
		}
	}

	function cari(){
		if (isset($_POST['cariberita'])) {
			$rubrik = $_POST['rubrik'];
			$data['berita'] = $this->m_crud->selectLike('detail_berita', array('rubrik'=>$_POST['rubrik'], 'status'=>berita_valid), array('judul'=>$_POST['judul']));
			if ($_POST['rubrik']=='semua') {
				$data['active'] = 'semua';
				$data['berita'] = $this->m_crud->selectLike('detail_berita', array('status'=>berita_valid), array('judul'=>$_POST['judul']));
			}
			$data['active'] = $rubrik;

			$title['judul'] = 'Hasil Pencarian '.$_POST['judul'];
			$this->load->view('includes/v_header', $title);
			$this->load->view('berita/v_lihat_berita', $data);
			$this->load->view('includes/v_footer');
		}
	}

	function ubah($id){
		$nik = $_SESSION['nik'];
		if (isset($_POST['berita'])) {
			$berita['nik'] = $nik;
			$berita['judul'] = $_POST['judul'];
			$berita['rubrik'] = $_POST['kategori'];
			$berita['isi'] = $_POST['uraian'];

			$config['upload_path']   = "./assets/img/berita/";
			$config['allowed_types'] = 'jpg|png|jpeg';

			// Upload Cover
			$post = 'cover_file';
			if ($_FILES[$post]["name"]!="") {
				$status = true;
				$filename = $_FILES[$post]['name'];

				$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
				if ($name==false) {
					$status = false;
				} else {
					$berita[$post] = $config['upload_path'].$name;
				}
			}

			$pesan = $this->m_crud->update('tbl_berita', $berita, array('id_berita'=>$id));
			if ($pesan) {
				redirect(base_url("berita/riwayat"));
				die();
			}
		}
		$berita = $this->m_crud->readBy('detail_berita', array('id_berita'=>$id));
		$data['berita'] = $berita[0];
		$title['judul'] = 'Ubah Berita / Kegiatan';
		$this->load->view('includes/v_header', $title);
		$this->load->view('berita/v_buat_berita', $data);
		$this->load->view('includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->delete('tbl_berita', array('id_berita'=>$id));
		redirect(base_url("berita/riwayat"));
	}

	function cek_status($id){
		switch ($id) {
			case 0:
			echo "Validasi";
			break;
			case 1:
			echo "Sudah Terbit";
			break;
			case 2:
			echo "Diturunkan";
			default:
			echo "";
		}
	}
}

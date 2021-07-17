<?php
class Umkm extends CI_Controller{
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
		$title['judul'] = 'Daftar UMKM';
		$title['active'] = 'umkm';

		$data['hasil'] = $this->m_crud->readBy('detail_umkm', array('status <>'=>-1));
		// $sql = "select `u`.`id_umkm` AS `id_umkm`,`u`.`nama` AS `nama`,`u`.`bidang` AS `bidang`,`u`.`nik_pemilik` AS `nik_pemilik`,`u`.`no_telp` AS `no_telp`,`u`.`alamat` AS `alamat`,`u`.`tgl_berdiri` AS `tgl_berdiri`,`u`.`deskripsi` AS `deskripsi`,`u`.`logo_file` AS `logo_file`,`u`.`status` AS `status`,`w`.`nama` AS `pemilik` from (`tbl_umkm` `u` join `tbl_warga` `w` on((`u`.`nik_pemilik` = `w`.`nik`))) where ";
		// $data['hasil'] = $this->db->query($sql."u.status<>-1")->result();
		$data['judul'] = 'umkm';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/umkm/v_umkm', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($action){
		$nik = $_SESSION['nik_admin'];
		if (isset($_POST['umkm'])) {
			$store['nama'] = $_POST['nama'];
			$store['bidang'] = $_POST['bidang'];
			$store['nik_pemilik'] = $_POST['nik_pemilik'];
			$store['alamat'] = $_POST['alamat'];
			$store['deskripsi'] = $_POST['deskripsi'];
			$store['tgl_berdiri'] = $_POST['tgl_berdiri'];
			$store['no_telp'] = $_POST['no_telp'];

			$status	= true;
			$post = "logo_file";

			if ($_FILES[$post]["name"]!="") {
				$filename = $_FILES[$post]['name'];
				$logo['upload_path']   = "./assets/img/umkm/";
				$logo['allowed_types'] = 'jpg|png|jpeg';
				$logo['max_size']      = 2048;

				$name = $this->m_crud->upload_file($nik, $filename, $post, $logo);
				if ($name==false) {
					$status = false;
				} else {
					$store[$post] = base_url("assets/img/umkm/").$name;
				}
			}

			if ($status) {
				if ($action=="tambah") {
					$store[$post] = './assets/img/umkm/default.jpg';
					$pesan = $this->m_crud->save('tbl_umkm', $store);
				} else {
					$id = $this->uri->segment(5);
					$pesan = $this->m_crud->update('tbl_umkm', $store, array('id_umkm'=>$id));
				}

				if ($pesan==true) {
					redirect(base_url("admin/umkm"));
					die();
				}
			}
		}

		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom('tbl_umkm');
			$detail = new stdClass();
			foreach ($kolom as $key => $value) {
				$detail->$value = '';
			}
			$data['detail'] = $detail;
		} elseif ($action=="ubah") {
			$id = $this->uri->segment(5);
			$detail = $this->m_crud->readBy('tbl_umkm',array('id_umkm'=>$id))[0];
			$data['detail'] = $detail;
		}

		$title['judul'] = 'Form UMKM';
		$title['active'] = 'umkm';
		$data['judul'] = 'umkm';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/umkm/v_umkm_form', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->delete('tbl_umkm', array('id_umkm'=>$id));
		redirect(base_url("admin/umkm"));
	}
}

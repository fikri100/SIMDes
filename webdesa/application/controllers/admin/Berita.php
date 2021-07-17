<?php
class Berita extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('nik_admin'))
		{
			redirect(base_url("admin/akun/masuk"));
		}
		$this->load->model('m_crud');
	}

	function index(){
		$title['judul'] = 'Daftar Berita';
		$title['active'] = 'Berita';


		$data['baru'] = $this->m_crud->readBy('detail_berita', array('status'=>berita_baru));
		// $sql = "select `b`.`id_berita` AS `id_berita`,`b`.`judul` AS `judul`,`b`.`isi` AS `isi`,`b`.`tgl_berita` AS `tgl_berita`,`b`.`rubrik` AS `rubrik`,`b`.`cover_file` AS `cover_file`,`b`.`status` AS `status`,`b`.`nik` AS `nik`,`w`.`nama` AS `nama` from `tbl_berita` `b` join `tbl_warga` `w` on `b`.`nik` = `w`.`nik` where b.status=".berita_baru;
		// $data['baru'] = $this->db->query($sql)->result();

		$data['terbit'] = $this->m_crud->readBy('detail_berita', array('status'=>berita_valid));
		// $sql = "select `b`.`id_berita` AS `id_berita`,`b`.`judul` AS `judul`,`b`.`isi` AS `isi`,`b`.`tgl_berita` AS `tgl_berita`,`b`.`rubrik` AS `rubrik`,`b`.`cover_file` AS `cover_file`,`b`.`status` AS `status`,`b`.`nik` AS `nik`,`w`.`nama` AS `nama` from `tbl_berita` `b` join `tbl_warga` `w` on `b`.`nik` = `w`.`nik` where b.status=".berita_valid;
		// $data['terbit'] = $this->db->query($sql)->result();

		$data['dusun'] = DUSUN;
		$data['judul'] = 'berita';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/berita/v_berita', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function proses($id, $status){
		$proses['status'] = $status;
		$pesan = $this->m_crud->update('tbl_berita', $proses, array('id_berita'=>$id));
		if ($pesan) {
			redirect(base_url("admin/berita"));
			die();
		}
	}

	function cek_status($id){
		switch ($id) {
			case 0:
			echo "Tahap Validasi";
			break;
			case 1:
			echo "Sudah Divalidasi";
			break;
			case 2:
			echo "Diturunkan";
			default:
			echo "Berita Ditolak";
		}
	}
}

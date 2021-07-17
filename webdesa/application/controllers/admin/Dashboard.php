<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->model('m_crud');
		if (!$this->session->userdata('nik_admin'))
		{
      redirect(base_url("admin/akun/masuk"));
		}
	}

	function index(){
		$title['judul'] = 'Dashboard';
    $title['active'] = 'dashboard';
		$data['kelahiran'] = $this->m_crud->readCount('tbl_kelahiran', array("status"=>surat_baru));
		$data['kematian'] = $this->m_crud->readCount('tbl_kematian', array("status"=>surat_baru));
		$data['tdk_mampu'] = $this->m_crud->readCount('tbl_tdk_mampu', array("status"=>surat_baru));
		$data['biodata'] = $this->m_crud->readCount('tbl_biodata', array("status"=>surat_baru));
		$data['umum'] = $this->m_crud->readCount('tbl_umum', array("status"=>surat_baru));
		$data['domisili'] = $this->m_crud->readCount('tbl_domisili', array("status"=>surat_baru));

		$data['pengaduan'] = $this->m_crud->readCount('tbl_pengaduan', array("status"=>pengaduan_baru));

		$data['rab'] = $this->m_crud->readCount('tbl_kegiatan', array("status"=>kegiatan_baru));
		$data['valid'] = $this->m_crud->readCount('tbl_kegiatan', array("status"=>kegiatan_rencana));
		$data['revisi'] = $this->m_crud->readCount('tbl_kegiatan', array("status"=>kegiatan_revisi));
		$data['progres'] = $this->m_crud->readCount('tbl_kegiatan', array("status"=>kegiatan_proses));
		$data['lpj'] = $this->m_crud->readCount('tbl_kegiatan', array("status"=>kegiatan_selesai));

		$data['berita'] = $this->m_crud->readCount('tbl_berita', array("status"=>berita_baru));
		$this->load->view('admin/includes/v_header', $title);
    $this->load->view('admin/v_dashboard', $data);
		$this->load->view('admin/includes/v_footer');
	}
}

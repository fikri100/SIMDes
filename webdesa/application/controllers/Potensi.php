<?php
class Potensi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_crud');
	}

	function index(){
		$title['judul'] = 'Profil Desa';
		$this->load->view('includes/v_header', $title);
		$this->load->view('v_profil');
		$this->load->view('includes/v_footer');
	}

	function profil(){
		$title['judul'] = 'Profil Desa';
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_profil');
		$this->load->view('includes/v_footer');
	}

	function goldar(){
		$title['judul'] = 'Data Golongan Darah';
		$goldar = $this->m_crud->customQuery("SELECT goldar FROM tbl_warga WHERE status<>-1");
		$jenis = array('a'=>0,'b'=>0,'ab'=>0,'o'=>0, 'belum'=>0);
		foreach ($goldar as $k => $v) {
			foreach ($jenis as $jk => $jv) {
				if ($v->goldar==$jk) {
					$jenis[$jk]++;
				}
			}
		}
		$data['goldar'] = $jenis['a'].','.$jenis['b'].','.$jenis['ab'].','.$jenis['o'].','.$jenis['belum'];
		$data['jumlah'] = count($goldar);
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_goldar', $data);
		$this->load->view('includes/v_footer');
	}

	function pendidikan(){
		$title['judul'] = 'Data Pendidikan';
		$pendidikan = $this->m_crud->customQuery("SELECT pendidikan FROM tbl_warga WHERE status<>-1");
		$jenis = array('sd'=>0, 'sltp'=>0, 'slta'=>0, 'd1'=>0, 'd2'=>0, 'd3'=>0, 's1'=>0, 's2'=>0, 's3'=>0);
		foreach ($pendidikan as $k => $v) {
			foreach ($jenis as $jk => $jv) {
				if ($v->pendidikan==$jk) {
					$jenis[$jk]++;
				}
			}
		}
		$data['pendidikan'] = $jenis['sd'].','.$jenis['sltp'].','.$jenis['slta'].','.$jenis['d1'].','.$jenis['d2'].','.$jenis['d3'].','.$jenis['s1'].','.$jenis['s2'].','.$jenis['s3'];
		$data['jumlah'] = count($pendidikan);
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_pendidikan', $data);
		$this->load->view('includes/v_footer');
	}

	function pekerjaan(){
		$title['judul'] = 'Data Pekerjaan';
		$pekerjaan = $this->m_crud->customQuery("SELECT pekerjaan FROM tbl_warga WHERE status<>-1");
		$jenis = array('petani'=>0, 'swasta'=>0, 'pns'=>0, 'wiraswasta'=>0, 'pelajar'=>0, 'rumah'=>0, 'lain'=>0);
		foreach ($pekerjaan as $k => $v) {
			foreach ($jenis as $jk => $jv) {
				if ($v->pekerjaan==$jk) {
					$jenis[$jk]++;
				}
			}
		}
		$data['pekerjaan'] = $jenis['petani'].','.$jenis['swasta'].','.$jenis['pns'].','.$jenis['wiraswasta'].','.$jenis['pelajar'].','.$jenis['rumah'].','.$jenis['lain'];
		$data['jumlah'] = count($pekerjaan);
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_pekerjaan',$data);
		$this->load->view('includes/v_footer');
	}

	function agama(){
		$title['judul'] = 'Data Agama';
		$agama = $this->m_crud->customQuery("SELECT agama FROM tbl_warga WHERE status<>-1");
		$jenis = array('islam'=>0, 'kristen'=>0, 'katolik'=>0, 'hindu'=>0, 'buddha'=>0, 'konghucu'=>0, 'lain'=>0);
		foreach ($agama as $k => $v) {
			foreach ($jenis as $jk => $jv) {
				if ($v->agama==$jk) {
					$jenis[$jk]++;
				}
			}
		}
		$data['agama'] = $jenis['islam'].','.$jenis['kristen'].','.$jenis['katolik'].','.$jenis['hindu'].','.$jenis['buddha'].','.$jenis['konghucu'].','.$jenis['lain'];
		$data['jumlah'] = count($agama);
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_agama', $data);
		$this->load->view('includes/v_footer');
	}

	function bumdes(){
		$title['judul'] = 'Data BUMDes';
		$data['hasil'] = $this->m_crud->readBy('tbl_bumdes', array('status <>'=>-1));
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_bumdes', $data);
		$this->load->view('includes/v_footer');
	}

	function detail_bumdes($id){
		$title['judul'] = 'Data BUMDes';
		$data['hasil'] = $this->m_crud->readBy('tbl_bumdes', array('id_bumdes'=>$id, 'status <>'=>-1))[0];
		// print_r($data['hasil']);
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_detail_bumdes', $data);
		$this->load->view('includes/v_footer');
	}

	function umkm(){
		$title['judul'] = 'Data UMKM';
		$data['hasil'] = $this->m_crud->readBy('detail_umkm', array('status <>'=>-1));
		// $sql = "select `u`.`id_umkm` AS `id_umkm`,`u`.`nama` AS `nama`,`u`.`bidang` AS `bidang`,`u`.`nik_pemilik` AS `nik_pemilik`,`u`.`no_telp` AS `no_telp`,`u`.`alamat` AS `alamat`,`u`.`tgl_berdiri` AS `tgl_berdiri`,`u`.`deskripsi` AS `deskripsi`,`u`.`logo_file` AS `logo_file`,`u`.`status` AS `status`,`w`.`nama` AS `pemilik` from (`tbl_umkm` `u` join `tbl_warga` `w` on((`u`.`nik_pemilik` = `w`.`nik`))) where ";
		// $data['hasil'] = $this->db->query($sql."u.status<>-1")->result();
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_umkm', $data);
		$this->load->view('includes/v_footer');
	}

	function detail_umkm($id){
		$title['judul'] = 'Data UMKM';
		// $sql = "select `u`.`id_umkm` AS `id_umkm`,`u`.`nama` AS `nama`,`u`.`bidang` AS `bidang`,`u`.`nik_pemilik` AS `nik_pemilik`,`u`.`no_telp` AS `no_telp`,`u`.`alamat` AS `alamat`,`u`.`tgl_berdiri` AS `tgl_berdiri`,`u`.`deskripsi` AS `deskripsi`,`u`.`logo_file` AS `logo_file`,`u`.`status` AS `status`,`w`.`nama` AS `pemilik` from (`tbl_umkm` `u` join `tbl_warga` `w` on((`u`.`nik_pemilik` = `w`.`nik`))) where ";
		// $data['hasil'] = $this->db->query($sql."u.status<>-1")->row();
		$data['hasil'] = $this->m_crud->readBy('detail_umkm', array('id_umkm'=>$id, 'status <>'=>-1))[0];

		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_detail_umkm', $data);
		$this->load->view('includes/v_footer');
	}

	function detail(){
		$title['judul'] = 'Data Potensi Desa';
		$data['hasil'] = $this->m_crud->readByOrder('tbl_potensi', array('tahun'=>TAHUN), "omzet desc");
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_detail', $data);
		$this->load->view('includes/v_footer');
	}

	function dana(){
		$title['judul'] = 'Data Sumber Anggaran';
		$data['hasil'] = $this->m_crud->readByOrder('tbl_dana', array('status <>'=>-1, 'tahun'=>TAHUN), "jumlah desc");
		$this->load->view('includes/v_header', $title);
		$this->load->view('potensi/v_dana', $data);
		$this->load->view('includes/v_footer');
	}
}

<?php
// include './vendor/phpqrcode/qrlib.php';
class Pengaduan extends CI_Controller{
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
		$title['judul'] = 'Aspirasi/Keluhan';
		$data = null;
		$this->load->view('includes/v_header', $title);
		$this->load->view('pengaduan/v_buat_pengaduan', $data);
		$this->load->view('includes/v_footer');
	}

	function buat_pengaduan(){
		// if (isset($_POST['pengaduan'])) {
			$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'Isi Judul'));
			$this->form_validation->set_rules('kategori', 'Kategori', 'required', array('required'=>'Isi Kategori'));
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('required'=>'Isi Lokasi'));
			$this->form_validation->set_rules('bidang', 'Bidang', 'required', array('required'=>'Isi Bidang'));
			$this->form_validation->set_rules('uraian', 'Uraian', 'required', array('required'=>'Isi Uraian'));
			$this->form_validation->set_rules('ttd', 'TTD', 'required', array('required'=>'Isi TTD'));

			if ($this->form_validation->run() != false){
				$nik = $_SESSION['nik'];
				$img = $_POST['ttd'];
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$file = './assets/img/pengaduan/' . uniqid() . '.png';

				$success = file_put_contents($file, $data);

				$nama_qrcode = './assets/img/qrcode/'.time().".png";
				QRcode::png($file, $nama_qrcode);

				$config['upload_path']   = "./assets/img/pengaduan/";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['allowed_size'] = 2048;

				$pengaduan['lampiran_file'] = './assets/img/pengaduan/default.jpg';
				if ($_FILES['lampiran_file']["name"]!="") {
					$filename = $_FILES['lampiran_file']['name'];
					$name = $this->m_crud->upload_file($nik, $filename, 'lampiran_file', $config);
					$pengaduan['lampiran_file'] = "./assets/img/pengaduan/".$name;
				}

				$pengaduan['judul'] = $_POST['judul'];
				$pengaduan['kategori'] = $_POST['kategori'];
				$pengaduan['lokasi'] = $_POST['lokasi'];
				$pengaduan['bidang'] = $_POST['bidang'];
				$pengaduan['uraian'] = $_POST['uraian'];
				$pengaduan['nik'] = $nik;
				$pengaduan['ttd_file'] = $file;
				$pengaduan['qrcode_file'] = $nama_qrcode;

				$this->m_crud->save('tbl_pengaduan', $pengaduan);
				$this->session->set_flashdata('sukses', 'Buat Pengaduan Sukses!');
				redirect(base_url("pengaduan/riwayat"));
			} else {
				$title['judul'] = 'Buat Pengaduan';
				$data = null;
				$this->load->view('includes/v_header', $title);
				$this->load->view('pengaduan/v_buat_pengaduan', $data);
				$this->load->view('includes/v_footer');
			}
		// }
		//
	}

	function lihat($id){
		$pengaduan = $this->m_crud->readBy('detail_pengaduan', array('status'=>pengaduan_proses, 'bidang'=>$id));
		// $sql = "select `p`.`id_pengaduan` AS `id_pengaduan`,`p`.`judul` AS `judul`,`p`.`bidang` AS `bidang`,`p`.`lokasi` AS `lokasi`,`p`.`kategori` AS `kategori`,`p`.`uraian` AS `uraian`,`p`.`tgl_pengaduan` AS `tgl_pengaduan`,`p`.`status` AS `status`,`p`.`lampiran_file` AS `lampiran_file`,`p`.`nik` AS `nik`,`w`.`nama` AS `nama`,`w`.`no_telp` AS `no_telp`,`w`.`email` AS `email`,`w`.`rw` AS `rw`,`w`.`rt` AS `rt`,`p`.`ttd_file` AS `ttd_file` from (`tbl_pengaduan` `p` join `tbl_warga` `w` on((`p`.`nik` = `w`.`nik`)))";
		// $pengaduan = $this->db->query($sql." WHERE bidang='$id' AND p.status=".pengaduan_proses)->result();
		if ($id=="semua") {
			$active = "semua";
			$pengaduan = $this->m_crud->readBy('detail_pengaduan', array('status'=>pengaduan_proses));
			// $pengaduan = $this->db->query($sql." WHERE p.status<>".pengaduan_ditolak)->result();
		} elseif ($id=="infrastruktur") {
			$active = "infrastruktur";
		} elseif ($id=="pendidikan") {
			$active = "pendidikan";
		} elseif ($id=="kesehatan") {
			$active = "kesehatan";
		} elseif ($id=="administrasi") {
			$active = "administrasi";
		} elseif ($id=="kasus") {
			$active = "kasus";
		} elseif ($id=="lain") {
			$active = "lain";
		}
		$data['active'] = $active;

		$data['pengaduan'] = $pengaduan;
		$data['cont'] = $this;

		$title['judul'] = 'Lihat Pengaduan';
		$this->load->view('includes/v_header', $title);
		$this->load->view('pengaduan/v_lihat_pengaduan', $data);
		$this->load->view('includes/v_footer');
	}

	function riwayat(){
		$nik = $_SESSION['nik'];
		$title['judul'] = 'Riwayat Pengaduan';
		$data['pengaduan'] = $this->m_crud->readBy('tbl_pengaduan', array('nik'=>$nik));
		$data['cont'] = $this;
		$this->load->view('includes/v_header', $title);
		$this->load->view('pengaduan/v_riwayat_pengaduan', $data);
		$this->load->view('includes/v_footer');
	}

	function detail($id){
		$pengaduan = $this->m_crud->readBy('detail_pengaduan', array('id_pengaduan'=>$id));
		// $sql = "select `p`.`id_pengaduan` AS `id_pengaduan`,`p`.`judul` AS `judul`,`p`.`bidang` AS `bidang`,`p`.`lokasi` AS `lokasi`,`p`.`kategori` AS `kategori`,`p`.`uraian` AS `uraian`,`p`.`tgl_pengaduan` AS `tgl_pengaduan`,`p`.`status` AS `status`,`p`.`lampiran_file` AS `lampiran_file`,`p`.`nik` AS `nik`,`w`.`nama` AS `nama`,`w`.`no_telp` AS `no_telp`,`w`.`email` AS `email`,`w`.`rw` AS `rw`,`w`.`rt` AS `rt`,`p`.`ttd_file` AS `ttd_file` from (`tbl_pengaduan` `p` join `tbl_warga` `w` on((`p`.`nik` = `w`.`nik`)))";
		// $pengaduan = $this->db->query($sql." WHERE p.id_pengaduan=".$id)->result();

		$data['pengaduan'] = $pengaduan[0];
		$data['cont'] = $this;

		$data['tanggapan'] = $this->m_crud->readBy('detail_tanggapan_pengaduan', array('id_pengaduan'=>$id));
		// $data['tanggapan'] = null;

		$title['judul'] = 'Detail Pengaduan';
		$this->load->view('includes/v_header', $title);
		$this->load->view('pengaduan/v_detail_pengaduan', $data);
		$this->load->view('includes/v_footer');
	}

	function tanggapan($id){
		if (isset($_POST['tanggapan'])) {
			$pengaduan['tanggapan'] = $_POST['komen'];
			$pengaduan['id_pengaduan'] = $id;
			$pengaduan['nik'] = $_SESSION['nik'];
			$pesan = $this->m_crud->save('tbl_tanggapan_pengaduan', $pengaduan);
			if ($pesan) {
				redirect(base_url("pengaduan/detail/$id"));
				die();
			}
			var_dump($pesan);
		}
	}

	function cari(){
		if (isset($_POST['caripengaduan'])) {
			$id=$_POST['bidang'];
			$judul = $_POST['judul'];

			$pengaduan = $this->m_crud->selectLike('detail_pengaduan', array('status <>'=>pengaduan_ditolak, 'bidang'=>$_POST['bidang']), array('judul'=>$_POST['judul']));

			// $sql = "select `p`.`id_pengaduan` AS `id_pengaduan`,`p`.`judul` AS `judul`,`p`.`bidang` AS `bidang`,`p`.`lokasi` AS `lokasi`,`p`.`kategori` AS `kategori`,`p`.`uraian` AS `uraian`,`p`.`tgl_pengaduan` AS `tgl_pengaduan`,`p`.`status` AS `status`,`p`.`lampiran_file` AS `lampiran_file`,`p`.`nik` AS `nik`,`w`.`nama` AS `nama`,`w`.`no_telp` AS `no_telp`,`w`.`email` AS `email`,`w`.`rw` AS `rw`,`w`.`rt` AS `rt`,`p`.`ttd_file` AS `ttd_file` from `tbl_pengaduan` `p` join `tbl_warga` `w` on `p`.`nik` = `w`.`nik`";
			// $pengaduan = $this->db->query($sql." WHERE p.status<>".pengaduan_ditolak." AND bidang='".$_POST['judul']."' AND judul LIKE '%$judul%'")->result();
			if ($id=="semua") {
				$active = "semua";
				$pengaduan = $this->m_crud->selectLike('detail_pengaduan', array('status <>'=>pengaduan_ditolak), array('judul'=>$_POST['judul']));
				// $pengaduan = $this->db->query($sql." WHERE p.status<>".pengaduan_ditolak." AND judul LIKE '%".$_POST['judul']."%'")->result();
			}
			$data['pengaduan'] = $pengaduan;
			$data['active'] = $id;
			$data['cont'] = $this;

			$title['judul'] = 'Hasil Pencarian '.$_POST['judul'];
			$this->load->view('includes/v_header', $title);
			$this->load->view('pengaduan/v_lihat_pengaduan', $data);
			$this->load->view('includes/v_footer');
		}
	}

	function ubah($id){
		$nik = $_SESSION['nik'];
		if (isset($_POST['pengaduan'])) {
			$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'Isi Judul'));
			$this->form_validation->set_rules('kategori', 'Kategori', 'required', array('required'=>'Isi Kategori'));
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('required'=>'Isi Lokasi'));
			$this->form_validation->set_rules('kategori', 'Kategori', 'required', array('required'=>'Isi Kategori'));
			$this->form_validation->set_rules('bidang', 'Bidang', 'required', array('required'=>'Isi Bidang'));
			$this->form_validation->set_rules('uraian', 'Uraian', 'required', array('required'=>'Isi Uraian'));

			if ($this->form_validation->run() != false){
				$pengaduan['judul'] = $_POST['judul'];
				$pengaduan['kategori'] = $_POST['kategori'];
				$pengaduan['lokasi'] = $_POST['lokasi'];
				$pengaduan['bidang'] = $_POST['bidang'];
				$pengaduan['uraian'] = $_POST['uraian'];
				$pengaduan['nik'] = $nik;

				$config['upload_path']   = "./assets/img/pengaduan/";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['allowed_size'] = 2048;

				// Upload Pengantar
				$post = 'lampiran_file';
				$pengaduan[$post] = './assets/img/pengaduan/default.jpg';
				$status = true;

				if ($_FILES[$post]["name"]!="") {
					$filename = $_FILES[$post]['name'];

					$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					if ($name==false) {
						$status = false;
					} else {
						$pengaduan[$post] = $config['upload_path'].$name;
					}
				}

				if ($status) {
					$pesan = $this->m_crud->save('tbl_pengaduan', $pengaduan);
					if ($pesan) {
						redirect(base_url("pengaduan/riwayat"));
						die();
					}
				}
			}
		}

		$title['judul'] = 'Aspirasi/Keluhan';
		$data = null;
		$this->load->view('includes/v_header', $title);
		$this->load->view('pengaduan/v_buat_pengaduan', $data);
		$this->load->view('includes/v_footer');
	}

	function hapus($id){
		$pesan = $this->m_crud->hard_delete('tbl_pengaduan', array('id_pengaduan'=>$id));
		redirect(base_url("pengaduan/riwayat"));
	}

	function cek_status($id){
		switch ($id) {
			case pengaduan_baru:
			echo "Validasi";
			break;
			case pengaduan_proses:
			echo "Sudah Terbit";
			break;
			case pengaduan_selesai:
			echo "Selesai/Dilanjutkan";
			break;
			case pengaduan_ditolak:
			echo "Ditolak";
			break;
			default:
			return;
		}
	}

	function cetak_rab($id){
		$detail = $this->m_crud->readBy('detail_kegiatan', array('id_pengaduan'=>$id));
		// $sql = "select `k`.`id_kegiatan` AS `id_kegiatan`,`k`.`bidang` AS `bidang`,`k`.`nama` AS `nama`,`k`.`tgl_mulai` AS `tgl_mulai`,`k`.`tgl_selesai` AS `tgl_selesai`,`k`.`output` AS `output`,`k`.`kendala` AS `kendala`,`k`.`saran` AS `saran`,`k`.`ketua_pelaksana` AS `ketua_pelaksana`,`k`.`catatan` AS `catatan`,`k`.`status` AS `status`,`k`.`lampiran_file` AS `lampiran_file`,`k`.`id_pengaduan` AS `id_pengaduan`,`k`.`kode` AS `kode`,`d`.`nama` AS `dana`,`p`.`nama` AS `pelapor`,`k`.`kode_kegiatan` AS `kode_kegiatan` from ((`tbl_kegiatan` `k` join `tbl_dana` `d` on((`k`.`kode` = `d`.`kode`))) join `detail_pengaduan` `p` on((`k`.`id_pengaduan` = `p`.`id_pengaduan`))) where ";
		// $detail = $this->db->query($sql."k.id_kegiatan=$id")->result();

		$hasil = $detail[0];
		$data['judul'] = 'Cetak RAB';

		$data['element']  = "<div style='border-bottom:3px solid black; padding-bottom:20px;'>";
		$data['element'] .= "<h3 class='text-center'><strong>RENCANA ANGGARAN BIAYA</strong></h3>";
		$data['element'] .= "<h4 style='margin-top:-8px;' class='text-center'>DESA PAGERNGUMBUK KECAMATAN WONOAYU</h4>";
		$data['element'] .= "<h4 style='margin-top:-8px;' class='text-center'>TAHUN ANGGARAN ".TAHUN."</h4>";
		$data['element'] .= "</div>";

		$data['element'] .= '<br>';
		$data['element'] .= '<table class="table table-borderless">';
		$data['element'] .= '<tbody>';
		$data['element'] .= '<tr>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '<th scope="row" width="160" style="border:none;">Bidang</th>';
		$data['element'] .= '<td width="10" style="border:none;">:</td>';
		$data['element'] .= '<td class="garisbawah" style="border-top:none; border-bottom: 1px dotted black;">'.ucwords($hasil->bidang).'</td>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '<tr>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '<th scope="row" width="160" style="border:none;">Kegiatan</th>';
		$data['element'] .= '<td width="10" style="border:none;">:</td>';
		$data['element'] .= '<td class="garisbawah" style="border-top:none; border-bottom: 1px dotted black;">'.ucwords($hasil->nama).'</td>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '<tr>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '<th scope="row" width="160" style="border:none;">Waktu Pelaksanaan</th>';
		$data['element'] .= '<td width="10" style="border:none;">:</td>';
		$data['element'] .= '<td class="garisbawah" style="border-top:none; border-bottom: 1px dotted black;">'.date("d/m/Y",strtotime($hasil->tgl_mulai)).' sampai '.date("d/m/Y",strtotime($hasil->tgl_selesai)).'</td>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '<tr>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '<th scope="row" width="160" style="border:none;">Sumber Dana</th>';
		$data['element'] .= '<td width="10" style="border:none;">:</td>';
		$data['element'] .= '<td class="garisbawah" style="border-top:none; border-bottom: 1px dotted black;">'.$hasil->dana.'</td>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '<tr>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '<th scope="row" width="160" style="border:none;">Output</th>';
		$data['element'] .= '<td width="10" style="border:none;">:</td>';
		$data['element'] .= '<td class="garisbawah" style="border-top:none; border-bottom: 1px dotted black;">'.$hasil->output.'</td>';
		$data['element'] .= '<td width="10" style="border:none;"></td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '</tbody>';
		$data['element'] .= '</table>';
		$data['element'] .= '<h5 style="margin-left:25px;">Rincian Pendanaan :<h5>';
		$data['element'] .= '<table style="width:95%; margin-left:25px;" class="table table-bordered">';
		$data['element'] .= '<thead class="" style="background:#B6F081;">';
		$data['element'] .= '<th scope="col">#</th>';
		$data['element'] .= '<th scope="col">Kode</th>';
		$data['element'] .= '<th scope="col">Uraian</th>';
		$data['element'] .= '<th scope="col">Volume</th>';
		$data['element'] .= '<th scope="col">Satuan</th>';
		$data['element'] .= '<th scope="col">Harga Satuan (Rp)</th>';
		$data['element'] .= '<th scope="col">Jumlah (Rp)</th>';
		$data['element'] .= '</thead>';
		$data['element'] .= '<tbody>';
		$barang = $this->m_crud->readBy('tbl_item_keuangan', array('id_kegiatan'=>$hasil->id_kegiatan, 'tipe'=>1));
		$modal = $this->m_crud->readBy('tbl_item_keuangan', array('id_kegiatan'=>$hasil->id_kegiatan, 'tipe'=>2));
		$no = 1;
		$nom = 1;
		$jumlah = 0;
		$data['element'] .= '<tr>';
		$data['element'] .= '<td colspan="7">Belanja Barang/Jasa</td>';
		$data['element'] .= '</tr>';
		foreach ($barang as $k => $i) {
			$data['element'] .= '<tr>';
			$data['element'] .= '<td>'.$no++.'</td>';
			$data['element'] .= '<td>'.$i->kode.'</td>';
			$data['element'] .= '<td>'.$i->uraian.'</td>';
			$data['element'] .= '<td>'.$i->volume.'</td>';
			$data['element'] .= '<td>'.$i->satuan.'</td>';
			$data['element'] .= '<td>'.$i->harga_satuan.'</td>';
			$data['element'] .= '<td>'.$i->jumlah.'</td>';
			$data['element'] .= '</tr>';
			$jumlah += $i->jumlah;
		}
		$data['element'] .= '<tr>';
		$data['element'] .= '<td colspan="7">Belanja Modal</td>';
		$data['element'] .= '</tr>';
		foreach ($modal as $k => $i) {
			$data['element'] .= '<tr>';
			$data['element'] .= '<td>'.$nom++.'</td>';
			$data['element'] .= '<td>'.$i->kode.'</td>';
			$data['element'] .= '<td>'.$i->uraian.'</td>';
			$data['element'] .= '<td>'.$i->volume.'</td>';
			$data['element'] .= '<td>'.$i->satuan.'</td>';
			$data['element'] .= '<td>'.$i->harga_satuan.'</td>';
			$data['element'] .= '<td>'.$i->jumlah.'</td>';
			$data['element'] .= '</tr>';
			$jumlah += $i->jumlah;
		}

		$data['element'] .= '<tr>';
		$data['element'] .= '<td colspan="6" align="center">Jumlah</td>';
		$data['element'] .= '<td>'.$jumlah.'</td>';
		$data['element'] .= '</tr>';

		$data['element'] .= '</tbody>';
		$data['element'] .= '</table>';
		$data['element'] .= '<br><br>';
		$data['element'] .= '<div class="pull-right text-center" style="width: 100%;"><h5>Desa Pagerngumbuk, '.date("d M Y").'</h5></div>';
		$data['element'] .= '<div class="pull-right text-center" style="width: 40%; margin-right:0px; border-bottom:1px solid black;">';
		$data['element'] .= '<h5 for="">Ketua Pelaksana</h5><br><br><br><br><br/>';
		$data['element'] .= '<h5><strong>'.$hasil->ketua_pelaksana.'</strong></h5>';
		$data['element'] .= '</div>';
		$data['element'] .= '<div class=" text-center" style="margin-top:35px; width: 40%; margin-right:0px; border-bottom:1px solid black;">';
		$data['element'] .= '<h5 for="">Disetujui </h5>';
		$data['element'] .= '<h5 for="" style="margin-top:-8px;">Kepala Desa</h5><br/><br><br><br>';
		$data['element'] .= '<h5><strong>Khoirul Anam</strong></h5>';
		$data['element'] .= '</div>';

		$this->load->view('v_cetak', $data);
	}

	function cetak_lpj($id){
		$detail = $this->m_crud->readBy('detail_kegiatan', array('id_pengaduan'=>$id));

		// $sql = "select `k`.`id_kegiatan` AS `id_kegiatan`,`k`.`bidang` AS `bidang`,`k`.`nama` AS `nama`,`k`.`tgl_mulai` AS `tgl_mulai`,`k`.`tgl_selesai` AS `tgl_selesai`,`k`.`output` AS `output`,`k`.`kendala` AS `kendala`,`k`.`saran` AS `saran`,`k`.`ketua_pelaksana` AS `ketua_pelaksana`,`k`.`catatan` AS `catatan`,`k`.`status` AS `status`,`k`.`lampiran_file` AS `lampiran_file`,`k`.`id_pengaduan` AS `id_pengaduan`,`k`.`kode` AS `kode`,`d`.`nama` AS `dana`,`p`.`nama` AS `pelapor`,`k`.`kode_kegiatan` AS `kode_kegiatan` from ((`tbl_kegiatan` `k` join `tbl_dana` `d` on((`k`.`kode` = `d`.`kode`))) join `detail_pengaduan` `p` on((`k`.`id_pengaduan` = `p`.`id_pengaduan`))) where ";
		// $detail = $this->db->query($sql."k.id_kegiatan=$id")->result();

		$hasil = $detail[0];
		$data['judul'] = 'Cetak LPJ';

		$data['element']  = "<div style='padding-bottom:20px;'>";
		$data['element'] .= "<h3 class='text-center'><strong>LAPORAN KEGIATAN ".strtoupper($hasil->nama)."</strong></h3>";
		$data['element'] .= "<h4 style='margin-top:-8px;' class='text-center'>DESA PAGERNGUMBUK KECAMATAN WONOAYU</h4>";
		$data['element'] .= "<h4 style='margin-top:-8px;' class='text-center'>TAHUN ANGGARAN ".TAHUN."</h4>";
		$data['element'] .= "</div>";

		$data['element'] .= '<div style="margin-left:25px;">';
		$data['element'] .= '<h5>Yth. Kepala Desa <strong>Khoirul Anam</strong></h5>';
		$data['element'] .= '<h5>melalui Sekretaris Kesa</h5>';
		$data['element'] .= '<h5>di Tempat</h5>';
		$data['element'] .= '</div>';
		$data['element'] .= '<div style="margin-top:25px; margin-left:25px;">';
		$data['element'] .= '<p>Dengan memperhatikan Peraturan Kepala Daerah........No.....Tahun.....Tentang Pengelolaan Keu Desa, bersama ini kami sampaikan Laporan Kegiatan '.ucwords($hasil->nama).' sebagai berikut:</p>';
		$data['element'] .= '</div>';
		$data['element'] .= '<h5 style="margin-top:25px; margin-left:25px;">A. Realisasi Keuangan:<h5>';
		$data['element'] .= '<table style="width:95%; margin-left:25px;" class="table table-bordered">';
		$data['element'] .= '<thead class="" style="background:#B6F081;">';
		$data['element'] .= '<th scope="col">#</th>';
		$data['element'] .= '<th scope="col">Kode</th>';
		$data['element'] .= '<th scope="col">Uraian</th>';
		$data['element'] .= '<th scope="col">Anggaran (Rp)</th>';
		$data['element'] .= '<th scope="col">Realisasi (Rp)</th>';
		$data['element'] .= '<th scope="col">%</th>';
		$data['element'] .= '</thead>';
		$data['element'] .= '<tbody>';
		$item = $this->m_crud->readBy('tbl_item_keuangan', array('id_kegiatan'=>$id));
		$no = 1;
		$jumlah = 0;
		$realisasi = 0;
		$prosentase = 0.0;
		foreach ($item as $k => $i) {
			$data['element'] .= '<tr>';
			$data['element'] .= '<td>'.$no.'</td>';
			$data['element'] .= '<td>'.$i->kode.'</td>';
			$data['element'] .= '<td>'.$i->uraian.'</td>';
			$data['element'] .= '<td>'.$i->jumlah.'</td>';
			$data['element'] .= '<td>'.$i->realisasi.'</td>';
			$data['element'] .= '<td>'.$i->prosentase.'</td>';
			$data['element'] .= '</tr>';
			$jumlah += $i->jumlah;
			$realisasi += $i->realisasi;
			$prosentase += $i->prosentase;
			$no++;
		}
		$data['element'] .= '<tr>';
		$data['element'] .= '<td colspan="3" align="center">Jumlah</td>';
		$data['element'] .= '<td>'.$jumlah.'</td>';
		$data['element'] .= '<td>'.$realisasi.'</td>';
		$data['element'] .= '<td>'.$prosentase/($no-1).'</td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '</tbody>';
		$data['element'] .= '</table>';
		$data['element'] .= '<h5 style="margin-top:25px; margin-left:25px;">B. Realisasi Fisik/Output:<h5>';
		$data['element'] .= '<h5 style="margin-left:45px;">Output akhir dari kegiatan yang dilakukan sebagai berikut:<h5>';
		$data['element'] .= '<table style="width:95%; margin-left:25px;" class="table table-bordered">';
		$data['element'] .= '<thead class="" style="background:#B6F081;">';
		$data['element'] .= '<th scope="col">#</th>';
		$data['element'] .= '<th scope="col">Uraian</th>';
		$data['element'] .= '<th scope="col">Satuan</th>';
		$data['element'] .= '<th scope="col">Volume</th>';
		$data['element'] .= '<th scope="col">Nilai (Rp)</th>';
		$data['element'] .= '<th scope="col">ket</th>';
		$data['element'] .= '</thead>';
		$data['element'] .= '<tbody>';
		$item = $this->m_crud->readBy('tbl_item_fisik', array('id_kegiatan'=>$id));
		$no = 1;
		$nilai = 0;
		foreach ($item as $k => $i) {
			$data['element'] .= '<tr>';
			$data['element'] .= '<td>'.$no++.'</td>';
			$data['element'] .= '<td>'.$i->uraian.'</td>';
			$data['element'] .= '<td>'.$i->satuan.'</td>';
			$data['element'] .= '<td>'.$i->volume.'</td>';
			$data['element'] .= '<td>'.$i->nilai.'</td>';
			$data['element'] .= '<td>'.$i->ket.'</td>';
			$data['element'] .= '</tr>';
			$nilai += $i->nilai;
		}
		$data['element'] .= '<tr>';
		$data['element'] .= '<td colspan="4" align="center">Jumlah</td>';
		$data['element'] .= '<td>'.$nilai.'</td>';
		$data['element'] .= '<td></td>';
		$data['element'] .= '</tr>';
		$data['element'] .= '</tbody>';
		$data['element'] .= '</table>';
		$data['element'] .= '<h5 style="margin-top:-10px; margin-left:25px;">Nilai output/aset merupakan keseluruhan belanja yang dikeluarkan (Belanja Barang dan Jasa + Belanja Modal)<h5>';
		$data['element'] .= '<h5 style="margin-top:25px; margin-left:25px;">C. Kendala dan Upaya Mengatasinya<h5>';
		$data['element'] .= '<h5 style="margin-top:-5px; margin-left:43px; text-align:justify;">'.$hasil->kendala.'<h5>';
		$data['element'] .= '<h5 style="margin-top:25px; margin-left:25px;">D. Saran dan Rekomendasi<h5>';
		$data['element'] .= '<h5 style="margin-top:-5px; margin-left:43px; text-align:justify;">'.$hasil->saran.'<h5>';
		$data['element'] .= '<div class="text-center" style="width: 40%; margin-left:60%; border-bottom:1px solid black;">';
		$data['element'] .= '<h5 for="">Desa Pagerngumbuk, '.date("d M Y").'</h5>';
		$data['element'] .= '<h5 for=""><strong>Ketua Pelaksana</strong></h5><br><br><br><br>';
		$data['element'] .= '<h5><strong>'.$hasil->ketua_pelaksana.'</strong></h5>';
		$data['element'] .= '</div>';
		// $data['element'] .= '<div class=" text-center" style="color:white;margin-top:35px; width: 40%; margin-right:0px;">';
		// $data['element'] .= '<h5 for="">Disetujui </h5>';
		// $data['element'] .= '<h5 for="" style="margin-top:-8px;">Kepala Desa</h5><br><br><br>';
		// $data['element'] .= '<h5><strong>Khoirul Anam</strong></h5>';
		// $data['element'] .= '</div>';

		$this->load->view('v_cetak', $data);
	}
}

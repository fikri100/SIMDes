<?php
// include './vendor/phpqrcode/qrlib.php';
// require './vendor/twilio/sdk/src/Twilio/autoload.php';
// use Twilio\Rest\Client;

class Surat extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if (!$this->session->userdata('nik_admin')){
			redirect(base_url("admin/akun/masuk"));
		}
		$this->load->model('m_crud');
	}

	function index(){
		$title['judul'] = 'Daftar Surat';
		$title['active'] = 'surat';

		$data['warga'] = $this->m_crud->readBy('tbl_warga', array('status <>'=>-1));
		$data['judul'] = 'surat';

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view('admin/surat/v_surat', $data);
		$this->load->view('admin/includes/v_footer');
	}

	function lihat($surat){
		$title['judul'] = CAPTION[$surat];
		$view = array('kelahiran' => 'v_surat_kelahiran', 'kematian'=>'v_surat_kematian', 'tdkmampu'=>'v_surat_tdkmampu', 'biodata'=>'v_surat_biodata', 'umum'=>'v_surat_umum', 'domisili'=>'v_surat_domisili');
		$title['active'] = 'surat';

		$tbl = TABEL[$surat];
		$data['baru'] = $this->m_crud->readBy($tbl, array('status'=>surat_baru));
		$data['proses'] = $this->m_crud->readBy($tbl, array('status'=>surat_proses));
		$data['selesai'] = $this->m_crud->readBy($tbl, array('status'=>surat_selesai));

		$data['judul'] = 'surat';
		$data['surat'] = $surat;
		$footer['tabel'] = $tbl;

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view("admin/surat/$view[$surat]", $data);
		$this->load->view('admin/includes/v_footer', $footer);
	}

	function detail($surat, $id){
		$tbl = TABEL[$surat];
		$caption = CAPTION[$surat];
		$view = array('kelahiran' => 'v_detail_kelahiran', 'kematian'=>'v_detail_kematian', 'tdkmampu'=>'v_detail_tdkmampu', 'biodata'=>'v_detail_biodata', 'umum'=>'v_detail_umum', 'domisili'=>'v_detail_domisili');

		$title['judul'] = "Detail $caption";
		$title['active'] = 'surat';
		$title['menu'] = "surat/lihat/$surat";

		$detail = $this->m_crud->readBy($tbl, array('id'=>$id));
		$data['detail'] = $detail[0];
		$data['judul'] = $title['judul'];
		$data['dusun'] = DUSUN;
		$data['surat'] = $surat;

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view("admin/surat/$view[$surat]", $data);
		$this->load->view('admin/includes/v_footer');
	}

	function form($surat, $action){
		$tbl = TABEL;;
		$nosurat = array('kelahiran' => '472.11', 'kematian'=>'472.12', 'tdkmampu'=>'401', 'biodata'=>'471.11', 'umum'=>'&ensp;&ensp;&ensp;', 'domisili'=>'470');
		$idsurat = array('kelahiran' => 'id_kelahiran', 'kematian'=>'id_kematian', 'tdkmampu'=>'id_tdk_mampu', 'biodata'=>'id_biodata', 'umum'=>'id_umum', 'domisili'=>'id_domisili');

		if (isset($_POST[$surat])) {
			$nik = $_POST['nik'];
			$data['status'] = surat_proses;

			$check = $this->m_crud->readBy('tbl_warga', array("nik"=>$nik));
			if (count($check)>0) {
				$status = true;
				// $config['allowed_types'] = 'jpg|png|jpeg|pdf';
				// $config['max_size']      = 2048;
				$data['nik'] = $nik;

				if ($surat=='kelahiran') {
					// KELAHIRAN
					$data['hubungan'] = $_POST['hubungan'];
					$data['anak'] = $_POST['anak'];
					$data['tgl_lahir'] = $_POST['tgl_lahir'];
					$data['tempat_lahir'] = $_POST['tempatlahir'];
					$data['jk'] = $_POST['jk'];
					$data['ayah'] = $_POST['ayah'];
					$data['ibu'] = $_POST['ibu'];
					$data['rw'] = $_POST['rw'];
					$data['rt'] = $_POST['rt'];

					// $config['upload_path']   = "./assets/img/surat/kelahiran";

					// // Upload Pengantar
					// $post = 'pengantar_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Keterangan
					// $post = 'ket_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK
					// $post = 'kk_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Buku Nikah
					// $post = 'buku_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }
				} elseif ($surat=='kematian') {
					// KEMATIAN
					$data['hubungan'] = $_POST['hubungan'];
					$data['nik_alm'] = $_POST['nik_alm'];
					$data['nama'] = $_POST['nama_alm'];
					$data['tgl_lahir'] = $_POST['tgllahir'];
					$data['jk'] = $_POST['jk'];
					$data['kwn'] = $_POST['kwn'];
					$data['agama'] = $_POST['agama'];
					$data['status_kawin'] = $_POST['status_kawin'];
					$data['pekerjaan'] = $_POST['pekerjaan'];
					$data['alamat'] = $_POST['alamat'];

					$data['tgl_meninggal'] = $_POST['tgl_meninggal'];
					$data['tempat_meninggal'] = $_POST['tempat_meninggal'];
					$data['penyebab'] = $_POST['penyebab'];
					$data['penentu'] = $_POST['penentu'];

					// $config['upload_path']   = "./assets/img/surat/kematian";

					// // Upload Pengantar
					// $post = 'pernyataan_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK
					// $post = 'kk_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK Alm
					// $post = 'kk_alm_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_alm_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }
				} elseif ($surat=='tdkmampu') {
					// TIDAK MAMPU
					$data['jenis'] = $_POST['jenis'];
					$data['nama_terkait'] = $_POST['nama_terkait'];
					$data['tujuan'] = $_POST['tujuan'];
					$data['pekerjaan'] = $_POST['pekerjaan'];
					$data['alamat'] = $_POST['alamat'];

					// $config['upload_path']   = "./assets/img/surat/tidak_mampu";
					// // Upload Pengantar
					// $post = 'pengantar_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Pernyataan
					// $post = 'pernyataan_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK
					// $post = 'kk_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }
				} elseif ($surat=='biodata') {
					// BIODATA
					$data['nama_kepala'] = $_POST['nama_kepala'];
					$data['alamat'] = $_POST['alamat'];

					$anggota = array();
					for ($i=0; $i < count($_POST['nama']); $i++) {
						$nama = $_POST['nama'][$i];
						$nik = $_POST['nik'][$i];
						$jk = $_POST['jk'][$i];
						$tempat = $_POST['tempat'][$i];
						$tgl = $_POST['tgl'][$i];
						$jk = $_POST['jk'][$i];
						$hubungan = $_POST['hubungan'][$i];
						$pendidikan = $_POST['pendidikan'][$i];
						$goldar = $_POST['goldar'][$i];
						$kawin = $_POST['kawin'][$i];
						$agama = $_POST['agama'][$i];
						$pekerjaan = $_POST['pekerjaan'][$i];
						$ayah = $_POST['ayah'][$i];
						$ibu = $_POST['ibu'][$i];

						array_push($anggota, array('nama'=>$nama,'nik'=>$nik,'jk'=>$jk,'tempat'=>$tempat,'tgl'=>$tgl,'jk'=>$jk,'hubungan'=>$hubungan,'pendidikan'=>$pendidikan,'goldar'=>$goldar,'kawin'=>$kawin,'agama'=>$agama,'pekerjaan'=>$pekerjaan,'ayah'=>$ayah,'ibu'=>$ibu));
					}
					$data['anggota'] = json_encode($anggota);


					// $config['upload_path']   = "./assets/img/surat/biodata";

					// // Upload Pengantar
					// $post = 'pengantar_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Akta Lahir
					// $post = 'akta_lahir_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Akta Kawin
					// $post = 'akta_kawin_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Ijazah
					// $post = 'ijazah_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK
					// $post = 'kk_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }
				} elseif ($surat=='umum') {
					// UMUM
					$data['tujuan'] = $_POST['tujuan'];

					// $config['upload_path']   = "./assets/img/surat/umum";
					// // Upload Pengantar
					// $post = 'pengantar_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK
					// $post = 'kk_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }
				} elseif ($surat=='domisili') {
					// DOMISILI
					$data['jenis'] = $_POST['jenis'];
					$data['nama_usaha'] = $_POST['nama_usaha'];
					$data['alamat'] = $_POST['alamat'];

					// $config['upload_path']   = "./assets/img/surat/domisili";

					// // Upload Pengantar
					// $post = 'pengantar_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KK
					// $post = 'kk_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload KTP
					// $post = 'ktp_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Akta Usaha
					// $post = 'akta_usaha_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Pernyataan
					// $post = 'pernyataan_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Perjanjian
					// $post = 'perjanjian_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }

					// // Upload Kepemilikan
					// $post = 'kepemilikan_file';
					// if ($_FILES[$post]["name"]!="") {
					// 	$filename = $_FILES[$post]['name'];

					// 	$name = $this->m_crud->upload_file($nik, $filename, $post, $config);
					// 	if ($name==false) {
					// 		$status = false;
					// 	} else {
					// 		$data[$post] = $config['upload_path'].'/'.$name;
					// 	}
					// }
				}

				if($status){
					if ($action=="tambah") {									
						$date = date("Y");
						$jumlah = $this->m_crud->readBy($tbl[$surat],array("year(tgl_buat)"=>$date, "status !="=>surat_ditolak));
						$id = count($jumlah)+1;
						$data[$idsurat[$surat]] = "$nosurat[$surat]/$id/438.7.9.14/$date";						
																							
						$pesan = $this->m_crud->save($tbl[$surat], $data);
					} elseif ($action=="ubah") {
						$id = $this->uri->segment(6);
						$pesan = $this->m_crud->update($tbl[$surat], $data, array('id'=>$id));
					}

					if ($pesan) {
						redirect(base_url("admin/surat/lihat/$surat"));
						die();
					}
				}
			} else {
				$this->session->set_flashdata( 'transaksi_error', '<div class="alert alert-danger" role="alert">Warga Tidak Terdaftar Di Dalam Sistem, Silahkan Masukkan Data Warga Terlebih Dahulu!</div>');
			}
		}

		if ($action=="tambah") {
			$kolom = $this->m_crud->daftar_kolom($tbl[$surat]);
			$hasil = new stdClass();
			foreach ($kolom as $key => $value) {
				$hasil->$value = '';
			}
			$data['hasil'] = $hasil;
		} elseif ($action=="ubah") {
			$id = $this->uri->segment(6);
			$hasil = $this->m_crud->readBy($tbl[$surat],array('id'=>$id))[0];
			$data['hasil'] = $hasil;
		}

		$data['judul'] = CAPTION[$surat];
		$view = array('kelahiran' => 'v_form_kelahiran', 'kematian'=>'v_form_kematian', 'tdkmampu'=>'v_form_tdkmampu', 'biodata'=>'v_form_biodata', 'umum'=>'v_form_umum', 'domisili'=>'v_form_domisili');

		$title['judul'] = "Form ".$data['judul'];
		$title['active'] = 'surat';
		$title['menu'] = "surat/lihat/$surat";
		$title['surat'] = $surat;

		$this->load->view('admin/includes/v_header', $title);
		$this->load->view("admin/surat/$view[$surat]", $data);
		$this->load->view('admin/includes/v_footer');
	}

	function proses($id, $surat, $status){
		$tbl = TABEL;
		$proses['status'] = $status;
		$pesan = $this->m_crud->update($tbl[$surat], $proses, array('id'=>$id));
		if ($pesan) {
			redirect(base_url("admin/surat/lihat/$surat"));
			die();
		}
	}

	function sign(){
		$img = $_POST['sign'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$image = uniqid() . '.png';
		$file = './assets/img/sign/' .$image;
		$success = file_put_contents($file, $data);

		$view = array('tbl_kelahiran'=> 'Kelahiran', 'tbl_kematian'=>'Kematian', 'tbl_tdkmampu'=>'Tidak Mampu', 'tbl_biodata'=>'Biodata', 'tbl_umum'=>'Umum', 'tbl_domisili'=>'Domisili');
		$surat = $view[$_POST['surat']];

		if ($_POST['surat']=='tbl_kelahiran') {
			$berkas = "- Surat Pengantar\n";
			$berkas .= "- Foto Kopi Surat Kelahiran\n";
			$berkas .= "- Foto Kopi KK & KTP\n";
			$berkas .= "- Foto Kopi Buku Nikah\n";
			$berkas .= "- Surat Kuasa jika diwakilkan";
		} elseif ($_POST['surat']='tbl_kematian') {
		}

		$warga = $this->m_crud->readBy('tbl_warga', array('nik'=>$_POST['nikwarga']))[0];
		$nama_warga = $warga->nama;
		$no_telp = (int)$warga->no_telp;
		$id_surat = $_POST['kode'];

		$account_sid = 'ACbb6478e248e195ac75938ff8da70865c';
		$auth_token = 'b6f7661c9596c83e06bc7ab8d773c1c6';

		// $twilio_number = '+17732077865';
		// $client = new Client($account_sid, $auth_token);
		// $client->messages->create(
		// 	"+62".$no_telp,
		// 	array(
		// 		'from' => $twilio_number,
		// 		'body' => "\nSelamat Pagi $nama_warga. \n<b>Surat Keterangan $surat ($id_surat)</b> sudah bisa diambil. Jangan lupa siapkan berkas-berkas yang diperlukan. Berikut berkas-berkas yang harus disiapkan: \n$berkas.\nAnda juga bisa mencetak mandiri di rumah."
		// 	)
		// );
		
		$tbl = TABEL;
		$proses['ttd_file'] = $file;
		$pesan = $this->m_crud->update($tbl[$surat], $proses, array('id'=>$id));
		if ($pesan) {
			redirect(base_url("admin/surat/lihat/$surat"));
			die();
		}

		// $this->m_crud->update($_POST['surat'], array('ttd_file'=>$file, 'status'=>surat_selesai), array('id'=>$_POST['idsurat']));
	}

	function tolak($id, $surat){
		$tbl = TABEL;
		if (isset($_POST['tanggapan'])) {
			$data['catatan'] = $_POST['catatan'];
			$pesan = $this->m_crud->update($tbl[$surat], $data,array('id'=>$id));
			$pesan = $this->m_crud->delete($tbl[$surat], array('id'=>$id));
			redirect(base_url("admin/surat/lihat/$surat"));
		}
	}

	function cetak($surat, $id){
		$view = array('kelahiran' => 'tbl_kelahiran', 'kematian'=>'tbl_kematian', 'tdkmampu'=>'tbl_tdk_mampu', 'biodata'=>'tbl_biodata', 'umum'=>'tbl_umum', 'domisili'=>'tbl_domisili');
		$hasil = $this->m_crud->readBy($view[$surat], array('id'=>$id))[0];
		$warga = $this->m_crud->readBy('tbl_warga', array('nik'=>$hasil->nik))[0];

		$data['element'] = "<div style='padding-bottom:20px; margin-right:13%; width:400px;' class='pull-right'>";
		$data['element'] .= "<h4 class='text-center'><strong>PEMERINTAH KABUPATEN SIDOARJO</strong></h4>";
		$data['element'] .= "<h4 style='margin-top:-8px;' class='text-center'><strong>KECAMATAN WONOAYU</strong></h4>";
		$data['element'] .= "<h4 style='font-size:20px; margin-top:-8px; font-weight:bold;' class='text-center'>KANTOR DESA PAGERNGUMBUK</h4>";
		$data['element'] .= "<h5 style='margin-top:-8px;' class='text-center'>Jl. Pagerjajar No.05 - Telp. 031-867146 Fax. 031-880880</h5>";
		$data['element'] .= "<h5 style='margin-top:-8px;' class='text-center'>SIDOARJO - 61261</h5>";
		$data['element'] .= "</div>";
		$data['element'] .= "<div style='padding-bottom:20px; width:3cm; margin-right:20px;' class='pull-right'>";
		$data['element'] .= "<img src='".base_url("assets/img/favicon.png")."' style='width:3cm;'>";
		$data['element'] .= "</div><br/><br/>";
		$data['element'] .= "<br/><br/>";
		$data['element'] .= "<br/><br/>";
		$data['element'] .= "<div class='col-md-12 text-center' style='border-top:3px solid black; padding-top:50px;'>";
		$judul = ($surat=='tdkmampu')?'TIDAK MAMPU':$surat;
		$data['element'] .= "<h5 style='text-transform:uppercase;'><strong>SURAT KETERANGAN ".$judul."</strong></h5>";
		if ($surat=='kelahiran') {
			$data['element'] .= "<h5 style='letter-spacing:1.5px;'><strong>Nomor: ".$hasil->id_kelahiran."</strong></h5>";
		} elseif ($surat=='kematian') {
			$data['element'] .= "<h5 style='letter-spacing:1.5px;'><strong>Nomor: ".$hasil->id_kematian."</strong></h5>";
		} elseif ($surat=='tdkmampu') {
			$data['element'] .= "<h5 style='letter-spacing:1.5px;'><strong>Nomor: ".$hasil->id_tdk_mampu."</strong></h5>";
		} elseif ($surat=='biodata') {
			$data['element'] .= "<h5 style='letter-spacing:1.5px;'><strong>Nomor: ".$hasil->id_biodata."</strong></h5>";
		} elseif ($surat=='umum') {
			$data['element'] .= "<h5 style='letter-spacing:1.5px;'><strong>Nomor: ".$hasil->id_umum."</strong></h5>";
		} elseif ($surat=='domisili') {
			$data['element'] .= "<h5 style='letter-spacing:1.5px;'><strong>Nomor: ".$hasil->id_domisili."</strong></h5>";
		}

		$data['element'] .= "</div>";
		$data['element'] .= "<div class='col-md-12' style='margin-top:30px;'>";
		$data['element'] .= "<p>Saya yang bertanda di bawah ini selaku Kepala Desa Pagerngumbuk, dengan ini menerangkan bahwa:</p>";

		if ($surat=='kelahiran') {
			$data['judul'] = 'Cetak Kelahiran';
			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:20px;border:none;">Tanggal</th>';
			$data['element'] .= '<td style="border:none;">: '.date("D, d M Y",strtotime($hasil->tgl_lahir)).'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:20px;border:none;">Tempat</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->tempat_lahir.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';

			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:200px;border:none;">Telah Lahir Seorang Anak</th>';
			$data['element'] .= '<td style="border:none;">: '.($hasil->jk=='L'?'Laki-laki':'Perempuan').'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:20px;border:none;">Yang bernama</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->anak.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:20px;border:none;">Dari seorang Ibu</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->ibu.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:20px;border:none;">Istri dari</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->ayah.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:20px;border:none;">Alamat</th>';
			$data['element'] .= '<td style="border:none;">: Desa Pagerngumbuk, RW '.$hasil->rw.', RT '.$hasil->rt.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
		} elseif ($surat=='kematian') {
			$data['judul'] = 'Cetak Kematian';

			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Nama</th>';
			$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->nama.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">NIK</th>';
			$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->nik_alm.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Jenis Kelamin</th>';
			$data['element'] .= '<td style="border:none;">: '.($hasil->jk=='L'?'Laki-laki':'Perempuan').'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Tanggal Lahir</th>';
			$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->tgl_lahir.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Agama</th>';
			$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->agama.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Pekerjaan</th>';
			$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->pekerjaan.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Kewarganegaraan</th>';
			$data['element'] .= '<td style="border:none; text-transform:uppercase;">: '.$hasil->kwn.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Alamat</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->alamat.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
			$data['element'] .= "<p>Telah meninggal pada:</p>";
			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Tanggal</th>';
			$data['element'] .= '<td style="border:none;">: '.date("D, d M Y",strtotime($hasil->tgl_meninggal)).'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Tempat</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->tempat_meninggal.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Penyebab</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->penyebab.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Penentu</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->penentu.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
		} elseif ($surat=="tdkmampu") {
			$data['judul'] = 'Cetak Tidak Mampu';

			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Nama</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->nama_terkait.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Pekerjaan</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->pekerjaan.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Alamat</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->alamat.'</td>';
			$data['element'] .= '</tr>';
			// $data['element'] .= '<tr>';
			// $data['element'] .= '<th style="width:120px;border:none;">Tujuan</th>';
			// $data['element'] .= '<td style="border:none;">: '.$hasil->tujuan.'</td>';
			// $data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
			$data['element'] .= "<p>Yang bersangkutan benar-benar warga Desa Pagerngumbuk yang tidak mampu untuk melakukan pembayaran $hasil->tujuan.</p><br/>";
		} elseif ($surat=='biodata') {
			$data['judul'] = 'Cetak Biodata';

			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:150px;border:none;">Kepala Keluarga</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->nama_kepala.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:150px;border:none;">Alamat</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->alamat.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
			$data['element'] .= "<p>Yang bersangkutan benar-benar warga Desa Pagerngumbuk yang memiliki anggota keluarga sebagai berikut:.</p><br/>";
			$data['element'] .= '<table class="table table-bordered">';
			$data['element'] .= '<tbody>';
			$data['element'] .= "
			<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIK</th>
			<th>JK</th>
			<th>TTL</th>
			<th>Hubungan</th>
			<th>Pendidikan</th>
			<th>Status Kawin</th>
			<th>Pekerjaan</th>
			</tr>
			";

			$anggota = json_decode($hasil->anggota);
			foreach ($anggota as $key => $value) {
				$no = $key+1;
				$data['element'] .= "<tr>
				<td style='text-transform:capitalize;'>$no</td>
				<td style='text-transform:capitalize;'>$value->nama</td>
				<td style='text-transform:capitalize;'>$value->nik</td>
				<td style='text-transform:capitalize;'>".($value->jk=='L'?'Laki-laki':'Perempuan')."</td>
				<td style='text-transform:capitalize;'>$value->tempat, $value->tgl</td>
				<td style='text-transform:capitalize;'>$value->hubungan</td>
				<td style='text-transform:capitalize;'>$value->pendidikan</td>
				<td style='text-transform:capitalize;'>$value->kawin</td>
				<td style='text-transform:capitalize;'>$value->pekerjaan</td>
				</tr>";
			}

			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
		} elseif ($surat=="umum") {
			$data['judul'] = 'Cetak Tidak Mampu';

			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Nama</th>';
			$data['element'] .= '<td style="border:none;">: '.$warga->nama.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">NIK</th>';
			$data['element'] .= '<td style="border:none;">: '.$hasil->nik.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Alamat</th>';
			$data['element'] .= '<td style="border:none;">: Dusun '.DUSUN[$warga->rw].' RW'.$warga->rw.'/RT'.$warga->rt.'</td>';
			$data['element'] .= '</tr>';
			// $data['element'] .= '<tr>';
			// $data['element'] .= '<th style="width:120px;border:none;">Tujuan</th>';
			// $data['element'] .= '<td style="border:none;">: '.$hasil->tujuan.'</td>';
			// $data['element'] .= '</tr>';
			$data['element'] .= '</tbody>';
			$data['element'] .= '</table>';
			$data['element'] .= "<p>Yang bersangkutan benar-benar warga Desa Pagerngumbuk sedang $hasil->tujuan.</p><br/>";
		} elseif ($surat=="domisili") {
			$data['judul'] = 'Cetak Domisili';

			$data['element'] .= '<table class="table table-borderless">';
			$data['element'] .= '<tbody>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">NIK</th>';
			$data['element'] .= '<td style="border:none;">: '.$warga->nik.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Nama</th>';
			$data['element'] .= '<td style="border:none;">: '.$warga->nama.'</td>';
			$data['element'] .= '</tr>';
			$data['element'] .= '<tr>';
			$data['element'] .= '<th style="width:120px;border:none;">Alamat</th>';
			$data['element'] .= '<td style="border:none;">: '.DUSUN[$warga->rw].', RT'.$warga->rt.' RW '.$warga->rw.'</td>';
			$data['element'] .= '</tr>';

			if ($hasil->jenis=="usaha") {
				$data['element'] .= '</tbody>';
				$data['element'] .= '</table>';
				$data['element'] .= "<p>Yang bersangkutan benar-benar warga Desa Pagerngumbuk yang memiliki usaha:";
				// $data['element'] .= "bernama $hasil->nama_usaha, yang beralamat di $hasil->alamat.</p><br/>";
				$data['element'] .= '<table class="table table-borderless">';
				$data['element'] .= '<tbody>';
				$data['element'] .= '<tr>';
				$data['element'] .= '<th style="width:120px;border:none;">Nama Usaha </th>';
				$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->nama_usaha.'</td>';
				$data['element'] .= '</tr>';
				$data['element'] .= '<tr>';
				$data['element'] .= '<th style="width:120px;border:none;">Alamat Usaha </th>';
				$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$hasil->alamat.'</td>';
				$data['element'] .= '</tr>';
				$data['element'] .= '</tbody>';
				$data['element'] .= '</table>';
				$data['element'] .= '<br/>';
			} else {				
				$data['element'] .= '<tr>';
				$data['element'] .= '<th style="width:120px;border:none;">TTL</th>';
				$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$warga->tempat_lahir.','.$warga->tgl_lahir.'</td>';
				$data['element'] .= '</tr>';
				$data['element'] .= '<tr>';
				$data['element'] .= '<th style="width:120px;border:none;">Pekerjaan</th>';
				$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$warga->pekerjaan.'</td>';
				$data['element'] .= '</tr>';
				$data['element'] .= '<tr>';
				$data['element'] .= '<th style="width:120px;border:none;">Agama</th>';
				$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.$warga->agama.'</td>';
				$data['element'] .= '</tr>';
				$data['element'] .= '<tr>';
				$data['element'] .= '<th style="width:120px;border:none;">Kawin</th>';
				$data['element'] .= '<td style="border:none; text-transform:capitalize;">: '.PERKAWINAN[$warga->kawin].'</td>';
				$data['element'] .= '</tr>';
				$data['element'] .= '</tbody>';
				$data['element'] .= '</table>';
				$data['element'] .= "<p>Yang bersangkutan benar-benar warga yang berdomisili di Desa Pagerngumbuk.</p><br/>";
			}
		}

		// $data['element'] .= "<p style='margin-top:-15px;'>Surat ini dibuat atas dasar yang sebenar-benarnya berdasarkan permohonan saudara/i $warga->nama ($hasil->nik)</p>";
		$data['element'] .= "<p style='margin-top:-15px;'>Demikian surat keterangan $judul ini dibuat untuk dapat digunakan sebagaimana semestinya.</p>";
		$data['element'] .= "</div>";
		$data['element'] .= '<div class="pull-right text-center" style="width: 250px; margin-top:20px; margin-right:50px; border-bottom:1px solid black;">';
		$data['element'] .= '<h5 for="">Desa Pagerngumbuk, '.date("d M Y").'</h5>';
		$data['element'] .= '<h5 for="">Kepala Desa</h5>';
		$data['element'] .= "<div style='width:7cm; display:inline-block;'>";
		
		if ($hasil->ttd_file!="") {
			$data['element'] .= "<img src='".base_url($hasil->ttd_file)."' style='width:5cm; float:right;'>";
		} else {
			$data['element'] .= "<br/><br/>";
			$data['element'] .= "<br/><br/>";
		}
		$data['element'] .= "</div>";
		$data['element'] .= '<h5><strong>Khoirul Anam, S.T, M.H</strong></h5>';
		$data['element'] .= '</div>';
		$this->load->view('v_cetak', $data);
	}

	
}

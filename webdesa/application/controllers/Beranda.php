<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	function __construct(){
		parent::__construct();
		// $this->load->library('pdf');
		$this->load->model('m_crud');
	}

	public function index()
	{
		$data['berita'] = $this->m_crud->customQuery("SELECT * FROM detail_berita WHERE status=".berita_valid." ORDER BY tgl_berita DESC LIMIT 3");
		$data['pengaduan'] = $this->m_crud->customQuery("SELECT * FROM detail_pengaduan WHERE status<>".pengaduan_ditolak." ORDER BY tgl_pengaduan DESC LIMIT 3");

		$title['judul'] = 'Desa Pagerngumbuk';
		$this->load->view('includes/v_header', $title);
		$this->load->view('includes/v_banner');
		$this->load->view('v_home', $data);
		$this->load->view('includes/v_footer');
	}

	// public function pdf()
  //   {
  //       $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  //       $pdf->setPrintFooter(false);
  //       $pdf->setPrintHeader(false);
  //       $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
  //       $pdf->AddPage('');
  //       $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
  //       $pdf->SetFont('');
	//
  //       $tabel = "
  //       <table border='1'>
  //             <tr>
  //                   <th> <b>Provinsi</b> </th>
  //                   <th> <b>Jumlah Penduduk</b> </th>
  //             </tr>
	//
  //             <tr>
  //                   <td> Aceh </td>
  //                   <td> 5.189.500 </td>
  //             </tr>
  //             <tr>
  //                   <td> Bali </td>
  //                   <td> 4.246.500 </td>
  //             </tr>
  //             <tr>
  //                   <td> Banten </td>
  //                   <td> 12.448.200 </td>
  //             </tr>
  //             <tr>
  //                   <td> Bengkulu </td>
  //                   <td> 1.934.300 </td>
  //             </tr>
  //             <tr>
  //                   <td> DI Yogyakarta </td>
  //                   <td> 3.762.200 </td>
  //             </tr>
  //             <tr>
  //                   <td> DKI Jakarta </td>
  //                   <td> 10.374.200 </td>
  //             </tr>
  //             <tr>
  //                   <td> Gorontalo </td>
  //                   <td> 1.168.200 </td>
  //             </tr>
  //             <tr>
  //                   <td> Jambi </td>
  //                   <td> 3.515.000 </td>
  //             </tr>
  //             <tr>
  //                   <td> Jawa Barat </td>
  //                   <td> 48.037.600 </td>
  //             </tr>
  //             <tr>
  //                   <td> Jawa Tengah </td>
  //                   <td> 34.257.900 </td>
  //             </tr>
  //             <tr>
  //                   <td> Jawa Timur </td>
  //                   <td> 39.293.000 </td>
  //             </tr>
  //             <tr>
  //                   <td> Kalimantan Barat </td>
  //                   <td> 4.932.500 </td>
  //             </tr>
  //             <tr>
  //                   <td> Kalimantan Selatan </td>
  //                   <td> 4.119.800 </td>
  //             </tr>
  //             <tr>
  //                   <td> Kalimantan Tengah </td>
  //                   <td> 2.605.300 </td>
  //             </tr>
  //             <tr>
  //                   <td> Kalimantan Timur </td>
  //                   <td> 3.575.400 </td>
  //             </tr>
  //             <tr>
  //                   <td> Kalimantan Utara </td>
  //                   <td> 691.100 </td>
  //             </tr>
  //             <tr>
  //                   <td> Kepulauan Bangka Belitung </td>
  //                   <td> 1.430.900 </td>
  //             </tr>
  //       </table>
  //       ";
  //       $pdf->writeHTML($tabel);
  //       $pdf->Output('file-pdf-codeigniter.pdf', 'I');
  //   }

}

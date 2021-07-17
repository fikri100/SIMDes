<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$judul?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?=base_url('assets/img/favicon.png')?>" rel="icon">
  <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="<?=base_url()?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <!-- <link href="<?=base_url()?>assets/lib/modal-video/css/modal-video.min.css" rel="stylesheet"> -->

  <!-- Main Stylesheet File -->
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

  <script src="<?=base_url()?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <!-- <script src="<?=base_url()?>assets/js/chart.min.js"></script> -->

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="<?=base_url()?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/lib/bootstrap/css/bootstrap-select.css" rel="stylesheet">

  <script src="<?=base_url()?>assets/js/Chart.min.js"></script>
  <script src="<?=base_url()?>assets/js/Chart.bundle.min.js"></script>
  <link href="<?=base_url()?>assets/css/Chart.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.bundle.min.js"></script> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.css" rel="stylesheet"> -->

  <!-- DataTable -->
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/signature-pad.js"></script>

  <link rel="stylesheet" href="<?=base_url()?>assets/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/datatable/dataTables.bootstrap4.css">
  <script type="text/javascript">
  function hapus(link){
    $('#btnyakin').attr('href', link);
    $('#modalhapus').modal('show');
  }
  </script>

  <style media="screen">
  .nav-link{
    font-weight: 500;
    color: #000;
  }

  .nav-tabs{
    background: #F7F7F7;
  }

  .btn-link{
    color: black;
    font-weight: bold;
    font-family: "Roboto", sans-serif;
    text-transform: capitalize;
    /* border: none; */
    font-size: 16px;
  }
  .btn-link:hover{
    text-decoration: none;
  }

  #btnkeluar:hover{
    color: red;
  }

  .container{
    max-width: none;
  }
  .containers{
    max-width: 90%;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  .form p, .form-group p{
    background: #F8D7DA;
    color: #A7676D;
    font-weight: 500;
    margin-top: -15px;
    padding: 2px;
    border-radius: 0px 0px 10px 10px;
    font-size: 0.7rem;
  }

  .form-group p{
    background: #F8D7DA;
    color: #A7676D;
    font-weight: 500;
    margin-top: 0px;
    text-align: center;
    padding: 2px;
    border-radius: 0px 0px 10px 10px;
    font-size: 0.7rem;
  }

  table{
    text-transform: capitalize;
  }

  .error{
    color: red;
  }
  /* header{
    border: 2px solid black;
  }
  a{
    font-weight: bold !important;
  } */
</style>
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="<?=base_url()?>" class="scrollto"><span>Desa</span> Pagerngumbuk</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <!-- <li class="menu-active"><a href="<?=base_url()?>">Beranda</a></li> -->
          <?php if (!isset($_SESSION['nik'])): ?>
            <li class="menu"><a href="<?=base_url("akun/masuk")?>">Masuk</a></li>
            <li class="menu"><a href="<?=base_url("akun/registrasi")?>">Registrasi</a></li>
          <?php endif; ?>

          <?php if (isset($_SESSION['nik'])): ?>
            <li class="menu-has-children menu"><a href="<?=base_url()?>surat">Surat</a>
              <ul>
                <li class="menu-has-children"><a href="<?=base_url()?>surat">Urus Surat</a>
                  <ul>
                    <li class="menu"><a href="<?=base_url()?>surat/buat_kelahiran">Kelahiran</a></li>
                    <li class="menu"><a href="<?=base_url()?>surat/kematian">Kematian</a></li>
                    <li class="menu"><a href="<?=base_url()?>surat/tidak_mampu">Tidak Mampu</a></li>
                    <li class="menu"><a href="<?=base_url()?>surat/biodata">Biodata</a></li>
                    <li class="menu"><a href="<?=base_url()?>surat/umum">Umum</a></li>
                    <li class="menu"><a href="<?=base_url()?>surat/domisili">Domisili</a></li>
                  </ul>
                </li>
                <li class="menu"><a href="<?=base_url()?>surat/riwayat">Riwayat Surat</a></li>
              </ul>
            </li>
          <?php endif; ?>

          <li class="menu-has-children"><a href="#">Pengaduan</a>
            <ul>
              <li class="menu"><a href="<?=base_url()?>pengaduan/lihat/semua">Lihat Pengaduan</a></li>
              <?php if (isset($_SESSION['nik'])): ?>
                <li class="menu"><a href="<?=base_url()?>pengaduan/buat_pengaduan">Buat Pengaduan</a></li>
                <li class="menu"><a href="<?=base_url()?>pengaduan/riwayat">Riwayat Pengaduan</a></li>
              <?php endif; ?>
            </ul>
          </li>
          <!-- <li class="menu-has-children"><a href="<?=base_url("kegiatan")?>">Kegiatan</a></li> -->
          <li class="menu-has-children"><a href="#">Potensi Desa</a>
            <ul>
              <li><a href="<?=base_url()?>potensi/profil">Profil Desa</a></li>
              <li><a href="<?=base_url()?>potensi/bumdes">Data BUMDes</a></li>
              <li><a href="<?=base_url()?>potensi/umkm">Data UMKM</a></li>
              <li><a href="<?=base_url()?>potensi/goldar">Data Golongan Darah</a></li>
              <li><a href="<?=base_url()?>potensi/pendidikan">Data Pendidikan</a></li>
              <li><a href="<?=base_url()?>potensi/pekerjaan">Data Pekerjaan</a></li>
              <li><a href="<?=base_url()?>potensi/agama">Data Agama</a></li>
              <li><a href="<?=base_url()?>potensi/dana">Data Sumber Anggaran</a></li>
              <li><a href="<?=base_url()?>potensi/detail">Detail Potensi</a></li>
            </ul>
          </li>
          <li class="menu-has-children"><a href="#">Berita</a>
            <ul>
              <li><a href="<?=base_url("berita/lihat/semua")?>">Lihat Berita</a></li>
              <?php if (isset($_SESSION['nik'])): ?>
                <li><a href="<?=base_url("berita/buat")?>">Tulis Berita</a></li>
                <li><a href="<?=base_url("berita/riwayat")?>">Riwayat Berita</a></li>
              <?php endif; ?>
            </ul>
          </li>

          <?php if (isset($_SESSION['nik'])): ?>
            <?php $foto = ($_SESSION['foto']!="")?$_SESSION['foto']:'assets/img/warga/foto/default_profil.jpg'; ?>
            <li class="menu-has-children"><a href="<?=base_url()?>akun/profil" style="text-decoration:none;"><img class="" style="width:30px; height:30px; border-radius:100%;" src="<?=base_url($foto)?>" alt="">&ensp; <?=$_SESSION['nama']?> </a>
              <ul>
                <li><a href="<?=base_url()?>akun/profil" style="text-decoration:none;"><i class="fa fa-address-book-o" style="font-size:18px"></i>&ensp; Akun</a></li>
                <!-- <li><a href="<?=base_url()?>informasi/profil">Ganti Kata Sandi</a></li> -->
                <li><a href="<?=base_url()?>akun/ganti_pass" style="text-decoration:none;" id="btnkeluar"> Ganti Kata Sandi</a></li>
                <li><a href="<?=base_url()?>akun/keluar" style="text-decoration:none;" id="btnkeluar"> Keluar</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <br>
  <!-- <section id="get-started" class="padd-section text-center wow fadeInUp">
  <div class="container">
  <div class="row"> -->

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title><?=$judul?></title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="<?=base_url("assets/admin")?>/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Animation library for notifications   -->
  <link href="<?=base_url("assets/admin")?>/css/animate.min.css" rel="stylesheet"/>

  <!--  Light Bootstrap Table core CSS    -->
  <link href="<?=base_url("assets/admin")?>/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="<?=base_url("assets/admin")?>/css/demo.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->
  <link href="<?=base_url("assets/admin")?>/css/pe-icon-7-stroke.css" rel="stylesheet" />

  <!-- DataTable -->
  <script src="<?=base_url()?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/lib/jquery/jquery-migrate.min.js"></script>

  <script type="text/javascript" src="<?=base_url()?>assets/datatable/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/dataTables.bootstrap4.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/datatable/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="<?=base_url()?>assets/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/datatable/dataTables.bootstrap4.css">

  <script src="<?=base_url("assets/js/jquery.validate.min.js")?>"></script>
  <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/signature-pad.js"></script>

  <script type="text/javascript">
  function proses(link){
      $('#btnyakin').attr('href', link);
      $('#modalhapus').modal('show');
  }

  function buatKegiatan(link){
      $('#formKegiatan').attr('action', link);
      $('#btnyakin').attr('href', link);
      $('#modalKegiatan').modal('show');
  }

  function buatRencana(link){
      $('#formRencana').attr('action', link);
      $('#modalRencana').modal('show');
  }

  function tambahItem(link){
      $('#formItem').attr('action', link);
      $('#modalItem').modal('show');
  }

  function catatan(link){
      $('#formCatatan').attr('action', link);
      $('#modalCatatan').modal('show');
  }

  function buatTanggapan(link){
      $('#formTanggapan').attr('action', link);
      $('#btnyakin').attr('href', link);
      $('#modaltanggapan').modal('show');
  }

  function showSign(id,nama_warga){
    $('#idsurat').val($('#'+id).data("idsurat"));
    $('#kode').val($('#'+id).data("kode"));
    $('#nikwarga').val($('#'+id).data("nikwarga"));
    $('#sign-modal').modal('show');
  }

  // function doSign(id){
  //   $('#kode').val(id);
  //   $('#sign-modal').modal('show');
  // }

  window.datas = [];
  window.datab = '[]';
  window.datam = '[]';
  window.undef;
  function pilihItem(id,kode_kegiatan){
    var kode = kode_kegiatan;
    var tipe = $('#'+id).data("tipe");
    var uraian = $('#'+id).data("uraian");
    var satuan = $('#'+id).data("satuan");
    var harga_satuan = $('#'+id).data("hst");
    var volume = $('#'+id+"-qty").val();

    // var databar;
    // var datamod;
    // if (tipe==1) {
    //   var databar = JSON.parse(window.datab);
    //   databar.push({"kode":kode+'.'+tipe, "uraian":uraian, "satuan":satuan, "volume":volume, "harga_satuan":harga_satuan, "tipe":tipe});
    //   window.datab = JSON.stringify(databar);
    // } else if (tipe==2) {
    //   var datamod = JSON.parse(window.datam);
    //   datamod.push({"kode":kode+'.'+tipe, "uraian":uraian, "satuan":satuan, "volume":volume, "harga_satuan":harga_satuan, "tipe":tipe});
    //   window.datam = JSON.stringify(datamod);
    // }
    if (tipe==1 || tipe==2) {      
      window.datas.push({"kode":kode+'.'+tipe, "uraian":uraian, "satuan":satuan, "volume":volume, "harga_satuan":harga_satuan, "tipe":tipe});
    }
    // window.datas = JSON.parse(window.datab).concat(JSON.parse(window.datam));
    showItem(window.datas);
  }

  function showItem(data){
    console.log(data);
    var html = '';
    $("input[name='daftarItem']").val(JSON.stringify(data));
    // $("input[name='daftarItemModal']").val(data2);
    var panjang = 0;
    if(data!==window.undef){
      panjang = data.length;
    }
    var tipe = 0;
    for (var i=0; i < panjang; i++){
      if (data[i].tipe==1) {
        tipe = "1-Belanja Barang";
      } else if (data[i].tipe==2) {
        tipe = "2-Belanja Modal";
      } else {
        tipe = "Lainnya";
      }
      // html += '<tr><td>'+(i+1)+'</td><td>'+data[i].kode+'</td><td>'+data[i].uraian+'</td><td>'+data[i].volume+'</td><td>'+data[i].satuan+'</td><td>'+data[i].hst+'</td>';
      // $('#listitemkeuangan').append(`
      html +=`
        <div class="row" id="rowitemkeuangan">
        <div class="col-md-2" style="display:none;">
        <label for="" class="control-label modal-label">Kode <span class="text-danger">*</span> </label>
        <input maxlength="7" class="form-control" type="text" name="kode[]" title="Isi Kode" value="`+data[i].kode+`" required readonly>
        </div>
        <div class="col-md-3">
        <label for="" class="control-label modal-label">Uraian <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="uraian[]" title="Isi Uraian" value="`+data[i].uraian+`" required readonly>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
        <input class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume[]" value="`+data[i].volume+`" required>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="satuan[]" value="`+data[i].satuan+`" required readonly>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">HST (Rp) <span class="text-danger">*</span> </label>
        <input class="form-control" type="number" min="1" pattern="[0-9]+" name="harga[]" title="Masukkan Angka" value="`+data[i].harga_satuan+`" required readonly>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Tipe <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="tipe[]" title="Masukkan Tipe" value="`+tipe+`" required readonly>
        </div>
        <div class="col-md-1">
        <label for="" class="control-label modal-label"><span class="text-danger"></span> </label>
        <button type="button" class="btn btn-danger btn-fill form-control" name="button" id="btnhapusitemkeuangan`+i+`" data-hapus="`+i+`" onclick="hapusItem(`+i+`)">Hapus</button>
        </div>
        </div>`;
    }
    // console.log(html);
    // $('#listItem').html(html);
    $('#listitemkeuangan').html(html);
  }


  function hapusItem(id){
    // var data = JSON.parse(window.datas);
    // data.splice(id,1);
    // window.datas = JSON.stringify(data);
    window.datas.splice(id,1);
    showItem(window.datas);
  }


  </script>
  <style media="screen">
  table{
    text-transform: capitalize;
  }

  #file_lampiran img:hover{
    padding: 10px;
    transition: all 0.5s ease-in-out 0s;
  }

  .active{
    color: red;
  }

  .error{
    color: red;
  }

/*
  .form-control, .card{
  border: 2px solid black;
  }

  *{
  font-weight: bold;
  border-radius: 0px;
  } */
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar" data-color="teal" data-image="<?=base_url("assets/admin")?>/img/sidebar-5.jpg">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="<?=base_url("admin/dashboard")?>" class="simple-text">
            Web Desa
          </a>
        </div>

        <ul class="nav">
          <!-- <li class="<?=($active=='dashboard')?'active':''?>">
          <a href="<?=base_url("admin/dashboard")?>">
          <i class="pe-7s-graph"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="<?=($active=='warga')?'active':''?>">
      <a href="<?=base_url("admin/warga")?>">
      <i class="pe-7s-id"></i>
      <p>Warga</p>
    </a>
  </li>
  <li class="<?=($active=='surat')?'active':''?>">
  <a href="<?=base_url("admin/surat")?>">
  <i class="pe-7s-mail"></i>
  <p>Surat</p>
</a>
</li>
<li class="<?=($active=='pengaduan')?'active':''?>">
<a href="<?=base_url("admin/pengaduan")?>">
<i class="pe-7s-attention"></i>
<p>Pengaduan</p>
</a>
</li>
<li class="<?=($active=='kegiatan')?'active':''?>">
<a href="<?=base_url("admin/kegiatan")?>">
<i class="pe-7s-bicycle"></i>
<p>Kegiatan</p>
</a>
</li>
<li class="<?=($active=='dana')?'active':''?>">
<a href="<?=base_url("admin/dana")?>">
<i class="pe-7s-cash"></i>
<p>Dana</p>
</a>
</li>
<li class="<?=($active=='berita')?'active':''?>">
<a href="<?=base_url("admin/berita")?>">
<i class="pe-7s-news-paper"></i>
<p>Berita</p>
</a>
</li>
<li class="<?=($active=='umkm')?'active':''?>">
<a href="<?=base_url("admin/umkm")?>">
<i class="pe-7s-shopbag"></i>
<p>UMKM</p>
</a>
</li>
<li class="<?=($active=='bumdes')?'active':''?>">
<a href="<?=base_url("admin/bumdes")?>">
<i class="pe-7s-culture"></i>
<p>BUMDes</p>
</a>
</li>
<li class="<?=($active=='potensi')?'active':''?>">
<a href="<?=base_url("admin/potensi")?>">
<i class="pe-7s-graph2"></i>
<p>Potensi Desa</p>
</a>
</li> -->
</ul>
</div>
</div>

<div class="main-panel">
  <nav class="navbar navbar-default navbar-fixed" style="position:fixed; z-index:9999;">
    <div class="container-fluid" style="width:100vw;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
          <?php if ($_SESSION['role_admin']==1 || $_SESSION['role_admin']==2): ?>
            <li class="<?=($active=='dashboard')?'active':''?>">
              <a href="<?=base_url("admin/dashboard")?>">
                <p>Dashboard</p>
              </a>
            </li>
          <li class="<?=($active=='warga')?'active':''?>">
            <a href="<?=base_url("admin/warga")?>">
              <p>Warga</p>
            </a>
          </li>
          <li class="dropdown <?=($active=='surat')?'active':''?>">
            <a href="<?=base_url("admin/surat")?>" class="dropdown-toggle" data-toggle="dropdown">
              Surat
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?=base_url()?>admin/surat/lihat/kelahiran">Kelahiran</a></li>
              <li><a href="<?=base_url()?>admin/surat/lihat/kematian">Kematian</a></li>
              <li><a href="<?=base_url()?>admin/surat/lihat/tdkmampu">Tidak Mampu</a></li>
              <li><a href="<?=base_url()?>admin/surat/lihat/biodata">Biodata</a></li>
              <li><a href="<?=base_url()?>admin/surat/lihat/umum">Umum</a></li>
              <li><a href="<?=base_url()?>admin/surat/lihat/domisili">Domisili</a></li>
            </ul>
          </li>
          <?php endif; ?>
          <li class="<?=($active=='pengaduan')?'active':''?>">
            <a href="<?=base_url("admin/pengaduan")?>">
              <p>Pengaduan</p>
            </a>
          </li>
          <li class="<?=($active=='kegiatan')?'active':''?>">
            <a href="<?=base_url("admin/kegiatan")?>">
              <p>Kegiatan</p>
            </a>
          </li>
          <?php if ($_SESSION['role_admin']==1 || $_SESSION['role_admin']==2): ?>
          <li class="<?=($active=='dana')?'active':''?>">
            <a href="<?=base_url("admin/dana")?>">
              <p>Dana</p>
            </a>
          </li>
          <li class="<?=($active=='item')?'active':''?>">
            <a href="<?=base_url("admin/item")?>">
              <p>Item</p>
            </a>
          </li>
          <li class="<?=($active=='berita')?'active':''?>">
            <a href="<?=base_url("admin/berita")?>">
              <p>Berita</p>
            </a>
          </li>
          <li class="<?=($active=='umkm')?'active':''?>">
            <a href="<?=base_url("admin/umkm")?>">
              <p>UMKM</p>
            </a>
          </li>
          <li class="<?=($active=='bumdes')?'active':''?>">
            <a href="<?=base_url("admin/bumdes")?>">
              <p>BUMDes</p>
            </a>
          </li>
          <li class="<?=($active=='potensi')?'active':''?>">
            <a href="<?=base_url("admin/potensi")?>">
              <p>Potensi</p>
            </a>
          </li>
          <?php endif; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="" style="text-decoration:none;">
              <img class="" style="width:25px; height:25px; border-radius:100%;" src="<?=base_url('assets/img/warga/foto/default_profil.jpg')?>" alt="">&ensp; <?=$_SESSION['nama_admin']?>
            </a>
          </li>
          <li>
            <a href="<?=base_url("admin/akun/keluar")?>">
              Keluar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content" style="margin-top:11vh;">
    <div class="container-fluid">
      <div class="row">

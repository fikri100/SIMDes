<style media="screen">
  .box-info{
    /* border: 1px solid #111111; */
    border-radius: 10px;
    padding: 20px 40px;
    text-align: center;
    max-width: 200px;
    margin-right: 10px;
    margin-bottom: 10px;
  }
  .box-info:hover{
    margin: 10px;
    transition: 0.5s;
  }
  .caption-info{
    font-size: 17px;
  }
  .caption-info span{
    font-size: 22px;
  }
  a{
    color: #000;
  }
</style>
<div class="col-md-12 bg-light p-3" style="height:1000px; background:white; padding:0 40px;">
  <br>
  <h3>Sistem Informasi Layanan Pengurusan Surat dan Pengaduan Aspirasi Warga Desa Pagerngumbuk</h3>
  <?php if($_SESSION['role_admin']!=3):?>
  <div class="col-md-12">
  <hr>
  <h3 style="border-left:3px solid #493280;">&ensp;Surat</h3>
    <div class="row">
      <a class="" href="<?=base_url("admin/surat/lihat/kelahiran")?>">
        <div class="col-md-2 box-info bg-primary">
          <label class="caption-info">Kelahiran <br> <span><?=$kelahiran?></span></label>
        </div>
      </a>
      <a class="" href="<?=base_url("admin/surat/lihat/kematian")?>">
        <div class="col-md-2 box-info bg-danger">
          <label class="caption-info">Kematian <br> <span><?=$kematian?></span></label>
        </div>
      </a>
      <a class="" href="<?=base_url("admin/surat/lihat/tdkmampu")?>">
        <div class="col-md-2 box-info bg-warning">
          <label class="caption-info">Tidak Mampu <br> <span><?=$tdk_mampu?></span></label>
        </div>
      </a>
      <div class="col-md-12"></div>
      <a class="" href="<?=base_url("admin/surat/lihat/biodata")?>">
        <div class="col-md-2 box-info bg-success">
          <label class="caption-info">Biodata <br> <span><?=$biodata?></span></label>
        </div>
      </a>
      <a class="" href="<?=base_url("admin/surat/lihat/umum")?>">
        <div class="col-md-2 box-info" style="background:#AAAAAA;">
          <label class="caption-info">Umum <br> <span><?=$umum?></span></label>
        </div>
      </a>
      <a class="" href="<?=base_url("admin/surat/lihat/domisili")?>">
        <div class="col-md-2 box-info bg-info">
          <label class="caption-info">Domisili <br> <span><?=$domisili?></span></label>
        </div>
      </a>
    </div>
  </div>
  <?php endif; ?>
  <div class="col-md-12">
    <hr>
    <h3 style="border-left:3px solid #493280;">&ensp;Pengaduan</h3>
    <div class="row">
      <a href="<?=base_url("admin/pengaduan")?>">
        <div class="col-md-2 box-info bg-primary">
          <label class="caption-info">Pengaduan <br> <span><?=$pengaduan?></span></label>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-12">
    <hr>
    <h3 style="border-left:3px solid #493280;">&ensp;Kegiatan</h3>
    <div class="row">
      <?php if($_SESSION['role_admin']!=3):?>
      <a href="<?=base_url("admin/kegiatan")?>">
        <div class="col-md-2 box-info bg-primary">
          <label class="caption-info">Buat RAB <br> <span><?=$rab?></span></label>
        </div>
      </a>
      <?php endif;?>  
      <a href="<?=base_url("admin/kegiatan")?>">
        <div class="col-md-2 box-info bg-danger">
          <label class="caption-info">Validasi RAB <br> <span><?=$valid?></span></label>
        </div>
      </a>
      <?php if($_SESSION['role_admin']!=3):?>
      <a href="<?=base_url("admin/kegiatan")?>">
        <div class="col-md-2 box-info bg-danger">
          <label class="caption-info">Revisi RAB <br> <span><?=$revisi?></span></label>
        </div>
      </a>
      <a href="<?=base_url("admin/kegiatan")?>">
        <div class="col-md-2 box-info bg-warning">
          <label class="caption-info">On Progress <br> <span><?=$progres?></span></label>
        </div>
      </a>
      <a href="<?=base_url("admin/kegiatan")?>">
        <div class="col-md-2 box-info bg-success">
          <label class="caption-info">Buat LPJ <br> <span><?=$lpj?></span></label>
        </div>
      </a>
      <?php endif;?>  
    </div>
  </div>
<?php if($_SESSION['role_admin']!=3):?>
  <div class="col-md-12">
    <hr>
    <h3 style="border-left:3px solid #493280;">&ensp;Berita</h3>
    <div class="row">
      <a href="<?=base_url("admin/berita")?>">
        <div class="col-md-2 box-info bg-primary">
          <label class="caption-info">Berita <br> <span><?=$berita?></span></label>
        </div>
      </a>
    </div>
  </div>
<?php endif;?>  

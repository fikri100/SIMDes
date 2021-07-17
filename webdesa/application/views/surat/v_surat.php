<style media="screen">
  /* .feature-block{
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  } */

  .img-fluid{
    height: 100px;
    width: 100px;
  }
</style>
<section id="get-started" class="padd-section text-center wow fadeInUp">
  <div class="containers">
    <div class="section-title text-center" style="margin-top:-10px;">
      <h2>Daftar Surat</h2>
      <p class="separator" style="margin-top:-20px;">Berikut daftar surat yang dapat diurus oleh warga masyarakat.</p>
    </div>
    <div class="row" style="margin-top:20px;">
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="feature-block">
          <a href="<?=base_url("surat/buat_kelahiran")?>"><img src="<?=base_url()?>assets/img/surat/icon/about-img.png" alt="img" class="img-fluid"></a>
          <a href="<?=base_url("surat/buat_kelahiran")?>"><h4>Surat Keterangan <br/>Kelahiran</h4></a>          
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="feature-block">
          <a href="<?=base_url("surat/kematian")?>"><img src="<?=base_url()?>assets/img/surat/icon/tombstone.png" alt="img" class="img-fluid"></a>
          <a href="<?=base_url("surat/kematian")?>"><h4>Surat Keterangan <br/>Kematian</h4></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-5">
        <div class="feature-block">
          <a href="<?=base_url("surat/tidak_mampu")?>"><img src="<?=base_url()?>assets/img/surat/icon/analytics.png" alt="img" class="img-fluid"></a>
          <a href="<?=base_url("surat/tidak_mampu")?>"><h4>Surat Keterangan <br/>Tidak Mampu</h4></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="feature-block">
          <a href="<?=base_url("surat/biodata")?>"><img src="<?=base_url()?>assets/img/surat/icon/driving-license.png" alt="img" class="img-fluid"></a>
          <a href="<?=base_url("surat/biodata")?>"><h4>Surat Keterangan <br/>Biodata Penduduk</h4></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="feature-block">
          <a href="<?=base_url("surat/umum")?>"><img src="<?=base_url()?>assets/img/surat/icon/file.png" alt="img" class="img-fluid"></a>
          <a href="<?=base_url("surat/umum")?>"><h4>Surat Keterangan <br/>Umum Desa</h4></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="feature-block">
          <a href="<?=base_url("surat/domisili")?>"><img src="<?=base_url()?>assets/img/surat/icon/online-store.png" alt="img" class="img-fluid"></a>
          <a href="<?=base_url("surat/domisili")?>"><h4>Surat Keterangan <br/>Domisili Usaha</h4></a>
        </div>
      </div>
    </div>
  </div>
</section>











<!-- <?php //echo form_open_multipart(base_url("surat/isi"),array('class' => 'form-horizontal')); ?>
<textarea name="isiartikel" id="ckeditor" class="ckeditor" rows="8" cols="80"></textarea>
<input type="submit" name="gas" value="Gas">
<?php //echo form_close(); ?>
<script type="text/javascript">
CKEDITOR.disableAutoInline = true;
CKEDITOR.inline = editable;
</script> -->

<style media="screen">
.card{
  transition: 0.5s;
}
</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="container" id="container">
    <div class="section-title text-center">
      <h2>Lihat Pengaduan</h2>
      <a href="<?=base_url("pengaduan/lihat/semua")?>" class="btn <?=($active=='semua')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Semua</a>
      <a href="<?=base_url("pengaduan/lihat/infrastruktur")?>" class="btn <?=($active=='infrastruktur')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Infrastruktur</a>
      <a href="<?=base_url("pengaduan/lihat/pendidikan")?>" class="btn <?=($active=='pendidikan')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Pendidikan</a>
      <a href="<?=base_url("pengaduan/lihat/kesehatan")?>" class="btn <?=($active=='kesehatan')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Kesehatan</a>
      <a href="<?=base_url("pengaduan/lihat/administrasi")?>" class="btn <?=($active=='administrasi')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Administrasi</a>
      <a href="<?=base_url("pengaduan/lihat/kasus")?>" class="btn <?=($active=='kasus')?'btn-warning':'btn-white'?> border-warning text-dark px-4">Kasus</a>
      <a href="<?=base_url("pengaduan/lihat/lain")?>" class="btn <?=($active=='lain')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Lainnya</a>
      <br><br>
      <!-- <p class="separator" style="">Mohon isi data dibawah dengan sebenar-benarnya.</p> -->
      <?php echo form_open_multipart(base_url("pengaduan/cari/"),array('class' => 'form-horizontal')); ?>
      <div class="col-md-4 offset-md-4 input-group">
        <input class="form-control" type="text" name="judul" placeholder="Cari Pengaduan . . ." value="" required>
        <div class="input-group-append">
          <select class="form-control" name="bidang" title="Pilih Bidang" required>
            <option value="semua">Semua</option>
            <option value="infrastruktur">Infrastruktur</option>
            <option value="pendidikan">Pendidikan</option>
            <option value="kesehatan">Kesehatan</option>
            <option value="administrasi">Administrasi</option>
            <option value="kasus">Kasus</option>
            <option value="lain">Lain-lain</option>
          </select>
          <button name="caripengaduan" id="button-addon5" type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
        </div>
        <!-- <div class="invalid-tooltip">
        Please choose a unique and valid username.
      </div> -->
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="col-md-12">
    <div class="row">
      <?php foreach ($pengaduan as $p): ?>
        <?php $judul = $p->judul; ?>
        <div class="col-md-4 text-left">
          <div id="cardpengaduan">
            <img id="imgberita" src="<?=base_url($p->lampiran_file)?>" alt="Berita" class="">
            <div id="isiberita" class="pl-2"><br>
              <label id="tglpengaduan" style="" for="" class=""><i class="fa fa-calendar"></i> <?=$p->tgl_pengaduan?></label><br>
              <label for="" style="text-transform:capitalize;"><span class="badge badge-info py-2"><?=$p->bidang?></span>&ensp;<span class="badge badge-warning py-2"><?=$p->kategori?></span>&ensp;<span class="badge badge-success py-2"><?php $cont->cek_status($p->status)?></span> </label><br>
              <a id="judulberita" href="<?=base_url("pengaduan/detail/$p->id_pengaduan")?>" style="" class="" data-toggle="tooltip" title="<?=$judul?>"><?=substr($judul, 0, 60); ?>...</a><br>
              <label id="penulis" style="" for="" class="float-left"><?=$p->nama?></label><br>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</section>

<script type="text/javascript">
$(document).ready(function (){


  // (function ($) {
  //   $.fn.replaceClass = function (pFromClass, pToClass) {
  //     return this.removeClass(pFromClass).addClass(pToClass);
  //   };
  // }(jQuery));

  // function pindah(num){
  //   $('#pills-tab li:nth-child('+num+') a').replaceClass('disabled','enabled');
  //   $('#pills-tab li:nth-child('+num+') a').tab('show');
  //   $('#pills-tab li a').replaceClass('enabled','disabled');
  // }
  //
  // CKEDITOR.disableAutoInline = true;
  // CKEDITOR.inline = editable;

  // $('#judulberita').tooltip();
});
</script>

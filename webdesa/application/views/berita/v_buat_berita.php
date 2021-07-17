<style media="screen">
.card{
  transition: 0.5s;
}

/* .form-control, .card{
border: 2px solid black;
}

*{
font-weight: bold;
} */
</style>
<?php
  $judul = '';
  $rubrik = 'kosong';
  $uraian = '';  
  $action = 'buat';
  if ($this->uri->segment('2')=='ubah') {
    $action = 'ubah/'.$this->uri->segment('3');
    $judul = $berita->judul;
    $uraian = $berita->isi;
    $rubrik = $berita->rubrik;
  }
?>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
      <h2>Berita / Kegiatan</h2>
      <!-- <p class="separator" style="">Mohon isi data dibawah dengan sebenar-benarnya.</p> -->
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart(base_url("berita/$action"),array('class' => 'form-horizontal')); ?>
        <div class="card wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
          <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
              <!-- <a class="nav-link disabled active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Data Pengaduan</a> -->
            </li>
          </ul>
          <br>
          <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
              <div class="form-row col-md-12">
                <div class="form-group col-md-7">
                  <label for="" class="control-label">Judul <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="judul" placeholder="Judul" value="<?=$judul?>" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Foto Cover <span class="text-danger"></span> </label>
                  <input class="form-control" type="file" name="cover_file">
                </div>
                <div class="form-group col-md-2">
                  <label for="" class="control-label">Kategori <span class="text-danger">*</span> </label>
                  <select class="form-control" name="kategori" title="Pilih Kategori"  required>
                    <option value="umum" <?=($rubrik=='umum')?'selected':''?>>Umum</option>
                    <option value="umkm" <?=($rubrik=='umkm')?'selected':''?>>UMKM</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="" class="control-label">Uraian <span class="text-danger">*</span> </label><br>
                  <textarea name="uraian" id="ckeditor" class="ckeditor" rows="8" cols="80"><?=$uraian?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <button class="btn btn-success form-control col-md-12 py-2" name="berita">Selesai</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
</div>
</section>

<script type="text/javascript">

(function ($) {
  $.fn.replaceClass = function (pFromClass, pToClass) {
    return this.removeClass(pFromClass).addClass(pToClass);
  };
}(jQuery));

CKEDITOR.disableAutoInline = true;
CKEDITOR.inline = editable;
</script>

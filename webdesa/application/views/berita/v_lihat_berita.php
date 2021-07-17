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
#cardberita{
  /* margin: 10px 0px; */
  margin-top: 30px;
  background: #E0E0E0;
}

#judulberita{
  font-family: inherit;
  font-weight: 500;
  line-height: 1.1;
  font-size: 1.1rem;
}

#isiberita{
  margin-top:-221px;
  background:rgba(0, 0, 0, 0.3);
  position: absolute;
  padding: 10px;
  width: 30vw;
  height: 220px;
}

#isiberita a, #tglberita{
  margin-top: 27%;
}

#tglberita{
  -webkit-font-smoothing: antialiased;
  /* color: rgb(209, 52, 56); */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  font-size: 1rem;
  font-weight: 800;
  letter-spacing: -0.016em;
  text-transform: uppercase;
}

#penulis{
  -webkit-font-smoothing: antialiased;
  /* color: #0AB1B1; */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  font-weight: 500;
  letter-spacing: -0.016em;
  text-transform: capitalize;
}

#isiberita label{
  font-weight: bold;
  font-family: "calibri";
}

#imgberita{
  /* object-fit: contain; */
  width: 30vw;
  height: 220px;
}

#cardberita:hover{
  padding-left: 10px;
  /* padding-bottom: 10px; */
  transition: 0.5s;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);
  /* box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.25); */
}

.container{
  /* margin: 0 auto;
  padding-left: 35px;
  max-width: none;
  margin-left: auto;
  margin-right: auto; */
  max-width: none;
}
@media (max-width: 765px) {
  #cardberita{
    margin: 10px 0;
  }

  #isiberita{
    /* position: absolute; */
    margin-top: -300px;
    padding: 10px;
    width: 94%;
    /* width: 85vw; */
    height: 300px;
  }

  #imgberita{
    /* object-fit: contain; */
    width: 100%;
    height: 300px;
  }
}

</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="container" id="container">
    <div class="section-title text-center">
      <h2>Lihat Berita</h2>
      <a href="<?=base_url("berita/lihat/semua")?>" class="btn <?=($active=='semua')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Semua</a>
      <a href="<?=base_url("berita/lihat/umum")?>" class="btn <?=($active=='umum')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">Umum</a>
      <a href="<?=base_url("berita/lihat/umkm")?>" class="btn <?=($active=='umkm')?'btn-warning':'btn-white'?> border border-warning text-dark px-4">UMKM</a>
      <br><br>
      <!-- <p class="separator" style="">Mohon isi data dibawah dengan sebenar-benarnya.</p> -->
      <?php echo form_open_multipart(base_url("berita/cari/"),array('class' => 'form-horizontal')); ?>
      <div class="col-md-4 offset-md-4 input-group">
        <input class="form-control" type="text" name="judul" placeholder="Cari Berita . . ." value="" required>
        <div class="input-group-append">
          <select class="form-control" name="rubrik">
            <option value="semua">Semua</option>
            <option value="umum">Umum</option>
            <option value="umkm">UMKM</option>
          </select>
          <button id="button-addon5" type="submit" class="btn btn-info" name="cariberita"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
    <div class="col-md-12">
      <div class="row">
        <?php foreach ($berita as $b): ?>
          <?php $judul = $b->judul; ?>
            <div class="col-md-4">
              <div id="cardberita">
                <img id="imgberita" src="<?=base_url($b->cover_file)?>" alt="Berita" class="">
                <div id="isiberita" class="text-light">
                  <label id="tglberita" style="" for="" class=""><i class="fa fa-calendar">&ensp;</i> <?=$b->tgl_berita?></label><br>
                  <a id="judulberita" href="<?=base_url("berita/detail/$judul/$b->id_berita")?>" style="" class=" text-white" data-toggle="tooltip" title="<?=$judul?>"><?=substr($judul, 0, 60); ?>...</a><br>
                  <label id="penulis" style="" for="" class="float-left"><i class="fa fa-user">&ensp;</i> <?=$b->nama?></label><br>
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

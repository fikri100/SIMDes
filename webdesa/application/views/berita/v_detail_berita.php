<style media="screen">
/* .card{
transition: 0.5s;
}

.form-control, .card{
border: 2px solid black;
}

*{
font-weight: bold;
} */
.btn{
  text-transform: capitalize;
  font-family: "Roboto",sans-serif;
  font-weight: bold;
}


</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="containers">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2><?=$berita->judul?></h2>
          </div>
          <!-- <div class="col-md-4"> -->
            <h6>Kategori : <p class="badge badge-success px-1 py-2" style="text-transform:uppercase;"><?=$berita->rubrik?></p></h6>
            <h6 class="float-left">Tgl Buat&ensp;: </h6>
            <p for="" class="float-left">&ensp;&ensp;<i class="fa fa-calendar">&ensp;</i><?=$berita->tgl_berita?></p><br><br>
            <h6 class="float-left">Penulis&ensp;&ensp;: </h6>
            <p for="" class="float-left">&ensp;&ensp;<i class="fa fa-user">&ensp;</i><?=$berita->nama?></p>
          <!-- </div> -->
          <br><br><br>
          <?=$berita->isi?>
        </div>
        <div class="col-md-12 mt-3">
          <hr>
          <div class="col-md-12">
            <?php echo form_open_multipart(base_url("berita/tanggapan/$berita->id_berita"),array('class' => 'form-horizontal')); ?>
            <h5>Diskusi:</h5>
            <textarea id="komen" name="komen" rows="2" placeholder="Tuliskan Komentar Anda. . ." class="form-control mt-2" style="" required></textarea>
            <input type="submit" name="tanggapan" class="btn btn-success text-white mt-2" value="Kirim">
            <?php echo form_close() ?>
          </div>
          <script type="text/javascript">
          function balas(isi){
            $('#komen').val("@"+isi+" ");
            $('#komen').focus();
          }
          </script>

          <div class="col-md-12 ml-4 mt-4">
            <?php foreach ($tanggapan as $key => $value) { ?>
              <img class="float-left rounded-circle" src="<?=base_url("$value->foto_file")?>" alt="" width="50" height="50">
              <h5 class="float-left mt-3 ml-3" style=""><?=$value->nama ?></h5><br><br><br>
              <p class="" style="margin-top:-15px; margin-left:70px;"><?=$value->tanggapan?></p>
              <button id="btnreply" onclick="balas('<?=$value->nama ?>')" href="#" class="" style="margin-top:-15px; margin-left:70px;">Reply</button><br><br><hr>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
// (function ($) {
//   $.fn.replaceClass = function (pFromClass, pToClass) {
//     return this.removeClass(pFromClass).addClass(pToClass);
//   };
// }(jQuery));
//
// function pindah(num){
//   $('#pills-tab li:nth-child('+num+') a').replaceClass('disabled','enabled');
//   $('#pills-tab li:nth-child('+num+') a').tab('show');
//   $('#pills-tab li a').replaceClass('enabled','disabled');
// }
$(document).ready(function() {
  $('#rwytpengaduan').DataTable();
} );
</script>

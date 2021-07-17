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

p{
  text-transform: capitalize;
}
</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="containers">
    <div class="section-title text-center">
      <h2><?=$pengaduan->judul?></h2>

      <!-- <h2>Desa Pagerngumbuk</h2> -->
      <!-- <p class="separator" style="">Isi data dibawah dengan sebenar-benarnya.</p> -->
    </div>

    <div class="col-md-12 mt-5">
      <div class="row">
        <div class="col-md-6">
          <img src="<?=base_url($pengaduan->lampiran_file)?>" alt="" style="width:100%;">
        </div>

        <div class="col-md-6">
          <br>
          <div class="col-md-12 row">
            <div class="col-md-4">
              <h5>Kategori:</h5>
              <p class="badge badge-success px-1 py-2"><?=$pengaduan->kategori?></p>
            </div>
            <div class="col-md-4">
              <h5>Bidang:</h5>
              <p class="badge badge-primary px-1 py-2"><?=$pengaduan->bidang?></p>
            </div>
            <div class="col-md-4">
              <h5>Status:</h5>
              <span class="badge badge-danger py-2 px-1"><?php $cont->cek_status($pengaduan->status)?></span><br><br>
            </div>
          </div>
          <h5>Lokasi</h5>
          <p><?=$pengaduan->lokasi?></p>
          <h5>Tgl Lapor</h5>
          <p for=""><i class="fa fa-calendar">&ensp;</i><?=$pengaduan->tgl_pengaduan?></p>
          <h5>Pelapor</h5>
          <p for=""><i class="fa fa-user">&ensp;</i><?=$pengaduan->nama?></p>
          <h5>Detail</h5>
          <p class="text-justify"><?=$pengaduan->uraian?></p>          
        </div>
        <div class="col-md-12 mt-3">
          <hr>
          <div class="col-md-12">
            <?php echo form_open_multipart(base_url("pengaduan/tanggapan/$pengaduan->id_pengaduan"),array('class' => 'form-horizontal')); ?>
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
        </div>
      </div>
      <hr>
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

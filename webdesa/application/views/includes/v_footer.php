<!-- </div>
</div>
</section> -->
<!--==========================
Footer
============================-->
<footer class="footer pb-5">
  <div class="containers">
    <div class="row">

      <div class="col-md-12 col-lg-4">
        <div class="footer-logo">
          <a class="navbar-brand" href="#">Desa Pagerngumbuk</a>
          <p>Pagerngumbuk adalah sebuah desa di wilayah Kecamatan Wonoayu, Kabupaten Sidoarjo, Provinsi Jawa Timur.</p>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 col-lg-2">
        <div class="list-menu">
          <h5 class="text-white ml-3">Surat</h5 class="text-white ml-3">
          <ul class="list-styled">
            <li><a href="<?=base_url('surat/kelahiran')?>">Kelahiran</a></li>
            <li><a href="<?=base_url('surat/kematian')?>">Kematian</a></li>
            <li><a href="<?=base_url('surat/tidak_mampu')?>">Tidak Mampu</a></li>
            <li><a href="<?=base_url('surat/biodata')?>">Biodata</a></li>
            <li><a href="<?=base_url('surat/umum')?>">Umum</a></li>
            <li><a href="<?=base_url('surat/domisili')?>">Domisili</a></li>
            <li><a href="<?=base_url('surat/riwayat')?>">Riwayat Pengurusan</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <div class="list-menu">
          <h5 class="text-white ml-3">Pengaduan</h5 class="text-white ml-3">
          <ul class="list-styled">
            <li><a href="<?=base_url('pengaduan/lihat/semua')?>">Lihat Pengaduan</a></li>
            <li><a href="<?=base_url('pengaduan/buat_pengaduan')?>">Buat Pengaduan</a></li>
            <li><a href="<?=base_url('pengaduan/riwayat')?>">Riwayat Pengaduan</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-2">
        <div class="list-menu">
          <h5 class="text-white ml-3">Berita</h5 class="text-white ml-3">
          <ul class="list-styled">
            <li><a href="<?=base_url('berita/lihat/semua')?>">Lihat Berita</a></li>
            <li><a href="<?=base_url('berita/buat')?>">Buat Berita</a></li>
            <li><a href="<?=base_url('berita/riwayat')?>">Riwayat Berita</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>

  <!-- <div class="copyrights">
  <div class="container">
  <p>&copy; Copyrights eStartup. All rights reserved.</p>
  <div class="credits"> -->

  <!--
  All the links in the footer should remain intact.
  You can delete the links only if you purchased the pro version.
  Licensing information: https://bootstrapmade.com/license/
  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eStartup
-->

<!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>
</div>
</div> -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Kamu Yakin?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="#" class="btn btn-danger text-white" id="btnyakin">Yakin</a>
      </div>
    </div>
  </div>
</div>


</footer>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="<?=base_url()?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/lib/bootstrap/js/bootstrap-select.min.js"></script>
<script src="<?=base_url()?>assets/lib/superfish/hoverIntent.js"></script>
<script src="<?=base_url()?>assets/lib/superfish/superfish.min.js"></script>
<script src="<?=base_url()?>assets/lib/easing/easing.min.js"></script>
<script src="<?=base_url()?>assets/lib/modal-video/js/modal-video.js"></script>
<script src="<?=base_url()?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/lib/wow/wow.min.js"></script>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>assets/ckfinder/ckfinder.js"></script>

<!-- Template Main Javascript File -->
<script src="<?=base_url()?>assets/js/main.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  //   CKEDITOR.replace('editor', {height:'600px'});
  // CKEDITOR.disableAutoInline = true;
  // CKEDITOR.inline = editable;

  $('#bidang').selectpicker();

  function setFormat(id) {
    if (document.getElementById(id).value !== "") {
      var hasil = parseFloat(document.getElementById(id).value.replace(/\D/g, ""))
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      if(hasil == "NaN" || hasil=="0"){
        document.getElementById(id).value = 1;
      } else {
        document.getElementById(id).value = parseFloat(document.getElementById(id).value.replace(/\D/g, ""))
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    } else {
      document.getElementById(id).value = 1;
    }
  }

  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
  }
});

</script>
</body>
</html>

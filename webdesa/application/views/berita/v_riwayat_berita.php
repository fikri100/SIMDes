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
  <div class="container">
    <div class="section-title text-center">
      <h2>Riwayat Berita</h2>
      <!-- <p class="separator" style="">Isi data dibawah dengan sebenar-benarnya.</p> -->
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
          <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
              <!-- <a class="nav-link active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Riwayat Berita</a> -->
            </li>
          </ul>
          <br>
          <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
              <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                <table id="rwytberita" class="table table-striped table-borderless" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kode</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Tgl Buat</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($berita as $b): ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$b->id_berita?></td>
                        <td><a href="<?=base_url("berita/detail/$b->judul/$b->id_berita")?>"><?=$b->judul?></a></td>
                        <td><?=$b->rubrik?></td>
                        <td><?=$b->tgl_berita?></td>
                        <td class="text-success"><?php $cont->cek_status($b->status);?></td>                        
                        <?php if($b->status==0):?><td><button style="font-size:13px;" onclick="hapus('<?=base_url("berita/hapus/$b->id_berita")?>')" class="btn btn-danger">Hapus</button></td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>                          
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <label class="text-danger">*) Tombol <b>Hapus</b> hanya muncul pada saat proses validasi berlangsung</label>
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
  $('#rwytberita').DataTable();
} );
</script>

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
      <h2>Riwayat Surat</h2>
      <!-- <p class="separator" style="">Isi data dibawah dengan sebenar-benarnya.</p> -->
      <?php if($this->session->flashdata('sukses')){ ?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('sukses'); ?>
      </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart(base_url("admin/guru_mapel/proses/"),array('class' => 'form-horizontal')); ?>
        <div class="card wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
          <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Surat Kelahiran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-dua-tab" data-toggle="pill" href="#pills-dua" role="tab" aria-controls="pills-dua" aria-selected="true">Surat Kematian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-tiga-tab" data-toggle="pill" href="#pills-tiga" role="tab" aria-controls="pills-tiga" aria-selected="true">Surat Tidak Mampu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-empat-tab" data-toggle="pill" href="#pills-empat" role="tab" aria-controls="pills-empat" aria-selected="true">Surat Biodata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-lima-tab" data-toggle="pill" href="#pills-lima" role="tab" aria-controls="pills-lima" aria-selected="true">Surat Umum</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-enam-tab" data-toggle="pill" href="#pills-enam" role="tab" aria-controls="pills-enam" aria-selected="true">Surat Domisili</a>
            </li>
          </ul>
          <br>
          <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
              <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                <table id="kelahiran" class="table table-striped">
                  <thead>
                    <tr>
                      <th width="150">No Surat</th>
                      <th width="120">Nama Anak</th>
                      <th width="100">Tgl Lahir</th>
                      <th width="120">Nama Ayah</th>
                      <th width="120">Nama Ibu</th>
                      <th width="140">Tgl Permohonan</th>
                      <th width="140">Catatan</th>
                      <th width="100">Status</th>
                      <th width="100">Cetak</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($kelahiran as $v): ?>
                      <tr>
                        <th><?=$v->id_kelahiran?></th>
                        <td><?=$v->anak?></td>
                        <td><?=$v->tgl_lahir?></td>
                        <td><?=$v->ayah?></td>
                        <td><?=$v->ibu?></td>
                        <td><?=$v->tgl_buat?></td>
                        <td><?=$v->catatan?></td>
                        <td><span class="badge <?=($v->status==-1?"badge-danger":"badge-info")?>"><?php $surat->cek_status($v->status);?></span> </td>
                        <?php if($v->status>=2):?><td><a href="<?=base_url("surat/cetak/kelahiran/".$_SESSION['nik']."/$v->id")?>" target="_blank" class="btn btn-warning">Cetak</a> </td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-dua" role="tabpanel" aria-labelledby="pills-dua-tab">
              <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
                <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                  <table id="kematian" class="table table-striped table-borderless" style="width:100%">
                    <thead>
                      <tr>
                        <th>No Surat</th>
                        <th>Nama Alm</th>
                        <th>Tgl Meninggal</th>
                        <th>Tempat Meninggal</th>
                        <th>Penyebab</th>
                        <th>Tgl Permohonan</th>
                        <th>Catatan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($kematian as $v): ?>
                        <tr>
                          <th><?=$v->id_kematian?></th>
                          <td><?=$v->nama?></td>
                          <td><?=$v->tgl_meninggal?></td>
                          <td><?=$v->tempat_meninggal?></td>
                          <td><?=$v->penyebab?></td>
                          <td><?=$v->tgl_buat?></td>
                          <td><?=$v->catatan?></td>
                          <td><span class="badge <?=($v->status==-1?"badge-danger":"badge-info")?>"><?php $surat->cek_status($v->status);?></span> </td>
                          <?php if($v->status>=2):?><td><a href="<?=base_url("surat/cetak/kematian/".$_SESSION['nik']."/$v->id")?>" target="_blank" class="btn btn-warning">Cetak</a> </td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-tiga" role="tabpanel" aria-labelledby="pills-tiga-tab">
              <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                <table id="tdkmampu" class="table table-striped table-borderless" style="width:100%">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Jenis</th>
                      <th>Nama Terkait</th>
                      <th>Tujuan</th>
                      <th>Tgl Permohonan</th>
                      <th>Catatan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tdk_mampu as $v): ?>
                      <tr>
                        <th><?=$v->id_tdk_mampu?></th>
                        <td><?=$v->jenis?></td>
                        <td><?=$v->nama_terkait?></td>
                        <td><?=$v->tujuan?></td>
                        <td><?=$v->tgl_buat?></td>
                        <td><?=$v->catatan?></td>
                        <td><span class="badge <?=($v->status==-1?"badge-danger":"badge-info")?>"><?php $surat->cek_status($v->status);?></span> </td>
                        <?php if($v->status>=2):?><td><a href="<?=base_url("surat/cetak/tdkmampu/".$_SESSION['nik']."/$v->id")?>" target="_blank" class="btn btn-warning">Cetak</a> </td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-empat" role="tabpanel" aria-labelledby="pills-empat-tab">
              <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                <table id="biodata" class="table table-striped table-borderless" style="width:100%">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Nama Kepala Keluarga</th>
                      <th>Alamat</th>
                      <th>Tgl Permohonan</th>
                      <th>Catatan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($biodata as $v): ?>
                      <tr>
                        <th><?=$v->id_biodata?></th>
                        <th><?=$v->nama_kepala?></th>
                        <th><?=$v->alamat?></th>
                        <th><?=$v->tgl_buat?></th>
                        <td><?=$v->catatan?></td>
                        <td><span class="badge <?=($v->status==-1?"badge-danger":"badge-info")?>"><?php $surat->cek_status($v->status);?></span> </td>
                        <?php if($v->status>=2):?><td><a href="<?=base_url("surat/cetak/biodata/".$_SESSION['nik']."/$v->id")?>" target="_blank" class="btn btn-warning">Cetak</a> </td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-lima" role="tabpanel" aria-labelledby="pills-lima-tab">
              <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                <table id="umum" class="table table-striped table-borderless" style="width:100%">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Tujuan</th>
                      <th>Tgl Permohonan</th>
                      <th>Catatan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($umum as $v): ?>
                      <tr>
                        <th><?=$v->id_umum?></th>
                        <td><?=$v->tujuan?></td>
                        <td><?=$v->tgl_buat?></td>
                        <td><?=$v->catatan?></td>
                        <td><span class="badge <?=($v->status==-1?"badge-danger":"badge-info")?>"><?php $surat->cek_status($v->status);?></span> </td>
                        <?php if($v->status>=2):?><td><a href="<?=base_url("surat/cetak/umum/".$_SESSION['nik']."/$v->id")?>" target="_blank" class="btn btn-warning">Cetak</a> </td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-enam" role="tabpanel" aria-labelledby="pills-enam-tab">
              <div class="col-md-12 pb-3 pr-5 pl-5 table-responsive">
                <table id="domisili" class="table table-striped table-borderless" style="width:100%">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Jenis</th>
                      <th>Nama Usaha</th>
                      <th>Alamat</th>
                      <th>Tgl Permohonan</th>
                      <th>Catatan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($domisili as $v): ?>
                      <tr>
                        <th><?=$v->id_domisili?></th>
                        <td><?=$v->jenis?></td>
                        <td><?=$v->nama_usaha?></td>
                        <td><?=$v->alamat?></td>
                        <td><?=$v->tgl_buat?></td>
                        <td><?=$v->catatan?></td>
                        <td><span class="badge <?=($v->status==-1?"badge-danger":"badge-info")?>"><?php $surat->cek_status($v->status);?></span> </td>
                        <?php if($v->status>=2):?><td><a href="<?=base_url("surat/cetak/domisili/".$_SESSION['nik']."/$v->id")?>" target="_blank" class="btn btn-warning">Cetak</a> </td><?php else: echo"<td class='text-danger'>*</td>"; endif;?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <label class="text-danger">*) Tombol <b>Cetak</b> akan muncul saat proses pengurusan surat sudah selesai</label>
        <?php echo form_close(); ?>
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
  $('#kelahiran').DataTable();
  $('#kematian').DataTable();
  $('#tdkmampu').DataTable();
  $('#biodata').DataTable();
  $('#umum').DataTable();
  $('#domisili').DataTable();
} );
</script>

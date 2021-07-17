<style media="screen">
.card{
  transition: 0.5s;
}

/* .form-control, .card{
border: 2px solid black;
}

*{
font-weight: bold;
border-radius: 0px;
} */
</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
      <h2>Buat Pengaduan</h2>
      <!-- <p class="separator" style="">Mohon isi data dibawah dengan sebenar-benarnya.</p> -->
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart(base_url("pengaduan/buat_pengaduan/"),array('class' => 'form-horizontal')); ?>
        <div class="card wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
          <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link disabled active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Data Pengaduan</a>
            </li>
          </ul>
          <br>
          <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
              <div class="form-row col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="control-label">Judul <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="judul" placeholder="Judul" value="" requiredd>
                  <?=form_error('judul')?>
                </div>
                <div class="form-group col-md-4">
                  <label for="" class="control-label">Lokasi <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="lokasi" placeholder="Lokasi" value="" requiredd>
                  <?=form_error('lokasi')?>
                </div>
                <div class="form-group col-md-6">
                  <label for="" class="control-label">Bidang <span class="text-danger">*</span> </label>
                  <!-- <select class="form-control" name="bidang[]" id="bidang" title="Pilih Bidang"  multiple requiredd> -->
                  <select class="form-control" name="bidang" title="Pilih Bidang" requiredd>
                    <option value="infrastruktur">Infrastruktur</option>
                    <option value="pendidikan">Pendidikan</option>
                    <option value="kesehatan">Kesehatan</option>
                    <option value="administrasi">Administrasi</option>
                    <option value="kasus">Kasus</option>
                    <option value="lain">Lain-lain</option>
                  </select>
                  <?=form_error('bidang')?>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-5">
                  <label for="" class="control-label">Kategori <span class="text-danger">*</span> </label><br>
                  <div class="form-check form-check-inline">
                    <input id="anggaran" class="form-check-input" type="radio" name="kategori" value="anggaran" checked>
                    <label for="anggaran" class="form-check-label">Anggaran</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input id="non" class="form-check-input" type="radio" name="kategori" value="non-anggaran">
                    <label for="non" class="form-check-label">Non-Anggaran</label>
                  </div>
                  <?=form_error('kategori')?>
                </div>
                <div class="form-group col-md-12">
                  <label for="" class="control-label">Uraian <span class="text-danger">*</span> </label><br>
                  <textarea name="uraian" class="form-control" rows="3" cols="80" requiredd></textarea>
                  <?=form_error('uraian')?>
                </div>
                <div class="form-group col-md-6">
                  <?php echo $this->session->flashdata('upload_error'); ?>
                  <label for="" class="control-label">Lampiran
                  </label><br>
                  <input class="form-control" accept=".jpg, .jpeg, .png" type="file" name="lampiran_file" multiple>
                </div>
                <div class="form-group col-md-16">
                  <label for="" class="control-label">Tanda Tangan
                  </label><br>
                  <div class="signature-pad" id="signature-pad">
                    <div class="m-signature-pad">
                      <div class="m-signature-pad-body form-control">
                        <canvas class=""></canvas>
                      </div>
                      <?=form_error('ttd')?>
                      <div id="savettd"></div>
                    </div>
                    <div class="m-signature-pad-footer">
                      <button type="button"  id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                      <button type="button" data-action="clear"  class="btn btn-danger"><i class="fa fa-trash-o"></i> Clear</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="ttd" id="ttd" value="">
                <div class="form-group col-md-12">
                  <button name="pengaduan" class="btn btn-success form-control col-md-12">Selesai</button>
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
var wrapper = document.getElementById("signature-pad"),
clearButton = wrapper.querySelector("[data-action=clear]"),
saveButton = wrapper.querySelector("[data-action=save]"),
canvas = wrapper.querySelector("canvas"),
signaturePad;

function resizeCanvas() {
  var ratio =  window.devicePixelRatio || 1;
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);
}

signaturePad = new SignaturePad(canvas);

clearButton.addEventListener("click", function (event) {
  $('#savettd').html('<p class="alert alert-danger">TTD Kosong</p>');
  $('#ttd').val('');
  signaturePad.clear();
});
saveButton.addEventListener("click", function (event) {
  if (signaturePad.isEmpty()) {
    $('#savettd').html('<p class="alert alert-danger">TTD Kosong</p>');
  } else {
    $('#ttd').val(signaturePad.toDataURL());
    $('#savettd').html('<p class="alert alert-success" style="color:white; background:green;">Sudah Tersimpan</p>');
  }
});
</script>

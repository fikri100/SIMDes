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
    <div class="section-title text-center">
      <h2>Surat Tidak Mampu</h2>
      <!-- <p class="separator" style="">Isi data dibawah dengan sebenar-benarnya.</p> -->
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header text-center bg-danger text-light">
            Syarat dan Ketentuan Dokumen
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">1. Surat Pengantar RT/RW (TTD & Stempel)</li>
            <li class="list-group-item">2. Surat Pernyataan Tidak Mampu Bermaterai</li>
            <li class="list-group-item">3. Fotokopi KK dan KTP</li>
            <li class="list-group-item">4. Berkas 1 sampai 3 diupload ke sistem dengan format <span class="text-danger">(jpg/png/pdf)</span> dengan Ukuran <span class="text-danger">(Maks 2MB)</span></li>
            <!-- <li class="list-group-item">5. Berkas Asli dibawa saat pengambilan surat</li>
            <li class="list-group-item">6. Surat Kuasa jika pengambilan berkas dikuasakan ke orang lain</li> -->
          </ul>
          <div class="col-md-12" id="tab-diri"></div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <!-- <div class="card-header text-center bg-info text-light">
        Syarat dan Ketentuan Dokumen
      </div> -->

      <?php echo form_open_multipart(base_url("surat/tidak_mampu"),array('class' => 'form-horizontal')); ?>
      <div class="card wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
        <ul class="nav nav-tabs" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link disabled active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Data Diri</a>
          </li>
        </ul>
        <br>
        <div class="tab-content" id="pills-tabContent">
          <!-- Tab 1 -->
          <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
            <div class="form-row col-md-12">
              <div class="form-group col-md-4">
                <label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$_SESSION['nik']?>" disabled required>
              </div>
              <div class="form-group col-md-4">
                <label for="" class="control-label">Nama <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=$_SESSION['nama']?>" disabled required>
              </div>
              <div class="form-group col-md-4">
                <label for="" class="control-label">Hubungan <span class="text-danger">*</span> </label>
                <select class="form-control" name="hubungan" required>
                  <option value="anak">Anak</option>
                  <option value="orang_tua">Orang Tua</option>
                  <option value="saudara">Saudara</option>
                  <option value="pasangan">Suami/Istri</option>
                  <option value="tetangga">Tetangga</option>
                  <option value="lain">Lain-lain</option>
                </select>
              </div>
              <div class="form-group col-md-12"></div>
              <div class="form-group col-md-2 offset-md-10">
                <a href="#tab-kelahiran" class="btn scrollto form-control py-3 btn-next">Selanjutnya <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
            <div class="col-md-12" id="tab-kelahiran"></div>
          </div>
        </div>
      </div>

      <div class="card mt-5 wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-dua-tab" data-toggle="pill" href="#pills-dua" role="tab" aria-controls="pills-dua" aria-selected="false">Data Tidak Mampu</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Tab 2 -->
          <div class="tab-pane fade show active" id="pills-dua" role="tabpanel" aria-labelledby="pills-dua-tab">
            <div class="form-row col-md-12">
              <div class="form-group col-md-3">
                <label for="" class="control-label">Jenis <span class="text-danger">*</span> </label>
                <select class="form-control" name="jenis">
                  <option value="sekolah">Sekolah</option>
                  <option value="rumah_sakit">Rumah Sakit</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Nama Terkait<span class="text-danger">*</span> </label>
                <input pattern="[a-zA-Z\s]+" title="Masukkan Hanya Huruf Saja" class="form-control" type="text" name="nama_terkait" placeholder="Nama" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Pekerjaan<span class="text-danger">*</span> </label>
                <select class="form-control" name="pekerjaan">
                  <?php foreach ($pekerjaan as $v => $c){
                    echo "<option value='$v'>$c</option>";
                  } ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Tujuan<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="tujuan" placeholder="Tujuan" value="">
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Alamat<span class="text-danger">*</span> </label>
                <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5" value="" required></textarea>
              </div>
              <div class="form-group col-md-12"></div>
              <div class="form-group col-md-2 offset-md-8">
                <a href="#tab-diri" class="btn scrollto form-control py-3 btn-prev"><i class="fa fa-angle-double-left"> Kembali</i></a>
              </div>
              <div class="form-group col-md-2">
                <a href="#tab-lampiran" class="btn scrollto form-control py-3 btn-next">Selanjutnya <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
            <div class="col-md-12" id="tab-lampiran"></div>
          </div>
        </div>
      </div>

      <div class="card mt-5 wow fadeInUp" id="get-started">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-tiga-tab" data-toggle="pill" href="#pills-tiga" role="tab" aria-controls="pills-tiga" aria-selected="false">Lampiran</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Tab 3 -->
          <div class="tab-pane fade show active" id="pills-tiga" role="tabpanel" aria-labelledby="pills-tiga-tab">
            <div class="form-row col-md-12">
              <?php echo $this->session->flashdata('upload_error'); ?>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pengantar <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file" required/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pernyataan <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pernyataan_file" required/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Fotokopi KK <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file" required/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Fotokopi KTP <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file" required/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-2 offset-md-8">
                <a href="#tab-kelahiran" class="btn scrollto form-control py-3 btn-prev"><i class="fa fa-angle-double-left"> Kembali</i></a>
              </div>
              <div class="form-group col-md-2">
                <button class="btn btn-success form-control py-3" name="tdkmampu">Selesai</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
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

function pindah(num){
  $('#pills-tab li:nth-child('+num+') a').replaceClass('disabled','enabled');
  $('#pills-tab li:nth-child('+num+') a').tab('show');
  $('#pills-tab li a').replaceClass('enabled','disabled');
}
</script>

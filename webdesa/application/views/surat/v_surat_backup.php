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
      <h2>Surat Kelahiran</h2>
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
            <li class="list-group-item">2. Fotokopi Surat Kelahiran Bidan/ Dokter /Rumah Sakit</li>
            <li class="list-group-item">3. Fotokopi KK dan KTP</li>
            <li class="list-group-item">4. Fotokopi Buku Nikah/Akta Perkawinan</li>
            <li class="list-group-item">5. Berkas 1 sampai 4 diupload ke sistem</li>
            <li class="list-group-item">6. Berkas Asli nomor 1 sampai 4 dibawa saat pengambilan surat</li>
            <li class="list-group-item">7. Surat Kuasa jika pengambilan berkas dikuasakan ke orang lain</li>
          </ul>
          <div class="col-md-12" id="tab-diri"></div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <!-- <div class="card-header text-center bg-info text-light">
        Syarat dan Ketentuan Dokumen
      </div> -->

      <?php echo form_open_multipart(base_url("surat/kelahiran"),array('class' => 'form-horizontal')); ?>
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
                <input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$_SESSION['nik']?>" required>
              </div>
              <div class="form-group col-md-4">
                <label for="" class="control-label">Nama <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=$_SESSION['nama']?>" required>
              </div>
              <!-- <div class="form-group col-md-2">
                <label for="" class="control-label">Dusun <span class="text-danger">*</span> </label>
                <select class="form-control" name="dusun" required>
                  <option value="pager">Pager</option>
                  <option value="ngumbuk">Ngumbuk</option>
                  <option value="bendet">Bendet</option>
                </select>
              </div>
              <div class="form-group col-md-1">
                <label for="" class="control-label">RT <span class="text-danger">*</span> </label>
                <input class="form-control" type="number" min="1" name="rt" placeholder="RT" value="" required>
              </div>
              <div class="form-group col-md-1">
                <label for="" class="control-label">RW <span class="text-danger">*</span> </label>
                <input class="form-control" type="number" min="1" name="rw" placeholder="RW" value="" required>
              </div>
              <div class="form-group col-md-2">
                <label for="" class="control-label">No. Rumah </label>
                <input class="form-control" type="text" name="norumah" placeholder="No. Rumah" value="">
              </div> -->
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
            <a class="nav-link active" id="pills-dua-tab" data-toggle="pill" href="#pills-dua" role="tab" aria-controls="pills-dua" aria-selected="false">Data Kelahiran</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Tab 2 -->
          <div class="tab-pane fade show active" id="pills-dua" role="tabpanel" aria-labelledby="pills-dua-tab">
            <div class="form-row col-md-12">
              <div class="form-group col-md-3">
                <label for="" class="control-label">Nama Anak <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="anak" placeholder="Nama Anak" value="" required>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Tanggal Lahir <span class="text-danger">*</span> </label>
                <input class="form-control" type="date" name="tgllahir" required/>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Tempat Lahir <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="tempatlahir" placeholder="Tempat Lahir" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Jenis Kelamin <span class="text-danger">*</span> </label>
                <select class="form-control" name="jk">
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Nama Ayah <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ayah" placeholder="Nama Ayah" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Nama Ibu <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ibu" placeholder="Nama Ibu" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Dusun <span class="text-danger">*</span> </label>
                <select class="form-control" name="rw">
                  <option value="1">Pager</option>
                  <option value="2">Ngumbuk</option>
                  <option value="3">Bendet</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">RT <span class="text-danger">*</span> </label>
                <input class="form-control" type="number" min="1" name="rt" placeholder="RT" value="">
              </div>
              <!-- <div class="form-group col-md-2">
                <label for="" class="control-label">RW <span class="text-danger">*</span> </label>
                <input class="form-control" type="number" min="1" name="rw" placeholder="RW" value="">
              </div> -->
              <!-- <div class="form-group col-md-2">
                <label for="" class="control-label">No. Rumah </label>
                <input class="form-control" type="number" min="1" name="norumah" placeholder="No. Rumah" value="">
              </div> -->
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
              <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pengantar <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file" required/>
              </div>
              <div class="col-md-12"></div>
              <!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Keterangan Surat Pengantar <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ketpengantar" placeholder="Keterangan Surat Pengantar" required/>
              </div> -->
              <div class="form-group col-md-12">
                <label for="" class="control-label">Fotokopi Surat Bukti Kelahiran <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ket_file" required/>
              </div>
              <div class="col-md-12"></div>
              <!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Keterangan Fotokopi Surat Kelahiran <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ketsuratkel" placeholder="Fotokopi Surat Kelahiran" required/>
              </div> -->
              <!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KK <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ketkk" placeholder="Fotokopi Kartu Keluarga" required/>
              </div> -->
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Fotokopi KK <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file" required/>
              </div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Fotokopi KTP <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file" required/>
              </div>
              <div class="col-md-12"></div>
              <!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Keterangan <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ketktp" placeholder="Keterangan Fotokopi KTP" required/>
              </div> -->
              <div class="form-group col-md-12">
                <label for="" class="control-label">Fotokopi Buku Nikah / Akta Perkawinan <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="buku_file" required/>
              </div>
              <div class="col-md-12"></div>
              <!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Keterangan <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ketbuku" placeholder="Keterangan Fotokopi Buku Nikah / Akta Perkawinan" required/>
              </div> -->
              <div class="form-group col-md-2 offset-md-8">
                <a href="#tab-kelahiran" class="btn scrollto form-control py-3 btn-prev"><i class="fa fa-angle-double-left"> Kembali</i></a>
              </div>
              <div class="form-group col-md-2">
                <button class="btn btn-success form-control py-3" name="kelahiran">Selesai</button>
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

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
      <h2>Surat Domisili</h2>
      <!-- <p class="separator" style="">Isi data dibawah dengan sebenar-benarnya.</p> -->
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header text-center bg-danger text-light">
            Syarat dan Ketentuan Dokumen
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">1. Fotokopi KK dan KTP</li>
            <li class="list-group-item">2. Fotokopi Akta Pendirian UKM dari Notaris</li>
            <li class="list-group-item">3. Surat Pernyataan bermaterai Tidak Keberatan dari tetangga (Ditanda tangani minimal 4 orang warga yang bertetangga dengan tempat usaha Anda, dilampiri fotokopi KTP masing-masing)</li>
            <li class="list-group-item">4. Surat Perjanjian Sewa-Menyewa tempat usaha bermaterai (fotokopi, jika Anda menyewa tempat usaha Anda)</li>
            <li class="list-group-item">5. Surat Bukti Kepemilikan Tanah atau Tempat Usaha (Surat Tanah, Akta Jual Beli/Girik) jika tempat usaha Anda milik sendiri</li>
            <li class="list-group-item">6. Berkas diupload ke sistem dengan format <span class="text-danger">(jpg/png/pdf)</span> dengan Ukuran <span class="text-danger">(Maks 2MB)</span></li>
            <!-- <li class="list-group-item">7. Berkas Asli dibawa saat pengambilan surat</li>
            <li class="list-group-item">8. Surat Kuasa jika pengambilan berkas dikuasakan ke orang lain</li> -->
          </ul>
          <div class="col-md-12" id="tab-diri"></div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <!-- <div class="card-header text-center bg-info text-light">
        Syarat dan Ketentuan Dokumen
      </div> -->

      <?php echo form_open_multipart(base_url("surat/domisili"),array('class' => 'form-horizontal')); ?>
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
              <div class="form-group col-md-6">
                <label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$_SESSION['nik']?>" disabled required>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Nama <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=$_SESSION['nama']?>" disabled required>
              </div>
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
            <a class="nav-link active" id="pills-dua-tab" data-toggle="pill" href="#pills-dua" role="tab" aria-controls="pills-dua" aria-selected="false">Data Domisili</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Tab 2 -->
          <div class="tab-pane fade show active" id="pills-dua" role="tabpanel" aria-labelledby="pills-dua-tab">
            <div class="form-row col-md-12">
              <div class="form-group col-md-12">
                <label for="" class="control-label">Jenis <span class="text-danger">*</span> </label>
                <select class="form-control" name="jenis" id="jenis">
                  <option value="usaha">Usaha</option>
                  <option value="tinggal">Tempat Tinggal</option>
                </select>
              </div>
              <div class="form-group col-md-4" id="nama_usaha">
                <label for="" class="control-label modal-label">Nama Usaha<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama_usaha" value="">
              </div>
              <div class="form-group col-md-8" id="alamat">
                <label for="" class="control-label">Alamat<span class="text-danger">*</span> </label>
                <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5" value=""></textarea>
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
              <!-- <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pengantar <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file" required/>
              </div> -->
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
              <div class="form-group col-md-12">
                <label for="" class="control-label">Akta Pendirian UKM <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="akta_usaha_file" required/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pernyataan Tidak Keberatan Dari Tetangga <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pernyataan_file" required/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Perjanjian Sewa </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="perjanjian_file"/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Bukti Kepemilikan Tanah </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kepemilikan_file"/>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group col-md-2 offset-md-8">
                <a href="#tab-kelahiran" class="btn scrollto form-control py-3 btn-prev"><i class="fa fa-angle-double-left"> Kembali</i></a>
              </div>
              <div class="form-group col-md-2">
                <button class="btn btn-success form-control py-3" name="domisili">Selesai</button>
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
  $('#jenis').change(function (){
    if (this.value=='tinggal') {
      $('#nama_usaha').hide();
      $('#alamat').hide();
    } else {
      $('#nama_usaha').show();
      $('#alamat').show();
    }
    $("input[name='nama_usaha']").val('');
    $("textarea[name='alamat']").val('');
  });
</script>

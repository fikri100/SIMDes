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
</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="containers">
    <div class="section-title text-center">
      <h2>Profil</h2><br>
      <!-- <p class="separator" style="margin-top:-20px;">Mohon isi data dibawah dengan lengkap & sebenar-benarnya agar status anda aktif.</p> -->
      <?php echo $this->session->flashdata('upload_error'); ?>
    </div>
    <!-- <br> -->
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart(base_url("akun/profil/"),array('class' => 'form-horizontal')); ?>
        <div class="card wow fadeInUp" id="get-started" style="visibility: visible; animation-name: fadeInUp;">
          <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
              <!-- <a class="nav-link disabled active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Data Pengaduan</a> -->
            </li>
          </ul>
          <br>
          <div class="tab-content" id="pills-tabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
              <div class="form-row col-md-12">
                <div class="form-group col-md-3">
                  <label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$warga->nik?>" disabled required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Nama <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=$warga->nama?>" disabled required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Email <span class="text-danger">*</span> </label>
                  <input class="form-control" type="email" name="email" placeholder="Email" value="<?=$warga->email?>" disabled required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">No. Telp <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="notelp" placeholder="No. Telp" value="<?=$warga->no_telp?>" disabled required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Tempat Lahir <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="tempat" placeholder="Tempat Lahir" value="<?=$warga->tempat_lahir?>" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Tanggal Lahir <span class="text-danger">*</span> </label>
                  <?php $tanggal = date_create($warga->tgl_lahir); ?>
                  <input class="form-control" type="date" name="tgl" placeholder="Tanggal Lahir" value="<?=date_format($tanggal, 'Y-m-d')?>" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Jenis Kelamin <span class="text-danger">*</span> </label>
                  <select class="form-control" name="jk">
                    <?php foreach ($d_jk as $v => $c){
                      $s = '';
                      if ($v==$warga->jk) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label modal-label">Golongan Darah <span class="text-danger">*</span> </label>
                  <select class="form-control" name="goldar">
                    <?php foreach ($d_goldar as $v => $c){
                      $s = '';
                      if ($v==$warga->goldar) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label modal-label">Agama<span class="text-danger">*</span> </label>
                  <select class="form-control" name="agama">
                    <?php foreach ($d_agama as $v => $c){
                      $s = '';
                      if ($v==$warga->agama) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label modal-label">Pendidikan<span class="text-danger">*</span> </label>
                  <select class="form-control" name="pendidikan">
                    <?php foreach ($d_pendidikan as $v => $c){
                      $s = '';
                      if ($v==$warga->pendidikan) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label modal-label">Pekerjaan<span class="text-danger">*</span> </label>
                  <select class="form-control" name="pekerjaan">
                    <?php foreach ($d_pekerjaan as $v => $c){
                      $s = '';
                      if ($v==$warga->pekerjaan) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Status Kawin <span class="text-danger">*</span> </label>
                  <select class="form-control" name="kawin">
                    <?php foreach (PERKAWINAN as $v => $c){
                      $s = '';
                      if ($v==$warga->kawin) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="" class="control-label">Dusun <span class="text-danger">*</span> </label>
                  <select class="form-control" name="rw">
                    <?php foreach ($d_rw as $v => $c){
                      $s = '';
                      if ($v==$warga->rw) {
                        $s = "selected";
                      }
                      echo "<option value='$v' $s>$c</option>";
                    } ?>
                  </select>
                </div>
                <div class="form-group col-md-1">
                  <label for="" class="control-label">RT <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="rt" placeholder="RT" value="0<?=$warga->rt?>" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">KTP <span class="text-danger">(Maks 2MB) (jpg/png)</span></label>
                  <input class="form-control" accept=".jpg, .png, .jpeg" type="file" name="ktp_file">
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">KK <span class="text-danger">(Maks 2MB) (jpg/png)</span></label>
                  <input class="form-control" accept=".jpg, .png, .jpeg" type="file" name="kk_file">
                </div>
                <div class="form-group col-md-3">
                  <label for="" class="control-label">Foto <span class="text-danger">(Maks 2MB) (jpg/png)</span></label>
                  <input class="form-control" accept=".jpg, .png, .jpeg" type="file" name="foto_file">
                </div>
                <!-- <div class="col-md-12"></div> -->
                <!-- <div class="form-group col-md-3">
                  <label for="" class="control-label"><b>Status :</b> <b class="badge badge-success py-2 px-3" style="font-size:1rem;">Aktif</b> </label>
                </div> -->
                <div class="form-group col-md-12">
                  <button name="profil" class="btn btn-success form-control col-md-12 py-2">Simpan</button>
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

CKEDITOR.disableAutoInline = true;
CKEDITOR.inline = editable;
</script>

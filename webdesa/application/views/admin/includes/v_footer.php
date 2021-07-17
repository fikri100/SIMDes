</div>
</div>
</div>



</div>
</div>

<div class="modal fade" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="signature-pad">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-pencil"></i> Tanda Tangan</h4>
      </div>
      <div class="modal-body">
        <canvas width="570" height="318"></canvas>
        <input type="hidden" id="signname" value="<?=$_SESSION['nama_admin']?>">
        <input type="hidden" id="nik" value="<?=$_SESSION['nik_admin']?>">
        <input type="hidden" id="surat" value="<?=($tabel?$tabel:'')?>">
        <input type="hidden" id="kode" value="">
        <input type="hidden" id="idsurat" value="">
        <input type="hidden" id="nikwarga" value="">
      </div>
      <div class="modal-footer clearfix">
        <button type="submit" id="save2" class="btn btn-success" data-action="save" ><i class="fa fa-check"></i> Save</button>
        <button type="button" data-action="clear" class="btn btn-secondary"><i class="fa fa-trash-o"></i> Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="dataDiriModal" tabindex="-1" role="dialog" aria-labelledby="dataDiriModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataDiriModalTitle">Data Diri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="post" id="formAnggota">
          <div class="row">
            <div class="col-md-6">
              <label for="" class="control-label modal-label">Nama Lengkap<span class="text-danger">*</span> </label>
              <input class="form-control" type="text" name="m_nama" id="m_nama" title="Isi Nama Lengkap" required>
            </div>
            <div class="col-md-6">
              <label for="" class="control-label modal-label">NIK<span class="text-danger">*</span> </label>
              <input class="form-control" type="text" name="m_nik" id="m_nik" title="Isi NIK" required>
            </div>
            <div class="col-md-6">
              <label for="" class="control-label modal-label">Tempat Lahir<span class="text-danger">*</span> </label>
              <input class="form-control" type="text" name="m_tempat" id="m_tempat" title="Isi Tempat Lahir" required>
            </div>
            <div class="col-md-6">
              <label for="" class="control-label modal-label">Tanggal Lahir<span class="text-danger">*</span> </label>
              <input class="form-control" type="date" name="m_tgl" id="m_tgl" title="Isi Tanggal Lahir" required>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="control-label modal-label">Jenis Kelamin <span class="text-danger">*</span> </label>
              <select class="form-control" name="m_jk" id="m_jk">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="control-label modal-label">Pendidikan <span class="text-danger">*</span> </label>
              <select class="form-control" name="m_pendidikan" id="m_pendidikan" required>
                <?php
                $pendidikan = PENDIDIKAN;
                foreach ($pendidikan as $v => $c){
                  echo "<option value='$v'>$c</option>";
                } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="control-label modal-label">Golongan Darah <span class="text-danger">*</span> </label>
              <select class="form-control" name="m_goldar" id="m_goldar" required>
                <?php
                $goldar = GOLDAR;
                foreach ($goldar as $v => $c){
                  echo "<option value='$v'>$c</option>";
                } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="control-label modal-label">Status Kawin <span class="text-danger">*</span> </label>
              <select class="form-control" name="m_kawin" id="m_kawin" required>
                <?php
                $perkawinan = PERKAWINAN;
                foreach ($perkawinan as $v => $c){
                  echo "<option value='$v'>$c</option>";
                } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="control-label modal-label">Agama<span class="text-danger">*</span> </label>
              <select class="form-control" name="m_agama" id="m_agama" required>
                <?php
                $agama = AGAMA;
                foreach ($agama as $v => $c){
                  echo "<option value='$v'>$c</option>";
                } ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="" class="control-label modal-label">Pekerjaan<span class="text-danger">*</span> </label>
              <select class="form-control" name="m_pekerjaan" id="m_pekerjaan" title="Isi Pekerjaan" required>
                <?php
                $pekerjaan = PEKERJAAN;
                foreach ($pekerjaan as $v => $c){
                  echo "<option value='$v'>$c</option>";
                } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="" class="control-label modal-label">Hubungan <span class="text-danger">*</span> </label>
              <input class="form-control" list="hubungan" name="m_hubungan" id="m_hubungan" title="Isi Hubungan Keluarga" required>
              <datalist id="hubungan">
                <option value="Kakek Buyut">Kakek Buyut</option>
                <option value="Nenek Buyut">Nenek Buyut</option>
                <option value="Kakek">Kakek</option>
                <option value="Nenek">Nenek</option>
                <option value="Ayah">Ayah</option>
                <option value="Ibu">Ibu</option>
                <option value="Paman">Paman</option>
                <option value="Bibi">Bibi</option>
                <option value="Mertua Ayah">Mertua Ayah</option>
                <option value="Mertua Ibu">Mertua Ibu</option>
                <option value="Ayah Tiri">Ayah Tiri</option>
                <option value="Ayah Angkat">Ayah Angkat</option>
                <option value="Ayah Asuh">Ayah Asuh</option>
                <option value="Ibu Tiri">Ibu Tiri</option>
                <option value="Ibu Angkat">Ibu Angkat</option>
                <option value="Ibu Asuh">Ibu Asuh</option>
                <option value="Besan">Besan</option>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Kakak">Kakak</option>
                <option value="Adik">Adik</option>
                <option value="Sepupu">Sepupu</option>
                <option value="Ipar">Saudara Ipar</option>
                <option value="Saudara Angkat">Saudara Angkat</option>
                <option value="Saudara Tiri">Saudara Tiri</option>
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak Kandung">Anak Kandung</option>
                <option value="Anak Angkat">Anak Angkat</option>
                <option value="Anak Tiri">Anak Tiri</option>
                <option value="Anak Asuh">Anak Asuh</option>
                <option value="Menantu">Menantu</option>
                <option value="Keponakan">Keponakan</option>
                <option value="Cucu">Cucu</option>
                <option value="Cicit">Cicit</option>
                <option value="Canggah">Canggah</option>
              </datalist>
            </div>
            <div class="form-group col-md-4">
              <label for="" class="control-label modal-label">Nama Ibu<span class="text-danger">*</span> </label>
              <input class="form-control" type="text" name="m_ibu" id="m_ibu" title="Isi Nama Ayah" required>
            </div>
            <div class="form-group col-md-4">
              <label for="" class="control-label modal-label">Nama Ayah<span class="text-danger">*</span> </label>
              <input class="form-control" type="text" name="m_ayah" id="m_ayah" title="Isi Nama Ibu" required>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="btnsimpananggota">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

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
        Apakah Anda Yakin?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Tidak</button>
        <a href="#" class="btn btn-danger btn-fill text-white" id="btnyakin">Yakin</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tanggapan -->
<div class="modal fade" id="modaltanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <?php
      $id = ($pengaduan->id_pengaduan)?$pengaduan->id_pengaduan:'';
      echo form_open_multipart(base_url("admin/pengaduan/tanggapan/$id"),array('class' => 'form-horizontal')); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tanggapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label for="" class="control-label modal-label">Tanggapan <span class="text-danger">*</span> </label>
            <textarea name="komen" rows="8" cols="80" class="form-control" required></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Tidak</button>
        <button type="submit" name="tanggapan" class="btn btn-danger btn-fill text-white" id="btnyakin">Yakin</a>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>

  <!-- Modal Catatan -->
  <div class="modal fade" id="modalCatatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form class="" action="<?=base_url("admin/")?>" method="post" id="formCatatan">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Catatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <label for="" class="control-label modal-label">Catatan <span class="text-danger">*</span> </label>
                <textarea name="catatan" rows="8" cols="80" class="form-control" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Tidak</button>
            <button name="tanggapan" type="submit" class="btn btn-danger btn-fill text-white" id="btnyakins">Yakin</a>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Modal Kegiatan -->
    <div class="modal fade" id="modalKegiatan" tabindex="-1" role="dialog" aria-labelledby="dataDiriModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="dataDiriModalTitle">Data Kegiatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart(base_url("kegiatan/buat/"),array('id' => 'formKegiatan')); ?>
            <div class="row">
              <div class="col-md-12">
                <label for="" class="control-label modal-label">Nama <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama" title="Isi Nama" required>
              </div>
              <div class="col-md-12">
                <label for="" class="control-label">Bidang <span class="text-danger">*</span> </label>
                <select class="form-control" name="bidang" title="Pilih Bidang" required>
                  <option value="2.1-PENYELENGGARAAN PEMERINTAHAN DESA">PENYELENGGARAAN PEMERINTAHAN DESA</option>
                  <option value="2.2-PELAKSANAAN PEMBANGUNAN DESA">PELAKSANAAN PEMBANGUNAN DESA</option>
                  <option value="2.3-PEMBINAAN KEMASYARAKATAN">PEMBINAAN KEMASYARAKATAN</option>
                  <option value="2.4-PEMBERDAYAAN MASYARAKAT">PEMBERDAYAAN MASYARAKAT</option>
                  <option value="2.5-BELANJA TAK TERDUGA">BELANJA TAK TERDUGA</option>
                </select>
              </div>
              <div class="col-md-12">
                <label for="" class="control-label">Dana <span class="text-danger">*</span> </label>
                <select class="form-control" name="dana" title="Pilih Dana" required>
                  <?php
                  if (isset($dana)) {
                    foreach ($dana as $c){
                      echo "<option value='$c->kode'>$c->nama</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-12 mt-5"></div>
              <div class="col-md-6">
                <label for="" class="control-label modal-label">Tgl Mulai <span class="text-danger">*</span> </label>
                <input class="form-control" type="date" name="tgl_mulai" title="Isi Tanggal Mulai" required>
              </div>
              <div class="col-md-6">
                <label for="" class="control-label modal-label">Tgl Selesai <span class="text-danger">*</span> </label>
                <input class="form-control" type="date" name="tgl_selesai" title="Isi Tanggal Selesai" required>
              </div>
              <div class="col-md-6">
                <label for="" class="control-label modal-label">Output <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="output" title="Isi Output" required>
              </div>
              <div class="col-md-6">
                <label for="" class="control-label modal-label">Ketua Pelaksana <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="ketua" title="Isi Ketua Pelaksana" required>
              </div>
              <div class="col-md-12">
                <label for="" class="control-label modal-label">Lampiran<span class="text-danger"></span> </label>
                <input class="form-control" type="file" name="lampiran" title="Isi Lampiran">
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary btn-fill" id="btnsimpankegiatan">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <!-- Modal Rencana -->
    <div class="modal fade" id="modalRencana" tabindex="-1" role="dialog" aria-labelledby="dataDiriModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" style="width:90vw;" role="document">
        <div class="modal-content">
          <?php echo form_open_multipart(base_url("kegiatan/buat/"),array('id' => 'formRencana')); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="dataDiriModalTitle">Data Rencana Anggaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="itemkeuangan">
            <div class="col-md-12" style="padding-bottom:30px;">
              <button onclick="tambahItem('test')" class="btn btn-success btn-fill pull-right" type="button" name="button" id="btnitemkeuangan">Tambah Item</button>
              <button onclick="hapusItemSemua()" class="btn btn-danger btn-fill pull-right" style="margin-right:10px;" type="button" name="button" id="hpsitemsemua">Hapus Semua</button>
            </div>
            <br><br>
            <div class="" id="listitemkeuangan">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-fill" name="rencana">Simpan</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <!-- Modal Daftar Rencana -->
    <div class="modal fade" id="modalDaftarRencana" tabindex="-1" role="dialog" aria-labelledby="dataDiriModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" style="width:90vw;" role="document">
        <div class="modal-content">
          <?php echo form_open_multipart(base_url("kegiatan/buat/"),array('id' => 'formDaftarRencana')); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="dataDiriModalTitle">Data Rencana Anggaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="lihatitemkeuangan">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tutup</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- END MODAL -->

    <!-- Modal Buat LPJ -->
    <div class="modal fade" id="modalBuatLPJ" tabindex="-1" role="dialog" aria-labelledby="dataDiriModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" style="width:90vw;" role="document">
        <div class="modal-content">
          <?php echo form_open_multipart(base_url("admin/kegiatan/buat_lpj/"),array('id' => 'formBuatLPJ')); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="dataDiriModalTitle">Data Laporan Anggaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="itemlpj">

          </div>
          <div class="modal-footer">
            <!-- <div class="col-md-12" style="margin-top:30px;"> -->
            <button onclick="tambahItemFisik()" class="btn btn-success btn-fill pull-left" type="button" name="button" id="btnitemfisik">Tambah Item Fisik</button>
            <!-- </div> -->
            <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-fill" name="lpj">Simpan</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <!-- END MODAL -->


    <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document" style="width:900px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped display" id="pilihItems">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Uraian</th>
                  <th>Volume</th>
                  <th>Tipe</th>
                  <th>Satuan</th>
                  <th>HST</th>
                  <th class="text-right"></th>
                </tr>
              </thead>
              <tbody id="show_data">
                <?php
                if (!empty($itembarang)) {
                  $n=1;
                  foreach ($itembarang as $i) {
                    ?>
                    <tr>
                      <th><?=$n++?></th>
                      <th><?=$i->uraian?></th>
                      <th><input type="number" id="item<?=$n?>-qty" name="jumlah" onclick="select()" class="form-control text-center" min="1" value="1" required autocomplete="off"/></th>
                      <th><?=($i->tipe==1?'Belanja Barang/Jasa':'')?><?=($i->tipe==2?'Belanja Modal':'')?></th>
                      <th><?=$i->satuan?></th>
                      <th><?=$i->hst?></th>
                      <th style="text-align: right;">
                        <button id="item<?=$n?>" data-kode="<?=$i->kode?>" data-uraian="<?=$i->uraian?>" data-satuan="<?=$i->satuan?>" data-tipe="<?=$i->tipe?>" data-hst="<?=$i->hst?>" onclick="pilihItem(this.id, '<?=$kode_kegiatan?>')" class="btn btn-info btn-sm">Pilih</button>
                      </th>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Selesai</button>
            <!-- <button type="button" id="btn-pilih" class="btn btn-success">Selesai</a> -->
          </div>
        </div>
      </div>
    </div>

    <input type="hidden" name="daftarItem">
    <!-- <input type="hidden" name="daftarItemModal"> -->
  </body>
  <!--   Core JS Files   -->
  <!-- <script src="<?=base_url("assets/admin")?>/js/jquery-1.10.2.js" type="text/javascript"></script> -->
  <!-- <script src="<?=base_url()?>assets/lib/jquery/jquery.min.js"></script> -->
  <script src="<?=base_url("assets/admin")?>/js/bootstrap.min.js" type="text/javascript"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="<?=base_url("assets/admin")?>/js/bootstrap-checkbox-radio-switch.js"></script>

  <!--  Charts Plugin -->
  <script src="<?=base_url("assets/admin")?>/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="<?=base_url("assets/admin")?>/js/bootstrap-notify.js"></script>

  <!--  Google Maps Plugin    -->
  <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
  <script src="<?=base_url("assets/admin")?>/js/light-bootstrap-dashboard.js"></script>

  <script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
  <script src="<?=base_url()?>assets/ckfinder/ckfinder.js"></script>

  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
  <script src="<?=base_url("assets/admin")?>/js/demo.js"></script>

  <?php if (!isset($itemkeuangan)) {
    $itemkeuangan = null;
  } ?>
  <?php if (!isset($itemfisik)) {
    $itemfisik = null;
  } ?>
  <script type="text/javascript">
  $('#pilihItems').DataTable();

  $(document).ready(function(){

    // demo.initChartist();
    //
    // $.notify({
    //   	icon: 'pe-7s-gift',
    //   	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
    //
    //   },{
    //       type: 'info',
    //       timer: 4000
    //   });
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

    /*clear the signature pad */
    signaturePad = new SignaturePad(canvas);
    if (clearButton) {
      clearButton.addEventListener("click", function (event) {
        signaturePad.clear();
      });
    }

    if (saveButton) {
      saveButton.addEventListener("click", function (event) {
        // function saveSign(){
        if (signaturePad.isEmpty()) {
          // $("#errors").addClass('shake');
          // $("#errors").show();
          // $("#errors").delay(4000).hide(200, function() {
          //   $("#errors").hide();
          // });
          // $('#errors').html('Please provide signature first');
          alert('Tanda Tangan tidak boleh kosong!');
        } else {
          $('#error').html('');
          $('#sign-modal').modal('hide');

          var nama=$('#signname').val();
          var nik = $('#nik').val();
          var surat = $('#surat').val();
          var kode = $('#kode').val();
          var idsurat = $('#idsurat').val();
          var nikwarga = $('#nikwarga').val();

          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>admin/surat/sign",
            data: {sign: signaturePad.toDataURL(), idsurat:idsurat, nama:nama, nikwarga:nikwarga,surat: surat,kode:kode,nik:nik},
            success: function(datas){
              signaturePad.clear();
              console.log(nikwarga);
              console.log(surat);
              location.reload();
            },
            error: function(err){
              console.log(err.responseText);
            }
          });
        }
        // }
      });
    }

    // $('#listObat').on('click','#hapusObat',function(){
    //     var id = $(this).data('hapus');
    //     var data = JSON.parse(window.datao);
    //     data.splice(id,1);
    //     window.datao = JSON.stringify(data);
    //     showObat(window.datao);
    // });

    $('#pilihItems').DataTable();
    $('#tbl_surat_baru').DataTable();
    $('#tbl_surat_proses').DataTable();
    $('#tbl_surat_selesai').DataTable();


    $('#btnsimpankegiatan').click(function (){
      if ($('#formKegiatan').valid()) {
        $('#formKegiatan').submit();
      }
    });

    $('#itemlpj').on('click','#btnhapusitemfisik',function() {
      $(this).closest('#rowitemfisik').remove();
    });

  });

  function tambahItemKeuangan(){
    $('#listitemkeuangan').append(`
      <div class="row" id="rowitemkeuangan">
      <div class="col-md-2">
      <label for="" class="control-label modal-label">Kode <span class="text-danger">*</span> </label>
      <input class="form-control" type="text" name="kode[]" title="Isi Kode" required>
      </div>
      <div class="col-md-3">
      <label for="" class="control-label modal-label">Uraian <span class="text-danger">*</span> </label>
      <input class="form-control" type="text" name="uraian[]" title="Isi Uraian" required>
      </div>
      <div class="col-md-2">
      <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
      <input class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume[]" required>
      </div>
      <div class="col-md-2">
      <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
      <input class="form-control" type="text" name="satuan[]" required>
      </div>
      <div class="col-md-2">
      <label for="" class="control-label modal-label">Harga Satuan (Rp) <span class="text-danger">*</span> </label>
      <input class="form-control" type="number" min="1" pattern="[0-9]+" name="harga[]" title="Masukkan Angka" required>
      </div>
      <div class="col-md-1">
      <label for="" class="control-label modal-label"><span class="text-danger"></span> </label>
      <button type="button" class="btn btn-danger btn-fill form-control" name="button" id="btnhapusitemkeuangan" data-hapus="'+i+'">Hapus</button>
      </div>
      </div>
      `);
    }

    function tambahItemFisik(){
      $('#itemlpj').append(`
        <div class="row" id="rowitemfisik">
        <div class="col-md-3">
        <label for="" class="control-label modal-label">Output <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="output_fisik[]" title="Isi Uraian" required>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
        <input class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume_fisik[]" required>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="satuan_fisik[]" required>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Nilai (Rp) <span class="text-danger">*</span> </label>
        <input class="form-control" type="number" min="1" pattern="[0-9]+" name="nilai[]" title="Masukkan Angka" required>
        </div>
        <div class="col-md-2">
        <label for="" class="control-label modal-label">Keterangan <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="ket[]" required>
        </div>
        <div class="col-md-1">
        <label for="" class="control-label modal-label"><span class="text-danger"></span> </label>
        <button type="button" class="btn btn-danger btn-fill form-control" name="button" id="btnhapusitemfisik">Hapus</button>
        </div>
        </div>
        `);
      }

      function hapusItemSemua(){
        window.datab = '[]';
        window.datam = '[]';
        window.datas = [];
        $('#listitemkeuangan').html('');
      }

      function ubahRencana(link){
        let data = JSON.parse('<?=$itemkeuangan?>');
        window.datab = '<?=(isset($barang)?$barang:'')?>';
        window.datam = '<?=(isset($modal)?$modal:'')?>';
        window.datas = data;


        // var html = '';
        // var panjang = 0;
        // if(data!==window.undef){
        //   panjang = data.length;
        // }
        // for(var i=0; i < panjang; i++){
        //   html += `
        //   <div class="row" id="rowitemkeuangan">
        //   <div class="col-md-2" style="display:none;">
        //   <label for="" class="control-label modal-label">Kode <span class="text-danger">*</span> </label>
        //   <input class="form-control" type="text" name="kode[]" title="Isi Kode" value="`+data[i].kode+`" required readonly>
        //   </div>
        //   <div class="col-md-3">
        //   <label for="" class="control-label modal-label">Uraian <span class="text-danger">*</span> </label>
        //   <input class="form-control" type="text" name="uraian[]" title="Isi Uraian" value="`+data[i].uraian+`" required readonly>
        //   </div>
        //   <div class="col-md-2">
        //   <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
        //   <input class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume[]" value="`+data[i].volume+`" required>
        //   </div>
        //   <div class="col-md-2">
        //   <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
        //   <input class="form-control" type="text" name="satuan[]" value="`+data[i].satuan+`" required readonly>
        //   </div>
        //   <div class="col-md-2">
        //   <label for="" class="control-label modal-label">HST (Rp) <span class="text-danger">*</span> </label>
        //   <input class="form-control" type="number" min="1" pattern="[0-9]+" name="harga[]" title="Masukkan Angka" value="`+data[i].harga_satuan+`" required readonly>
        //   </div>
        //   <div class="col-md-2">
        //   <label for="" class="control-label modal-label">Tipe <span class="text-danger">*</span> </label>
        //   <input class="form-control" type="text" name="tipe[]" title="Masukkan Tipe" value="`+(data[i].tipe==1?'1-Belanja Barang':'2-Belanja Modal')+`" required readonly>
        //   </div>
        //   <div class="col-md-1">
        //   <label for="" class="control-label modal-label"><span class="text-danger"></span> </label>
        //   <button type="button" class="btn btn-danger btn-fill form-control" name="button" id="btnhapusitemkeuangan`+i+`" data-hapus="`+i+`" onclick="hapusItem(`+i+`)">Hapus</button>
        //   </div>
        //   </div>`;
        // }

        // $('#listitemkeuangan').html(html);
        showItem(window.datas);
        $('#formRencana').attr('action', link);
        $('#modalRencana').modal('show');
      }


      function lihatRencana(){
        let data = JSON.parse('<?=$itemkeuangan?>');
        let total = 0;
        // console.log(data);
        $('#lihatitemkeuangan').html('');
        // $('#totalharga').html('');
        for (var i = 0; i < data.length; i++) {
          let kode = data[i].kode;
          let uraian = data[i].uraian;
          let volume = data[i].volume;
          let satuan = data[i].satuan;
          let harga = data[i].harga_satuan;
          let jumlah = data[i].jumlah;
          total += jumlah*1;
          $('#lihatitemkeuangan').append(`
            <div class="row" id="rowitemkeuangan">
            <div class="col-md-2">
            <label for="" class="control-label modal-label">Kode <span class="text-danger">*</span> </label>
            <input value="${kode}" class="form-control" type="text" name="kode[]" title="Isi Kode" required>
            </div>
            <div class="col-md-3">
            <label for="" class="control-label modal-label">Uraian <span class="text-danger">*</span> </label>
            <input value="${uraian}" class="form-control" type="text" name="uraian[]" title="Isi Uraian" required>
            </div>
            <div class="col-md-1">
            <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
            <input value="${volume}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume[]" required>
            </div>
            <div class="col-md-2">
            <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
            <input value="${satuan}" class="form-control" type="text" name="satuan[]" required>
            </div>
            <div class="col-md-2">
            <label for="" class="control-label modal-label">Harga Satuan (Rp) <span class="text-danger">*</span> </label>
            <input value="${harga}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="harga[]" required>
            </div>
            <div class="col-md-2">
            <label for="" class="control-label modal-label">Jumlah (Rp) <span class="text-danger">*</span> </label>
            <input value="${jumlah}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="harga[]" required>
            </div>
            </div>
            `);
          }
          $('#lihatitemkeuangan').append(`<div class="row"><div class="col-md-2 pull-right" id="totalharga""><h4 for="" >Total: ${total}</h4></div></div>`);

          $('#modalDaftarRencana').modal('show');
        }

        function lihatLPJ(){
          let data = JSON.parse('<?=$itemkeuangan?>');
          let fisik = JSON.parse('<?=$itemfisik?>');
          let total = 0;
          let totalfisik = 0;
          let realisasi = 0;
          let jumlah = 0;
          // console.log(data);
          $('#lihatitemkeuangan').html('');
          // $('#totalharga').html('');
          for (var i = 0; i < data.length; i++) {
            let kode = data[i].kode;
            let uraian = data[i].uraian;
            let volume = data[i].volume;
            let satuan = data[i].satuan;
            let harga = data[i].harga_satuan;
            jumlah = data[i].jumlah;
            realisasi = data[i].realisasi;
            let prosentase = data[i].prosentase;
            total += jumlah*1;
            totalfisik += realisasi*1;
            $('#lihatitemkeuangan').append(`
              <div class="row" id="rowitemkeuangan">
              <div class="col-md-1">
              <label for="" class="control-label modal-label">Kode <span class="text-danger"></span> </label>
              <input value="${kode}" class="form-control" type="text" name="kode[]" title="Isi Kode" required disabled>
              </div>
              <div class="col-md-2">
              <label for="" class="control-label modal-label">Uraian <span class="text-danger"></span> </label>
              <input value="${uraian}" class="form-control" type="text" name="uraian[]" title="Isi Uraian" required disabled>
              </div>
              <div class="col-md-1">
              <label for="" class="control-label modal-label">Volume <span class="text-danger"></span> </label>
              <input value="${volume}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume[]" required disabled>
              </div>
              <div class="col-md-2">
              <label for="" class="control-label modal-label">Satuan <span class="text-danger"></span> </label>
              <input value="${satuan}" class="form-control" type="text" name="satuan[]" required disabled>
              </div>
              <div class="col-md-2">
              <label for="" class="control-label modal-label">Harga Satuan (Rp) <span class="text-danger"></span> </label>
              <input value="${harga}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="harga[]" required disabled>
              </div>
              <div class="col-md-2">
              <label for="" class="control-label modal-label">Jumlah (Rp) <span class="text-danger"></span> </label>
              <input value="${jumlah}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="harga[]" required disabled>
              </div>
              <div class="col-md-2">
              <label for="" class="control-label modal-label">Realisasi (Rp) <span class="text-danger"></span> </label>
              <input value="${realisasi} (${prosentase} %)" class="form-control" type="text" min="1" pattern="[0-9]+" title="Masukkan Angka" name="realisasi[]" required disabled>
              </div>
              </div>
              `);
            }
            let totpros = (realisasi/jumlah)*100;
            $('#lihatitemkeuangan').append(`
              <div class="row">
              <div class="col-md-2 pull-right" id="totalfisik""><h4 for="" >Realisasi:<br/>${totalfisik} (${totpros.toFixed(2)}%)</h4></div>
              <div class="col-md-2 pull-right" id="totalharga""><h4 for="" >Total:<br/> ${total}</h4></div>
              </div>`);

              $('#modalDaftarRencana').modal('show');
            }

            function buatLPJ(id){
              let link = '<?=base_url()?>admin/kegiatan/buat_lpj/'+id;
              $('#formBuatLPJ').attr('action', link);
              let data = JSON.parse('<?=$itemkeuangan?>');
              let total = 0;
              // console.log(data);
              $('#itemlpj').html('');
              // $('#totalharga').html('');
              $('#itemlpj').append(`
                <div class="row" id="rowitemkeuangan">
                <div class="col-md-6">
                <label for="" class="control-label modal-label">Kendala & Upaya <span class="text-danger">*</span> </label>
                <textarea class="form-control" name="kendala" required></textarea>
                </div>
                <div class="col-md-6">
                <label for="" class="control-label modal-label">Saran & Rekomendasi <span class="text-danger">*</span> </label>
                <textarea class="form-control" name="saran" required></textarea>
                </div><br/><br/>
                <div class="col-md-12" style="margin-top:-20px;">
                <h4>Item Keuangan</h4>
                </div>
                </div>
                `);
                for (var i = 0; i < data.length; i++) {
                  let kode = data[i].kode;
                  let uraian = data[i].uraian;
                  let volume = data[i].volume;
                  let satuan = data[i].satuan;
                  let harga = data[i].harga_satuan;
                  let jumlah = data[i].jumlah;

                  total += jumlah*1;
                  $('#itemlpj').append(`
                    <div class="row" id="rowitemkeuangan">
                    <div class="col-md-1">
                    <label for="" class="control-label modal-label">Kode <span class="text-danger">*</span> </label>
                    <input value="${kode}" class="form-control" type="text" name="" title="Isi Kode" required disabled>
                    <input value="${kode}" type="hidden" name="kode[]">
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Uraian <span class="text-danger">*</span> </label>
                    <input value="${uraian}" class="form-control" type="text" name="uraian[]" title="Isi Uraian" required disabled>
                    </div>
                    <div class="col-md-1">
                    <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
                    <input value="${volume}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume[]" required disabled>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
                    <input value="${satuan}" class="form-control" type="text" name="satuan[]" required disabled>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Harga Satuan (Rp) <span class="text-danger">*</span> </label>
                    <input value="${harga}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="harga[]" required disabled>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Jumlah (Rp) <span class="text-danger">*</span> </label>
                    <input value="${jumlah}" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" required disabled>
                    <input value="${jumlah}" type="hidden" name="jumlah[]">
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Realisasi <span class="text-danger">*</span> </label>
                    <input value="" class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="realisasi[]" required>
                    </div>

                    </div>
                    `);
                  }

                  $('#itemlpj').append(`
                    <div class="row">
                    <div class="col-md-4 pull-right" id="totalfisik""><h4 for="" >Total: ${total}</h4></div>
                    <div class="col-md-12" style="margin-top:0px;">
                    <hr/>
                    <h4>Item Fisik</h4>
                    </div>
                    </div>
                    <div class="row" id="rowitemfisik">
                    <div class="col-md-3">
                    <label for="" class="control-label modal-label">Output <span class="text-danger">*</span> </label>
                    <input class="form-control" type="text" name="output_fisik[]" title="Isi Uraian" required>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Volume <span class="text-danger">*</span> </label>
                    <input class="form-control" type="number" min="1" pattern="[0-9]+" title="Masukkan Angka" name="volume_fisik[]" required>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
                    <input class="form-control" type="text" name="satuan_fisik[]" required>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Nilai (Rp) <span class="text-danger">*</span> </label>
                    <input class="form-control" type="number" min="1" pattern="[0-9]+" name="nilai[]" title="Masukkan Angka" required>
                    </div>
                    <div class="col-md-2">
                    <label for="" class="control-label modal-label">Keterangan <span class="text-danger">*</span> </label>
                    <input class="form-control" type="text" name="ket[]" required>
                    </div>`);
                    $('#modalBuatLPJ').modal('show');
                  }
                  </script>

                  </html>

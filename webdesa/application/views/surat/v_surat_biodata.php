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
/* .table-biodata { table-layout:fixed; overflow-x: scroll;}
.table-biodata td { padding: 5px 10px;} */

#wrapper {
  overflow-x: auto;
  overflow-y: hidden;
}
table#fluid {
  width: 100%;
}
table#fixed {
  width: 1100px;
  margin: 10px 0 0;
}
.tbl-num{
  padding-right: 10px;
}
td{
  /* padding-right:10px; */
  padding: 10px 10px 10px 0px;
}

.modal-label{
  font-weight: 500;
}
</style>
<section id="get-started" class="padd-section wow fadeInUp">
  <div class="containers">
    <div class="section-title text-center">
      <h2>Surat Biodata Keluarga</h2>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header text-center bg-danger text-light">
            Syarat dan Ketentuan Dokumen
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">1. Fotokopi Akta Kelahiran</li>
            <li class="list-group-item">2. Fotokopi Ijazah</li>
            <li class="list-group-item">3. Fotokopi KK dan KTP</li>
            <li class="list-group-item">4. Fotokopi Akta Perkawinan</li>
            <li class="list-group-item">5. Berkas diupload ke sistem dengan format <span class="text-danger">(jpg/png/pdf)</span> dengan Ukuran <span class="text-danger">(Maks 2MB)</span></li>
            <!-- <li class="list-group-item">6. Berkas Asli dibawa saat pengambilan surat</li>
            <li class="list-group-item">7. Surat Kuasa jika pengambilan berkas dikuasakan ke orang lain</li> -->
          </ul>
          <div class="col-md-12" id="tab-diri"></div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <!-- <div class="card-header text-center bg-info text-light">
        Syarat dan Ketentuan Dokumen
      </div> -->

      <?php echo form_open_multipart(base_url("surat/biodata"),array('class' => 'form-horizontal')); ?>
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
            <a class="nav-link active" id="pills-dua-tab" data-toggle="pill" href="#pills-dua" role="tab" aria-controls="pills-dua" aria-selected="false">Data Biodata</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Tab 2 -->
          <div class="tab-pane fade show active" id="pills-dua" role="tabpanel" aria-labelledby="pills-dua-tab">
            <div class="form-row col-md-12">
              <div class="form-group col-md-6">
                <label for="" class="control-label">Nama Kepala Keluarga <span class="text-danger">*</span> </label>
                <input pattern="[a-zA-Z\s]+" title="Masukkan Hanya Huruf Saja" class="form-control" type="text" name="nama_kepala" placeholder="Nama Kepala Keluarga" value="" required>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Alamat <span class="text-danger">*</span> </label>
                <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5" value="" required></textarea>
              </div>
              <div class="form-group col-md-12">
                <button type="button" name="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#dataDiriModal">Tambah Anggota Keluarga</button><br><br>
                <div id="wrapper">
                  <table id="fixed">
                    <thead>
                      <tr>
                        <th scope="col" width="">Nama</th>
                        <th scope="col" width="180" >NIK</th>
                        <th scope="col" width="50">JK</th>
                        <th scope="col" width="170">Tempat Lahir</th>
                        <th scope="col" width="140">Tgl Lahir</th>
                        <th scope="col" width="140">Hubungan</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="daftarAnggota">
                    </tbody>
                  </table>
                </div>
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

      <!-- Tab 3 -->
      <div class="card mt-5 wow fadeInUp" id="get-started">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-tiga-tab" data-toggle="pill" href="#pills-tiga" role="tab" aria-controls="pills-tiga" aria-selected="false">Lampiran</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-tiga" role="tabpanel" aria-labelledby="pills-tiga-tab">
            <div class="form-row col-md-12">
              <?php echo $this->session->flashdata('upload_error'); ?>
              <!-- <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pengantar <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file" required/>
              </div> -->
              <div class="col-md-12"></div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Akta Kelahiran <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="akta_lahir_file" required/>
              </div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Akta Perkawinan <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="akta_kawin_file" required/>
              </div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Ijazah <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ijazah_file" required/>
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
              <div class="form-group col-md-2 offset-md-8">
                <a href="#tab-kelahiran" class="btn scrollto form-control py-3 btn-prev"><i class="fa fa-angle-double-left"> Kembali</i></a>
              </div>
              <div class="form-group col-md-2">
                <button class="btn btn-success form-control py-3" name="biodata">Selesai</button>
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
        <button type="button" class="btn btn-primary" id="btnsimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->

<script type="text/javascript">
$(document).ready(function () {
  $('#btnsimpan').click(function (){
    if ($('#formAnggota').valid()) {
      let jml = $('.anggota').length+1;
      let nama = $('input[name="m_nama"]').val();
      let nik = $('input[name="m_nik"]').val();
      let tempat = $('input[name="m_tempat"]').val();
      let tgl = $('input[name="m_tgl"]').val();
      let jk = $('select[name="m_jk"]').val();
      let hubungan = $('input[name="m_hubungan"]').val();

      let pendidikan = $('select[name="m_pendidikan"]').val();
      let goldar = $('select[name="m_goldar"]').val();
      let kawin = $('select[name="m_kawin"]').val();
      let agama = $('select[name="m_agama"]').val();
      let pekerjaan = $('select[name="m_pekerjaan"]').val();
      let ayah = $('input[name="m_ayah"]').val();
      let ibu = $('input[name="m_ibu"]').val();

      let addon = `
      <input id="nama${jml}" type="hidden" name="nama[]" value="${nama}" id="nama${jml}">
      <input id="nik${jml}" type="hidden" name="nik_anggota[]" value="${nik}" id="nik${jml}">
      <input id="jk${jml}" type="hidden" name="jk[]" value="${jk}" id="jk${jml}">
      <input id="tempat${jml}" type="hidden" name="tempat[]" value="${tempat}" id="tempat${jml}">
      <input id="tgl${jml}" type="hidden" name="tgl[]" value="${tgl}">
      <input id="hubungan${jml}" type="hidden" name="hubungan[]" value="${hubungan}">
      <input id="pendidikan${jml}" type="hidden" name="pendidikan[]" value="${pendidikan}">
      <input id="goldar${jml}" type="hidden" name="goldar[]" value="${goldar}">
      <input id="kawin${jml}" type="hidden" name="kawin[]" value="${kawin}">
      <input id="agama${jml}" type="hidden" name="agama[]" value="${agama}">
      <input id="pekerjaan${jml}" type="hidden" name="pekerjaan[]" value="${pekerjaan}">
      <input id="ayah${jml}" type="hidden" name="ayah[]" value="${ayah}">
      <input id="ibu${jml}" type="hidden" name="ibu[]" value="${ibu}">`;

      $('.daftarAnggota').append(`
        <tr class="anggota">
        <td>${nama}</td>
        <td>${nik}</td>
        <td>${jk}</td>
        <td>${tempat}</td>
        <td>${tgl}</td>
        <td>${hubungan}</td>
        <td><button type="button" name="hapus" onclick="" class="btn btn-danger" id="btnhapus" onclick="hapus(this.id)">Hapus</button>&ensp;<button type="button" name="ubah" onclick="" class="btn btn-info" id="btnubah" data-ubah="${jml}">Ubah</button></td>${addon}</tr>`);
        // <td><button type="button" name="hapus" onclick="" class="btn btn-danger" id="btnhapus" onclick="hapus(this.id)">Hapus</button>${addon}</tr>`);
        $('#dataDiriModal').modal('hide');
      }
    });

    $('.daftarAnggota').on('click','#btnhapus',function() {
      $(this).closest('tr').remove();
    });

    $('.daftarAnggota').on('click','#btnubah',function() {
      let id = this.dataset.ubah;

      let nama = $('#nama'+id).val();
      let nik = $('#nik'+id).val();
      let jk = $('#jk'+id).val();
      let tempat = $('#tempat'+id).val();
      let tgl = $('#tgl'+id).val();
      let hubungan = $('#hubungan'+id).val();
      let pendidikan = $('#pendidikan'+id).val();
      let goldar = $('#goldar'+id).val();
      let kawin = $('#kawin'+id).val();
      let agama = $('#agama'+id).val();
      let pekerjaan = $('#pekerjaan'+id).val();
      let ayah = $('#ayah'+id).val();
      let ibu = $('#ibu'+id).val();

      $('#m_nama').val(nama);
      $('#m_nik').val(nik);
      $('#m_jk').val(jk);
      $('#m_tempat').val(tempat);
      $('#m_tgl').val(tgl);
      $('#m_hubungan').val(hubungan);
      $('#m_pendidikan').val(pendidikan);
      $('#m_goldar').val(goldar);
      $('#m_kawin').val(kawin);
      $('#m_agama').val(agama);
      $('#m_pekerjaan').val(pekerjaan);
      $('#m_ayah').val(ayah);
      $('#m_ibu').val(ibu);

      $('#dataDiriModal').modal('show');
      $(this).closest('tr').remove();
      // let anggota = {nama,nik,jk,tempat,tgl,hubungan,pendidikan,goldar,kawin,agama,pekerjaan,ayah,ibu};
      // console.log(anggota);
    });
  });
</script>

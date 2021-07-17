<div class="card">
  <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link disabled active" id="pills-satu-tab" data-toggle="pill" href="#pills-satu" role="tab" aria-controls="pills-satu" aria-selected="true">Data Diri</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" id="pills-dua-tab" data-toggle="pill" href="#pills-dua" role="tab" aria-controls="pills-dua" aria-selected="false">Data Kelahiran</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" id="pills-tiga-tab" data-toggle="pill" href="#pills-tiga" role="tab" aria-controls="pills-tiga" aria-selected="false">Lampiran</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <!-- Tab 1 -->
    <div class="tab-pane fade show active" id="pills-satu" role="tabpanel" aria-labelledby="pills-satu-tab">
      <div class="form-row col-md-12">
        <div class="form-group col-md-6">
          <label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="nik" placeholder="NIK" value="">
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Nama <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="nama" placeholder="Nama" value="">
        </div>
        <div class="form-group col-md-2">
          <label for="" class="control-label">Dusun <span class="text-danger">*</span> </label>
          <select class="form-control" name="dusun">
            <option value="pager">Pager</option>
            <option value="ngumbuk">Ngumbuk</option>
            <option value="bendet">Bendet</option>
          </select>
        </div>
        <div class="form-group col-md-1">
          <label for="" class="control-label">RT <span class="text-danger">*</span> </label>
          <input class="form-control" type="number" name="rt" placeholder="RT" value="">
        </div>
        <div class="form-group col-md-1">
          <label for="" class="control-label">RW <span class="text-danger">*</span> </label>
          <input class="form-control" type="number" name="rw" placeholder="RW" value="">
        </div>
        <div class="form-group col-md-2">
          <label for="" class="control-label">No. Rumah </label>
          <input class="form-control" type="text" name="norumah" placeholder="No. Rumah" value="">
        </div>
        <div class="form-group col-md-6"></div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Hubungan <span class="text-danger">*</span> </label>
          <select class="form-control" name="hubungan">
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
          <a href="#pills-tab" onclick="pindah(2)" class="btn btn-lg btn-info form-control p-3">Lanjut</a>
        </div>
      </div>
    </div>

    <!-- Tab 2 -->
    <div class="tab-pane fade" id="pills-dua" role="tabpanel" aria-labelledby="pills-dua-tab">
      <div class="form-row col-md-12">
        <div class="form-group col-md-4">
          <label for="" class="control-label">Tanggal Lahir <span class="text-danger">*</span> </label>
          <input class="form-control" type="date" name="tgllahir" required/>
        </div>
        <div class="form-group col-md-4">
          <label for="" class="control-label">Tempat Lahir <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="tempatlahir" placeholder="Tempat Lahir" value="">
        </div>
        <div class="form-group col-md-4">
          <label for="" class="control-label">Jenis Kelamin <span class="text-danger">*</span> </label>
          <select class="form-control" name="jk">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="" class="control-label">Nama Anak <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="anak" placeholder="Nama Anak" value="">
        </div>
        <div class="form-group col-md-4">
          <label for="" class="control-label">Nama Ayah <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ayah" placeholder="Nama Ayah" value="">
        </div>
        <div class="form-group col-md-4">
          <label for="" class="control-label">Nama Ibu <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ibu" placeholder="Nama Ibu" value="">
        </div>
        <div class="form-group col-md-2">
          <label for="" class="control-label">Dusun <span class="text-danger">*</span> </label>
          <select class="form-control" name="dusun">
            <option value="pager">Pager</option>
            <option value="ngumbuk">Ngumbuk</option>
            <option value="bendet">Bendet</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="" class="control-label">RT <span class="text-danger">*</span> </label>
          <input class="form-control" type="number" name="rt" placeholder="RT" value="">
        </div>
        <div class="form-group col-md-2">
          <label for="" class="control-label">RW <span class="text-danger">*</span> </label>
          <input class="form-control" type="number" name="rw" placeholder="RW" value="">
        </div>
        <div class="form-group col-md-2">
          <label for="" class="control-label">No. Rumah </label>
          <input class="form-control" type="number" name="norumah" placeholder="No. Rumah" value="">
        </div>
        <div class="form-group col-md-12"></div>
        <div class="form-group col-md-2 offset-md-8">
          <a href="#pills-tab" onclick="pindah(1)" class="btn btn-secondary btn-lg form-control p-3">Kembali</a>
        </div>
        <div class="form-group col-md-2">
          <a href="#pills-tab" onclick="pindah(3)" class="btn btn-lg btn-info form-control p-3">Lanjut</a>
        </div>
      </div>
    </div>
    <!-- Tab 3 -->
    <div class="tab-pane fade" id="pills-tiga" role="tabpanel" aria-labelledby="pills-tiga-tab">
      <div class="form-row col-md-12">
        <div class="form-group col-md-6">
          <label for="" class="control-label">Surat Pengantar <span class="text-danger">*</span> </label>
          <input class="form-control" type="file" name="suratpengantar" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Keterangan Surat Pengantar <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ketpengantar" placeholder="Keterangan Surat Pengantar" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Fotokopi Surat Kelahiran <span class="text-danger">*</span> </label>
          <input class="form-control" type="file" name="suratpengantar" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Keterangan Fotokopi Surat Kelahiran <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ketsuratkel" placeholder="Fotokopi Surat Kelahiran" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Surat Pengantar <span class="text-danger">*</span> </label>
          <input class="form-control" type="file" name="suratpengantar" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Fotokopi KK <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ketkk" placeholder="Fotokopi Kartu Keluarga" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Fotokopi KTP <span class="text-danger">*</span> </label>
          <input class="form-control" type="file" name="ktp" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Keterangan <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ketktp" placeholder="Keterangan Fotokopi KTP" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Fotokopi Buku Nikah / Akta Perkawinan <span class="text-danger">*</span> </label>
          <input class="form-control" type="file" name="bukunikah" required/>
        </div>
        <div class="form-group col-md-6">
          <label for="" class="control-label">Keterangan <span class="text-danger">*</span> </label>
          <input class="form-control" type="text" name="ketbuku" placeholder="Keterangan Fotokopi Buku Nikah / Akta Perkawinan" required/>
        </div>
        <div class="form-group col-md-2 offset-md-8">
          <a href="#pills-tab" onclick="pindah(2)" class="btn btn-secondary btn-lg form-control p-3">Kembali</a>
        </div>
        <div class="form-group col-md-2">
          <button class="btn btn-lg btn-info form-control p-3">Selesai</button>
        </div>
      </div>
    </div>
  </div>
</div>

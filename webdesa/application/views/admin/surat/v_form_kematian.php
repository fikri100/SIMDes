<div class="col-md-12">
	<div class="card" style="padding:0px 20px">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;"><?=$this->uri->segment(4)?> Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<?php
		if($this->uri->segment(5)=='ubah'){
			$action = $this->uri->segment(5).'/'.$this->uri->segment(6);
		} else {
			$action = $this->uri->segment(5);
		}
		?>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<?php echo $this->session->flashdata('transaksi_error'); ?>
						<?php echo form_open_multipart(base_url("admin/surat/form/$surat/$action")) ?>
						<div class="row">
							<div class="form-group col-md-6" style="padding-left:0;">
								<label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$hasil->nik?>" pattern="[0-9]+" title="Hanya Boleh Angka" required>
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Hubungan <span class="text-danger">*</span> </label>
								<select class="form-control" name="hubungan" required>
									<?php
									$hubungan = HUBUNGAN;
									foreach ($hubungan as $key => $value){
										$s = '';
										if ($key==$hasil->hubungan) {
											$s = "selected";
										}
										echo "<option value='$key' $s>$value</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group col-md-3">
                <label for="" class="control-label">NIK Alm <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nik_alm" placeholder="NIK" value="<?=$hasil->nik_alm?>" pattern="[0-9]+" title="Hanya Boleh Angka" required>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Nama Alm <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama_alm" placeholder="Nama" value="<?=$hasil->nama?>" required>
              </div>
              <div class="form-group col-md-3">
								<?php $tanggal = date_create($hasil->tgl_lahir); ?>
                <label for="" class="control-label">Tanggal Lahir <span class="text-danger">*</span> </label>
                <input class="form-control" type="date" name="tgllahir" value="<?=date_format($tanggal, 'Y-m-d')?>" required/>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Jenis Kelamin <span class="text-danger">*</span> </label>
                <select class="form-control" name="jk">
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Kewarganegaraan <span class="text-danger">*</span> </label>
                <select class="form-control" name="kwn">
                  <option value="wni" <?=($hasil->kwn=='wni')?'selected':''?>>WNI</option>
                  <option value="wna" <?=($hasil->kwn=='wna')?'selected':''?>>WNA</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Agama<span class="text-danger">*</span> </label>
                <select class="form-control" name="agama">
                  <?php
									$agama = AGAMA;
									foreach ($agama as $v => $c){
										$s = '';
										if ($v==$hasil->agama) {
											$s = "selected";
										}
                    echo "<option value='$v' $s>$c</option>";
                  } ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Status Perkawinan<span class="text-danger">*</span> </label>
                <select class="form-control" name="status_kawin">
                  <?php
									$perkawinan = PERKAWINAN;
									foreach ($perkawinan as $v => $c){
										$s = '';
										if ($v==$hasil->status_kawin) {
											$s = "selected";
										}
                    echo "<option value='$v' $s>$c</option>";
                  } ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Pekerjaan<span class="text-danger">*</span> </label>
                <select class="form-control" name="pekerjaan">
                  <?php
									$pekerjaan = PEKERJAAN;
									foreach ($pekerjaan as $v => $c){
										$s = '';
										if ($v==$hasil->pekerjaan) {
											$s = "selected";
										}
                    echo "<option value='$v' $s>$c</option>";
                  } ?>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="" class="control-label">Alamat<span class="text-danger">*</span> </label>
                <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5"><?=$hasil->alamat?></textarea>
              </div>
              <div class="form-group col-md-3">
								<?php $tanggal = date_create($hasil->tgl_meninggal); ?>
                <label for="" class="control-label">Tanggal Meninggal<span class="text-danger">*</span> </label>
								<input class="form-control" type="date" name="tgl_meninggal" placeholder="Tanggal Meninggal" value="<?=date_format($tanggal, 'Y-m-d')?>">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Tempat Meninggal<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="tempat_meninggal" placeholder="Tempat Meninggal" value="<?=$hasil->tempat_meninggal?>">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Penyebab Meninggal<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="penyebab" placeholder="Penyebab Meninggal" value="<?=$hasil->penyebab?>">
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Penentu Meninggal<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="penentu" placeholder="Penentu Meninggal" value="<?=$hasil->penentu?>">
              </div>
							<div class="form-group col-md-12">
							<?php //echo $this->session->flashdata('upload_error'); ?>
						</div>
							<!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Surat Penyataan <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pernyataan_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KK Pemohon <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file"/>
              </div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi KK Yang Meninggal <span class="text-danger">*</span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_alm_file"/>
							</div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KTP Pemohon <span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KTP Yang Meninggal<span class="text-danger">*</span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_alm_file"/>
              </div> -->
							<div class="form-group col-md-12">
								<button class="btn btn-success btn-fill form-control py-3" name="<?=$surat?>">Selesai</button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	// $('#tbl_warga').DataTable();
} );
</script>

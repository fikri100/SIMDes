<div class="col-md-12">
	<div class="card" style="padding:0px 20px">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;"><?=$this->uri->segment(5)?> Data <?=$judul?></h4>
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
								<label for="" class="control-label">Nama Anak <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="anak" placeholder="Nama Anak" value="<?=$hasil->anak?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Tanggal Lahir <span class="text-danger">*</span> </label>
								<?php $tanggal = date_create($hasil->tgl_lahir); ?>
								<input class="form-control" type="date" name="tgl_lahir" value="<?=date_format($tanggal, 'Y-m-d')?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Tempat Lahir <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="tempatlahir" placeholder="Tempat Lahir" value="<?=$hasil->anak?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Jenis Kelamin <span class="text-danger">*</span> </label>
								<select class="form-control" name="jk" required>
									<option value="L" <?=($hasil->jk=='l')?'selected':''?>>Laki-laki</option>
									<option value="P" <?=($hasil->jk=='p')?'selected':''?>>Perempuan</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Nama Ayah <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="ayah" placeholder="Nama Ayah" value="<?=$hasil->ayah?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Nama Ibu <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="ibu" placeholder="Nama Ibu" value="<?=$hasil->ibu?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Dusun <span class="text-danger">*</span> </label>
								<select class="form-control" name="rw" required>
									<option value="1" <?=($hasil->rw==1)?'selected':''?>>Pager</option>
									<option value="2" <?=($hasil->rw==2)?'selected':''?>>Ngumbuk</option>
									<option value="3" <?=($hasil->rw==3)?'selected':''?>>Bendet</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">RT <span class="text-danger">*</span> </label>
								<input class="form-control" type="number" min="1" name="rt" placeholder="RT" value="<?=$hasil->rt?>" required>
							</div>
							<div class="col-md-12">
								<?php //echo $this->session->flashdata('upload_error'); ?>
							</div>
							<!-- <div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi Surat Bukti Kelahiran <span class="text-danger"> </span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ket_file">
							</div> -->
							<!-- <div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi KK <span class="text-danger"> </span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file">
							</div> -->
							<!-- <div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi KTP <span class="text-danger"> </span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file">
							</div> -->
							<!-- <div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi Buku Nikah / Akta Perkawinan <span class="text-danger"> </span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="buku_file">
							</div> -->
							<!-- <div class="col-md-12"></div> -->
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

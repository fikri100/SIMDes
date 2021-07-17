<div class="col-md-12">
	<div class="card" style="padding:0px 20px">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;"><?=$this->uri->segment(4)?> Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
<?php
	if($this->uri->segment(4)=='ubah'){
		$readonly = 'readonly';
		$action = $this->uri->segment(4).'/'.$this->uri->segment(5);
	} else {
		$readonly = '';
		$action = $this->uri->segment(4);
	}
?>
		<div class="content">
			<!-- <div class="container-fluid"> -->
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<?php echo form_open_multipart(base_url("admin/warga/form/$action")) ?>
							<div class="row">
								<div class="form-group col-md-3" style="padding-left:10px;">
									<label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
									<input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$warga->nik?>" pattern="[0-9]+" title="Hanya Boleh Angka" required <?=$readonly?>>
								</div>
								<div class="form-group col-md-3">
									<label for="" class="control-label">Nama <span class="text-danger">*</span> </label>
									<input class="form-control" type="text" name="nama" placeholder="Nama" value="<?=$warga->nama?>" required>
								</div>
								<div class="form-group col-md-3">
									<label for="" class="control-label">Email <span class="text-danger">*</span> </label>
									<input class="form-control" type="email" name="email" placeholder="Email" value="<?=$warga->email?>" required>
								</div>
								<div class="form-group col-md-3">
									<label for="" class="control-label">No. Telp <span class="text-danger">*</span> </label>
									<input class="form-control" type="text" name="no_telp" placeholder="No. Telp" value="<?=$warga->no_telp?>" pattern="[0-9]+" title="Hanya Boleh Angka" required>
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
								<div class="form-group col-md-3">
									<label for="" class="control-label">RT <span class="text-danger">*</span> </label>
									<input class="form-control" type="number" name="rt" placeholder="RT" value="<?=$warga->rt?>" required>
								</div>
								<div class="form-group col-md-3">
									<label for="" class="control-label">KTP <span class="text-danger">(Maks 2MB) (jpg/png)</span></label>
									<input class="form-control" accept=".jpg, .png, .jpeg" type="file" name="ktp">
								</div>
								<div class="form-group col-md-3">
									<label for="" class="control-label">KK <span class="text-danger">(Maks 2MB) (jpg/png)</span></label>
									<input class="form-control" accept=".jpg, .png, .jpeg" type="file" name="kk">
								</div>
								<div class="form-group col-md-3">
									<label for="" class="control-label">Foto <span class="text-danger">(Maks 2MB) (jpg/png)</span></label>
									<input class="form-control" accept=".jpg, .png, .jpeg" type="file" name="foto">
								</div>
								<div class="form-group col-md-12">
									<button name="warga" class="btn btn-fill btn-success form-control col-md-12 py-2">Simpan</button>
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

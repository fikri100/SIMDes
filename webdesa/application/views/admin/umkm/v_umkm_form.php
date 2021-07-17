<?php
	$menu = $this->uri->segment(2);
?>
<div class="col-md-12">
	<div class="card" style="padding:0px 20px">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;"><?=$this->uri->segment(4)?> Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
<?php
	if($this->uri->segment(4)=='ubah'){
		$action = $this->uri->segment(4).'/'.$this->uri->segment(5);
	} else {
		$action = $this->uri->segment(4);
	}
?>
		<div class="content">
			<!-- <div class="container-fluid"> -->
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<?php echo form_open_multipart(base_url("admin/$judul/form/$action")) ?>
						<?php echo $this->session->flashdata('upload_error'); ?>
							<div class="form-row">
								<div class="col-md-6" style="padding-left:5px;">
			            <label for="" class="control-label modal-label">Nama <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="nama" value="<?=$detail->nama?>" required>
			          </div>
								<div class="form-group col-md-6">
		              <label for="" class="control-label modal-label">Bidang <span class="text-danger">*</span> </label>
		              <select class="form-control" name="bidang" required>
		                <?php
		                $bidang = BIDANG_UMKM;
										$s = '';
		                foreach ($bidang as $v => $c){
											$s = ($detail->bidang==$v)?'selected':'';
		                  echo "<option value='$v' $s>$c</option>";
		                } ?>
		              </select>
		            </div>
								<div class="col-md-6">
			            <label for="" class="control-label modal-label">NIK Pemilik <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="nik_pemilik" value="<?=$detail->nik_pemilik?>" required>
			          </div>
								<div class="col-md-6">
			            <label for="" class="control-label modal-label">Tgl Berdiri <span class="text-danger">*</span> </label>
			            <input class="form-control" type="date" name="tgl_berdiri" value="<?=$detail->tgl_berdiri?>" required>
			          </div>
								<div class="col-md-6">
									<label for="" class="control-label modal-label">No Telp <span class="text-danger">*</span> </label>
									<input class="form-control" type="text" name="no_telp" value="<?=$detail->no_telp?>" required>
								</div>
								<div class="col-md-6">
									<label for="" class="control-label modal-label">Logo <span class="text-danger"></span> </label>
									<input class="form-control" type="file" name="logo_file" value="<?=$detail->logo_file?>">
								</div>
								<div class="col-md-12">
									<label for="" class="control-label modal-label">Alamat <span class="text-danger">*</span> </label>
									<input class="form-control" type="text" name="alamat" value="<?=$detail->alamat?>" required>
								</div>
								<div class="form-group col-md-12">
                  <label for="" class="control-label">Deskripsi <span class="text-danger">*</span> </label><br>
                  <textarea name="deskripsi" id="ckeditor" class="ckeditor form-control"><?=$detail->deskripsi?></textarea>
                </div>
								<div class="form-group col-md-12">
									<button name="umkm" class="btn btn-fill btn-success form-control col-md-12 py-2">Simpan</button>
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
$(document).ready(function () {
	CKEDITOR.disableAutoInline = true;
	CKEDITOR.inline = editable;
});
</script>

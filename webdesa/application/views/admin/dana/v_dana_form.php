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
							<div class="form-row">
								<div class="col-md-6" style="padding-left:5px;">
			            <label for="" class="control-label modal-label">Kode <span class="text-danger">*</span> </label>
			            <input class="form-control" type="number" name="kode" maxlength="4" minlength="4" value="<?=$detail->kode?>" required>
			          </div>
								<div class="col-md-6">
			            <label for="" class="control-label modal-label">Nama <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="nama" value="<?=$detail->nama?>" required>
			          </div>
								<div class="col-md-6">
			            <label for="" class="control-label modal-label">Jumlah <span class="text-danger">*</span> </label>
			            <input class="form-control" type="number" min="1" name="jumlah" value="<?=$detail->jumlah?>" required>
			          </div>
								<div class="col-md-6">
			            <label for="" class="control-label modal-label">Tahun <span class="text-danger">*</span> </label>
			            <input class="form-control" type="number" min="1975" max="2075" name="tahun" value="<?=$detail->tahun?>" required>
			          </div>
								<div class="form-group col-md-12">
									<button name="dana" class="btn btn-fill btn-success form-control col-md-12 py-2">Simpan</button>
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

});
</script>

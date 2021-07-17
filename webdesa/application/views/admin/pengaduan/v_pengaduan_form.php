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
						<?php echo form_open_multipart(base_url("admin/warga/form/$action")) ?>
							<div class="form-row">
								<div class="form-group col-md-8" style="padding-left:0;">
                  <label for="" class="control-label">Judul <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="judul" placeholder="Judul" value="" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="" class="control-label">Lokasi <span class="text-danger">*</span> </label>
                  <input class="form-control" type="text" name="lokasi" placeholder="Lokasi" value="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="" class="control-label">Bidang <span class="text-danger">*</span> </label>
                  <!-- <select class="form-control" name="bidang[]" id="bidang" title="Pilih Bidang"  multiple required> -->
                  <select class="form-control" name="bidang" title="Pilih Bidang" required>
                    <option value="infrastruktur">Infrastruktur</option>
                    <option value="pendidikan">Pendidikan</option>
                    <option value="kesehatan">Kesehatan</option>
                    <option value="administrasi">Administrasi</option>
                    <option value="kasus">Kasus</option>
                    <option value="lain">Lain-lain</option>
                  </select>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-5">
                  <label for="" class="control-label">Kategori <span class="text-danger">*</span> </label><br>
                  <div class="form-check form-check-inline">
                    <input id="anggaran" class="form-check-input" type="radio" name="kategori" value="anggaran" checked>
                    <label for="anggaran" class="form-check-label">Anggaran</label> &ensp;&ensp;
										<input id="non" class="form-check-input" type="radio" name="kategori" value="non-anggaran">
										<label for="non" class="form-check-label">Non-Anggaran</label>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="" class="control-label">Uraian <span class="text-danger">*</span> </label><br>
                  <textarea name="uraian" class="form-control" rows="3" cols="80"></textarea>
                </div>
                <div class="form-group col-md-6">
                  <?php echo $this->session->flashdata('upload_error'); ?>
                  <label for="" class="control-label">Lampiran <span class="text-danger">(Maks. 2MB) (JPG/JPEG/PNG)</span></label><br>
                  <input class="form-control" accept=".jpg, .jpeg, .png" type="file" name="lampiran_file" multiple>
                </div>
								<div class="form-group col-md-12">
									<button name="pengaduan" class="btn btn-fill btn-success form-control col-md-12 py-2">Simpan</button>
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

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
								<div class="col-md-12" style="padding-left:5px;">
			            <label for="" class="control-label modal-label">Nama <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="nama" title="Isi Nama" value="<?=$detail->nama?>" required>
			          </div>
			          <div class="col-md-6">
			            <label for="" class="control-label">Bidang <span class="text-danger">*</span> </label>
			            <select class="form-control" name="bidang" title="Pilih Bidang" required>
			              <option value="infrastruktur" <?=($detail->bidang=='infrastruktur')?'selected':''?>>Infrastruktur</option>
			              <option value="pendidikan" <?=($detail->bidang=='pendidikan')?'selected':''?>>Pendidikan</option>
			              <option value="kesehatan" <?=($detail->bidang=='kesehatan')?'selected':''?>>Kesehatan</option>
			              <option value="administrasi" <?=($detail->bidang=='administrasi')?'selected':''?>>Administrasi</option>
			              <option value="kasus" <?=($detail->bidang=='kasus')?'selected':''?>>Kasus</option>
			              <option value="lain" <?=($detail->bidang=='lain')?'selected':''?>>Lain-lain</option>
			            </select>
			          </div>
			          <div class="col-md-6">
			            <label for="" class="control-label">Dana <span class="text-danger">*</span> </label>
			            <select class="form-control" name="dana" title="Pilih Dana" required>
			              <?php
										foreach ($dana as $c){
											$selected = $detail->kode==$c->kode?'selected':'';
			                echo "<option value='$c->kode' $selected>$c->nama</option>";
			              }
			              ?>
			            </select>
			          </div>
								<?php $tgl_mulai = date_create($detail->tgl_mulai); ?>
			          <div class="col-md-6">
			            <label for="" class="control-label modal-label">Tgl Mulai <span class="text-danger">*</span> </label>
			            <input class="form-control" type="date" name="tgl_mulai" title="Isi Tanggal Mulai" value="<?=date_format($tgl_mulai, 'Y-m-d')?>" required>
			          </div>
								<?php $tgl_selesai = date_create($detail->tgl_selesai); ?>
			          <div class="col-md-6">
			            <label for="" class="control-label modal-label">Tgl Selesai <span class="text-danger">*</span> </label>
			            <input class="form-control" type="date" name="tgl_selesai" title="Isi Tanggal Selesai" value="<?=date_format($tgl_selesai, 'Y-m-d')?>" required>
			          </div>
			          <div class="col-md-6">
			            <label for="" class="control-label modal-label">Output <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="output" title="Isi Output" value="<?=$detail->output?>" required>
			          </div>
			          <div class="col-md-6">
			            <label for="" class="control-label modal-label">Ketua Pelaksana <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="ketua" title="Isi Ketua Pelaksana" value="<?=$detail->ketua_pelaksana?>" required>
			          </div>
			          <div class="col-md-12">
			            <label for="" class="control-label modal-label">Lampiran<span class="text-danger"></span> </label>
			            <input class="form-control" type="file" name="lampiran" title="Isi Lampiran">
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

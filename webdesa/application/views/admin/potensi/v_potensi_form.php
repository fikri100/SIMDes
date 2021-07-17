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
							<div class="form-group col-md-3">
								<label for="" class="control-label modal-label">Bidang <span class="text-danger">*</span> </label>
								<select class="form-control" name="bidang" required>
									<?php
									$bidang = array_merge(BIDANG_BUMDES, BIDANG_UMKM);
									$s = '';
									foreach ($bidang as $v => $c){
										$s = ($detail->bidang==$v)?'selected':'';
										echo "<option value='$v' $s>$c</option>";
									} ?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Omzet <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="omzet" placeholder="Omzet" value="<?=$detail->omzet?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Orang Terlibat <span class="text-danger">*</span> </label>
								<input class="form-control" type="number" name="orang" placeholder="Orang" value="<?=$detail->tahun?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="" class="control-label">Bulan <span class="text-danger">*</span> </label>
								<select class="form-control" name="waktu_awal">
									<option value="1" <?=($detail->waktu_awal==1)?'selected':''?>>Januari</option>
									<option value="2" <?=($detail->waktu_awal==2)?'selected':''?>>Februari</option>
									<option value="3" <?=($detail->waktu_awal==3)?'selected':''?>>Maret</option>
									<option value="4" <?=($detail->waktu_awal==4)?'selected':''?>>April</option>
									<option value="5" <?=($detail->waktu_awal==5)?'selected':''?>>Mei</option>
									<option value="6" <?=($detail->waktu_awal==6)?'selected':''?>>Juni</option>
									<option value="7" <?=($detail->waktu_awal==7)?'selected':''?>>Juli</option>
									<option value="8" <?=($detail->waktu_awal==8)?'selected':''?>>Agustus</option>
									<option value="9" <?=($detail->waktu_awal==9)?'selected':''?>>September</option>
									<option value="10" <?=($detail->waktu_awal==10)?'selected':''?>>Oktober</option>
									<option value="11" <?=($detail->waktu_awal==11)?'selected':''?>>November</option>
									<option value="12" <?=($detail->waktu_awal==12)?'selected':''?>>Desember</option>
								</select>
							</div>
							<!-- <div class="form-group col-md-2">
								<label for="" class="control-label">Akhir <span class="text-danger">*</span> </label>
								<select class="form-control" name="waktu_akhir">
									<option value="1" <?=($detail->waktu_akhir==1)?'selected':''?>>Januari</option>
									<option value="2" <?=($detail->waktu_akhir==2)?'selected':''?>>Februari</option>
									<option value="3" <?=($detail->waktu_akhir==3)?'selected':''?>>Maret</option>
									<option value="4" <?=($detail->waktu_akhir==4)?'selected':''?>>April</option>
									<option value="5" <?=($detail->waktu_akhir==5)?'selected':''?>>Mei</option>
									<option value="6" <?=($detail->waktu_akhir==6)?'selected':''?>>Juni</option>
									<option value="7" <?=($detail->waktu_akhir==7)?'selected':''?>>Juli</option>
									<option value="8" <?=($detail->waktu_akhir==8)?'selected':''?>>Agustus</option>
									<option value="9" <?=($detail->waktu_akhir==9)?'selected':''?>>September</option>
									<option value="10" <?=($detail->waktu_akhir==10)?'selected':''?>>Oktober</option>
									<option value="11" <?=($detail->waktu_akhir==11)?'selected':''?>>November</option>
									<option value="12" <?=($detail->waktu_akhir==12)?'selected':''?>>Desember</option>
								</select>
							</div> -->
							<div class="form-group col-md-12">
								<button name="potensi" class="btn btn-fill btn-success form-control col-md-12 py-2">Simpan</button>
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

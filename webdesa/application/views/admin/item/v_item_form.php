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
								<div class="col-md-3" style="padding-left:5px;">
			            <label for="" class="control-label modal-label">Uraian <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="uraian" value="<?=$detail->uraian?>" required>
			          </div>
								<div class="col-md-3">
									<label for="" class="control-label modal-label">Tipe <span class="text-danger">*</span> </label>
									<select class="form-control" name="tipe">
										<option value="1">Belanja Barang/Jasa</option>
										<option value="2">Belanja Modal</option>
									</select>
								</div>
								<div class="col-md-3">
			            <label for="" class="control-label modal-label">Satuan <span class="text-danger">*</span> </label>
			            <input class="form-control" type="text" name="satuan" value="<?=$detail->satuan?>" required>
			          </div>
								<div class="col-md-3">
			            <label for="" class="control-label modal-label">Harga Satuan Tertinggi <span class="text-danger">*</span> </label>
			            <input class="form-control" type="number" min="1" name="hst" value="<?=$detail->hst?>" required>
			          </div>
								<!-- <div class="col-md-2">
			            <label for="" class="control-label modal-label">Kategori <span class="text-danger">*</span> </label>
			            <select class="form-control" name="sub_kategori">
										<option value="0">-</option>
			            	<?php
											// foreach ($sub_kategori as $s) {
											// 	if ($s->kode==$detail->sub_kategori) {
											// 		echo '<option value="'.$s->kode.'" selected>'.$s->uraian.'</option>';
											// 	} else {
											// 		echo '<option value='.$s->kode.'>'.$s->uraian.'</option>';
											// 	}
			            		// }
										?>
			            </select>
			          </div> -->
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

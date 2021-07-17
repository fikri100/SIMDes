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
							<div class="form-group col-md-4" style="padding-left:0;">
								<label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$hasil->nik?>" pattern="[0-9]+" title="Hanya Boleh Angka" required>
							</div>
							<div class="form-group col-md-2">
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
							<div class="form-group col-md-3">
                <label for="" class="control-label">Jenis <span class="text-danger">*</span> </label>
                <select class="form-control" name="jenis">
                  <option value="sekolah">Sekolah</option>
                  <option value="rumah_sakit">Rumah Sakit</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="" class="control-label">Nama Terkait<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama_terkait" placeholder="Nama" value="<?=$hasil->nama_terkait?>">
              </div>              
              <div class="form-group col-md-6">
                <label for="" class="control-label">Tujuan<span class="text-danger">*</span> </label>
                <!-- <input class="form-control" type="text" name="tujuan" placeholder="Tujuan" value="<?=$hasil->tujuan?>"> -->
								<textarea class="form-control" name="tujuan" placeholder="Tujuan" rows="5" value="" required><?=$hasil->tujuan?></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Alamat<span class="text-danger">*</span> </label>
                <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5" value="" required><?=$hasil->alamat?></textarea>
              </div>
							<div class="col-md-12">
								<?php //echo $this->session->flashdata('upload_error'); ?>
							</div>
							<!-- <div class="form-group col-md-6">
                <label for="" class="control-label">Surat Pengantar <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file"/>
              </div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi KK <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file"/>
							</div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Surat Pernyataan <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pernyataan_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KTP <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file"/>
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

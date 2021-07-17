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
							<div class="form-group col-md-4">
                <label for="" class="control-label">Jenis <span class="text-danger">*</span> </label>
                <select class="form-control" name="jenis" id="jenis">
                  <option value="usaha" <?=($hasil->jenis=='usaha')?'selected':''?>>Usaha</option>
                  <option value="tinggal" <?=($hasil->jenis=='tinggal')?'selected':''?>>Tempat Tinggal</option>
                </select>
              </div>
              <div class="form-group col-md-4" id="nama_usaha">
                <label for="" class="control-label modal-label">Nama Usaha<span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="nama_usaha" value="<?=$hasil->nama_usaha?>">
              </div>
              <div class="form-group col-md-12" id="alamat">
                <label for="" class="control-label">Alamat<span class="text-danger">*</span> </label>
                <textarea class="form-control" name="alamat" placeholder="Alamat" rows="5" value=""><?=$hasil->alamat?></textarea>
              </div>
							<div class="col-md-12">
								<?php // echo $this->session->flashdata('upload_error'); ?>
							</div>
							<!-- <div class="form-group col-md-12">
                <label for="" class="control-label">Surat Pengantar <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KK <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Fotokopi KTP <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Akta Pendirian UKM <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="akta_usaha_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Surat Pernyataan Tidak Keberatan Dari Tetangga <span class="text-danger"></span> </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pernyataan_file"/>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="control-label">Surat Perjanjian Sewa </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="perjanjian_file"/>
              </div>
							<div class="form-group col-md-6">
                <label for="" class="control-label">Surat Bukti Kepemilikan Tanah </label>
                <input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kepemilikan_file"/>
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

	$('#jenis').change(function (){
    if (this.value=='tinggal') {
      $('#nama_usaha').hide();
      $('#alamat').hide();
    } else {
      $('#nama_usaha').show();
      $('#alamat').show();
    }
    $("input[name='nama_usaha']").val('');
    $("textarea[name='alamat']").val('');
  });
	
	$('#jenis').val('<?=$hasil->jenis?>').trigger('change');
} );
</script>

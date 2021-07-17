<style media="screen">
	#daftar_surat{
		box-shadow: 5px 20px 35px 5px rgba(0, 0, 0, 0.1);
		padding: 50px 20px 20px 20px;
	}
	#daftar_surat a{
		color: black;
	}
</style>
<div class="col-md-12">
	<div class="card" style="padding:0px 40px 40px 50px;">
		<div class="header">
			<!-- <a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a> -->
			<h2 class="text-center" style="text-transform:capitalize;">Daftar <?=$judul?></h2>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-4 mb-5 text-center" id="daftar_surat">
							<a href="<?=base_url("surat/kelahiran")?>"><img width="200px" src="<?=base_url()?>assets/img/surat/icon/about-img.png" alt="img" class="img-fluid"></a>
							<a href="<?=base_url("surat/kelahiran")?>"><h4>Surat Keterangan <br/>Kelahiran</h4></a>
					</div>
					<div class="col-md-4 mb-5 text-center" id="daftar_surat">
							<a href="<?=base_url("surat/kelahiran")?>"><img width="200px" src="<?=base_url()?>assets/img/surat/icon/tombstone.png" alt="img" class="img-fluid"></a>
							<a href="<?=base_url("surat/kelahiran")?>"><h4>Surat Keterangan <br/>Kematian</h4></a>
					</div>
					<div class="col-md-4 mb-5 text-center" id="daftar_surat">
							<a href="<?=base_url("surat/kelahiran")?>"><img width="200px" src="<?=base_url()?>assets/img/surat/icon/analytics.png" alt="img" class="img-fluid"></a>
							<a href="<?=base_url("surat/kelahiran")?>"><h4>Surat Keterangan <br/>Tidak Mampu</h4></a>
					</div>
					<div class="col-md-4 text-center" id="daftar_surat">
							<a href="<?=base_url("surat/kelahiran")?>"><img width="200px" src="<?=base_url()?>assets/img/surat/icon/driving-license.png" alt="img" class="img-fluid"></a>
							<a href="<?=base_url("surat/kelahiran")?>"><h4>Surat Keterangan <br/>Biodata</h4></a>
					</div>
					<div class="col-md-4 text-center" id="daftar_surat">
							<a href="<?=base_url("surat/kelahiran")?>"><img width="200px" src="<?=base_url()?>assets/img/surat/icon/file.png" alt="img" class="img-fluid"></a>
							<a href="<?=base_url("surat/kelahiran")?>"><h4>Surat Keterangan <br/>Umum</h4></a>
					</div>
					<div class="col-md-4 text-center" id="daftar_surat">
							<a href="<?=base_url("surat/kelahiran")?>"><img width="200px" src="<?=base_url()?>assets/img/surat/icon/online-store.png" alt="img" class="img-fluid"></a>
							<a href="<?=base_url("surat/kelahiran")?>"><h4>Surat Keterangan <br/>Domisili</h4></a>
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

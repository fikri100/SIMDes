<div class="col-md-12">
	<!-- <div class="card" style="background: #CDCDCD; color: ; padding:10px 0px 2px 0px;"> -->
		<h2 class="text-center" style="margin-top:0px;">Surat Tidak Mampu</h2><br>
	<!-- </div> -->
	<div class="card">
		<div class="header">
			<a href="<?=base_url("admin/$judul/form/$surat/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a>
			<h4 class="title" style="text-transform:capitalize;"><?=$judul?> Baru</h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped" id="tbl_surat_baru">
					<thead>
						<tr>
							<th>#</th>
							<th>No Surat</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Tujuan</th>
							<th>Pekerjaan</th>
							<th>Tgl Permohonan</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($baru as $v): ?>
							<tr>
								<th><?=$i++?></th>
								<th><?=$v->id_tdk_mampu?></th>
								<td><?=$v->nama_terkait?></td>
								<td><?=$v->jenis?></td>
								<td><?=$v->tujuan?></td>
								<td><?=$v->pekerjaan?></td>
								<td><?=$v->tgl_buat?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/surat/detail/$surat/$v->id")?>" class="btn btn-info btn-fill" title="Lihat">Lihat</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="header">
			<h4 class="title" style="text-transform:capitalize;"><?=$judul?> Proses</h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped" id="tbl_surat_proses">
					<thead>
						<tr>
							<th>#</th>
							<th>No Surat</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Tujuan</th>
							<th>Pekerjaan</th>
							<th>Tgl Permohonan</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($proses as $v): ?>
							<tr>
								<th><?=$i++?></th>
								<th><?=$v->id_tdk_mampu?></th>
								<td><?=$v->nama_terkait?></td>
								<td><?=$v->jenis?></td>
								<td><?=$v->tujuan?></td>
								<td><?=$v->pekerjaan?></td>
								<td><?=$v->tgl_buat?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/surat/detail/$surat/$v->id")?>" class="btn btn-info btn-fill" title="Lihat">Lihat</a>
									<button class="btn btn-success" type="button" onclick="proses('<?=base_url("admin/surat/proses/$v->id/tdkmampu/2")?>')">Selesai</button>
									<button class="btn signbtn" type="button" id="sbnt<?=$v->id?>" onclick="showSign(this.id)" data-idsurat="<?=$v->id?>" data-kode="<?=$v->id_tdk_mampu?>" data-nikwarga="<?=$v->nik?>">Sign</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="header">
			<h4 class="title" style="text-transform:capitalize;"><?=$judul?> Selesai</h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped" id="tbl_surat_selesai">
					<thead>
						<tr>
							<th>#</th>
							<th>No Surat</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Tujuan</th>
							<th>Pekerjaan</th>
							<th>Tgl Permohonan</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($selesai as $v): ?>
							<tr>
								<th><?=$i++?></th>
								<th><?=$v->id_tdk_mampu?></th>
								<td><?=$v->nama_terkait?></td>
								<td><?=$v->jenis?></td>
								<td><?=$v->tujuan?></td>
								<td><?=$v->pekerjaan?></td>
								<td><?=$v->tgl_buat?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/surat/detail/$surat/$v->id")?>" class="btn btn-info btn-fill" title="Lihat">Lihat</a>
									<a href="<?=base_url("admin/surat/cetak/$surat/$v->id")?>" target="_blank" class="btn btn-danger btn-fill" title="Cetak">Cetak</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	// $('#tbl_warga').DataTable();
} );
</script>

<?php
	$menu = $this->uri->segment(2);
?>
<?php if($_SESSION['role_admin']!=3):?>
<div class="col-md-12">
	<div class="card">
		<?php echo $this->session->flashdata('sukses'); ?>
		<div class="header">
			<a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a>
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?> Baru</h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_kegiatan">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Bidang</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selesai</th>
						<th>Output</th>
						<th>Ketua Pelaksana</th>
						<th>Dana</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($hasil as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->kode_kegiatan?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->tgl_mulai?></td>
								<td><?=$w->tgl_selesai?></td>
								<td><?=$w->output?></td>
								<td><?=$w->ketua_pelaksana?></td>
								<td><?=$w->dana?></td>
								<td><?=$w->pelapor?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_kegiatan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<!-- <a href="<?=base_url("admin/$menu/form/ubah/$w->id_pengaduan")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_pengaduan")?>')" class="btn btn-danger" title="Hapus">Hapus</button> -->
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="col-md-12">
	<div class="card">
		<div class="header">
			<!-- <a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a> -->
			<h4 class="title" style="text-transform:capitalize;">Validasi RAB <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
			<br>
		</div>
		<div class="content">
			<?php //echo $this->session->flashdata('sukses'); ?>
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_rencana">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Bidang</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selesai</th>
						<th>Output</th>
						<th>Ketua Pelaksana</th>
						<th>Dana</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($rencana as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->kode_kegiatan?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->tgl_mulai?></td>
								<td><?=$w->tgl_selesai?></td>
								<td><?=$w->output?></td>
								<td><?=$w->ketua_pelaksana?></td>
								<td><?=$w->dana?></td>
								<td><?=$w->pelapor?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_kegiatan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<!-- <a href="<?=base_url("admin/$menu/form/ubah/$w->id_pengaduan")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_pengaduan")?>')" class="btn btn-danger" title="Hapus">Hapus</button> -->
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php if($_SESSION['role_admin']!=3): ?>
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<!-- <a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a> -->
			<h4 class="title" style="text-transform:capitalize;">Revisi RAB <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
			<br>
		</div>
		<div class="content">
			<?php //echo $this->session->flashdata('sukses'); ?>
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_rencana">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Bidang</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selesai</th>
						<th>Output</th>
						<th>Ketua Pelaksana</th>
						<th>Dana</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($revisi as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->kode_kegiatan?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->tgl_mulai?></td>
								<td><?=$w->tgl_selesai?></td>
								<td><?=$w->output?></td>
								<td><?=$w->ketua_pelaksana?></td>
								<td><?=$w->dana?></td>
								<td><?=$w->pelapor?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_kegiatan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<!-- <a href="<?=base_url("admin/$menu/form/ubah/$w->id_pengaduan")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_pengaduan")?>')" class="btn btn-danger" title="Hapus">Hapus</button> -->
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
			<!-- <a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a> -->
			<h4 class="title" style="text-transform:capitalize;"><?=$judul?> (On Progress)</h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_proses">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Bidang</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selesai</th>
						<th>Output</th>
						<th>Ketua Pelaksana</th>
						<th>Dana</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($proses as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->kode_kegiatan?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->tgl_mulai?></td>
								<td><?=$w->tgl_selesai?></td>
								<td><?=$w->output?></td>
								<td><?=$w->ketua_pelaksana?></td>
								<td><?=$w->dana?></td>
								<td><?=$w->pelapor?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_kegiatan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<!-- <a href="<?=base_url("admin/$menu/form/ubah/$w->id_pengaduan")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_pengaduan")?>')" class="btn btn-danger" title="Hapus">Hapus</button> -->
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
			<!-- <a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a> -->
			<h4 class="title" style="text-transform:capitalize;">Buat LPJ <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_selesai">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Bidang</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selesai</th>
						<th>Output</th>
						<th>Ketua Pelaksana</th>
						<th>Dana</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($selesai as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->kode_kegiatan?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->tgl_mulai?></td>
								<td><?=$w->tgl_selesai?></td>
								<td><?=$w->output?></td>
								<td><?=$w->ketua_pelaksana?></td>
								<td><?=$w->dana?></td>
								<td><?=$w->pelapor?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_kegiatan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<!-- <a href="<?=base_url("admin/$menu/form/ubah/$w->id_pengaduan")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_pengaduan")?>')" class="btn btn-danger" title="Hapus">Hapus</button> -->
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
			<!-- <a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a> -->
			<h4 class="title" style="text-transform:capitalize;">Arsip <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_selesai">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Bidang</th>
						<th>Tgl Mulai</th>
						<th>Tgl Selesai</th>
						<th>Output</th>
						<th>Ketua Pelaksana</th>
						<th>Dana</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($arsip as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->kode_kegiatan?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->tgl_mulai?></td>
								<td><?=$w->tgl_selesai?></td>
								<td><?=$w->output?></td>
								<td><?=$w->ketua_pelaksana?></td>
								<td><?=$w->dana?></td>
								<td><?=$w->pelapor?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_kegiatan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<!-- <a href="<?=base_url("admin/$menu/form/ubah/$w->id_pengaduan")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_pengaduan")?>')" class="btn btn-danger" title="Hapus">Hapus</button> -->
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function() {
	$('#tbl_kegiatan').DataTable();
	$('#tbl_rencana').DataTable();
	$('#tbl_proses').DataTable();
	$('#tbl_selesai').DataTable();
} );
</script>

<?php
	$menu = $this->uri->segment(2);
?>

<div class="col-md-12">
	<div class="card">
		<div class="header">
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?> Baru</h4>
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_baru">
					<thead>
						<th>#</th>
						<th>Judul</th>
						<th>Bidang</th>
						<th>Kategori</th>
						<th>Lokasi</th>
						<th>Tgl Pengaduan</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($baru as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->judul?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->kategori?></td>
								<td><?=$w->lokasi?></td>
								<td><?=$w->tgl_pengaduan?></td>
								<td><?=$w->nama?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_pengaduan")?>" class="btn btn-info" title="Lihat">Lihat</a>
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
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?> Proses</h4>
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_proses">
					<thead>
						<th>#</th>
						<th>Judul</th>
						<th>Bidang</th>
						<th>Kategori</th>
						<th>Lokasi</th>
						<th>Tgl Pengaduan</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($proses as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->judul?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->kategori?></td>
								<td><?=$w->lokasi?></td>
								<td><?=$w->tgl_pengaduan?></td>
								<td><?=$w->nama?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_pengaduan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<?php if ($_SESSION['role_admin']==1 || $_SESSION['role_admin']==2): ?>
										<button onclick="proses('<?=base_url("admin/$menu/proses/$w->id_pengaduan/2")?>')" class="btn btn-success" title="Selesai">Selesai</button>
									<?php endif; ?>
									<a href="<?=base_url("admin/$menu/cetak/$w->id_pengaduan")?>" target="_blank" class="btn btn-warning" title="Cetak">Cetak</a>
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
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?> Selesai</h4>
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_selesai">
					<thead>
						<th>#</th>
						<th>Judul</th>
						<th>Bidang</th>
						<th>Kategori</th>
						<th>Lokasi</th>
						<th>Tgl Pengaduan</th>
						<th>Pelapor</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($selesai as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->judul?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->kategori?></td>
								<td><?=$w->lokasi?></td>
								<td><?=$w->tgl_pengaduan?></td>
								<td><?=$w->nama?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/detail/$w->id_pengaduan")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<a href="<?=base_url("admin/$menu/cetak/$w->id_pengaduan")?>" target="_blank" class="btn btn-warning" title="Cetak">Cetak</a>
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
	$('#tbl_baru').DataTable();
	$('#tbl_proses').DataTable();
	$('#tbl_selesai').DataTable();
} );
</script>

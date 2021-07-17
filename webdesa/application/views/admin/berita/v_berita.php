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
						<th>Kode</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Tgl Buat</th>
						<th>Penulis</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($baru as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->id_berita?></td>
								<td><?=$w->judul?></td>
								<td><?=$w->rubrik?></td>
								<td><?=$w->tgl_berita?></td>
								<td><?=$w->nama?></td>
								<td class="tindakan">
									<a href="<?=base_url("berita/detail/$w->judul/$w->id_berita")?>" class="btn btn-info" target="_blank">Lihat</a>
									<button onclick="proses('<?=base_url("admin/$menu/proses/$w->id_berita/1")?>')" class="btn btn-success" title="Valid">Valid</button>
									<button onclick="proses('<?=base_url("admin/$menu/proses/$w->id_berita/-1")?>')" class="btn btn-danger" title="Tolak">Tolak</button>
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
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?> Terbit</h4>
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_proses">
					<thead>
						<th>#</th>
						<th>Kode</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Tgl Buat</th>
						<th>Penulis</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($terbit as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->id_berita?></td>
								<td><?=$w->judul?></td>
								<td><?=$w->rubrik?></td>
								<td><?=$w->tgl_berita?></td>
								<td><?=$w->nama?></td>
								<td class="tindakan">
									<a href="<?=base_url("berita/detail/$w->judul/$w->id_berita")?>" class="btn btn-info" target="_blank">Lihat</a>
									<button onclick="proses('<?=base_url("admin/$menu/proses/$w->id_berita/-1")?>')" class="btn btn-danger" title="Turunkan">Turunkan</button>
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

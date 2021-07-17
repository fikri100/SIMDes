<?php
	$menu = $this->uri->segment(2);
?>
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a>
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_kegiatan">
					<thead>
						<th>#</th>
						<th>Bidang</th>
						<th>Omzet</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Orang Terlibat</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($hasil as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->omzet?></td>
								<?php $awal  = DateTime::createFromFormat('!m', $w->waktu_awal);?>
								<td><?=$awal->format('F');?></td>
								<td><?=$w->tahun?></td>
								<td><?=$w->orang?></td>
								<td class="tindakan">
									<a href="<?=base_url("admin/$menu/form/ubah/$w->id_potensi")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_potensi")?>')" class="btn btn-danger" title="Hapus">Hapus</button>
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
	$('#tbl_kegiatan').DataTable();
} );
</script>

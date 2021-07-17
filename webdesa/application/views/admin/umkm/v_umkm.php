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
						<th>Nama</th>
						<th>Bidang</th>
						<th>Pemilik</th>
						<th>Tgl Berdiri</th>
						<th>Alamat</th>
						<th>No Telp</th>
						<th>Logo</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($hasil as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->bidang?></td>
								<td><?=$w->pemilik?></td>
								<td><?=$w->tgl_berdiri?></td>
								<td><?=$w->alamat?></td>
								<td><?=$w->no_telp?></td>
								<td><img width="100" src="<?=$w->logo_file?>"></td>
								<td class="tindakan">
									<a href="<?=base_url("potensi/detail_umkm/$w->id_umkm")?>" target="_blank" class="btn btn-info" title="Lihat">Lihat</a>
									<a href="<?=base_url("admin/$menu/form/ubah/$w->id_umkm")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/$menu/hapus/$w->id_umkm")?>')" class="btn btn-danger" title="Hapus">Hapus</button>
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

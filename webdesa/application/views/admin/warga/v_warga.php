<div class="col-md-12">
	<div class="card">
		<div class="header">
			<a href="<?=base_url("admin/$judul/form/tambah")?>" class="btn btn-success btn-fill pull-right">Tambah</a>
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-responsive" id="tbl_warga">
					<thead>
						<th>#</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>TTL</th>
						<th>Email</th>
						<th>No Telp</th>
						<th>Alamat</th>
						<!-- <th>Goldar</th>
						<th>Agama</th>
						<th>Pendidikan</th>
						<th>Pekerjaan</th> -->
						<!-- <th>Status</th> -->
						<th>Tindakan</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($warga as $w): ?>

							<tr>
								<td><?=$i++?></td>
								<td><?=$w->nik?></td>
								<td><?=$w->nama?></td>
								<td><?=$w->tempat_lahir?>, <?=$w->tgl_lahir?></td>
								<td style="text-transform:lowercase;"><?=$w->email?></td>
								<td><?=$w->no_telp?></td>
								<td><?=$dusun[$w->rw]?>, RW<?=$w->rw?>/RT<?=$w->rt?></td>
								<!-- <td><?=$w->goldar?></td>
								<td><?=$w->agama?></td>
								<td><?=$w->pendidikan?></td>
								<td><?=$w->pekerjaan?></td> -->
								<!-- <td><?=$w->status?></td> -->
								<td class="tindakan">
									<!-- <a href="#" class="btn btn-info" title="Lihat"><i class="pe-7s-look"></i></a>
									<a href="#" class="btn btn-success" title="Ubah"><i class="pe-7s-pen"></i></a>
									<a href="#" class="btn btn-danger" title="Hapus"><i class="pe-7s-trash"></i></a> -->

									<a href="<?=base_url("admin/warga/detail/$w->nik")?>" class="btn btn-info" title="Lihat">Lihat</a>
									<a href="<?=base_url("admin/warga/form/ubah/$w->nik")?>" class="btn btn-success" title="Ubah">Ubah</a>
									<button onclick="proses('<?=base_url("admin/warga/hapus/$w->nik")?>')" class="btn btn-danger" title="Hapus">Hapus</button>
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

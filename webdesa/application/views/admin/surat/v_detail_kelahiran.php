<div class="col-md-12">
	<div class="card">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<div class="content">
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-borderless">
					<thead>
					</thead>
					<tbody>
						<tr>
							<th width="200">Kode Surat</th>
							<th width="50">:</th>
							<td><?=$detail->id_kelahiran?></td>
						</tr>
						<tr>
							<th>Hubungan</th>
							<th>:</th>
							<td><?=$detail->hubungan?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<th>:</th>
							<td><?=$detail->tgl_lahir?></td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<th>:</th>
							<td><?=$detail->tempat_lahir?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<th>:</th>
							<td><?=$detail->jk?></td>
						</tr>
						<tr>
							<th>Nama Bayi</th>
							<th>:</th>
							<td><?=$detail->anak?></td>
						</tr>
						<tr>
							<th>Nama Ayah</th>
							<th>:</th>
							<td><?=$detail->ayah?></td>
						</tr>
						<tr>
							<th>Nama Ibu</th>
							<th>:</th>
							<td><?=$detail->ibu?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td><?=$dusun[$detail->rw]?>, RW<?=$detail->rw?>/RT<?=$detail->rt?></td>
						</tr>
						<tr>
							<th>Tgl Permohonan</th>
							<th>:</th>
							<td><?=$detail->tgl_buat?></td>
						</tr>
						<tr>
							<th>Pengantar</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->pengantar_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>Keterangan Kelahiran</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->ket_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>Buku Nikah</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->buku_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>KTP</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->ktp_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>KK</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->kk_file)?>" target="_blank">Lihat</a></td>
						</tr>
					</tbody>
				</table>
				<?php if ($detail->status==0): ?>
					<button onclick="proses('<?=base_url("admin/surat/proses/$detail->id/$surat/1")?>')" target="_blank" class="btn btn-success btn-fill">Proses</button>
					<!-- <button onclick="proses('<?php //base_url("admin/surat/tolak/$detail->id/$surat")?>')" class="btn btn-danger btn-fill">Tolak</button> -->
					<button onclick="catatan('<?=base_url("admin/surat/tolak/$detail->id/$surat")?>')" class="btn btn-danger btn-fill">Tolak</button>
					&ensp;&ensp;&ensp;
				<?php endif; ?>
				<?php if ($detail->status==2): ?>
					<!-- <button onclick="proses('<?=base_url("admin/surat/proses/$detail->id/$surat/3")?>')" target="_blank" class="btn btn-success btn-fill">Syarat Valid</button> -->
				<?php endif; ?>
				<a href="<?=base_url("admin/surat/form/$surat/ubah/$detail->id")?>" class="btn btn-info btn-fill">Ubah</a>
			</div>
		</div>
	</div>
</div>

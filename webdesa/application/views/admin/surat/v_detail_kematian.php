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
							<td><?=$detail->id_kematian?></td>
						</tr>
						<tr>
							<th>Hubungan</th>
							<th>:</th>
							<td><?=$detail->hubungan?></td>
						</tr>
						<tr>
							<th>NIK Alm</th>
							<th>:</th>
							<td><?=$detail->nik_alm?></td>
						</tr>
						<tr>
							<th>Nama Alm</th>
							<th>:</th>
							<td><?=$detail->nama?></td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<th>:</th>
							<td><?=$detail->tgl_lahir?></td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<th>:</th>
							<td><?=$detail->jk?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<th>:</th>
							<td><?=$detail->agama?></td>
						</tr>
						<tr>
							<th>Status Kawin</th>
							<th>:</th>
							<td><?=$detail->status_kawin?></td>
						</tr>
						<tr>
							<th>Pekerjaan</th>
							<th>:</th>
							<td><?=$detail->pekerjaan?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td><?=$detail->alamat?></td>
						</tr>
						<tr>
							<th>Kewarganegaran</th>
							<th>:</th>
							<td><?=$detail->kwn?></td>
						</tr>
						<tr>
							<th>Tgl Meninggal</th>
							<th>:</th>
							<td><?=$detail->tgl_meninggal?></td>
						</tr>
						<tr>
							<th>Tempat Meninggal</th>
							<th>:</th>
							<td><?=$detail->tempat_meninggal?></td>
						</tr>
						<tr>
							<th>Penyebab Kematian</th>
							<th>:</th>
							<td><?=$detail->penyebab?></td>
						</tr>
						<tr>
							<th>Penentu Kematian</th>
							<th>:</th>
							<td><?=$detail->penentu?></td>
						</tr>
						<tr>
							<th>Tgl Permohonan</th>
							<th>:</th>
							<td><?=$detail->tgl_buat?></td>
						</tr>
						<tr>
							<th>Pernyataan</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->pernyataan_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>KTP Alm</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->ktp_alm_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>KK Alm</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->kk_alm_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>KTP Pemohon</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->ktp_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>KK Pemohon</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->kk_file)?>" target="_blank">Lihat</a></td>
						</tr>
					</tbody>
				</table>
				<?php if ($detail->status==0): ?>
					<button onclick="proses('<?=base_url("admin/surat/proses/$detail->id/$surat/1")?>')" target="_blank" class="btn btn-success btn-fill">Proses</button>
					<!-- <button onclick="proses('<?=base_url("admin/surat/tolak/$detail->id/$surat")?>')" class="btn btn-danger btn-fill">Tolak</button> -->
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

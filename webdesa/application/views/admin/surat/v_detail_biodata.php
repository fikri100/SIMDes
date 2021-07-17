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
							<td><?=$detail->id_biodata?></td>
						</tr>
						<tr>
							<th>Kepala Keluarga</th>
							<th>:</th>
							<td><?=$detail->nama_kepala?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td><?=$detail->alamat?></td>
						</tr>
						<tr>
							<th>Anggota</th>
							<th>:</th>
							<th>Nama</th>
							<th>NIK</th>
							<th>JK</th>
							<th>Tempat Lahir</th>
							<th>Tgl Lahir</th>
							<th>Hubungan</th>
							<th>Pendidikan</th>
							<th>Darah</th>
							<th>Status Kawin</th>
							<th>Pekerjaan</th>
						</tr>
						<?php
							$anggota = json_decode($detail->anggota);
							foreach ($anggota as $key => $value) {
								echo "<tr>
												<th></th>
												<th></th>
												<td>$value->nama</td>
												<td>$value->nik</td>
												<td>$value->jk</td>
												<td>$value->tempat</td>
												<td>$value->tgl</td>
												<td>$value->hubungan</td>
												<td>$value->pendidikan</td>
												<td>$value->goldar</td>
												<td>$value->kawin</td>
												<td>$value->pekerjaan</td>
											</tr>";
							}
						?>
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
							<th>Akta Kelahiran</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->akta_lahir_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>Akta Perkawinan</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->akta_kawin_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>Ijazah</th>
							<th>:</th>
							<td><a href="<?=base_url($detail->ijazah_file)?>" target="_blank">Lihat</a></td>
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

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
							<th>NIK</th>
							<th>:</th>
							<td><?=$warga->nik?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td><?=$warga->nama?></td>
						</tr>
						<tr>
							<th>TTL</th>
							<th>:</th>
							<td><?=$warga->tempat_lahir?>, <?=$warga->tgl_lahir?></td>
						</tr>
						<tr>
							<th>Email</th>
							<th>:</th>
							<td style="text-transform:lowercase;"><?=$warga->email?></td>
						</tr>
						<tr>
							<th>No Telp</th>
							<th>:</th>
							<td><?=$warga->no_telp?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td><?=$dusun[$warga->rw]?>, RW<?=$warga->rw?>/RT<?=$warga->rt?></td>
						</tr>
						<tr>
							<th>Goldar</th>
							<th>:</th>
							<td><?=$warga->goldar?></td>
						</tr>
						<tr>
							<th>Agama</th>
							<th>:</th>
							<td><?=$warga->agama?></td>
						</tr>
						<tr>
							<th>Pendidikan</th>
							<th>:</th>
							<td><?=$warga->pendidikan?></td>
						</tr>
						<tr>
							<th>Pekerjaan</th>
							<th>:</th>
							<td><?=$warga->pekerjaan?></td>
						</tr>
						<!-- <img style="width:400px;" src="<?=base_url($warga->ktp_file)?>" alt=""> -->
						<tr>
							<th>Foto Profil</th>
							<th>:</th>
							<td><a id="file_lampiran" href="<?=base_url($warga->foto_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>Foto KTP</th>
							<th>:</th>
							<td><a href="<?=base_url($warga->ktp_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>Foto KK</th>
							<th>:</th>
							<td><a href="<?=base_url($warga->kk_file)?>" target="_blank">Lihat</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

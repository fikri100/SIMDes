<?php
	$menu = $this->uri->segment(2);
?>
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
							<th>Judul</th>
							<th>:</th>
							<td><?=$detail->judul?></td>
						</tr>
						<tr>
							<th>Bidang</th>
							<th>:</th>
							<td><?=$detail->bidang?></td>
						</tr>
						<tr>
							<th>Kategori</th>
							<th>:</th>
							<td><?=$detail->kategori?></td>
						</tr>
						<tr>
						<th>Lokasi</th>
							<th>:</th>
							<td><?=$detail->lokasi?></td>
						</tr>
						<th>Uraian</th>
							<th>:</th>
							<td><?=$detail->uraian?></td>
						</tr>
						<tr>
						<th>Tgl Pengaduan</th>
							<th>:</th>
							<td><?=$detail->tgl_pengaduan?></td>
						</tr>
						<tr>
							<th>Pelapor</th>
							<th>:</th>
							<td><?=$detail->nama?></td>
						</tr>
						<tr>
							<th>Foto Lampiran</th>
							<th>:</th>
							<td><a id="file_lampiran" href="<?=base_url($detail->lampiran_file)?>" target="_blank">Lihat</a></td>
						</tr>
						<tr>
							<th>TTD</th>
							<th>:</th>
							<td><a id="file_ttd" href="<?=base_url($detail->ttd_file)?>" target="_blank">Lihat</a></td>
						</tr>
					</tbody>
				</table>
				<?php if ($detail->status==0){ ?>
					<?php if ($_SESSION['role_admin']==3): ?>
					<button onclick="proses('<?=base_url("admin/$menu/proses/$detail->id_pengaduan/1")?>')" class="btn btn-success btn-fill">Proses</button>
					<button onclick="proses('<?=base_url("admin/$menu/tolak/$detail->id_pengaduan")?>')" class="btn btn-danger btn-fill">Tolak</button>
					<?php endif; ?>
				<?php } else { ?>
						<?php if ($_SESSION['role_admin']==1 || $_SESSION['role_admin']==2): ?>
					<button onclick="buatTanggapan('<?=base_url("admin/pengaduan/komentar/$detail->id_pengaduan")?>')" class="btn btn-info btn-fill">Beri Tanggapan</button>
				<?php endif; ?>
				<?php } if($detail->status==1) { ?>
					<?php if ($detail->kategori=='anggaran' && ($_SESSION['role_admin']==1 || $_SESSION['role_admin']==2)): ?>
						<button onclick="buatKegiatan('<?=base_url()?>admin/kegiatan/form/tambah/<?=$detail->id_pengaduan?>')" class="btn btn-success btn-fill">Buat Kegiatan</button>
					<?php endif; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

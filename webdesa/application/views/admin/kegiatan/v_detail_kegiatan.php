<?php
$menu = $this->uri->segment(2);
?>
<div class="col-md-12">
	<div class="card">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;">Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
			<br>
		</div>
		<div class="content">
			<?php echo $this->session->flashdata('error'); ?>
			<?php echo $this->session->flashdata('sukses'); ?>
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped table-borderless">
					<thead>
					</thead>
					<tbody>
						<tr>
							<th width="150">Nama Kegiatan</th>
							<th width="50">:</th>
							<td><?=$detail->nama?></td>
						</tr>
						<tr>
							<th>Bidang</th>
							<th>:</th>
							<td><?=$detail->bidang?></td>
						</tr>
						<tr>
							<th>Tgl Mulai</th>
							<th>:</th>
							<td><?=$detail->tgl_mulai?></td>
						</tr>
						<tr>
							<th>Tgl Selesai</th>
							<th>:</th>
							<td><?=$detail->tgl_selesai?></td>
						</tr>
						<tr>
							<th>Output</th>
							<th>:</th>
							<td><?=$detail->output?></td>
						</tr>
						<th>Ketua Pelaksana</th>
						<th>:</th>
						<td><?=$detail->ketua_pelaksana?></td>
					</tr>
					<tr>
						<th>Sumber Dana</th>
						<th>:</th>
						<td><?=$detail->dana?></td>
					</tr>
					<tr>
						<th>Pengusul</th>
						<th>:</th>
						<td><?=$detail->pelapor?></td>
					</tr>
					<tr>
						<th>Foto Lampiran</th>
						<th>:</th>
						<td><a id="file_lampiran" href="<?=base_url($detail->lampiran_file)?>" target="_blank">Lihat</a></td>
					</tr>
					<?php $status = $detail->status;?>
					<?php if ($status==1): ?>
						<tr>
							<th>Catatan</th>
							<th>:</th>
							<td class="text-danger"><?=$detail->catatan?></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table><hr>
			<?php if ($detail->status>=1): ?>
			<div class="col-md-12">
				<h3>Daftar Item RAB</h3>
				<table class="table table-bordered table-responsive">
					<thead style="background:#282C34;">
						<tr>
							<th style="color:white;">#</th>
							<th style="color:white;">Kode</th>
							<th style="color:white;">Uraian</th>
							<th style="color:white;">Volume</th>
							<th style="color:white;">Satuan</th>
							<th style="color:white;">Harga Satuan</th>
							<th style="color:white;">Jumlah</th>
							<th style="color:white;">Tipe Belanja</th>
						</tr>
					</thead>
					<tbody>
						<?php $items = json_decode($itemkeuangan); foreach ($items as $i => $item): ?>
							<tr>
								<td><?=($i+1)?></td>
								<td><b><?=$item->kode?></b></td>
								<td><?=$item->uraian?></td>
								<td><?=$item->volume?></td>
								<td><?=$item->satuan?></td>
								<td><?=$item->harga_satuan?></td>
								<td><?=$item->jumlah?></td>
								<td><?=($item->tipe==1?"Barang/Jasa":"Modal")?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>
			<a href="#" class="btn" style="border:1px solid transparent;"></a>
			<?php if ($status==0): ?>
				<?php if ($_SESSION['role_admin']!=3): ?>
					<button onclick="buatRencana('<?=base_url()?>admin/kegiatan/buat_rab/<?=$detail->id_kegiatan?>')" class="btn btn-success btn-fill">Buat RAB</button>
					<button onclick="proses('<?=base_url("admin/$menu/hapus/$detail->id_kegiatan")?>')" class="btn btn-danger btn-fill">Hapus</button>
					&ensp;&ensp;&ensp;
					<a href="<?=base_url("admin/$menu/form/ubah/$detail->id_kegiatan")?>" class="btn btn-info btn-fill">Ubah</a>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($status==kegiatan_rencana): ?>
				<!-- <button onclick="lihatRencana()" class="btn btn-primary btn-fill" id="btnlihatrencana">Lihat Rencana Anggaran</button> -->
				<?php if ($_SESSION['role_admin']==3): ?>
					<!-- <button onclick="lihatRencana()" class="btn btn-primary btn-fill" id="btnlihatrencana">Lihat RAB</button> -->
					<button onclick="proses('<?=base_url("admin/$menu/proses/$detail->id_kegiatan/2")?>')" class="btn btn-success btn-fill">RAB Valid</button>
					<button onclick="catatan('<?=base_url("admin/$menu/revisi/$detail->id_kegiatan")?>')" class="btn btn-danger btn-fill">RAB Tidak Valid</button>
				<?php else: ?>
					<button onclick="ubahRencana('<?=base_url()?>admin/kegiatan/ubah_rab/<?=$detail->id_kegiatan?>')" class="btn btn-info btn-fill" id="btnlihatrencana">Revisi RAB</button>
				<?php endif; ?>
				<a href="<?=base_url("admin/$menu/cetak_rab/$detail->id_kegiatan")?>" target="_blank" class="pull-right btn btn-dark btn-fill" style="margin-right:10px;">Cetak RAB</a>
			<?php endif; ?>

			<?php if ($status==kegiatan_proses): ?>
				<?php if ($_SESSION['role_admin']==1): ?>
					<button onclick="proses('<?=base_url()?>admin/kegiatan/proses/<?=$detail->id_kegiatan?>/3')" class="btn btn-success btn-fill">Kegiatan Selesai</button>
					<a href="<?=base_url("admin/$menu/cetak_rab/$detail->id_kegiatan")?>" target="_blank" class="pull-right btn btn-dark btn-fill" style="margin-right:10px;">Cetak RAB</a>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($status==kegiatan_selesai): ?>
				<?php if ($_SESSION['role_admin']!=3): ?>
					<button onclick="buatLPJ('<?=$detail->id_kegiatan?>')" class="btn btn-success btn-fill">Buat LPJ Kegiatan</button>
				<?php endif; ?>
				<a href="<?=base_url("admin/$menu/cetak_lpj/$detail->id_kegiatan")?>" target="_blank" class="pull-right btn btn-dark btn-fill">Cetak LPJ</a>
				<a href="<?=base_url("admin/$menu/cetak_rab/$detail->id_kegiatan")?>" target="_blank" class="pull-right btn btn-dark btn-fill" style="margin-right:10px;">Cetak RAB</a>
				<br><br>
			<?php endif; ?>

			<?php if ($status==kegiatan_arsip): ?>
				<button onclick="lihatLPJ()" class="btn btn-primary btn-fill" style="background:transparent; border:none;" id="btnlihatrencana">Lihat LPJ</button>
				<a href="<?=base_url("admin/$menu/cetak_lpj/$detail->id_kegiatan")?>" target="_blank" class="pull-right btn btn-dark btn-fill">Cetak LPJ</a>
				<a href="<?=base_url("admin/$menu/cetak_rab/$detail->id_kegiatan")?>" target="_blank" class="pull-right btn btn-dark btn-fill" style="margin-right:10px;">Cetak RAB</a>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>

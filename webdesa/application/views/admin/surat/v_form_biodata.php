<div class="col-md-12">
	<div class="card" style="padding:0px 20px">
		<div class="header">
			<a href="<?=base_url("admin/$menu")?>" class="btn btn-warning btn-fill pull-right">Kembali</a>
			<h4 class="title" style="text-transform:capitalize;"><?=$this->uri->segment(5)?> Data <?=$judul?></h4>
			<!-- <p class="category">Last Campaign Performance</p> -->
		</div>
		<?php
		if($this->uri->segment(5)=='ubah'){
			$action = $this->uri->segment(5).'/'.$this->uri->segment(6);
		} else {
			$action = $this->uri->segment(5);
		}
		?>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<?php echo $this->session->flashdata('transaksi_error'); ?>
						<?php echo form_open_multipart(base_url("admin/surat/form/$surat/$action")) ?>
						<div class="row">
							<div class="form-group col-md-6" style="padding-left:0;">
								<label for="" class="control-label">NIK <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="nik" placeholder="NIK" value="<?=$hasil->nik?>" pattern="[0-9]+" title="Hanya Boleh Angka" required>
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Nama Kepala Keluarga <span class="text-danger">*</span> </label>
								<input class="form-control" type="text" name="nama_kepala" placeholder="Nama Kepala Keluarga" value="<?=$hasil->nama_kepala?>" required>
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Alamat <span class="text-danger">*</span> </label>
								<textarea class="form-control" name="alamat" placeholder="Alamat" rows="5" value="" required><?=$hasil->alamat?></textarea>
							</div>
							<div class="form-group col-md-12">
								<button type="button" name="button" class="btn btn-info btn-fill pull-right" data-toggle="modal" data-target="#dataDiriModal">Tambah Anggota Keluarga</button><br><br>
								<div id="wrapper">
									<table id="fixed">
										<thead>
											<tr>
												<th scope="col" width="200">Nama</th>
												<th scope="col" width="180" >NIK</th>
												<th scope="col" width="50">JK</th>
												<th scope="col" width="170">Tempat Lahir</th>
												<th scope="col" width="140">Tgl Lahir</th>
												<th scope="col" width="140">Hubungan</th>
												<th scope="col"></th>
											</tr>
										</thead>
										<tbody class="daftarAnggota">
											<?php
											if ($hasil->anggota!='') {
												$i=1;
												$anggota = json_decode($hasil->anggota);
												foreach ($anggota as $key => $value){ ?>
													<tr class="anggota">
														<td><?=$value->nama?></td>
														<td><?=$value->nik?></td>
														<td><?=$value->jk?></td>
														<td><?=$value->tempat?></td>
														<td><?=$value->tgl?></td>
														<td><?=$value->hubungan?></td>
														<td><button type="button" name="hapus" onclick="" class="btn btn-danger" id="btnhapus">Hapus</button> <button type="button" name="ubah" onclick="" class="btn btn-info" id="btnubah" data-ubah="<?=$i?>">Ubah</button></td>

														<input id="nama<?=$i?>" type="hidden" name="nama[]" value="<?=$value->nama?>">
														<input id="nik<?=$i?>" type="hidden" name="nik_anggota[]" value="<?=$value->nik?>">
														<input id="jk<?=$i?>" type="hidden" name="jk[]" value="<?=$value->jk?>">
														<input id="tempat<?=$i?>" type="hidden" name="tempat[]" value="<?=$value->tempat?>">
														<input id="tgl<?=$i?>" type="hidden" name="tgl[]" value="<?=$value->tgl?>">
														<input id="hubungan<?=$i?>" type="hidden" name="hubungan[]" value="<?=$value->hubungan?>">
														<input id="pendidikan<?=$i?>" type="hidden" name="pendidikan[]" value="<?=$value->pendidikan?>">
														<input id="goldar<?=$i?>" type="hidden" name="goldar[]" value="<?=$value->goldar?>">
														<input id="kawin<?=$i?>" type="hidden" name="kawin[]" value="<?=$value->kawin?>">
														<input id="agama<?=$i?>" type="hidden" name="agama[]" value="<?=$value->agama?>">
														<input id="pekerjaan<?=$i?>" type="hidden" name="pekerjaan[]" value="<?=$value->pekerjaan?>">
														<input id="ayah<?=$i?>" type="hidden" name="ayah[]" value="<?=$value->ayah?>">
														<input id="ibu<?=$i?>" type="hidden" name="ibu[]" value="<?=$value->ibu?>">
													</tr>
													<?php
													$i++;
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-12">
								<?php //echo $this->session->flashdata('upload_error'); ?>
							</div>
							<!-- <div class="form-group col-md-6">
								<label for="" class="control-label">Surat Pengantar <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="pengantar_file" />
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Akta Kelahiran <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="akta_lahir_file" />
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Akta Perkawinan <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="akta_kawin_file" />
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Ijazah <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ijazah_file" />
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi KK <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="kk_file" />
							</div>
							<div class="form-group col-md-6">
								<label for="" class="control-label">Fotokopi KTP <span class="text-danger"></span> </label>
								<input class="col-md-4 form-control" type="file" accept=".jpg, .png, .jpeg, .pdf" name="ktp_file" />
							</div> -->
							<!-- <div class="col-md-12"></div> -->
							<div class="form-group col-md-12">
								<button class="btn btn-success btn-fill form-control py-3" name="<?=$surat?>">Selesai</button>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function () {
	$('#btnsimpananggota').click(function (){
		if ($('#formAnggota').valid()) {
			let jml = $('.anggota').length+1;
			let nama = $('input[name="m_nama"]').val();
			let nik = $('input[name="m_nik"]').val();
			let tempat = $('input[name="m_tempat"]').val();
			let tgl = $('input[name="m_tgl"]').val();
			let jk = $('select[name="m_jk"]').val();
			let hubungan = $('input[name="m_hubungan"]').val();

			let pendidikan = $('select[name="m_pendidikan"]').val();
			let goldar = $('select[name="m_goldar"]').val();
			let kawin = $('select[name="m_kawin"]').val();
			let agama = $('select[name="m_agama"]').val();
			let pekerjaan = $('select[name="m_pekerjaan"]').val();
			let ayah = $('input[name="m_ayah"]').val();
			let ibu = $('input[name="m_ibu"]').val();

			let addon = `
			<input id="nama${jml}" type="hidden" name="nama[]" value="${nama}" id="nama${jml}">
			<input id="nik${jml}" type="hidden" name="nik_anggota[]" value="${nik}" id="nik${jml}">
			<input id="jk${jml}" type="hidden" name="jk[]" value="${jk}" id="jk${jml}">
			<input id="tempat${jml}" type="hidden" name="tempat[]" value="${tempat}" id="tempat${jml}">
			<input id="tgl${jml}" type="hidden" name="tgl[]" value="${tgl}">
			<input id="hubungan${jml}" type="hidden" name="hubungan[]" value="${hubungan}">
			<input id="pendidikan${jml}" type="hidden" name="pendidikan[]" value="${pendidikan}">
			<input id="goldar${jml}" type="hidden" name="goldar[]" value="${goldar}">
			<input id="kawin${jml}" type="hidden" name="kawin[]" value="${kawin}">
			<input id="agama${jml}" type="hidden" name="agama[]" value="${agama}">
			<input id="pekerjaan${jml}" type="hidden" name="pekerjaan[]" value="${pekerjaan}">
			<input id="ayah${jml}" type="hidden" name="ayah[]" value="${ayah}">
			<input id="ibu${jml}" type="hidden" name="ibu[]" value="${ibu}">`;

			$('.daftarAnggota').append(`
				<tr class="anggota">
				<td>${nama}</td>
				<td>${nik}</td>
				<td>${jk}</td>
				<td>${tempat}</td>
				<td>${tgl}</td>
				<td>${hubungan}</td>
				<td><button type="button" name="hapus" onclick="" class="btn btn-danger" id="btnhapus" onclick="hapus(this.id)">Hapus</button>&ensp;<button type="button" name="ubah" onclick="" class="btn btn-info" id="btnubah" data-ubah="${jml}">Ubah</button></td>${addon}</tr>`);
				// <td><button type="button" name="hapus" onclick="" class="btn btn-danger" id="btnhapus" onclick="hapus(this.id)">Hapus</button>${addon}</tr>`);
				$('#dataDiriModal').modal('hide');
			}
		});

		$('.daftarAnggota').on('click','#btnhapus',function() {
			$(this).closest('tr').remove();
		});

		$('.daftarAnggota').on('click','#btnubah',function() {
			let id = this.dataset.ubah;

			let nama = $('#nama'+id).val();
			let nik = $('#nik'+id).val();
			let jk = $('#jk'+id).val();
			let tempat = $('#tempat'+id).val();
			let tgl = $('#tgl'+id).val();
			let hubungan = $('#hubungan'+id).val();
			let pendidikan = $('#pendidikan'+id).val();
			let goldar = $('#goldar'+id).val();
			let kawin = $('#kawin'+id).val();
			let agama = $('#agama'+id).val();
			let pekerjaan = $('#pekerjaan'+id).val();
			let ayah = $('#ayah'+id).val();
			let ibu = $('#ibu'+id).val();

			$('#m_nama').val(nama);
			$('#m_nik').val(nik);
			$('#m_jk').val(jk);
			$('#m_tempat').val(tempat);
			$('#m_tgl').val(tgl);
			$('#m_hubungan').val(hubungan);
			$('#m_pendidikan').val(pendidikan);
			$('#m_goldar').val(goldar);
			$('#m_kawin').val(kawin);
			$('#m_agama').val(agama);
			$('#m_pekerjaan').val(pekerjaan);
			$('#m_ayah').val(ayah);
			$('#m_ibu').val(ibu);

			$('#dataDiriModal').modal('show');
			$(this).closest('tr').remove();
			// let anggota = {nama,nik,jk,tempat,tgl,hubungan,pendidikan,goldar,kawin,agama,pekerjaan,ayah,ibu};
			// console.log(anggota);
		});
	});
</script>

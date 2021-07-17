<div class="hide">
	<div style="height: 1540px;position: relative;">
		<tab le style="width: 100%;border-bottom: 3px solid black;">
			<tr>
				<td style="padding-bottom: 10px; text-align: center; width: 200px;">
					<img src="{{ asset('assets/img/profile.jpg') }}" alt="" style="width: 100px;height: 100px;">
				</td>
				<td style="padding-bottom: 10px; text-align: center;">
					<b style="margin-bottom: 0">PEMERINTAH PROVINSI JAWA TIMUR</b>
					<h3 style="letter-spacing: 5px;font-weight: 800;margin-bottom: 0;">DINAS KELAUTAN DAN PERIKANAN</h3>
					<p style="font-size: 13px;line-height: 14px; margin-bottom: 0">JL. Jend. A. Yani No. 152-B Telp.8291927, 8281672, 8288564,8288112,8292326 <br> Fax. 8288148, Tromol Pos 12/SBWO Wonocolo, e-mail : ikanjtm@indosat.net.id</p>
					<b style="font-weight: 800">SURABAYA 60235</b>
				</td>
			</tr>
		</table>
		<table style="width: 100%;font-size: 16px">
			<tr>
				<td colspan="2">
					<span style="float: right;margin-right: 30px;">Surabaya, {{ date('d F Y') }}</span>
				</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td>Nomor</td>
							<td>:</td>
							<td>{{ $rekomendasi->nomor }}</td>
						</tr>
						<tr>
							<td>Sifat</td>
							<td>:</td>
							<td>Penting</td>
						</tr>
						<tr>
							<td>Lampiran</td>
							<td>:</td>
							<td>1 (Satu) rangkap</td>
						</tr>
						<tr>
							<td>Perihal</td>
							<td>:</td>
							<td>{{ $rekomendasi->perihal }}</td>
						</tr>
					</table>
				</td>
				<td style="width: 200px;">
					<span>Kepada Yth.</span>
					<p>Sdr.Kepala {{ $rekomendasi->tujuan }} di tempat</p>
				</td>
			</tr>
		</table>
		<div style="padding: 30px;">
			<p style="text-align: justify;">Sehubungan dengan berkas permohonan izin pada portal http://izin/p2t.jatimprov.go.id tanggal 13 Agustus 2019 tentang Permohonan Izin Lokasi untuk kegiatan Budidaya Kerang Mutiara oleh PT. Disthi Mutiara Suci, kami sampaikan beberapa hal sebagai berikut</p>

			<ol>
				<li>
					Dalam pemanfaatan ruang di wilayah perairan, Provinsi Jawa Timur berpedoman pada Peraturan Daerah Provinsi Jawa Timur Nomor 1 Tahun 2018 tentang Rencana Zonasi Wilayah Pesisir dan Pulau-Pulau Kecil Provinsi Jawa Timur 2018-2038;
				</li>
				<li>
					Berdasarkan lampiran surat, lokasi yang dimohonkan berada di Kawasan Pemanfaatan Umum berupa Zona Perikanan Budidaya (Sub Zona Budidaya Laut);
				</li>
				<li>Dengan mempertimbangkan:
					<ol type="a">
						<li>Matriks kesesuaian pemanfaatan ruang pada Perda No. 1 Tahun 2018.</li>
						<li>Hasil verifikasi lapangan yang dilakukan oleh Cabang Dinas Kelautan dan Perikanan Kabupaten Situbondo dengan nomor 523/2179/120.61/2019;</li>
					</ol>
					Maka lokasi yang dimohonkan untuk kegiatan Budidaya kerang Mutiara {{ $rekomendasi->is_approve ? 'di izinkan' : 'tidak di izinkan' }} dengan menyesuaikan titik koordinat (peta dan titik koordinat terlampir).
				</li>
			</ol>
			<p>Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
		</div>
		<div style="width: 400px;text-align: center;position: absolute; bottom: 2%; right: 0">
			<span>
				<b>a.n. KEPALA DINAS KELAUTAN DAN PERIKANAN</b>
				<br>
				<b>PROVINSI JAWA TIMUR</b>
				<br>
				<b>KEPALA BIDANG KELAUTAN, PESISIR DAN <br> PENGAWASAN</b>
			</span>
			<br><br><br><br><br><br>
			<span style="">
				<b><u>Ir. SLAMET BUDIYONO, MM</u></b><br>
				Pembina Tingkat I <br>
				Nip. 19620217 198503 1 002
			</span>
		</div>
	</div>
	<div style="height: 1540px;position: relative;">
		<div style="width: 100%;text-align: center;text-transform: uppercase;font-size: 20px;">
			<b>lokasi <br> {{ $rekomendasi->get_surat['nama_pt'] }}</b>
			<br>
		</div>
		<table style="width: 100%;font-size: 18px!important;font-weight: 500!important" class="table-bordered">
			<tr>
				<td style="width: 20px;">No</td>
				<td>Informasi</td>
				<td>Keterangan</td>
			</tr>
			<tr>
				<td style="width: 20px;">1</td>
				<td>Nama PT</td>
				<td>{{ $rekomendasi->get_surat['nama_pt'] }}</td>
			</tr>

			<tr>
				<td style="width: 20px;">1</td>
				<td>Tanggal Surat Rekomendasi</td>
				<td>{{ $rekomendasi->tanggal }}</td>
			</tr>
			<tr>
				<td style="width: 20px;">1</td>
				<td>Status Perizinan</td>
				<td>
					@if ($rekomendasi->status==0)
					Tidak Diizinkan
					@else
					Diizinkan
					@endif
				</td>
			</tr>
			<tr>
				<td style="width: 20px;">1</td>
				<td>Titik Koordinat</td>
				<td>{{ $rekomendasi->get_laporan['lng'].' , '.$rekomendasi->get_laporan['lat'] }}</td>
			</tr>
			<tr>
				<td style="width: 20px;">2</td>
				<td>Luas</td>
				<td>{{ $rekomendasi->luas }}</td>
			</tr>
			<tr>
				<td style="width: 20px;">3</td>
				<td>Lokasi</td>
				<td>{{ PermohonanVerlok::find($rekomendasi->get_laporan['id_permohonan_verlok'])->lokasi }}</td>
			</tr>

		</table>
	</div>
</div>

@endsection
@section('css')
<style>
td{
	padding: 5px!important;
}
@media print {
	.header, .hide { visibility: hidden }
}
body{
	overflow-x: hidden;
}
.hide{
	position: absolute;
	/*left: -100%;*/
	margin-top: 400px;
	z-index: -99;
}
.penutup{
	width: 100%;
	background-color: #f9fbfd;
	height: 8000px;
	position: absolute;
	z-index: 99;
}
</style>
@endsection

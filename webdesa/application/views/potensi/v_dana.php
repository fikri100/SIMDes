<style media="screen">
.table-bordered{
  border-right: 3px solid black:
}
</style>
<section id="get-started" class="padd-section text-center wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
      <h2>Data Sumber Anggaran Desa <?=TAHUN?></h2>
      <p class="separator" style="">Berikut detail sumber anggaran Desa Pagerngumbuk.</p>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3 table-responsive table-full-width mt-4">
        <table class="table table-hover table-striped" id="tbl_dana">
          <thead>
						<th>#</th>
						<th>Kode</th>
						<th>Dana</th>
						<th>Jumlah</th>
					</thead>
					<tbody>
						<?php $i=1; foreach ($hasil as $w): ?>
							<tr>
								<td><?=$i++?></td>
								<td ><?=$w->kode?></td>
								<td align="left"><?=$w->nama?></td>
								<td align="right"><?=$w->jumlah?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
$(document).ready(function() {
  $('#tbl_dana').DataTable();
});
</script>








<!-- <?php //echo form_open_multipart(base_url("surat/isi"),array('class' => 'form-horizontal')); ?>
<textarea name="isiartikel" id="ckeditor" class="ckeditor" rows="8" cols="80"></textarea>
<input type="submit" name="gas" value="Gas">
<?php //echo form_close(); ?>
<script type="text/javascript">
CKEDITOR.disableAutoInline = true;
CKEDITOR.inline = editable;
</script> -->

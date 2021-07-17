<style media="screen">
.table-bordered{
  border-right: 3px solid black:
}
</style>
<section id="get-started" class="padd-section text-center wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
      <h2>Data Potensi Desa <?=TAHUN?></h2>
      <p class="separator" style="">Berikut detail potensi Desa Pagerngumbuk.</p>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2 content table-responsive table-full-width mt-4">
        <table class="table table-hover table-striped" id="tbl_potensi">
          <thead>
            <th>#</th>
            <th>Bidang</th>
            <th>Awal</th>
            <th>Akhir</th>
            <th>Tahun</th>
            <th>Orang Terlibat</th>
            <th>Profit</th>
          </thead>
          <tbody>
            <?php $i=1; foreach ($hasil as $w): ?>
              <tr>
                <td><?=$i++?></td>
                <td><?=$w->bidang?></td>
                <?php $awal  = DateTime::createFromFormat('!m', $w->waktu_awal);?>
                <?php $akhir = DateTime::createFromFormat('!m', $w->waktu_akhir);?>
                <td><?=$awal->format('F');?></td>
                <td><?=$akhir->format('F');?></td>
                <td><?=$w->tahun?></td>
                <td><?=$w->orang?></td>
                <td><?=$w->omzet?></td>
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
  $('#tbl_potensi').DataTable();
})
</script>

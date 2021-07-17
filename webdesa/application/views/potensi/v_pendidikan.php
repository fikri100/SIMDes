<style media="screen">
  .table-bordered{
    border-right: 3px solid black:
  }
</style>
<section id="get-started" class="padd-section text-center wow fadeInUp">
  <div class="container">
    <div class="section-title text-center">
      <h2>Data Pendidikan</h2>
      <p class="separator" style="">Berikut data pendidkan warga Desa Pagerngumbuk.</p>
    </div>
    <div class="row">
      <div class="text-center col-md-8 offset-md-2">
        <canvas id="bar-chart" width="800" height="450"></canvas>
      </div>
      <!-- <div class="text-center col-md-6 offset-md-3">
        <br>
        <table class="table table-striped table-bordered ">
          <thead>
            <tr>
              <th rowspan="2">Pendidikan</th>
              <th colspan="2" scope="col" width="120">Jumlah</th>
              <th colspan="2" scope="col" width="120">Laki-laki</th>
              <th colspan="2" scope="col" width="120">Perempuan</th>
            </tr>
            <tr>
              <td>n</td>
              <td>%</td>
              <td>n</td>
              <td>%</td>
              <td>n</td>
              <td>%</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">SD</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">SLTP/Sederajat</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">SLTA/Sederajat</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">D1</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">D2</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">D3</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">S1/D4</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">S2</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
            <tr>
              <th scope="col">S3</th>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
              <td>12</td>
              <td>2</td>
            </tr>
          </tbody>
        </table>
      </div> -->
    </div>
  </div>
</section>

<script type="text/javascript">
new Chart(document.getElementById("bar-chart"), {
  type: 'bar',
  data: {
    labels: ["SD", "SLTP/Sederajat", "SLTA/Sederajat", "D1", "D2", "D3", "S1/D4", "S2", "S3"],
    datasets: [
      {
        // label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#c45850","#c45850","#c45850","#c45850"],
        data: [<?=$pendidikan?>]
        // data: [478,267,734,784,433,239,382,283,723]
      }
    ]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: 'Total Penduduk : <?=$jumlah?>'
    }
  }
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

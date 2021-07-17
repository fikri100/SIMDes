<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="<?=base_url("assets/admin")?>/css/bootstrap.min.css" rel="stylesheet" />
  <script src="<?=base_url("assets/admin")?>/js/html2canvas.min.js" type="text/javascript"></script>
  <script src="<?=base_url("assets/admin")?>/js/html2canvas.js" type="text/javascript"></script>
  <title><?=$judul?></title>
  <style media="screen">
  #wrapper{
    width: 750px; height: 1100px; padding-bottom:200px; border: 1px solid black; margin: 0 auto; padding: 20px 30px;
  }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
    padding: 2px 8px;
  }
  </style>
</head>
<body>
  <br><br>
  <div style="width: 680px; margin:0 auto;">
    <button  class="btn btn-default pull-right" onclick="PrintElem('wrapper')" type="button" name="button">Cetak</button>
  </div>
  <br><br><br>
  <div id="wrapper" style="border: 1px solid black;">
    <div id="page">
      <?=$element?>
    </div>
    <br>
  </div>
  <br><br>
</body>
</html>
<script type="text/javascript">
function PrintElem(elem){
  var mywindow = window.open('', 'PRINT', 'width=800,fullscreen=yes');

  mywindow.document.write('<html><head><title>Cetak</title>');
  mywindow.document.write('<link href="<?=base_url("assets/admin")?>/css/bootstrap.min.css" rel="stylesheet" />');
  mywindow.document.write('<style>.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{padding:2px 8px;}</style>');
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(elem).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  // mywindow.close();
  return true;
}

</script>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Report detail</title>
  </head>
  <body>
    <style type="text/css">
      th,tr,td{
        padding: 10px 3px;
      }
    </style>
    <div id="content">
        <div class="row">
            <div align="center">
                <img src="assets/img/kag.png" alt="logo" width="230" height="105" class="shadow-light">
                <h1 style = "text-align: center; font-weight: bold;  font-size: 18pt;">PT. Kusuma Satria Dinasasri Wisatajaya</h1>
                <h3 style = "text-align: center; font-weight: bold;  font-size: 16pt;">Laporan Penggunaan BBM - Detail <?= $divisi ?></h3>
                <h3 style = "text-align: center; font-weight: bold;  font-size: 12pt;">Periode <?= $periode ?></h3> 
            </div>
        </div>
        <div style="border-bottom: 1px solid #000000;"></div>
    </div>   
    <br>
<table>
  <thead>
    <tr>
      <th width="90" scope="col">Nopol</th>
      <th width="150" scope="col">Jenis</th>
      <th width="150" scope="col">Nota</th>
      <th width="100" scope="col">Driver</th>
      <th width="150" scope="col">Tanggal</th>
      <th width="130" scope="col">Jenis Bbm</th>
      <th width="100" scope="col">Tujuan </th>
      <th width="150" scope="col">Keperluan</th>
      <th  width="100" scope="col">KM</th>
      <th width="100" scope="col">Liter</th>
      <th width="100" scope="col">Rp</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($npl as $row) : ?>
        <tr>
        <td><?= $row->nopol ?></td>
        <td><?= $row->jenis ?></td>
        <td><?= $row->nota ?></td>
        <td><?= $row->nama_driver ?></td>
        <td><?= $row->tanggal ?></td>
        <td><?= $row->jenis_bbm ?></td>
        <td><?= $row->Tujuan ?></td>
        <td><?= $row->Keperluan ?></td>
        <td><?= $row->KM ?></td>
        <td><?= $row->liter ?></td>
        <td><?= "Rp.". number_format($row->nominal, 2, ",", ".");?></td>
        </tr> 
      <?php endforeach; ?>
  </tbody>
</table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
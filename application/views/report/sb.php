<!DOCTYPE html>
<html>
<head>
    <title>Summary BBM</title>
</head>
<body>
    <style type="text/css">
		th,tr,td{
			padding: 5px 3px;
            border: 1px;
		}
        table{
            border:4;
        }
	</style>
    <div id="content">
        <div class="row">
            <div align="center">
                <img src="assets/img/kag.png" alt="logo" width="230" height="105" class="shadow-light">
                <h1 style = "text-align: center; font-weight: bold;  font-size: 18pt;">PT. Kusuma Satria Dinasasri Wisatajaya</h1>
                <h3 style = "text-align: center; font-weight: bold;  font-size: 16pt;">Summary BBM <?= $divisi ?></h3>
                <h3 style = "text-align: center; font-weight: bold;  font-size: 12pt;">Tanggal <?= $tgl1 ?> s.d <?= $tgl2 ?></h3> 
            </div>
        </div>
        <div style="border-bottom: 1px solid #000000;"></div>
    </div>   
    <br>    
    <table>
        <tr>
            <td><h4>No.</h4></td>
            <td><h4>Nopol</h4></td>
            <td><h4>Jenis Kendaraan</h4></td>
            <td><h4>Harga Bbm</h4></td>
            <td><h4>Liter</h4></td>
            <td><h4>Total</h4></td>
        </tr>
        <?php $no = 0; foreach ($hsl as $row) : ?>
        <tr>
            <?php $no++?>
            <td><h4><?php echo $no;?></h4></td>
            <td>
                <h4><?= $row->nopol ?></h4>
            </td> 
            <td><?= $row->jenis ?></td>
            <td><?= $row->hargaper_liter ?></td>
            <td><?= number_format($row->liter, 2, '.', '') ?></td>
            <td><?= "Rp.". number_format($row->nominal, 2, ",", ".");?></td>
        </tr>
        <?php endforeach; ?>
        <tr >
            <th scope="col"> </th>
            <th scope="col"></th>
            <th scope="col"> </th>
            <th scope="col">Total </th>
            <th scope="col"><?= number_format($total->lit, 2, '.', '') ?></th>
            <th scope="col"><?= "Rp.". number_format($total->kode, 2, ",", ".");?></th>
        </tr>
    </table>
    
</body>
</html>
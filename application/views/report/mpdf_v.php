<!DOCTYPE html>
<html>
<head>
    <title>Report Detail</title>
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
                <h3 style = "text-align: center; font-weight: bold;  font-size: 16pt;">Laporan Penggunaan BBM - Detail <?= $divisi ?></h3>
                <h3 style = "text-align: center; font-weight: bold;  font-size: 12pt;">Tanggal <?= $tgl1 ?> s.d <?= $tgl2 ?></h3> 
            </div>
        </div>
        <div style="border-bottom: 1px solid #000000;"></div><br>
    </div> 
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>       
                    <th>No.</th>
                    <th width="90"><h4>Nopol</h4></th>
                    <th><h4>Jenis</h4></th>
                    <th><h4>Nota</h4></th>
                    <th><h4>Driver</h4></th>
                    <th width="50"><h4>Tanggal</h4></th>
                    <th width="50"><h4>BBM</h4></th>
                    <th><h4>Tujuan</h4></th>
                    <th><h4>Keperluan</h4></th>
                    <th><h4>KM</h4></th>
                    <th><h4>Liter</h4></th>
                    <th><h4>Harga</h4></th>
                    <th><h4>Total</h4></th>           
                
                </tr>
            </thead>
            <tbody>
                <?php  $no = 0; foreach ($npl2 as $row) : ?>                          
                    <tr>
                        <?php $no++?>
                        <td><?php echo $no;?></td>
                        <td><h4><?= $row->nopol ?></h4></td>
                        <td><?= $row->jenis ?></td>
                        <td><?= $row->nota ?></td>
                        <td><?= $row->nama_driver ?></td>
                        <td><?= $row->tanggal ?></td>
                        <td><?= $row->jenis_bbm ?></td>
                        <td><?= $row->Tujuan ?></td>
                        <td><?= $row->Keperluan ?></td>
                        <td><?= $row->KM ?></td>
                        <td><?= $row->liter ?></td>
                        <td><?= $row->hargaper_liter ?></td>
                        <td><?= "Rp.". number_format($row->nominal, 2, ",", ".");?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>      
    </div>

</body>
</html>
<!-- <?php foreach ($npl2 as $row) : ?>
            <td>
                <h4><?= $row->nopol ?></h4>
            </td> 
            <td><?= $row->jenis ?></td>
            <td><?= $row->nota ?></td>
            <td><?= $row->nama_driver ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->jenis_bbm ?></td>
            <td><?= $row->Tujuan ?></td>
            <td><?= $row->Keperluan ?></td>
            <td><?= $row->KM ?></td>
            <td><?= $row->liter ?></td>
            <td><?= $row->hargaper_liter ?></td>
            <td><?= $row->nominal ?></td>
            <?php endforeach; ?> -->
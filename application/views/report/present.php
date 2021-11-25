<!DOCTYPE html>
<html>
<head>
    <title>Laporan Presentase</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <h3 style = "text-align: center; font-weight: bold;  font-size: 16pt;">Laporan Presentase Penggunaan BBM</h3>
                <h3 style = "text-align: center; font-weight: bold;  font-size: 14pt;">Periode : <?php echo $periode?></h3> 
            </div>
        </div>
        <div style="border-bottom: 1px solid #000000;"></div><br><br>
    </div> 

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>                                
                <th>No</th>
                <th>Nopol</th>
                <th>Trading</th>
                <th>Hotel</th>
                <th>Industri</th>
                <th>Direksi</th>
                <th>Estate</th>
                <th>Total</th>
                <th>Liter</th>
                </tr>
            </thead>
            <tbody>
                <?php  $no = 0;  foreach ($isi as $row) : ?>                          
                    <tr>
                          <?php $no++?>
                          <td><?php echo $no;?></td>
                          <td><?= $row->nopol ?></td>
                          <td>
                                <?php  $t = $this->present_model->div('trading',$periode,$row->nopol);
                                if($t) { 
                                    if ($t[0]->total == 0) {
                                      echo'-';
                                    }else {
                                        $prsn = $t[0]->total / $row->total;
                                        echo "Rp.". number_format($t[0]->total, 2,",",".") . "<br>" ;
                                        echo number_format($prsn * 100, 2, '.', '') ."%<br>";
                                    }
                                }
                                else{ echo '-'; } ?>
                          </td>
                          <td>
                              <?php $h = $this->present_model->div('hotel',$periode,$row->nopol);
                              if ($h) { 
                                  if ($h[0]->total == 0) {
                                      echo'-';
                                  }else {
                                      $prsn = $h[0]->total / $row->total;
                                      echo "Rp.". number_format($h[0]->total, 2,",",".") . "<br>" ;
                                      echo number_format($prsn * 100, 2, '.', '') ."%";
                                  }
                                }
                                else{  echo '-'; }  ?>
                          </td>
                          <td>
                              <?php $i = $this->present_model->div('ind',$periode,$row->nopol);
                               if ($i) {
                                    if ($i[0]->total == 0) {
                                      echo'-';
                                    }else {
                                        $prsn = $i[0]->total / $row->total;
                                        echo "Rp.". number_format($i[0]->total, 2,",",".") . "<br>" ;
                                        echo number_format($prsn * 100, 2, '.', '') ."%";
                                    }  
                                }
                               else{  echo '-';}?>
                          </td>
                          <td>
                              <?php $d = $this->present_model->div('direksi',$periode,$row->nopol);
                                if ($d) {
                                    if ($d[0]->total == 0) {
                                      echo'-';
                                    }else {
                                        $prsn = $d[0]->total / $row->total;
                                        echo "Rp.". number_format($d[0]->total, 2,",",".") . "<br>" ;
                                        echo number_format($prsn * 100, 2, '.', '') ."%";
                                    } 
                                }
                                else{ echo '-'; }?>
                          </td>                          
                          <td>
                              <?php $e = $this->present_model->div('estate',$periode,$row->nopol);
                                if ($e) {
                                    if ($e[0]->total == 0) {
                                      echo'-';
                                    }else {
                                        $prsn = $e[0]->total / $row->total;
                                        echo "Rp.". number_format($e[0]->total, 2,",",".") . "<br>" ;
                                        echo number_format($prsn * 100, 2, '.', '') ."%";
                                    }   
                                }
                                else{ echo '-'; } ?>
                          </td>
                          <td><?= "Rp.". number_format($row->total, 2, ",", ".");?></td>
                          <td><?= number_format($row->liter, 2, '.', '') ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>      
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
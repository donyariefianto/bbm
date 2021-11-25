<html>
    <style>
        @page {
            /* sheet-size: A3-L; */
            sheet-size: 110mm 140mm;
            /* size: auto; */
        }
        p {
            font-size: 11px;
        },
        b {
            font-size: 12px;
        }
        u {
            font-size: 11px;
        }
    </style>
    <table>        
        <tr>
            <td width="100"><img src="assets/img/kag.png" alt="logo" width="100" height="65" class="shadow-light"></td>
            <td width="100"> </td>
            <td> </td>
            <td style="text-align center"><b>Surat Pesanan BBM.</b></td>
        </tr>
    </table>
    <table>        
        <tr><td><h6>PT. Kusuma Satria Dinasasri Wisatajaya</h6></td></tr>
        <tr><td><h6>JL. Abdul Gani Atas Telp 0341-593195 <br>Fax. 596459/ 593195 <br> BATU-JATIM-INDONESIA</h6> </td></tr>
    </table><br>
    <table>        
        <tr>
            <td width="90"><h6>Nomor</h6></td>
            <td width="10"><p>:</p></td>
            <td><p><?php echo $key->nota ?> </p></td>
        </tr> 
        <tr>
            <td><h6>Nama Driver</h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->nama_driver ?> </p></td>
        </tr> 
        <tr>
            <td><h6>Nopol </h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->nopol ?> </p></td>
        </tr> 
        <tr>
            <td><h6>Tanggal </h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->tanggal ?> </p></td>
        </tr> 
        <tr>
            <td><h6>Jenis BBM</h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->jenis_bbm ?> </p></td>
        </tr>
        <tr>
            <td><h6>Liter</h6></td>
            <td><p>:</p></td>
            <td><p><?= number_format($key->liter, 2, '.', '') ?> </p></td>
            <td><p>Nominal </p></td>
            <!-- <td><p>Rp.</p></td> -->
            <td><p><?= "Rp.". number_format($key->nominal, 2, ",", ".");?></p></td>
        </tr>
        <tr>
            <td><h6>Keterangan</h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->keterangan ?> </p></td>
        </tr>     
        <tr>
            <td><h6>KM </h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->KM ?> </p></td>
        </tr>  
        <tr>
            <td><h6>Keperluan</h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->Keperluan ?> </p></td>
        </tr> 
        <tr>
            <td><h6>Tujuan </h6></td>
            <td><p>:</p></td>
            <td><p><?php echo $key->Tujuan ?> </p></td>
        </tr>
    </table>
    <p> <strong>NB : </strong>Berlaku Sampai <?php echo $tgl ?></p>
    <div style="text-align: Right">
        <p>Hormat Kami.</p><br>
        <p>Susilo</p>
    </div>
</html>
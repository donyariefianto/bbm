<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Transaksi</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div> -->
          </div>

          <div class="section-body">
            <h2 class="section-title">Pengajuan Bbm</h2>
            
            <div class="row"> 
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header"> 
                    
                </div>
                  <div class="card-body">                                       
                  <div class="form-group">
                    <form action="" method="POST">
                       <div class="row row-cols-4">
                          <div class="col-auto">
                            <div class=""><label>Periode | Contoh: 01/2019 </label>
                              <input type="text" name="periode" id="periode" class="form-control col-auto">
                            </div>                            
                          </div>
                          <div class="col-auto">
                            <div class="">
                              <label>Pilih Divisi</label>
                              <select id="divisi" name="divisi" onchange="this.form.submit();" class="form-control col-auto">
                              <option>Pilih Divisi</option>
                              <?php foreach ($data_DivKend as $row) : ?>
                                <option><?= $row->divisi ?></option>
                              <?php endforeach; ?>
                              </select>
                            </div>                            
                          </div>
                          <div class="col-auto">
                            <div class=""><label>.</label>
                              <a data-toggle="modal" data-target="#tambah-data" class="btn btn-success form-control col-auto">Pengajuan Baru</a>
                              
                            </div>                            
                          </div>
                        </div>
                    </form> 
                    </div>
                    <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr class="table-primary">                                
                                <th>Nota</th>
                                <th>Nopol</th>
                                <th>Divisi</th>
                                <th>Driver</th>
                                <th>Tanggal</th>
                                <th>Jenis Bbm</th>
                                <th>Liter</th>
                                <th>Nominal</th>
                                <th>Keperluan</th> 
                                <th>Tujuan</th>
                                <th>Cetak</th>
                                <th>Di Acc</th>
                                <th>Di Input</th>
                              </tr>
                          </thead>
                          <tbody>
                                <?php foreach ($data_Pbbm as $row) : ?>                          
                                <tr>
                                  <td><?= $row->nota ?></td>
                                  <td><?= $row->nopol ?></td>
                                  <td><?= $row->divisi ?></td>
                                  <td><?= $row->nama_driver ?></td>
                                  <td><?= $row->tanggal ?></td>
                                  <td><?= $row->jenis_bbm ?></td>
                                  <td><?= $row->liter ?></td>
                                  <td><?= $row->nominal ?></td>
                                  <td><?= $row->Tujuan ?></td>
                                  <td><?= $row->Keperluan ?></td>
                                  <td><a href="" class=" cetak" data="<?= $row->nota ?>"><i class="fa fa-print btn btn-dark"></i></a></td>
                                  <td><?= $row->acc_by ?></td>
                                  <td><?= $row->insert_by ?></td>                                  
                                </tr>
                                <?php endforeach; ?>
                          </tbody>
                        </table>                         
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>   
      <!-- Modal Tambah -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
           
             <div class="modal-header">
               <h4 class="modal-title">Tambah Data</h4>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>                 
             </div>
             
              <div class="modal-body">
                <form oninput="nominal.value = parseInt(harga.value) * parseInt(liter.value)" class="form-horizontal" action="<?php echo site_url('BBM/add'); ?>" method="post">
                      
                      <div class="row row-cols-6">
                          <div class="col-6">
                            <div class="form-group">
                              <div class="">
                                <label>No.Pengajuan</label>
                                  <input type="text" class="form-control" readonly name="no" value="<?php echo $kode ?>">
                              </div>
                            </div>                            
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                  <label>Periode</label>
                                    <input type="text" class="form-control" readonly name="Per" value="<?php echo $per ?>">
                                </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Divisi</label>
                              <input type="text" class="form-control"  name="Div" readonly value="<?php echo $div ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Divisi</label>
                              <input type="date" class="form-control"  name="tgl">
                            </div>
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Driver">
                                </div>
                                <small class="text-danger">
                                <?php echo form_error('nama') ?>
                                </small>
                            </div>
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                 <select id="nopol" name="nopol" class="form-control">
                                  <option>Pilih Nopol</option>
                                  <?php foreach ($data_nopol as $row) : ?>
                                    <option><?= $row->nopol ?></option>
                                  <?php endforeach; ?>                             
                                  </select>
                                </div>
                            </div>
                          </div>
                          
                          <div class="col-6">
                            <div class="form-group">
                              <input type="number" value="" class="form-control" id="liter" name="liter" placeholder="Masukan Pengajuan Liter">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('liter') ?>
                            </small>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                             <select id="jenisbbm" name="jenisbbm" class="form-control col-auto">
                              <option>Pilih Jenis BBM</option>  
                              <?php foreach ($data_BBM as $row) : ?>
                                <option><?= $row->jenis_bbm ?></option>
                              <?php endforeach; ?>                             
                              </select>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Masukan Pengajuan Nominal">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('nominal') ?>
                            </small>
                          </div>
                         
                          <div class="col-6">
                            <div class="form-group">
                             <select id="harga" name="harga" class="form-control col-auto">
                              <option value="0">Pilih Harga / Liter</option>  
                              <?php foreach ($data_BBM as $row) : ?>
                                <option type="number"><?= $row->harga ?></option>
                              <?php endforeach; ?>                             
                              </select>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="tujuan" placeholder="Masukan Tujuan">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('tujuan') ?>
                            </small>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="keperluan" placeholder="Masukan Keperluan">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('keperluan') ?>
                            </small>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <input type="text" class="form-control" name="km" placeholder="Masukan KM Kendaraan">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('km') ?>
                            </small>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <select id="divisi" name="pengajuan" class="form-control col-auto">
                              <option>Pengajuan</option>
                              <option value="1">ya</option> 
                              <option value="0">tidak</option>                              
                              </select>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                               <input type="text" class="form-control" name="Manual" placeholder="Masukan No. Manual Jika diperlukan Saja">
                            </div>
                          </div>
                          
                        </div>
                      
                     
                      <div class="modal-footer">
                      <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                  </div>
               </form>
             </div>
         </div>
     </div>
 </div>
 <!-- END Modal Tambah -->
<?php if($sts == 1 ){ ?>
      <script>
         swal("Periode Tidak Tersedia!", "Masukan Periode Dengan Benar", "warning");
      </script>    
     <?php } else if ($sts == 2) { ?>
      <script>
         swal("Periode Ini Sudah Di Closing !", "Hubungi Admin Untuk Perubahan Data", "info");
      </script>
      <?php } else if ($sts == 3) { ?>
      <script>
         swal("Pengajuan Sukses", "Tunggu Approv Dari Admin", "success");
      </script>
      <?php }?>

<script>  
$('#s').DataTable();   
    jQuery(document).ready(function($){      
      $('.cetak').on('click',function(){
       var nama = $(this).attr('data');
       var a = btoa(nama);
       swal({
          title: 'Cetak?',
          type: 'info',
          text: 'Nota Akan Di cetak',
          showCancelButton: true,
          },function(){
          window.location = "<?= site_url('BBM/cetak/') ?>"+a; 
          });
          return false;
          });
     $('.on').on('click',function(){
       var nama = $(this).attr('data');
       var a = btoa(nama);
       swal({
          title: 'Aprove?',
          type: 'warning',
          text: 'Pengajuan Akan Di setujui',
          showCancelButton: true,
          },function(){
          window.location = "<?= site_url('BBM/apr/') ?>"+a; 
          });
          return false;
          });
     $('.off').on('click',function(){
       var nama = $(this).attr('data');
       var a = btoa(nama);
         swal({
            title: 'Batalkan Aprove?',
            type: 'warning',
            text: 'Pengajuan Akan Di tunda',
            showCancelButton: true,
            },function(){
            window.location = "<?= site_url('BBM/batal/') ?>"+a; 
           });
          return false;
         });
 });	     
 </script>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div> -->
          </div>

          <div class="section-body">
            <h2 class="section-title">Laporan Biaya Service</h2>
            
            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <!-- <h4>Bbm</h4>   -->
                    
                </div>
                  <div class="card-body">                                       
                  <div class="form-group">
                    <form action="" method="POST">
                        <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Divisi</label>
                            <select class="form-control" id="Divisi" name="Divisi">
                            <option></option>
                            <?php foreach ($data_DivKend as $row) : ?>
                            <option><?= $row->divisi ?></option>
                            <?php endforeach; ?>              
                            </select>
                            <small class="text-danger">
                            <?php echo form_error('Divisi') ?>
                            </small>
                        </div>     
                        <div class="form-group">
                            <label>Tanggal Dari</label>
                            <input type="date" class="form-control" id="Tgl1" name="Tgl1">    
                            <small class="text-danger">
                            <?php echo form_error('Tgl1') ?>
                            </small>        
                        </div>
                        <div class="form-group">
                            <label>Tanggal Sampai</label>
                            <input type="date" class="form-control" id="Tgl2" name="Tgl2">
                            <small class="text-danger">
                            <?php echo form_error('Tgl2') ?>
                            </small>
                        </div>
                        </div>        
                        <div class="card-footer text-right">          
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>          
                        </div>
                    </form>                                           
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
     <div class="modal-dialog">
         <div class="modal-content">
           
             <div class="modal-header">
               <h4 class="modal-title">Tambah Data</h4>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>                 
             </div>
             
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo site_url('BBM/add'); ?>" method="post">
                      
                      <div class="row row-cols-6">
                          <div class="col-6">
                            <div class="form-group">
                              <div class="">
                                <label>No.Pengajuan</label>
                                  <input type="text" class="form-control" readonly name="No" value="<?php echo $kode ?>">
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
                          <div class="col-12">
                            <div class="form-group">
                              <label>Divisi</label>
                              <input type="text" class="form-control"  name="Div" readonly value="<?php echo $div ?>">
                            </div>
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                    <input type="text" class="form-control" name="driv" placeholder="Masukan Nama Driver">
                                </div>
                            </div>
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                 <select id="divisi" name="divisi" class="form-control">
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
                              <input type="text" class="form-control" name="nama" placeholder="Masukan Pengajuan Liter">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                             <select id="divisi" name="divisi" class="form-control col-auto">
                              <option>Pilih Jenis BBM</option>  
                              <?php foreach ($data_BBM as $row) : ?>
                                <option><?= $row->jenis_bbm ?></option>
                              <?php endforeach; ?>                             
                              </select>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <input type="text" class="form-control" name="nama" placeholder="Masukan Pengajuan Nominal">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                             <select id="harga" name="harga" class="form-control col-auto">
                              <option>Pilih Harga / Liter</option>  
                              <?php foreach ($data_BBM as $row) : ?>
                                <option><?= $row->harga ?></option>
                              <?php endforeach; ?>                             
                              </select>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="nama" placeholder="Masukan Tujuan">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="keperluan" placeholder="Masukan Keperluan">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <input type="text" class="form-control" name="Km" placeholder="Masukan KM Kendaraan">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <select id="divisi" name="divisi" class="form-control col-auto">
                              <option>Pengajuan</option>
                              <option>ya</option> 
                              <option>tidak</option>                              
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

    <script>        
    $('#s').DataTable();   
        jQuery(document).ready(function($){      
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
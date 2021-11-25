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
            <h2 class="section-title">Service</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <h4>Servis Kendaraan</h4>                                    
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
                              <a data-toggle="modal" data-target="#tambah-data" class="btn btn-success form-control col-auto">Reservasi Baru</a>
                              
                            </div>                            
                          </div>
                        </div>
                    </form>                          
                    </div>
                    <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover" id="s">
                          <thead>
                              <tr class="table-primary">
                                <th>No. Service</th>
                                <th>Periode</th>
                                <th>Tgl. Service</th>
                                <th>Nopol</th>
                                <th>Divisi</th>
                                <th>KM</th>
                                <th>Jenis Servis</th>
                                <th>Approve</th>
                                <th>Keterangan</th>        
                                <th>InsertBy</th>   
                              </tr>
                          </thead>
                          <tbody>
                                <?php foreach ($data_Srvs as $row) : ?>
                          
                        <tr>                          
                          <td><?= $row->no_service ?></td>
                          <td><?= $row->periode ?></td>
                          <td><?= $row->tgl ?></td>                          
                          <td><?= $row->nopol ?></td>
                          <td><?= $row->divisi ?></td>
                          <td><?= $row->KM ?></td>
                          <td><?= $row->jenis_servis ?></td>
                          <td>
                              <?php 
                              if ( $row->approve  == 1) {
                                ?>
                                <a href="#" class=" off" data="<?= $row->no_service ?>" id="$row->nama"><i class="fa fa-check-circle btn btn-success"></i> </a><?php 
                              }else {
                                ?>
                                 <a href="#" class=" on" data="<?= $row->no_service ?>" id="$row->nama"><i class="fa fa-minus-circle btn btn-danger"></i> </a><?php 
                               }
                              ?>
                          </td>
                          <td><?= $row->ket ?></td>
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
                <form class="form-horizontal" action="<?php echo site_url('TransaksiSrvc/add'); ?>" method="post">
                      
                      <div class="row row-cols-6">
                          <div class="col-6">
                            <div class="form-group">
                              <div class="">
                                <label>No.Service</label>
                                  <input type="text" class="form-control" readonly name="no" value="<?php echo $kode ?>">
                               </div>
                            </div>                            
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                  <label>Periode</label>
                                    <input type="text" class="form-control" readonly name="per" value="<?php echo $per ?>">
                                </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <label>Divisi</label>
                              <input type="text" class="form-control"  name="div" readonly value="<?php echo $div ?>">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('div') ?>
                            </small>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                              <label>Tgl. Service</label>
                              <input type="date" class="form-control" name="tgl">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('tgl') ?>
                            </small>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                              <label>KM</label>
                              <input type="text" class="form-control" name="km" placeholder="Masukan KM Kendaraan">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('km') ?>
                            </small>
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Pemohon">
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
                                <small class="text-danger">
                             <?php echo form_error('nopol') ?>
                            </small>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                             <select id="service" name="service" class="form-control col-auto">
                              <option>Pilih Servis</option>  
                              <option>Ganti Oli</option>
                              <option>Servis</option>                   
                              </select>
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('service') ?>
                            </small>
                          </div>
                        
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('keterangan') ?>
                            </small>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="item" placeholder="Masukan Item Service
                              ">
                            </div>
                            <small class="text-danger">
                             <?php echo form_error('item') ?>
                            </small>
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
      <?php }?>
    <script>        
    $('#s').DataTable();   
        jQuery(document).ready(function($){      
            $('.off').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Batalkan Aprove ini?',
                        type: 'warning',
                        text: 'Aprove Akan Di Batalkan',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Kendaraan/delete/') ?>"+nama; 
                    });
                return false;
            });
            $('.on').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Approve Service Ini?',
                        type: 'info',
                        text: 'Service Akan Di Aprove',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Kendaraan/edit/') ?>"+nama; 
                    });
                return false;
            });
        });	     

    </script>
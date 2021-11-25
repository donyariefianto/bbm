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
            <h2 class="section-title">Aprove Booking & Reservasi</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <h4>Reservasi</h4>                                    
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
                              <option value="">Pilih Divisi</option>
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
                       <table class="table table-striped table-bordered table-hover"  >
                          <thead>
                              <tr class="table-primary">
                                <th>No. Rsv</th>
                                <th>Tgl. Mulai</th>
                                <th>Tgl. Selesai</th>
                                <th>Divisi</th>
                                <th>Department</th>
                                <th>Pemakai</th>
                                <th>Nopol</th>
                                <th>Driver</th>        
                                <th>Tujuan</th>  
                                <th>Keperluan</th>  
                                <th>Status</th>  
                                <th>Acc</th>  
                                <th>Input By</th>  
                               </tr>
                          </thead>
                          <tbody>
                      <?php foreach ($data_res as $row) : ?>    
                        <tr>                          
                          <td><?= $row->rno ?></td>
                          <td><?= $row->rtglstart ?></td>
                          <td><?= $row->rtglend ?></td>
                          <td><?= $row->rdivisi ?></td>
                          <td><?= $row->rdept ?></td>
                          <td><?= $row->rpemakai ?></td>
                          <td><?= $row->rnopol ?></td>
                          <td><?= $row->rdriver ?></td>
                          <td><?= $row->rtujuan ?></td> 
                          <td><?= $row->rkeperluan ?></td>
                          <td>
                            <?php 
                                if ( $row->racc  == 1) { ?>
                                <i class="fa fa-check-circle btn btn-success"></i> 
                                <?php }else { ?>
                                <a data-toggle="modal" class=" tess" id="tess" data-modal="<?= $row->rno ?>" id="$row->nama"><i class="fa fa-minus-circle btn btn-danger"></i> </a><?php 
                            } ?>
                          </td>
                          <td><?= $row->raccuser ?></td>
                          <td><?= $row->rinputuser ?></td>                      
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
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog"  id="tambah-data" class="modal fade">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
           
             <div class="modal-header">
               <h4 class="modal-title">Tambah Data</h4>
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>                 
             </div>
             
              <div class="modal-body">
                <form class="form-horizontal" action="<?php echo site_url('bookingReservasi/add'); ?>" method="post">
                      
                      <div class="row row-cols-6">
                          <div class="col-6">
                            <div class="form-group">
                              <div class="">
                                <label>No.Reservasi</label>
                                  <input type="text" class="form-control" readonly name="No" value="<?php echo $kode ?>">
                                  <small class="text-danger">
                                      <?php echo form_error('No') ?>
                                  </small>
                              </div>
                            </div>                            
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                  <label>Periode</label>
                                    <input type="text" class="form-control" readonly name="Per" value="<?php echo $per ?>">
                                    <small class="text-danger">
                                      <?php echo form_error('Per') ?>
                                    </small >
                                </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <label>Divisi</label>
                              <input type="text" class="form-control"  name="Div" readonly value="<?php echo $div ?>">
                              <small class="text-danger">
                                <?php echo form_error('Div') ?>
                              </small >
                            </div>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                              <label>Tgl. Mulai</label>
                              <input type="date" class="form-control" name="tglAwl">
                              <small class="text-danger">
                                  <?php echo form_error('tglAwl') ?>
                              </small >
                            </div>
                          </div>
                            <div class="col-6">
                            <div class="form-group">
                              <label>Tgl. Akhir</label>
                              <input type="date" class="form-control" name="tglAkhr">
                              <small class="text-danger">
                                  <?php echo form_error('tglAkhr') ?>
                              </small >
                            </div>
                          </div>
                          <div class="col-6">   
                            <div class="form-group">
                                <div class="">
                                    <input type="text" class="form-control" name="driv" placeholder="Masukan Nama Pemakai">
                                    <small class="text-danger">
                                        <?php echo form_error('driv') ?>
                                    </small >
                                </div>
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
                                  <small class="text-danger">
                                        <?php echo form_error('nopol') ?>
                                    </small >
                                </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                             <select id="department" name="department" class="form-control col-auto">
                              <option>Pilih Department</option>  
                              <?php foreach ($data_department as $row) : ?>
                                <option><?= $row->dept ?></option>
                              <?php endforeach; ?>                             
                              </select>
                              <small class="text-danger">
                                        <?php echo form_error('department') ?>
                                    </small >
                            </div>
                          </div>
                        
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="tujuan" placeholder="Masukan Tujuan">
                              <small class="text-danger">
                                        <?php echo form_error('tujuan') ?>
                                    </small >
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="keperluan" placeholder="Masukan Keperluan">
                              <small class="text-danger">
                                        <?php echo form_error('keperluan') ?>
                                    </small >
                            </div>
                          </div>
                        </div>
                      <div class="modal-footer">
                      <button class="btn btn-info" type="submit"> Simpan</button>
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
         swal("Periode Ini Sudah Di Closing !", "Hubungi Admin Untuk", "info");
      </script>
      <?php }?>
    <script type="text/javascript">
    $('.tess').on('click',function(){
        $('#realisasi').modal('show');
        var id = $(this).data('modal');
        var a = btoa(id);
        swal({
           title: 'Aprove Reservasi?',
           type: 'info',
           text: 'Reservasi Akan di Disetujui ?',
           showCancelButton: true,
           },function(){
            window.location = "<?= site_url('bookingReservasi/aprvl/') ?>"+a; 
           });
          return false;
    });
    </script>
    <script>        
    $('#s').DataTable();   
        jQuery(document).ready(function($){      
            $('.off').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Batalkan Reservasi?',
                        type: 'warning',
                        text: 'Reservasi Akan di Batalkan',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Kendaraan/delete/') ?>"+nama; 
                    });
                return false;
            });
            $('.on').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Aprove Reservasi ini?',
                        type: 'info',
                        text: 'Reservasi akan Di Aprove',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Kendaraan/edit/') ?>"+nama; 
                    });
                return false;
            });
        });	     

    </script>
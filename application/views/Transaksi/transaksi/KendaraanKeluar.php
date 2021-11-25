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
            <h2 class="section-title">Transaksi</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <h4>Kendaraan Keluar</h4>                                    
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
                        </div>
                    </form>                      
                    </div>
                    <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover"  >
                          <thead>
                              <tr class="table-primary">
                                <th>Proses</th>
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
                          <td>
                           <a href="#ModalDetail" id="<?= $row->rno ?>|<?= $row->rdivisi ?>|<?= $row->rtglstart ?>|<?= $row->rtglend ?>|<?= $row->rpemakai ?>|'<?= $row->rnopol ?>'|<?= $row->rdriver ?>|<?= $row->rdept ?>|<?= $row->rtujuan ?>|'<?= $row->rkeperluan ?>'|'<?= $row->rperiode ?>'"  data-toggle="modal"  class="detail btn btn-primary "> Proses </a>
                          </td>
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
     <!-- Modal -->
        <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">&nbsp;Kendaraan Keluar </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body" id="IsiModal">
                ..........
              </div>
              
            </div>
          </div>
        </div>
        <!-- akhir kode modal dialog -->

<?php if($sts == 1 ){ ?>
      <script>
         swal("Periode Tidak Tersedia!", "Masukan Periode Dengan Benar", "warning");
      </script>    
     <?php } else if ($sts == 2) { ?>
      <script>
         swal("Periode Ini Sudah Di Closing !", "Hubungi Admin Untuk", "info");
      </script>
      <?php }?>
    <script>
    $(document).ready(function() {
        // even ketika link a href diklik
        $('.detail').on("click", function(){
        // ambil nilai id dari link detail simpan dalam var Data
        var Data= this.id;
        // Pecah Data dengan tanda | sebagai pemisah data hasilnya
        // disimpan dalam array datanya
        var datanya = Data.split("|");
        // Untuk pengujian data
        // if (datanya[4]=='L') { var jk='Laki-laki';} else {var jk='Perempuan';}
        // bagian ini yang akan ditampilkan pada modal bootstrap
        // pengetikan HTML tidak boleh dienter, karena oleh javascript akan dibaca \r\n sehingga
        // modal bootstrap tidak akan jalan
        
        $("#IsiModal").html('<form action="out" method="POST" role="form"><input type="hidden" name="periode" class="form-control" value='+datanya[10]+' readonly placeholder="Input field"><div class="row row-cols-6"><div class="col-6 form-group"><label>Divisi</label><input type="text" name="divisi" class="form-control" value='+datanya[1]+' readonly placeholder="Input field"></div><div class="col-6 form-group"><label>No.Rsv</label><input type="text" name="rsv" readonly class="form-control" value='+datanya[0]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Tanggal Pakai</label><input type="date" name="tglpakai" class="form-control" value='+datanya[2]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Tanggal s.d</label><input type="date" name="tglsd" class="form-control" value='+datanya[3]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Pemakai</label><input type="text" name="pemakai" class="form-control" value='+datanya[4]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Nopol</label><input type="text" name="nopol" class="form-control" value='+datanya[5]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Driver</label><input type="text" name="driver" class="form-control" value='+datanya[6]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Department</label><input type="text" name="department" class="form-control" value='+datanya[7]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Tujuan</label><input type="text" name="tujuan" class="form-control" value='+datanya[8]+' placeholder="Input field"></div><div class="col-6 form-group"><label>Keperluan</label><input type="text" name="keperluan" class="form-control" value='+datanya[9]+' placeholder="Input field"></div><div class="col-6 form-group"><label>No. Catat</label><input type="text" name="no" class="form-control" value="<?php echo $kode ?>" readonly placeholder="Input field"></div><div class="col-6 form-group"><label>Waktu Keluar</label><input type="date" name="out" class="form-control"  placeholder="Input field"></div><div class="col-6 form-group"><label>Kilometer</label><input type="text" name="km" class="form-control"   placeholder="Masukan KM Terakhir"></div><div class="col-6 form-group"><label>Keterangan</label><input type="text" name="ket" class="form-control"  placeholder="Input field"></div></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="submit" name="simpan" class="btn btn-primary">Save</button></form>');
        });
   
    });
    </script>
    <script>        
    $('#s').DataTable();   
        jQuery(document).ready(function($){      
            $('.off').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Non Aktifkan Kendaraan ini?',
                        type: 'warning',
                        text: 'Kendaraan Akan DiNonaktifkan',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Kendaraan/delete/') ?>"+nama; 
                    });
                return false;
            });
            $('.edit').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Edit Kendaraan ini?',
                        type: 'warning',
                        text: 'Kendaraan Akan Di Edit',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Kendaraan/edit/') ?>"+nama; 
                    });
                return false;
            });
            $('.kmm').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                    title: " Masukan KM",
                    text: "Masukan Km Terakhir :",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top"
                    },function(inputValue)
                    {
                      if (inputValue === false) return false;
                      
                      if (inputValue === "") {
                        swal.showInputError("You need to write something!");
                        return false
                      }
                    
                      swal("Nice!", "You wrote: " + inputValue, "success");
                    }
                    // {
                          
                    //     window.location = "<?= site_url('Kendaraan/edit/') ?>"+nama; 
                    // }
                    );
                return false;
            });
        });	     

    </script>
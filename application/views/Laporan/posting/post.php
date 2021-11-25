<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Posting</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-8">
                <div class="card">
                  <div class="card-header">  
                    <h4>Post Periode</h4>                                    
                  </div>
                  <div class="card-body">                                       
                  <div class="form-group">
                    <form action="" method="POST">
                       <div class="row row-cols-4">
                          <div class="col-auto">
                            <div class=""><label>Periode | Contoh: 01/2019 </label>
                              <input type="text" name="periode" id="periode" class="form-control col-auto">
                            </div>    
                            <small class="text-danger">
                                <?php echo form_error('periode') ?>
                            </small>                        
                          </div>
                          <div class="col-auto">
                            <div class="">
                              <label>Pilih Divisi</label>
                              <select id="divisi" name="divisi" class="form-control col-auto">
                              <option value="">Pilih Divisi</option>
                              <?php foreach ($data_DivKend as $row) : ?>
                                <option><?= $row->divisi ?></option>
                              <?php endforeach; ?>
                              </select>
                                <small class="text-danger">
                                    <?php echo form_error('divisi') ?>
                                </small>
                            </div>                            
                          </div>
                          <div class="col-auto">
                            <div class=""><label>.</label>
                              <button data-toggle="modal" data-target="#tambah-data" class="btn btn-success form-control col-auto">Closing</button>                              
                            </div>                            
                          </div>
                        </div>
                        <br>
                        <p class="text-warning">Catatan : Setiap periode Harus Melakukan Closing Supaya Dapat Melakukan Proses Transaksi.<br>Jangan Lupa Masukan Periode Dengan benar</p>
                    </form>      
                     
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-auto col-lg-4">
                <div class="card">
                  <div class="card-header">  
                    <h4>Posess Periode</h4>  
                    <div class="mx-1">
                      <button type='button' class='btn btn-primary'>Tutup Periode</button>
                    </div>
                  </div>
                  <div class="card-body">                                       
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                  </div>as
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              
             
            </div>
            
          </div>
        </section>
      </div>   
      
       <?php  if($hasil == 1 ){ ?>
        <script>
                swal("Good job!", "Berhasil Open Periode", "success");
        </script>
        
        <?php }else if($hasil == 2){ ?>
            <script>
                swal("Failed !", "Masukan Periode Dengan Benar", "error");
        </script>
        <?php }else if($hasil == 3){ ?>
            <script>
                swal("Failed !", "Periode Sebelumnya Tidak Tersedia ! Hubungi Administrator Untuk Pembuatan Periode", "warning");
        </script>
        <?php }?>
        
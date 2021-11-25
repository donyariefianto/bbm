<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Laporan BBM</h2>
      <div class="card"> 
        <div class="card-header">
          <h4>Presentase BBM</h4>
        </div>
        <div>
            <div class="row">
              <div class="col-12 col-md-auto col-lg-8">
                <div class="card">
                  <div class="card-body">                                       
                  <div class="form-group">
                    <form action="Presentase/Cetak" method="POST">
                       <div class="row row-cols-4">
                          <div class="col-auto">
                            <div class=""><label>Periode | Contoh: 01/2019 </label>
                              <input type="text" name="per" class="form-control col-auto">
                            </div>    
                            <small class="text-danger">
                                <?php echo form_error('per') ?>
                            </small>                        
                          </div>
                          <div class="col-auto">
                            <div class=""><label>.</label>
                              <button class="btn btn-success form-control col-auto">Cetak</button>                              
                            </div>                            
                          </div>
                        </div>
                        <br>
                        <p class="text-warning">Catatan : Jangan Lupa Masukan Periode Dengan benar</p>
                    </form>      
                     
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
      </div>  
    </div>
  </section>
</div>
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
        <h2 class="section-title">BBM</h2>
          <div class="col-12 col-md-12 col-lg-12">
            <form action="" method="post">
              <div class="card p-3">
                  <div class="card-header">
                    <h4>Realisasi</h4>
                  </div>                  
                  <div class="card-body">
                    <div class="form-group">
                      <label>Jenis Bbm</label>
                      <input type="text" class="form-control" name="nominal" placeholder="Masukan Real Nominal">
                      <small class="text-danger">
                          <?php echo form_error('nominal') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Jenis Bbm</label>
                      <input type="text" class="form-control" name="liter" placeholder="Masukan Real Liter">
                      <small class="text-danger">
                          <?php echo form_error('liter') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Jenis Bbm</label>
                      <input type="date" class="form-control" name="tgl" placeholder="Masukan Tanggal realisasi">
                      <small class="text-danger">
                          <?php echo form_error('tgl') ?>
                      </small>
                    </div>
                     <button type="submit" class="btn btn-primary mt-3">Simpan Data</button>
              </div>            
            </form>  
          </div>              
      </div>   
      </div>
    </section>
</div>

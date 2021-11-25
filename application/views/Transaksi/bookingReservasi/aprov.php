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
          <div class="col-12 col-md-12 col-lg-12">
            <form action="" method="post">
              <div class="card p-3">
                  <div class="card-header">
                    <h4>Realisasi</h4>
                  </div>                  
                  <div class="card-body">
                    <div class="form-group">
                      <label>Pilih Driver</label>
                        <select name="driver" class="form-control col-auto">
                            <option value="">Pilih Driver</option>
                            <?php foreach ($driver as $row) : ?>
                            <option value="<?= $row->dnik ?>"><?= $row->dnama ?>|<?= $row->dmobil ?></option>
                            <?php endforeach; ?>
                        </select>
                      <small class="text-danger">
                          <?php echo form_error('driver') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Pilih Persetujuan</label>
                        <select name="persetujuan" class="form-control col-auto">
                            <option value="">Pilih Persetujuan</option>
                            <option value="1">Disetujui</option>
                            <option value="0">Tidak Disetujui</option>
                        </select>
                      <small class="text-danger">
                          <?php echo form_error('persetujuan') ?>
                      </small>
                    </div>
                     <button type="submit" class="btn btn-primary mt-3">Approve</button>
              </div>            
            </form>  
          </div>              
      </div>   
      </div>
    </section>
</div>

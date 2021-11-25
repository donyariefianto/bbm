<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Master</h1>
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
                    <h4>Input BBM</h4>
                  </div>                  
                  <div class="card-body">
                    <div class="form-group">
                      <label>Jenis BBM</label>
                      <input type="text" value="<?= set_value('JenisBbm'); ?>" name="JenisBbm" id="JenisBbm" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('JenisBbm') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" value="<?= set_value('Harga'); ?>" name="Harga" id="Harga" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Harga') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" value="<?= set_value('Satuan'); ?>" name="Satuan" id="Satuan" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Satuan') ?>
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
             
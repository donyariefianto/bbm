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
        <h2 class="section-title">Item Barang</h2>
          <div class="col-12 col-md-12 col-lg-12">
            <form action="" method="post">
              <div class="card p-3">
                  <div class="card-header">
                    <h4>Edit Item Barang</h4>
                  </div>                  
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" value="<?= set_value('Kode'); ?>" name="Kode" id="Kode" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Kode') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" value="<?= set_value('Nama'); ?>" name="Nama" id="Nama" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Nama') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" value="<?= set_value('Satuan'); ?>" name="Satuan" id="Satuan" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Satuan') ?>
                      </small>
                    </div>  
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="text" value="<?= set_value('Stok'); ?>" name="Stok" id="Stok" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Stok') ?>
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
             
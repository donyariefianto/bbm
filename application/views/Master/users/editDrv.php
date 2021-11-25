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
        <h2 class="section-title">Drivers</h2>
          <div class="col-12 col-md-12 col-lg-12">
            <form action="" method="post">
              <div class="card p-3">
                  <div class="card-header">
                    <h4>Edit Driver</h4>
                  </div>                  
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" value="<?= set_value('Nama'); ?>" name="Nama" id="Nama" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Nama') ?>
                      </small>
                    </div>
                    <div class="form-group" type="hidden">                                        
                      <input type="hidden" value="Nik" name="Nik" id="Nik" class="form-control col-auto">                     
                      <small class="text-danger">
                          <?php echo form_error('Nik') ?>
                      </small>
                    </div> 
                    <div class="form-group">
                      <label>Nopol</label>
                      <select name="Nopol" id="Nopol" value="<?= set_value('Nopol'); ?>" class="form-control col-auto">
                      <option>Pilih Nopol</option>
                        <?php foreach ($data_nopol as $row) : ?>
                        <option><?= $row->nopol ?></option>
                        <?php endforeach; ?>
                      </select> 
                      <small class="text-danger">
                          <?php echo form_error('Nopol') ?>
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
             
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
        <h2 class="section-title">Kendaraan</h2>
          <div class="col-12 col-md-12 col-lg-12">
            <form action="" method="post">
              <div class="card p-3">
                  <div class="card-header">
                    <h4>Input Kendaraan</h4>
                  </div>                  
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" value="<?= set_value('Nama'); ?>" name="Nama" id="Nama" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Nama') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Kode Inventaris</label>
                      <input type="text" value="<?= set_value('kinv'); ?>" name="Kinv" id="Kinv" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Kinv') ?>
                      </small>
                    </div> 
                    <div class="form-group">
                      <label>Merk</label>
                      <input type="text" name="Merk" id="Merk" value="<?= set_value('merk'); ?>" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Merk') ?>
                      </small>
                    </div>   
                     <div class="form-group">
                      <label>Jenis</label>
                      <input type="text" name="Jenis" id="Jenis" value="<?= set_value('jenis'); ?>" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Jenis') ?>
                      </small>
                    </div> 
                    <div class="form-group">
                      <label>Divisi</label>
                      <select id="divisi" name="Divisi" value="<?= set_value('divisi'); ?>" id="Divisi" class="form-control col-auto">
                      <option>Pilih Divisi</option>
                        <?php foreach ($data_DivKend as $row) : ?>
                        <option><?= $row->divisi ?></option>
                        <?php endforeach; ?>
                      </select> 
                      <small class="text-danger">
                          <?php echo form_error('Divisi') ?>
                      </small>
                    </div>                 
                    <div class="form-group">
                      <label>Kode Kendaraan</label>
                      <input type="text" value="<?= set_value('Knd'); ?>" name="Knd" id="Knd" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Knd') ?>
                      </small>
                    </div>
                    
                    <div class="form-group">
                      <label>Nopol</label>
                      <input type="text" name="Nopol" id="Nopol" value="<?= set_value('nopol'); ?>" class="form-control col-auto">
                      <small class="text-danger">
                          <?php echo form_error('Nopol') ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label>Jenis Bbm</label>
                      <select name="JenisBbm" id="JenisBbm" value="<?= set_value('jenisBbm'); ?>" class="form-control col-auto">
                      <option>Pilih Jenis Bbm</option>
                        <?php foreach ($data_jenisBBM as $row) : ?>
                        <option><?= $row->jenis_bbm ?></option>
                        <?php endforeach; ?>
                      </select> 
                      <small class="text-danger">
                          <?php echo form_error('Jenis_bbm') ?>
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





              
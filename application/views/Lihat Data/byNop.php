<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Lihat Data</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Reservasi</h2>
      <div class="card">
        <div class="card-header">
          <h4>Reservasi By Nopol</h4>
        </div>
        <form action="" method="POST">
        <div class="card-body">
          <div class="card-body">
          <div class="form-group">
            <label>Pilih Divisi</label>
            <select class="form-control" id="Nopol" name="Nopol">
              <option></option>
              <?php foreach ($data_Nop as $row) : ?>
               <option><?= $row->nopol ?></option>
              <?php endforeach; ?>              
            </select>
            <small class="text-danger">
              <?php echo form_error('Nopol') ?>
            </small>
          </div>      
          <div class="form-group">
            <label>Tanggal Dari</label>
            <input type="date" class="form-control" id="Tgl1" name="Tgl1">    
            <small class="text-danger">
              <?php echo form_error('Tgl1') ?>
            </small>        
          </div>
          <div class="form-group">
            <label>Tanggal Sampai</label>
            <input type="date" class="form-control" id="Tgl2" name="Tgl2">
            <small class="text-danger">
              <?php echo form_error('Tgl2') ?>
            </small>
          </div>
        </div>        
        <div class="card-footer text-right">          
          <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-secondary" type="reset">Reset</button>          
        </div>
        </form>
      </div>
    </div>
  </section>
</div>
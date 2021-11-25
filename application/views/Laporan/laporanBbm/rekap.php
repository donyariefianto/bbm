<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Laporan BBM</h2>
      <div class="card">
        <div class="card-header">
          <h4>Laporan BBM Detail</h4>
        </div>
        <form action="" method="POST">
        <div class="card-body">  
          <div class="form-group">
            <label>Pilih Divisi</label>
            <select class="form-control" id="Divisi" name="Divisi">
              <option></option>
              <?php foreach ($data_DivKend as $row) : ?>
               <option><?= $row->divisi ?></option>
              <?php endforeach; ?>              
            </select>
            <small class="text-danger">
              <?php echo form_error('Divisi') ?>
            </small>
          </div>  
          <div class="form-group">
            <label>Periode</label>
            <input type="text" class="form-control" id="Periode" name="Periode">
            <small class="text-danger">
              <?php echo form_error('Periode') ?>
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
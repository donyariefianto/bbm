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
        <div class="row p-5">
        <div class="col-md-4"><form action="<?= base_url('Laporan/cetak'); ?>" method="POST">
        <div class="card-body">  
          <div class="form-group">
              <h4>Laporan BBM Detail</h4>
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
        </form></div>
        <div class="col-md-4"><form action="<?= base_url('Laporan/cetakPeriode'); ?>" method="POST">
        <div class="card-body">  
          <div class="form-group">
              <h4>Laporan BBM Periode</h4>
            <label>Pilih Divisi</label>
            <select class="form-control" id="L1" name="L1">
              <option></option>
              <?php foreach ($data_DivKend as $row) : ?>
               <option><?= $row->divisi ?></option>
              <?php endforeach; ?>              
            </select>
            <small class="text-danger">
              <?php echo form_error('L1') ?>
            </small>
          </div>     
          <div class="form-group">
            <label>Periode</label>
            <input type="text" class="form-control" id="P1" name="P1">    
            <small class="text-danger">
              <?php echo form_error('P1') ?>
            </small>        
          </div>
        </div>        
        <div class="card-footer text-right">          
          <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-secondary" type="reset">Reset</button>          
        </div>
        </form></div>
        <div class="col-md-4"><form action="<?= base_url('Laporan/cetakRekap'); ?>" method="POST">
        <div class="card-body">  
          <div class="form-group">
              <h4>Laporan BBM Rekap</h4>
            <label>Pilih Divisi</label>
            <select class="form-control" id="Divisi1" name="Divisi1">
              <option></option>
              <?php foreach ($data_DivKend as $row) : ?>
               <option><?= $row->divisi ?></option>
              <?php endforeach; ?>              
            </select>
            <small class="text-danger">
              <?php echo form_error('Divisi1') ?>
            </small>
          </div>     
          <div class="form-group">
            <label>Tanggal Dari</label>
            <input type="date" class="form-control" id="Tgl11" name="Tgl11">    
            <small class="text-danger">
              <?php echo form_error('Tgl11') ?>
            </small>        
          </div>
          <div class="form-group">
            <label>Tanggal Sampai</label>
            <input type="date" class="form-control" id="Tgl21" name="Tgl21">
            <small class="text-danger">
              <?php echo form_error('Tgl21') ?>
            </small>
          </div>
        </div>        
        <div class="card-footer text-right">          
          <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-secondary" type="reset">Reset</button>          
        </div>
        </form></div>
        </div>

        
      </div>
    </div>
  </section>
</div>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Laporan BBM</h2>
      <div class="card"> 
        <div class="card-header">
          <h4>Breakdown Divisi</h4>
        </div>
        <div class="row p-5">
        <div class="col-md-4"><form action="<?= base_url('BDivisi/lbs'); ?>" method="POST">
        <div class="card-body">  
          <div class="form-group">
              <h4>Laporan Biaya Service</h4>
            <label>Pilih Divisi</label>
            <select class="form-control" id="Divisi" name="Divisi">
              <option></option>
              <option>SEMUA</option>
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
        <div class="col-md-4"><form action="<?= base_url('BDivisi/rbs'); ?>" method="POST">
        <div class="card-body">  
          <div class="form-group">
              <h4>Rekap Biaya Service</h4>
            <label>Pilih Divisi</label>
            <select class="form-control" id="dvs" name="dvs">
              <option></option>
              <option>SEMUA</option>
              <?php foreach ($data_DivKend as $row) : ?>
               <option><?= $row->divisi ?></option>
              <?php endforeach; ?>              
            </select>
            <small class="text-danger">
              <?php echo form_error('dvs') ?>
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
        <div class="col-md-4"><form action="<?= base_url('BDivisi/sb'); ?>" method="POST">
        <div class="card-body">  
          <div class="form-group">
              <h4>Summary BBM</h4>
            <label>Pilih Divisi</label>
            <select class="form-control" id="dvs" name="dvs">
              <option></option>
              <option>SEMUA</option>
              <?php foreach ($data_DivKend as $row) : ?>
               <option><?= $row->divisi ?></option>
              <?php endforeach; ?>              
            </select>
            <small class="text-danger">
              <?php echo form_error('dvs') ?>
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
        </div>

        
      </div>
    </div>
  </section>
</div>
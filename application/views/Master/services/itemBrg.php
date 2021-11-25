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
            <h2 class="section-title">Item / Barang</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <a class="btn btn-success mt-3" href="<?= base_url('MasterSrvc/addItem'); ?>">Tambah Data</a>                                    
                  </div>
                  <div class="card-body">                                       
                  <div class="form-group">
                    <!-- <form action="" method="POST">
                      <label>Pilih Divisi</label>                      
                      <select id="divisi" name="divisi" onchange="this.form.submit();" class="form-control col-3">
                      <option>Pilih Divisi</option>
                        <?php foreach ($data_Itm as $row) : ?>
                        <option><?= $row->divisi ?></option>
                        <?php endforeach; ?>
                      </select> 
                      </form>     -->
                                        
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="s">
                                <thead>
                                    <tr class="table-primary">
                                      <th>Kode</th>
                                      <th>Nama</th>
                                      <th>Satuan</th>
                                      <th>Stok</th>
                                      <th>Action</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_Itm as $row) : ?>
                                    <tr>
                                      <!-- <td>1</td> -->
                                      <td><?= $row->okode ?></td>
                                      <td><?= $row->onama ?></td>
                                      <td><?= $row->osatuan ?></td>
                                      <td><?= $row->ostok ?></td>
                                      <td>
                                        <a href="#" class=" off" data="<?= $row->oid ?>" id="$row->nama"><i class="fa fa-trash btn btn-danger"></i> </a>
                                        <a href="#" class=" edit" data="<?= $row->oid ?>" id="$row->nama"><i class="fa fa-edit btn btn-warning"></i> </a>
                                      </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                        </table>                     
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
      <script>
        jQuery(document).ready(function($){
          $('#s').DataTable();   
            $('.off').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Non Aktifkan BBM ini?',
                        type: 'error',
                        text: 'BBM Akan DiNonaktifkan',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('MasterSrvc/deleteItem/') ?>"+nama; 
                    });
                return false;
            });
            $('.edit').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Edit Jenis BBM ini?',
                        type: 'warning',
                        text: 'BBM Akan Di Edit',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('MasterSrvc/editItem/') ?>"+nama; 
                    });
                return false;
            });
        });	     

    </script>
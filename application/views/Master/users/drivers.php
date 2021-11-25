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
            <h2 class="section-title">Driver</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <!-- <h4>Table Driver</h4>  -->
                     <a class="btn btn-success" href="<?= base_url('Users/addDriver'); ?>">Tambah Data</a>                                   
                  </div>
                  <div class="card-body">                                       
                  <div class="form-group">
                    <!-- <form action="" method="POST">
                      <label>Pilih Divisi</label>                      
                      <select id="divisi" name="divisi" onchange="this.form.submit();" class="form-control col-3">
                      <option>Pilih Divisi</option>
                        <?php foreach ($data_DivKend as $row) : ?>
                        <option><?= $row->divisi ?></option>
                        <?php endforeach; ?>
                      </select> 
                      </form>     -->
                                       
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="s">
                          <thead>
                            <tr class="table-primary">
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Nopol</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($data_driver as $row) : ?>
                              <tr>                                
                                <td><?= $row->dnik ?></td>
                                <td><?= $row->dnama ?></td>
                                <td><?= $row->dmobil ?></td> 
                                <td>
                                  <a href="#" class="hapus" data="<?= $row->dnik ?>" id="$row->nama"><i class="fa fa-trash btn btn-danger"></i> </a>
                                  <a href="#" class="edit" data="<?= $row->dnik ?>" id="$row->nama"><i class="fa fa-edit btn btn-warning"></i> </a>
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
      $('#s').DataTable();      
        jQuery(document).ready(function($){
            $('.hapus').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Non Aktifkan Driver ini?',
                        type: 'warning',
                        text: 'Driver Akan DiNonaktifkan',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Users/delete/') ?>"+nama; 
                    });
                return false;
            });
            $('.edit').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Edit Data Driver ini?',
                        type: 'warning',
                        text: 'data Driver Akan Di Edit',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('Users/editDrv/') ?>"+nama; 
                    });
                return false;
            });
        });	     

    </script>
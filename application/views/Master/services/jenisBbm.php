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
            <h2 class="section-title">Jenis BBM</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <a class="btn btn-success" href="<?= base_url('MasterSrvc/addBbm'); ?>">Tambah Data</a>                                                      
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
                                      <th>Jenis Bbm</th>
                                      <th>Harga</th>
                                      <th>Satuan</th>
                                      <th>Action</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($data_jnsBbm as $row) : ?>
                                  <tr>
                                    <!-- <td>1</td> -->
                                    <td><?= $row->jenis_bbm ?></td>
                                    <td><?= $row->harga ?></td>
                                    <td><?= $row->satuan ?></td>
                                    <td>
                                      <a href="#" class=" off" data="<?= $row->harga ?>" id="$row->nama"><i class="fa fa-trash btn btn-danger"></i> </a>
                                      <a href="#" class=" edit" data="<?= $row->harga ?>" id="$row->nama"><i class="fa fa-edit btn btn-warning"></i> </a>
                                    </td>                          
                                  </tr>
                                  <?php endforeach; ?>                                    
                                </tbody>
                        </table>
                      
                    </div>
                  </div>
                  
                  <!-- <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div> -->
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
      <script>
        $('#s').DataTable();   
        jQuery(document).ready(function($){
            $('.off').on('click',function(){
                var nama = $(this).attr('data');
                swal({
                        title: 'Non Aktifkan BBM ini?',
                        type: 'error',
                        text: 'BBM Akan DiNonaktifkan',
                        showCancelButton: true,
                        },function(){
                        window.location = "<?= site_url('MasterSrvc/deleteBbm/') ?>"+nama; 
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
                        window.location = "<?= site_url('MasterSrvc/editBbm/') ?>"+nama; 
                    });
                return false;
            });
        });	     

    </script>
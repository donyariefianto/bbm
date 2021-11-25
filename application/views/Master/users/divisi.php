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
            <h2 class="section-title">Divisi</h2>

            <div class="row">
              <div class="col-12 col-md-auto col-lg-12">
                <div class="card">
                  <div class="card-header">  
                    <h4>Table Divisi</h4>                                    
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
                      <!-- <a class="btn btn-primary mt-3" href="<?= base_url('Users/addDiv'); ?>">Tambah Data</a>                   -->
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="s">
                          <thead>
                            <tr class="table-primary">
                              <th>Divisi</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($data_divisi as $row) : ?>
                              <tr>                                
                                <td><?= $row->divisi ?></td>
                                <td><?= $row->nama_divisi ?></td>
                                <td><?= $row->alamat_divisi ?></td>                                                         
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
      </script>
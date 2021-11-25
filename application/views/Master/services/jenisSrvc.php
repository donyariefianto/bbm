<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Master</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Jenis BBM</h2>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="s">
                                <thead>
                                    <tr class="table-success">
                                            <th></th>
                                            <th>Nama</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
</div>

            

<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#s').DataTable();   
</script>
                    </div>
                    
                  </div> 
                  
                
                </div>
              </div>
            </div>
            
          </div>
        </section>
 </div>
      
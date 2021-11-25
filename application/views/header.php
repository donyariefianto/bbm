<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BBM</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
  <!-- alert -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    
    
    
  
    
    <!-- Fontawesome 5.15.3-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

  
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    
</head>
<?php if($this->session->userdata('status') != "login"){
                redirect(base_url("auth"));
      }?>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <!-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div> -->
        </form>
        <ul class="navbar-nav navbar-right">
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a> -->
            <!-- <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                    <p>Is Cooming soon Bro</p>
                  </div>
                </a>                
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div> -->
          <!-- </li> -->
          <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            
            <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo strtolower($this->session->userdata("nama")); ?> </div></a>
            <?php 
            date_default_timezone_set('Asia/Jakarta');
            $login  = $this->session->userdata("waktu");
            $now =  date("h:i:s");
             $awal  = strtotime($login);
             $akhir = strtotime($now);
             $diff  = $akhir - $awal;
              $jam   = floor($diff / (60 * 60));
              $menit = $diff - ( $jam * (60 * 60) );
              $detik = $diff % 60;
             ?>

            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in <?php echo floor( $menit / 60 ) ?>  min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <?php if($this->session->userdata('level') == "HEADACC" or $this->session->userdata('level') == "Programmer"){ ?>
        <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url(''); ?>">BBM</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url(''); ?>"></a>
          </div>
          <ul class="sidebar-menu">
              
              <li class="menu-header"><span>Master</span> </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-car"></i> <span>Kendaraan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Kendaraan'); ?>">Kendaraan</a>
                </li>
                </li>                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Users/divisi'); ?>">Divisi</a>
                </li>
                <li><a class="nav-link" href="<?= base_url('Users/index'); ?>">Pengguna</a>
                </li>
                <li><a class="nav-link" href="<?= base_url('Users/drivers'); ?>">Driver</a>
                </li>
                </li>                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Services</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('MasterSrvc/JenisBbm'); ?>">Jenis BBM</a>
                </li>
                <li><a class="nav-link" href="<?= base_url('MasterSrvc/ItemBrg'); ?>">Item/Barang</a>
                </li>
                </li>                  
                </ul>
              </li>
              <li class="menu-header"><span>Transaksi</span> </li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>Periode</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('BookingReservasi'); ?>">Reservasi</a></li>
                </ul>
              </li> -->
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>Booking/Reservasi</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('BookingReservasi'); ?>">Reservasi</a></li>
                  <li><a href="<?= base_url('BookingReservasi/aprv'); ?>">Approval Reservasi</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('Transaksi/KendKel'); ?>">Kendaraan Keluar</a></li>
                  <li><a href="<?= base_url('Transaksi/KendMsk'); ?>">Kendaraan Masuk</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i> <span>BBM</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('BBM/PengajuanBbm'); ?>">Pengajuan BBM</a></li>
                  <li><a href="<?= base_url('BBM/ApprovalBbm'); ?>">Approval BBM</a></li>
                </ul>
              </li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Service</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('TransaksiSrvc'); ?>">Input Service</a></li>
                </ul>
              </li> -->
              <li class="menu-header"><span>Laporan</span> </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan BBM</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Laporan'); ?>">Laporan BBM</a></li>  
                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-water"></i> <span>Breakdown Divisi</span></a>
                <ul class="dropdown-menu">
                  <!-- <li><a class="nav-link" href="<?= base_url('BDivisi/LapBiayaService/'); ?>">Laporan Biaya Service</a></li> -->
                  <li><a class="nav-link" href="<?= base_url('BDivisi'); ?>">Breakdown</a></li>
                  <!-- <li><a class="nav-link" href="<?= base_url('RekapBiayaServiceDireksi'); ?>">Rekap Service Direksi</a></li>
                  <li><a class="nav-link" href="<?= base_url('RekapBiayaServiceRapb'); ?>">Rekap Service RAPB</a></li>
                   <li><a class="nav-link" href="<?= base_url('SummaryBBM'); ?>">Summary BBM</a></li>                -->
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-upload"></i> <span>Posting</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Posting'); ?>">Posting</a></li>                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Keluar Masuk</span></a>
                <ul class="dropdown-menu">
                  <!-- <li><a class="nav-link" href="<?= base_url('InOutKendaraan'); ?>">In Out Kendaraan</a></li> -->
                  <li><a class="nav-link" href="<?= base_url('Presentase'); ?>">Prosentase BBM</a></li>                  
                  <!-- <li><a class="nav-link" href="<?= base_url('BreakdownPerNop'); ?>">Breakdown persen/Nopol</a></li> -->
                </ul>
              </li>
              <!-- <li class="menu-header"><span>Lihat Data</span> </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-square"></i> <span>Lihat Data</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Reservasi/BYDiv'); ?>">Reservasi BY Divisi</a></li>  
                  <li><a class="nav-link" href="<?= base_url('Reservasi/BYDriv'); ?>">Reservasi BY Driver</a></li>                
                  <li><a class="nav-link" href="<?= base_url('Reservasi/BYNop'); ?>">Reservasi BY NOPOL</a></li>
                </ul>
              </li>    -->
              <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
             
            </div>     
        </aside>
      </div>
      <?php } else { ?>
        <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('Admin'); ?>">BBM</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url(''); ?>"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header"><span>Transaksi</span> </li>
             
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i> <span>BBM</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('Admin/PengajuanBbm'); ?>">Pengajuan BBM</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>Booking/Reservasi</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('BookingReservasi'); ?>">Reservasi</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan BBM</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Admin/laporan'); ?>">Laporan BBM</a></li>                   
                </ul>
              </li>
              
              <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
             
            </div>     
        </aside>
      </div>
      <?php }?>
      
      
      
        <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
        
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          
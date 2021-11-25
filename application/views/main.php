      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="assets/img/slide.jpg">
                  <div class="hero-inner">
                    <h2>Welcome, <?php echo $this->session->userdata("nama"); ?> !</h2>
                    <p class="lead">Selamat Datang Di website Pengelolaan BBM AGROWISATA Group</p>
                    <div class="mt-4">
                      <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Get Start</a>
                    </div>
                  </div>
                </div>
              </div>            
          </div>
          <div class="row">
            <div class="col-lg-9 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistic Pengajuan Penggunaan Kendaraan</h4>
                  <div class="card-header-action">
                    <div class="btn">
                      <button class="btn btn-primary">Mont</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="auto" width="auto"></canvas>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistic Bulan Ini</h4>
                  
                </div>
                <div class="card-body">
                  <canvas id="Donat" width="auto" height="450"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    10
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>News</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm- col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Activities</h4>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                      <div class="media-body">
                        <div class="float-right text-primary">Now</div>
                        <div class="media-title">Farhan A Mujib</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png" alt="avatar">
                      <div class="media-body">
                        <div class="float-right">12m</div>
                        <div class="media-title">Ujang Maman</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-3.png" alt="avatar">
                      <div class="media-body">
                        <div class="float-right">17m</div>
                        <div class="media-title">Rizal Fakhri</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-4.png" alt="avatar">
                      <div class="media-body">
                        <div class="float-right">21m</div>
                        <div class="media-title">Alfa Zulkarnain</div>
                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                      </div>
                    </li>
                  </ul>
                  <div class="text-center pt-1 pb-1">
                    <a href="#" class="btn btn-primary btn-lg btn-round">
                      View All
                    </a>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
         <div class="container">
        </div>
          
        </section>
<script type="text/javascript">
    var col = '#f9fafd';
    // var ind = {
    //         label: 'industri',
    //     //     backgroundColor: transparent ,
    //         borderColor: '#8cd472',
    //         data: [23,89,34,56,98,12
    //         ]
    // }
    // var agr = {
    //         label: 'agro',
    //     //     backgroundColor: '#ADD8E6',
    //         borderColor: '#00c0ff',
    //         data: [90,23,54,18,43,75
    //         ]
    // }
    var est = {
            label: 'estate',
        //     backgroundColor: '#ADD8E6',
            borderColor: '#c0caea',
            data: [<?php
            if (count($est)>0) {
              foreach ($est as $data) {
                echo "'" .$data->total ."',";
              }
            }
          ?>]
    }
    var dir = {
            label: 'direksi',
            // backgroundColor: '#ADD8E6',
            borderColor: '#ffff4d',
            data: [<?php
            if (count($dir)>0) {
              foreach ($dir as $data) {
                echo "'" .$data->total ."',";
              }
            }
          ?>]
    }
    var trd = {
            label: 'trading',
            // backgroundColor: '#ADD8E6',
            borderColor: '#ffc19a',
            data: [<?php
            if (count($tra)>0) {
              foreach ($tra as $data) {
                echo "'" .$data->total ."',";
              }
            }
          ?>]
    }
    var hotel = {
            label: 'hotel',
            // backgroundColor: '#ADD8E6',
            borderColor: '#ff8da1',
            data: [<?php
            if (count($hot)>0) {
              foreach ($hot as $data) {
                echo "'" .$data->total ."',";
              }
            }
          ?>],
    }
  
        
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan","Feb","Mar","Apr","Mei","Jun",
        "Jul","Ags","Sep","Okt","Nov","Des" 
        ],
        datasets: [hotel,est,trd,dir], 
    },
    });
var oilCanvas = document.getElementById("Donat");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 14;

var oilData = {
    labels: ["Direksi","Trading","Hotel","Estate"
    ],
    datasets: [
        {
            data: [<?php
                        foreach ($dir as $data);
                        echo $data->total ;
                      ?>,
                      <?php
                        foreach ($tra as $data);
                        echo $data->total ;
                      ?>,
                      <?php
                        foreach ($hot as $data);
                        echo $data->total ;
                      ?>,
                      <?php
                        foreach ($est as $data);
                        echo $data->total ;
                      ?>,],
            backgroundColor: [
                "#ffff4d",
                "#ffc19a",
                "#ff8da1",
                "#c0caea"
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});
  </script>


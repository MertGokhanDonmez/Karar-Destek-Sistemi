<?php  
$connect = mysqli_connect("localhost", "root", "00000000", "lojistik_yonetim");  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Lojistik Yönetimi</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>

    .map-container{
      overflow:hidden;
      padding-bottom:56.25%;
      position:relative;
      height:0;
    }
    .map-container iframe{
      left:0;
      top:0;
      height:100%;
      width:100%;
      position:absolute;
    }
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <a class="a-renk" href="">Sayfanın En Üstüne Çık</a>

        </div>
        
          <form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

          </form>

        
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a style="margin-left:35px" class="logo-wrapper  waves-effect">
        <img style="" src="logo.png">
      </a>

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="table.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Tables</a>
        <a href="map.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">
          

            <!--Card content-->
            <div class="card-body">
              
              <form method="POST">
              Araç:
                <select class="select-class" name="arac">
                      <option value="">Seçiniz</option>
                    <optgroup label="VOLVO">
                      <option value="FH 12.420">FH 12.420</option>
                    <optgroup label="MAN">
                      <option value="TGX">TGX</option>
                      <option value="TGA">TGA</option>
                    <optgroup label="BMC">
                      <option value="162-22 FATİH">162-22 FATİH</option>
                    <option value="FATİH INTERCOOL">FATİH INTERCOOL</option>
                    <optgroup label="Mercedes - Benz">
                      <option value="ACTORS 1842">ACTORS 1842</option>
                    <optgroup label="SCANIA">
                      <option value="R 410">R 410</option>
                      <option value="G 400">G 400</option>
                    <optgroup label="RENAULT">
                      <option value="MAGNUM 420 T">MAGNUM 420 T</option>
                      <option value="PREMIUM 420.18 T">PREMIUM 420.18 T</option>
                    <optgroup label="FORD">
                      <option value="1838T">1838T</option>
                      <option value="1836T">1836T</option>
                      <option value="350 M">350 M</option>
                      <option value="120 P">120 P</option>
                    <optgroup label="DAF">
                      <option value="XF">XF</option>
                      <option value="CF">CF</option>
                </select>
                Kullanıldığı yıl:
                <select class="select-class" name="tarih">
                  <option value="">Seçiniz</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
                <button class="select-button" name="sira">Sorgula</button>
              </form>
              <canvas id="myChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header text-center">
              Cinsiyete Göre Ortalama Yakıt Tüketimi
            </div>

            <!--Card content-->
            <div class="card-body">
              
              
              <canvas id="pieChart"></canvas>
              <div class="flex">
                <div id="erkek">Erkek</div>
                <div id="kadin">Kadın</div>
              </div>

            </div>

          </div>
          <!--/.Card-->

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

              <!-- List group links -->
              <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect">Sales
                  <span class="badge badge-success badge-pill pull-right">22%
                    <i class="fas fa-arrow-up ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Traffic
                  <span class="badge badge-danger badge-pill pull-right">5%
                    <i class="fas fa-arrow-down ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Orders
                  <span class="badge badge-primary badge-pill pull-right">14</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Issues
                  <span class="badge badge-primary badge-pill pull-right">123</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Messages
                  <span class="badge badge-primary badge-pill pull-right">8</span>
                </a>
              </div>
              <!-- List group links -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Yakıt Fiyatları</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="lineChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Radar Chart</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="radarChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Doughnut Chart</div>

            <!--Card content-->
            <div class="card-body">

              <canvas id="doughnutChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">Horizontal Bar Chart</div>

            <!--Card content-->
            <div class="card-body">
              <form method="POST">
                Araç:
                <select class="select-class" name="hbar_arac">
                        <option value="">Seçiniz</option>
                      <optgroup label="VOLVO">
                        <option value="FH 12.420">FH 12.420</option>
                      <optgroup label="MAN">
                        <option value="TGX">TGX</option>
                        <option value="TGA">TGA</option>
                      <optgroup label="BMC">
                        <option value="162-22 FATİH">162-22 FATİH</option>
                      <option value="FATİH INTERCOOL">FATİH INTERCOOL</option>
                      <optgroup label="Mercedes - Benz">
                        <option value="ACTORS 1842">ACTORS 1842</option>
                      <optgroup label="SCANIA">
                        <option value="R 410">R 410</option>
                        <option value="G 400">G 400</option>
                      <optgroup label="RENAULT">
                        <option value="MAGNUM 420 T">MAGNUM 420 T</option>
                        <option value="PREMIUM 420.18 T">PREMIUM 420.18 T</option>
                      <optgroup label="FORD">
                        <option value="1838T">1838T</option>
                        <option value="1836T">1836T</option>
                        <option value="350 M">350 M</option>
                        <option value="120 P">120 P</option>
                      <optgroup label="DAF">
                        <option value="XF">XF</option>
                        <option value="CF">CF</option>
                      
                </select>
                <button class="select-button" name="sorgu">Sorgula</button>
              </form>


              <canvas id="horizontalBar"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark">

    
    <!--Copyright-->
    <div class="footer-copyright py-3">
    © 2021 Copyright
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <?php
    $ana_tablo = "SELECT araclar.plaka, concat(marka.marka_ad,' ',model.model_ad) as arac,(arac_sofor.toplam_yakit_tuketimi / arac_sofor.kat_edilen_yol) as masraf,
    MONTH(arac_sofor.tarih) as ay, YEAR(arac_sofor.tarih) as yil 
    FROM araclar, arac_sofor, marka, model
    WHERE arac_sofor.plaka=araclar.plaka
    AND araclar.model_id=model.model_id
    AND marka.marka_id=model.marka_id
    and YEAR(arac_sofor.tarih)= '{$_POST[tarih]}'
    GROUP BY arac_sofor.tarih
    HAVING arac LIKE concat('%','{$_POST[arac]}','%')
    ORDER BY ay ASC
    ";
    $ana_result=mysqli_query($connect, $ana_tablo);
    $ana_result2=mysqli_query($connect, $ana_tablo);
    $arac_cek=mysqli_query($connect, $ana_tablo);
  ?>
  <!-- Charts -->
  <script>
    // Bar
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php
              while($row = mysqli_fetch_array($ana_result))  
              {
                if ($row["ay"]=="1"){
                  echo "'"."Ocak"."'".",";
                }
                else if ($row["ay"]=="2"){
                  echo "'"."Şubat"."'".",";
                }
                else if ($row["ay"]=="3"){
                  echo "'"."Mart"."'".",";
                }
                else if ($row["ay"]=="4"){
                  echo "'"."Nisan"."'".",";
                }
                else if ($row["ay"]=="5"){
                  echo "'"."Mayıs"."'".",";
                }
                else if ($row["ay"]=="6"){
                  echo "'"."Haziran"."'".",";
                }
                else if ($row["ay"]=="7"){
                  echo "'"."Temmuz"."'".",";
                }
                else if ($row["ay"]=="8"){
                  echo "'"."Ağustos"."'".",";
                }
                else if ($row["ay"]=="9"){
                  echo "'"."Eylül"."'".",";
                }
                else if ($row["ay"]=="10"){
                  echo "'"."Ekim"."'".",";
                }
                else if ($row["ay"]=="11"){
                  echo "'"."Kasım"."'".",";
                }
                else if ($row["ay"]=="12"){
                  echo "'"."Aralık"."'".",";
                }
                
               
              }
              ?>], //tarihleri çekmek lazım
        datasets: [{
          label: 'Başlık',
          data: [
            <?php
              while($row = mysqli_fetch_array($ana_result2))  
              { 
                 
                echo $row["masraf"].",";
               
              }
              ?>
          ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //pie
    <?php
      $cinsiyet= "SELECT cinsiyet.cinsiyet_ad, round(avg(arac_sofor.kat_edilen_yol/arac_sofor.toplam_yakit_tuketimi),3) as ortalamaYakitTuketimi
      FROM cinsiyet, soforler, arac_sofor
      WHERE cinsiyet.cinsiyet_id=soforler.cinsiyet_id and arac_sofor.tc_no=soforler.tc_no
      GROUP BY cinsiyet.cinsiyet_id";
      $cinsiyet_result= mysqli_query($connect, $cinsiyet);
    ?>
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Kadın", "Erkek"],
        datasets: [{
          data: [
            <?php  
              while($row1 = mysqli_fetch_array($cinsiyet_result))  
              {  
                echo "'".$row1["ortalamaYakitTuketimi"]."',";  
              }  
            ?>
          ],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });
    //BENZİN SORGUSU
    <?php
      $ocak= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.01.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $ocak_result= mysqli_query($connect, $ocak);

      $subat= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.02.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $subat_result= mysqli_query($connect, $subat);

      $mart= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.03.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $mart_result= mysqli_query($connect, $mart);

      $nisan= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.04.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $nisan_result= mysqli_query($connect, $nisan);

      $mayis= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.05.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $mayis_result= mysqli_query($connect, $mayis);

      $haziran= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.06.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $haziran_result= mysqli_query($connect, $haziran);

      $temmuz= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.07.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $temmuz_result= mysqli_query($connect, $temmuz);

      $agustos= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.08.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $agustos_result= mysqli_query($connect, $agustos);

      $eylul= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.09.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $eylul_result= mysqli_query($connect, $eylul);

      $ekim= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.10.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $ekim_result= mysqli_query($connect, $ekim);

      $kasim= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.11.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $kasim_result= mysqli_query($connect, $kasim);

      $aralik= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.12.15')
      and yakit_tedarik.yakit_id = 1
      GROUP BY yakit_tedarik.yakit_id";
      $aralik_result= mysqli_query($connect, $aralik);
    ?>
  //MOTORİN
    <?php
      $ocak= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.01.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $ocak_result2= mysqli_query($connect, $ocak);

      $subat= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.02.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $subat_result2= mysqli_query($connect, $subat);

      $mart= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.03.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $mart_result2= mysqli_query($connect, $mart);

      $nisan= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.04.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $nisan_result2= mysqli_query($connect, $nisan);

      $mayis= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.05.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $mayis_result2= mysqli_query($connect, $mayis);

      $haziran= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.06.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $haziran_result2= mysqli_query($connect, $haziran);

      $temmuz= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.07.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $temmuz_result2= mysqli_query($connect, $temmuz);

      $agustos= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.08.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $agustos_result2= mysqli_query($connect, $agustos);

      $eylul= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.09.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $eylul_result2= mysqli_query($connect, $eylul);

      $ekim= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.10.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $ekim_result2= mysqli_query($connect, $ekim);

      $kasim= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.11.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $kasim_result2= mysqli_query($connect, $kasim);

      $aralik= "SELECT yakit_tedarik.firma_id, avg(yakit_tedarik.yakit_fiyat) as fiyat FROM `yakit_tedarik`
      WHERE yakit_tedarik.tarih= concat('2020','.12.15')
      and yakit_tedarik.yakit_id = 2
      GROUP BY yakit_tedarik.yakit_id";
      $aralik_result2= mysqli_query($connect, $aralik);
    ?>
    //line yakıt fiyatları kırmızı ve mavi, benzin ve dizel
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"],
        datasets: [{
            label: "98 Oktan Benzin",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [
              <?php
                
                while($row1 = mysqli_fetch_array($ocak_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($subat_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($mart_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($nisan_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($mayis_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($haziran_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($temmuz_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($agustos_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($eylul_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($ekim_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($kasim_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($aralik_result))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }

              ?>
            ]
          },
          {
            label: "Motorin",
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            data: [
              <?php
                
                while($row1 = mysqli_fetch_array($ocak_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($subat_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($mart_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($nisan_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($mayis_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($haziran_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($temmuz_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($agustos_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($eylul_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($ekim_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($kasim_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }
                while($row1 = mysqli_fetch_array($aralik_result2))  
                {  
                  echo "'".$row1["fiyat"]."',";  
                }

              ?>
            ]
          }
        ]
      },
      options: {
        responsive: true
      }
    });


    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 90, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 96, 27, 100],
          backgroundColor: [
            'rgba(0, 250, 220, .2)',
          ],
          borderColor: [
            'rgba(0, 213, 132, .7)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

  </script>

  <!--Google Maps-->
  <script src="https://maps.google.com/maps/api/js"></script>
  <script>
    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });
    }


    <?php
    $cinsiyet= "SELECT concat(soforler.sofor_ad,' ',soforler.sofor_soyad) as sofor,
    concat(marka.marka_ad,' ',model.model_ad) as arac, (arac_sofor.toplam_yakit_tuketimi / arac_sofor.kat_edilen_yol) as masraf
    FROM arac_sofor, model, soforler, araclar, marka
    WHERE arac_sofor.tc_no=soforler.tc_no
    AND arac_sofor.plaka=araclar.plaka
    AND araclar.model_id=model.model_id
    AND model.marka_id=marka.marka_id
    AND model.model_ad = '{$_POST[hbar_arac]}'
    Group BY soforler.tc_no
    ";
    $cinsiyet_result= mysqli_query($connect, $cinsiyet);
    ?>

    new Chart(document.getElementById("horizontalBar"), {
      type: "horizontalBar",
      data: {
        labels: [
          <?php
              
              while($row1 = mysqli_fetch_array($cinsiyet_result))  
              {  
                echo "'".$row1["masraf"]."',";  
              }
              ?>
        ],
        datasets: [{
          label: "My First Dataset",
          data: [
            <?php
              
              while($row1 = mysqli_fetch_array($cinsiyet_result))  
              {  
                echo "'".$row1["masraf"]."',";  
              }
              ?>
          ],
          fill: false,
          backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
            "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
          ],
          borderColor: ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
            "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
            "rgb(201, 203, 207)"
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

  </script>
</body>

</html>

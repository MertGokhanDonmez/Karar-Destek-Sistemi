<?php  
$connect = mysqli_connect("localhost", "root", "00000000", "lojistik_yonetim");  

?>


<html>
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
    <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
        <strong class="blue-text">MDB</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About
                MDB</a>
            </li>
            <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                target="_blank">Free
                download</a>
            </li>
            <li class="nav-item">
            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free
                tutorials</a>
            </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
            Çıkış Yap
        </ul>
            
        </div>

    </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action waves-effect">
        <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
        <i class="fas fa-user mr-3"></i>Profile</a>
        <a href="table.php" class="list-group-item list-group-item-action active waves-effect">
        <i class="fas fa-table mr-3"></i>Tables</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
        <i class="fas fa-map mr-3"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
        <i class="fas fa-money-bill-alt mr-3"></i>Orders</a>
    </div>

    </div>
    <!-- Sidebar -->

    </header>
    

    

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <!--Grid column-->
                <div class="col-md-6 mb-4">
                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <h3>Yakıt Tedarikçileri Fiyat Listesi</h3>
                            <div class="form-duzen">
                                <form method="POST">
                                    Fiyatları şöyle listele:
                                    <select class="select-class" name="filtre">
                                        <option value="ASC">Artan</option>
                                        <option value="DESC">Azalan</option>
                                    </select>
                                    <button class="select-button" name="sira">Sırala</button>
                                </form>
                            </div>

                            <!-- Table1  -->
                            <table class="table table-hover">
                                
                                <!-- Table head -->
                                <thead class="red lighten-4">
                                <tr>
                                    <th>Firma</th>
                                    <th>98 Oktan Kurşunsuz Benzin</th>
                                    <th>Motorin</th>
                                </tr>
                                </thead>
                                <!-- Table head -->

                                <!-- Table body -->
                                <tbody>
                                <tr>
                                    <?php
                                        $benzin = "SELECT tedarikciler.firma_ad, yakit_tedarik.yakit_fiyat, yakit_tedarik.firma_id
                                        FROM tedarikciler, yakit_tedarik
                                        WHERE tedarikciler.firma_id=yakit_tedarik.firma_id
                                        AND yakit_tedarik.yakit_id=1
                                        group by tedarikciler.firma_id 
                                        ORDER BY yakit_tedarik.yakit_fiyat {$_POST[filtre]}
                                        " ;
                                        $benzin_result = mysqli_query($connect, $benzin);

                                        $motorin = "SELECT tedarikciler.firma_ad, yakit_tedarik.yakit_fiyat, yakit_tedarik.firma_id
                                        FROM tedarikciler, yakit_tedarik
                                        WHERE tedarikciler.firma_id=yakit_tedarik.firma_id
                                        AND yakit_tedarik.yakit_id=2
                                        group by tedarikciler.firma_id 
                                        ORDER BY yakit_tedarik.yakit_fiyat {$_POST[filtre]}";
                                        $motorin_result = mysqli_query($connect, $motorin);

                                        
                                        while($sorgu=mysqli_fetch_array($benzin_result) and $sorgu2=mysqli_fetch_array($motorin_result))
                                        { ?>
                                            <tr>
                                                
                                                <th scope="row"><?php echo $sorgu['firma_ad']?></th>
                                                <td><?php echo $sorgu['yakit_fiyat']." ₺"?></td>
                                                <td><?php echo $sorgu2['yakit_fiyat']." ₺"?></td>
                                                
                                            </tr>
                                    <?php } ?>
                                </tr>
                                </tbody>
                                <!-- Table body -->
                            </table>
                            <!-- Table  -->
                        </div>
                    </div>
                    <!--/.Card-->
                </div>
            

            

            <!--Grid column-->
            <div class="col-md-6 mb-4">
                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <div class="card-body">
                        <h3>Muayenesi En Yakın 5 Araç</h3>
                        <div class="form-duzen">
                            <form method="POST">
                                Tarihleri şöyle listele:
                                <select class="select-class" name="sure">
                                    <option value="ASC">Artan</option>
                                    <option value="DESC">Azalan</option>
                                </select>
                                <button class="select-button" name="sira">Sırala</button>
                            </form>
                        </div>

                    <!-- Table  -->
                    <table class="table table-hover">
                        
                        <!-- Table head -->
                        <thead class="blue lighten-4">
                        <tr>
                            <th>Plaka</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th>Cins</th>
                            <th>Kalan Süre</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                        <tr>
                        <?php
                            $muayene = "SELECT araclar.plaka, DATEDIFF(araclar.muayene,NOW()) as kalansure, marka.marka_ad, model.model_ad, turler.tur_ad
                            FROM araclar,marka,model,turler
                            WHERE araclar.model_id=model.model_id and marka.marka_id=model.marka_id and turler.tur_id=model.tur_id
                            ORDER BY kalansure {$_POST[sure]}
                            LIMIT 5
                            " ;
                            $muayene_result = mysqli_query($connect, $muayene);

                            while($sorgu=mysqli_fetch_array($muayene_result))
                            { ?>
                                <tr>
                                    
                                    <th scope="row"><?php echo $sorgu['plaka']?></th>
                                    <td><?php echo $sorgu['marka_ad']?></td>
                                    <td><?php echo $sorgu['model_ad']?></td>
                                    <td><?php echo $sorgu['tur_ad']?></td>
                                    <td><?php echo $sorgu['kalansure']?></td>
                                            
                                </tr>
                            <?php } ?>
                        </tr>
                        </tbody>
                        <!-- Table body -->
                    </table>
                    <!-- Table  -->

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            </div>
        </div>
        <div class="container-fluid">
            <div class="row wow fadeIn">
                <!--Grid column-->
                <div class="col-md-6 mb-4">
                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <h4>Firma Bazlı Ortalama Yakıt Tüketimi (lt/km)</h4>
                            <div class="form-duzen">
                                <form method="POST">
                                    Fiyatları şöyle listele:
                                    <select class="select-class" name="tuketim_sirala">
                                        <option value="ASC">Artan</option>
                                        <option value="DESC">Azalan</option>
                                    </select>
                                    <button class="select-button" name="sira">Sırala</button>
                                </form>
                            </div>

                        <!-- Table  -->
                        <table class="table table-hover">
                            <!-- Table head -->
                            <thead class="orange lighten-4">
                            <tr>
                                <th>Firma</th>
                                <th>Ortalama Tüketim</th>
                            </tr>
                            </thead>
                            <!-- Table head -->

                            <!-- Table body -->
                            <tbody>
                            <tr>
                                <?php
                                $tedarikci = "SELECT tedarikciler.firma_ad, round(avg(arac_sofor.toplam_yakit_tuketimi/arac_sofor.kat_edilen_yol),3) as tuketim
                                FROM arac_sofor, tedarikciler, araclar, yakit_tedarik
                                WHERE arac_sofor.plaka=araclar.plaka and araclar.yakit_cins_no=yakit_tedarik.yakit_cins_no
                                and yakit_tedarik.firma_id=tedarikciler.firma_id
                                GROUP BY tedarikciler.firma_id
                                ORDER BY tuketim {$_POST[tuketim_sirala]}
                                " ;
                                $tedarikci_result = mysqli_query($connect, $tedarikci);

                                while($sorgu=mysqli_fetch_array($tedarikci_result))
                                { ?>
                                    <tr>
                                        
                                        <th scope="row"><?php echo $sorgu['firma_ad']?></th>
                                        <td><?php echo $sorgu['tuketim']?></td>
                                                
                                    </tr>
                                <?php } ?>
                            </tr>
                            </tbody>
                            <!-- Table body -->
                        </table>
                        <!-- Table  -->

                        </div>

                    </div>
                    <!--/.Card-->
                </div>
            

            

            <!--Grid column-->
            <div class="col-md-6 mb-4">
                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <div class="card-body">
                        <h3>Şoföre Bağlı Yakıt Tüketimi</h3>
                        <p>Aynı marka-model aracı kullanan şoförlerin verileri</p>
                        <div class="form-duzen">
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
                                <button class="select-button" name="sira">Sorgula</button>
                            </form>
                        </div>
                    <!-- Table  -->
                    <table class="table table-hover">
                        <!-- Table head -->
                        <thead class="purple lighten-4">
                        <tr>
                            <th>Plaka</th>
                            <th>Şoför</th>
                            <th>Aracın Markası</th>
                            <th>Aracın Modeli</th>
                            <th>Aracın Yakıt Masrafı(lt/km)</th>
                        </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                            <?php
                                $tedarikci = "SELECT araclar.plaka, concat(soforler.sofor_ad,' ',soforler.sofor_soyad) as sofor,
                                marka.marka_ad, model.model_ad, 
                                (arac_sofor.toplam_yakit_tuketimi/arac_sofor.kat_edilen_yol) as masraf
                                FROM soforler,arac_sofor,araclar,model,marka
                                WHERE araclar.plaka=arac_sofor.plaka
                                AND soforler.tc_no=arac_sofor.tc_no
                                AND araclar.model_id=model.model_id
                                AND marka.marka_id=model.marka_id
                                AND model.model_ad = '{$_POST[arac]}'                          
                                ";
                                
                                $tedarikci_result = mysqli_query($connect, $tedarikci);
                                

                                while($sorgu=mysqli_fetch_array($tedarikci_result))
                                { ?>
                                    <tr>
                                        
                                        <th scope="row"><?php echo $sorgu['plaka']?></th>
                                        <td><?php echo $sorgu['sofor']?></td>
                                        <td><?php echo $sorgu['marka_ad']?></td>
                                        <td><?php echo $sorgu['model_ad']?></td>
                                        <td><?php echo $sorgu['masraf']?></td>
                                                
                                    </tr>
                            <?php } ?>
                        </tbody>
                        <!-- Table body -->
                    </table>
                    <!-- Table  -->

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            </div>
        </div>
    </main>

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
</body>
</html>
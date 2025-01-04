<?php

include 'config_db/config.php';
require 'config_db/function.php';

    $id=$_GET['updateid'];
    $sql="select * from `produit` where id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $nomProd=$row['nomProd'];
    $description=$row['description'];
    $prix=$row['prix'];
    $quantite=$row['quantite'];
    $stockDispo = $row['stockDispo'];
    $refcategorie=$row['refcategorie'];

if(isset($_POST['updatproduct'])){
    $nomProd=$_POST['nomProd'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
    $quantite=$_POST['quantite'];
    $stockDispo=$_POST['stockDispo'];
    $sql=" UPDATE `produit` set `id`='$id',`nomProd`='$nomProd',`description`='$description',`prix`='$prix',`quantite`='$Qte',`stokDispo`='$stockDispo',`refcategorie`='$refcategorie',`photo`='$image' WHERE `id`='$id' ";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data insert";
        header('location:products.php');
    }
        else{
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Projet tutoré</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="plugins/c3/c3.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <header class="header-top" header-theme="blue">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i
                                class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <h4 class="header">Suivi de la commande/livraison</h4>
                        <!-- ================================== -->
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
        <?php
            include 'slide.php';
        ?>
            <div class="main-content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3>espace produit .</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <form  method="post">
                                    <div class="mb-3">
                                        <label for="field-3" class="form-label">name</label>
                                        <input type="text" name="nomProd" class="form-control" id="field-3" value=<?php echo $nomProd; ?>>
                                        <label for="field-3" class="form-label">description</label>
                                        <input type="text" name="description" class="form-control" id="field-3" value=<?php echo $description; ?>>
                                        <label for="field-3" class="form-label">Prix</label>
                                        <input type="text" name="prix" class="form-control" id="field-3" value=<?php echo $prix; ?>>
                                        <label for="field-3" class="form-label">Quantite</label>
                                        <input type="number" name="quantite" class="form-control" id="field-3" value=<?php echo $quantite; ?>>
                                        <label for="field-3" class="form-label">Stock disponible</label>
                                        <input type="text" name="stockDispo" class="form-control" id="field-3" value=<?php echo $stockDispo; ?>>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="updatproduct">edit</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="w-100 clearfix">
                            <span class="text-center text-sm-left d-md-inline-block">Copyright © 2024 corneilleMak v2.0. All
                                Rights Reserved.</span>
                            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Corneille Mak <i
                                    class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/"
                                    class="text-dark" target="_blank">Byden</a></span>
                        </div>
                    </footer>

                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
            <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
            <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
            <script src="plugins/screenfull/dist/screenfull.js"></script>
            <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
            <script src="plugins/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
            <script src="plugins/moment/moment.js"></script>
            <script src="plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
            <script src="plugins/d3/dist/d3.min.js"></script>
            <script src="plugins/c3/c3.min.js"></script>
            <script src="js/tables.js"></script>
            <script src="js/widgets.js"></script>
            <script src="js/charts.js"></script>
            <script src="dist/js/theme.min.js"></script>
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                    (function (b, o, i, l, e, r) {
                        b.GoogleAnalyticsObject = l; b[l] || (b[l] =
                            function () { (b[l].q = b[l].q || []).push(arguments) }); b[l].l = +new Date;
                        e = o.createElement(i); r = o.getElementsByTagName(i)[0];
                        e.src = 'https://www.google-analytics.com/analytics.js';
                        r.parentNode.insertBefore(e, r)
                    }(window, document, 'script', 'ga'));
                ga('create', 'UA-XXXXX-X', 'auto'); ga('send', 'pageview');
            </script>
</body>

</html>
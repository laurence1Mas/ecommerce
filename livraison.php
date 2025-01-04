
<?php
include 'config_db/config.php';
if(isset($_POST['addlivraison'])){
    $refCommande=$_POST['refCommande'];
    $adresse=$_POST['adresse'];
    $fraisLivraison=$_POST['fraisLivraison'];
    $dateLiv=$_POST['dateLiv'];
    $etatLiv=$_POST['etatLiv'];
    $livreur_id=$_POST['livreur_id'];
    $sql=" INSERT INTO `livraison`( `refCommande`,`livreur_id`,`adresse`,`fraisLivraison`,`dateLiv`,`etatLiv`) VALUES ('$refCommande',$livreur_id,'$adresse','$fraisLivraison','$dateLiv','$etatLiv')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data insert"; 
        header('location:livraison.php');
    }
        else{
        die(mysqli_error($con));
    }
}
if(isset($_POST['addlivraison'])){
    $refCommande=$_POST['refCommande'];
    $etatLiv=$_POST['etatLiv'];
    $sql=" UPDATE commande set etatcom='$etatLiv' where id='$refCommande'";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data insert"; 
        header('location:livraison.php');
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
                        <h4 class="header">suivi de la commande/livraison</h4>
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
                            <h3>Les livraisons du client</h3>
                        </div>
                        <div class="card-body">
                        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">command add</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post">
                                            <div class="mb-3">
                                                <label for="field-3" class="form-label">commande</label>
                                                <?php
                                                    $sql="select * from `vcommande`";
                                                    $result=mysqli_query($con,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                ?>
                                                <select name="refCommande" id="" class="form-control">
                                                    <option>select commande</option>
                                                    <?php
                                                        while($row=mysqli_fetch_assoc($result))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $row["id"];?>"> <?php echo $row["user_id"];?> </option>
                                                    <?php
                                                        } 
                                                    ?>
                                                </select>
                                                <label for="field-3" class="form-label">Livreur</label>
                                                <?php
                                                    $sql="select * from `livreur`";
                                                    $result=mysqli_query($con,$sql);
                                                    $row=mysqli_fetch_assoc($result);
                                                ?>
                                                <select name="livreur_id" id="" class="form-control">
                                                    <option>select commande</option>
                                                    <?php
                                                        while($row=mysqli_fetch_assoc($result))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $row["id"];?>"> <?php echo $row["nom"];?> </option>
                                                    <?php
                                                        } 
                                                    ?>
                                                </select>
                                                <label for="field-3" class="form-label">adresse</label>
                                                <input type="text" name="adresse" class="form-control" id="field-3">
                                                <label for="field-3" class="form-label">frais</label>
                                                <input type="text" name="fraisLivraison" class="form-control" id="field-3">
                                                <label for="field-3" class="form-label">date da livraison</label>
                                                <input type="date" name="dateLiv" class="form-control" id="field-3">
                                                <label for="field-3" class="form-label">etat de la livraison</label>
                                                <input type="text" name="etatLiv" class="form-control" id="field-3">

                                       </div>
                                        <button type="submit" class="btn btn-primary" name="addlivraison">Save</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="d-flex">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demoModal">Add livraison</button><br>
                                <br>
                                        <a href="listelivraison.php" class="btn btn-outline-primary me-2">
                                            Download</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                            <thead class="user-thread">
                                                <tr>
                                                    <th scope="col">##</th>
                                                    <th scope="col">commande</th>
                                                    <th scope="col">livreur</th>
                                                    <th scope="col">adresse</th>
                                                    <th scope="col">frais</th>
                                                    <th scope="col">date </th>
                                                    <th scope="col">etat </th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM `vlivraisons`";
                                                $result = mysqli_query($con, $sql);
                                                if ($result) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $id = $row['id'];
                                                        $refCommande = $row['refcommande'];
                                                        $livreur_id = $row['livreur_id'];
                                                        $adresse = $row['adresse'];
                                                        $fraisLivraison = $row['fraisLivraison'];
                                                        $dateLiv = $row['dateLiv'];
                                                        $etatLiv = $row['etatLiv'];
                                                        echo '<tr>
                                                        <th scope="row">' . $id . '</th>
                                                        <td>' . $refCommande . '</td>
                                                        <td>' . $livreur_id . '</td>
                                                        <td>' . $adresse . '</td>
                                                        <td>' . $fraisLivraison . '</td>
                                                        <td>' . $dateLiv . '</td>
                                                        <td>' . $etatLiv . '</td>
                                                        <td>
                                                            <a href="student-details.php?selectid=' . $id . '" class="btn btn-sm bg-success-light me-2">
                                                                <i class="feather-eye"></i>
                                                            </a>
                                                        <button  class="btn btn-primary"> <a href="edit-livraison.php? updateid=' . $id . '" class="text-light">edit</a> </button>
                                                        <button class="btn btn-danger"name="danger">   <a href="delete-livraison.php? deletedid=' . $id . '" class="text-light">delete</a> </button>
                                                        </td>
                                                        </tr>';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
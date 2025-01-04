<?php 
include 'config_db/config.php';

if(isset($_GET['deletedid'])){
    $id=$_GET['deletedid'];
    $sql=" delete from `livreur` where `id`=$id";
    $result=mysqli_query($con,$sql);
if($result){
    echo "date deleted";
    header('location:livreur.php');
}
else{
    die(mysqli_error($con));
}

}
?>
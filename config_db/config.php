
<?php

$con=new mysqli('localhost','root','','oders_management');
if($con){
    //echo"connection successfull";
}
else{
   die(mysqli_error($con));
}

?>
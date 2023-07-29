<?php
include "config.php";


$vehicle_id=$_GET['vid'];
$sql = "DELETE FROM booked_cars WHERE vehicle_id={$vehicle_id}";

if(mysqli_query($conn,$sql)){
    echo"successfuly deleted";
    //header("Location:http://localhost/rento-html/cars_avail_details.php");
}else{
    echo "<div class='alert alert-danger'>Can't delete User</div> ";
}
mysqli_close($conn);
?>
<?php
include "config.php";


      if(isset($_POST["add_details"])){
      //making connection

      $conn = mysqli_connect("localhost","root","","car_agency") or die("connection failed" . mysqli_connect_error());

        $vehicle_model=mysqli_real_escape_string($conn,$_POST['vehicle_model']);
        $vehicle_number = mysqli_real_escape_string($conn,$_POST["vehicle_number"]); 
        $seating_capacity=mysqli_real_escape_string($conn,$_POST['seating_capacity']);
        $rent_per_day=mysqli_real_escape_string($conn,$_POST['rent_per_day']);


        $sql = "SELECT * FROM availablecars WHERE vehicle_number ='{$vehicle_number}'";
        $result=mysqli_query($conn,$sql) or die("Query Failed");
   
        if(mysqli_num_rows($result)>0){
           echo "<div class='alert alert-danger'>Oops ! This Vehicle number is already made available. </div> ";
        }else{
        $sql1 = "INSERT INTO availablecars(vehicle_model,vehicle_number,seating_capacity,rent_per_day)VALUES('{$vehicle_model}','{$vehicle_number}','{$seating_capacity}','{$rent_per_day}')";
        $result1=  mysqli_query($conn,$sql1) or die("Query Failed");

        if($result1){
            echo "<div class='alert alert-success'>Details addedd sucessfully.</div> ";
        }else{
            echo "<div class='alert alert-success'>Oops ! Something Went Wrong.</div> ";
        }
      }
    }
 ?>                       


<!DOCTYPE html>
<html>
    <head>
         <!--link bootsrap--->
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <!---bootstrap link end--->
    </head>
<body>
<div id="admin-content">
      <div class="container justify-content-center mt-5 p-5 shadow">
          <div class="row">       
              <div class="col-md-6">        
              <h2>Fill the details of cars available for rent</h2><hr/>
                  <!-- Form Start -->      
                  <form action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="vehicle_id"  class="form-control" value="" placeholder="" >
                      </div>
                      <div class="form-group">
                          <label>Vehicle Model</label>
                          <input type="text" name="vehicle_model" class="form-control" value="" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Vehicle Number</label>
                          <input type="text" name="vehicle_number" class="form-control" value="" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Seating Capacity</label>
                          <input type="text" name="seating_capacity" class="form-control" value="" placeholder="" required>
                      </div>

                      <div class="form-group">
                          <label>Rent Per Day</label>
                          <input type="text" name="rent_per_day" class="form-control" value="" placeholder="" required>
                      </div>

                       <button type="submit" class="btn btn-primary btn-block" name="add_details">Add Details</button>
                       
                  </form>
                  <!-- /Form -->
         </div>
            <div class="col-md-6">
                    <img src="https://img.freepik.com/free-vector/fill-out-concept-illustration_114360-5450.jpg" alt="img" class="img-fluid"/>
           </div>
      </div>
  </div>
</div>
</body>
</html>
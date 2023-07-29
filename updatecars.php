<?php
include "config.php";

?>
<?php 
include "adminheader.html";
include "config.php";

if(isset($_POST['submit'])){
   
     $vehicle_id=mysqli_real_escape_string($conn,$_POST["vehicle_id"]);
     $vehicle_model=mysqli_real_escape_string($conn,$_POST["vehicle_model"]);
     $vehicle_number=mysqli_real_escape_string($conn,$_POST["vehicle_number"]);
     $seating_capacity=mysqli_real_escape_string($conn,$_POST["seating_capacity"]);
     $rent_per_day=mysqli_real_escape_string($conn,$_POST["rent_per_day"]);
    

     $sql = "UPDATE availablecars SET vehicle_model='{$vehicle_model}' , vehicle_number='{$vehicle_number}',seating_capacity='{$seating_capacity}',rent_per_day='{$rent_per_day}' WHERE vehicle_id={$vehicle_id}";
     $result=mysqli_query($conn,$sql) or die("Query Failed");
   
        if(mysqli_query($conn,$sql)){
            echo "<div class='alert alert-success'>Details updated successfully</div> ";
            //header("location:http://localhost/rento-html/cars_avail_details.php");
        }else{
            echo"error";
        }
     }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify Car Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php
                  include "config.php";
                 
                  $vehicle_id = $_GET['vid'];
                  $sql = "SELECT * FROM availablecars WHERE vehicle_id={$vehicle_id}";
                  $result = mysqli_query($conn,$sql) or die("fetch and display Query failed");
                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                 ?>
                  <!-- Form Start -->     
                 
                  <form  action="<?php $_SERVER['PHP_SELF'];?>"  method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="vehicle_id"  class="form-control" value="<?php echo $row['vehicle_id'];?>" placeholder="" >
                      </div>


                        <div class="form-group">
                          <label>Vehicle Model</label>
                          <input type="text" name="vehicle_model" class="form-control" value="<?php echo $row['vehicle_model'];?>" placeholder="" required>
                      </div>


                      <div class="form-group">
                          <label>Vehicle Number</label>
                          <input type="text" name="vehicle_number" class="form-control" value="<?php echo $row['vehicle_number'];?>" placeholder="" required>
                      </div>


                      <div class="form-group">
                          <label>Seating Capacity</label>
                          <input type="text" name="seating_capacity" class="form-control" value="<?php echo $row['seating_capacity'];?>" placeholder="" required>
                      </div>


                      <div class="form-group">
                          <label>Rent Per Day</label>
                          <input type="text" name="rent_per_day" class="form-control" value="<?php echo $row['rent_per_day'];?>" placeholder="" required>
                      </div>

                      
                      
                      <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update" required />
                  </form>
                  <!------------Form  ends ---------->
                  <?php } 
                  }               
                  ?>
              </div>
          </div>
      </div>
  </div>

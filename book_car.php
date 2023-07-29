<?php
include "config.php";

if(isset($_POST['submit_info'])){
     $user_name = mysqli_real_escape_string($conn,$_POST["user_name"]);
     $contact_number = mysqli_real_escape_string($conn,$_POST["contact_number"]); 
     $email_id = mysqli_real_escape_string($conn,$_POST["email_id"]);
     $resi_address = mysqli_real_escape_string($conn,$_POST["resi_address"]);
     $days=mysqli_real_escape_string($conn, $_POST["days"]);
     $vehicle_model=mysqli_real_escape_string($conn, $_POST["vehicle_model"]);

     $sql = "SELECT * FROM booked_cars WHERE contact_number ='{$contact_number}'";
     $result=mysqli_query($conn,$sql) or die("Query Failed");

     if(mysqli_num_rows($result)>0){
         echo "<div class='alert alert-danger'>Number already registered.</div> ";         
     }else{
        $sql1 = "INSERT INTO booked_cars(user_name,contact_number,email_id,resi_address,days)VALUES('{$user_name}','{$contact_number}','{$email_id}','{$resi_address}','{$days}')";
        echo $sql1;
        if(mysqli_query($conn,$sql1)){
            echo "<div class='alert alert-success'>Car booked successfully!</div> ";
             }
     }
}

?>
<!doctype html>
<html>
    <head>
       <!--link bootsrap--->
       <link rel="stylesheet" href="css/bootstrap.min.css">
       <!---bootstrap link end--->
    </head>
    <body>
      <div class="container  justify-content-center mt-5 p-5 shadow">
          <div class="row">          
              <div class="col-md-6">
              <h1>Please Fill The Following Information</h1><hr/>


              <?php
                  $vehicle_id = $_GET['vid'];

                  $sql2 = "SELECT vehicle_model FROM availablecars WHERE vehicle_id={$vehicle_id}";

                  $result2= mysqli_query($conn,$sql2) or die("fetch and display Query failed");

                  if(mysqli_num_rows($result2)>0){

                    while($row2 = mysqli_fetch_assoc($result2)){

                 ?>

                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST" autocomplete="off" >
                    
                      <div class="form-group">
                          <label>Your Name</label>
                          <input type="text" name="user_name" class="form-control" placeholder="Enter Name" required>
                      </div>

                      <div class="form-group">                   
                          <label>Contact Number</label>
                          <input type="text" name="contact_number" class="form-control" placeholder=" Enter Contact Number" required>
                      </div>

                      <div class="form-group">
                           <label>Email ID</label>
                          <input type="email_id" name="email_id" class="form-control" placeholder="Enter Email ID" required>
                      </div>

                      <div class="form-group">
                           <label>Residential Address</label>
                          <input type="address" name="resi_address" class="form-control" placeholder="Enter Residential Address" required>
                      </div>


                      <div class="form-group">
                          <label>Number of days</label>
                          <select class="form-control" name="days" >
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                          </select>
                      </div>
                   
            <div class="form-group">
            <label>Vehicle Model</label>
               
                          <input type="text" name="vehicle_model" class="form-control" placeholder="Enter Residential Address" value="<?php echo $row2['vehicle_model'];?>" required>
                      

                    </div>

                      <button type="submit"  name="submit_info" class="btn btn-primary btn-block">Submit info</button>

                   <!-- Form End-->
                   <?php } } ?>
               </div>

               <div class="col-md-6">
                 <img src="images/login.jpg" alt="img" class="img-fluid" />
                </div> 

        </div>
   </div>
 </div>
       
</body>
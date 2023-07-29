<?php

include "config.php";

if(isset($_POST['sign_up'])){
     $user_name = mysqli_real_escape_string($conn,$_POST["user_name"]);
     $user_email = mysqli_real_escape_string($conn,$_POST["user_email"]); 
     $user_address = mysqli_real_escape_string($conn,$_POST["user_address"]);
     $user_phone = mysqli_real_escape_string($conn,$_POST["user_phone"]);
     $password=mysqli_real_escape_string($conn, $_POST["password"]);
     $sql = "SELECT * FROM signupusers WHERE user_email ='{$user_email}'";
     $result=mysqli_query($conn,$sql) or die("Query Failed");

     if(mysqli_num_rows($result)>0){
         echo "<div class='alert alert-danger'>This username already exists</div> ";         
     }else{
        $sql1 = "INSERT INTO signupusers(user_name,user_email,user_address,user_phone,password)VALUES('{$user_name}','{$user_email}','{$user_address}','{$user_phone}','{$password}')";

        if(mysqli_query($conn,$sql1)){
            header("location:http://localhost/rento-html/userlogin.php");      
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
              <h1>Sign Up</h1><hr/>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST" autocomplete="off" >
                    
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user_name" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">                   
                          <label>Email</label>
                          <input type="email" name="user_email" class="form-control" placeholder="Email" required>
                      </div>

                      <div class="form-group">
                           <label>Address</label>
                          <input type="text" name="user_address" class="form-control" placeholder="Address" required>
                      </div>

                      <div class="form-group">
                           <label>Contact Number</label>
                          <input type="text" name="user_phone" class="form-control" placeholder="Contact" required>
                      </div>

                      <div class="form-group">
                           <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                    
                      <button type="SignUp"  name="sign_up" class="btn btn-primary btn-block"> Sign Up</button>
                       <p>Already Signed Up ?<a href="userlogin.php">Sign_In</a></p>
                   <!-- Form End-->
               </div>

               <div class="col-md-6">
                 <img src="images/login.jpg" alt="img" class="img-fluid" />
                </div> 
        </div>
           </div>
       </div>
       </body>
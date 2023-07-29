<?php
session_start();

    if(isset($_POST["admin_login"])){
      //making connection
        $conn = mysqli_connect("localhost","root","","car_agency") or die("connection failed" . mysqli_connect_error());
        $admin_name=mysqli_real_escape_string($conn,$_POST['admin_name']);
        $admin_email = mysqli_real_escape_string($conn,($_POST["admin_email"])); 
        $password=mysqli_real_escape_string($conn,$_POST['password']);

        $sql="SELECT * FROM admin_login WHERE admin_name='{$admin_name}' AND admin_email='{$admin_email}' AND password='{$password}'";
         $result=mysqli_query($conn,$sql) or die("Query failed");
        
         if(mysqli_num_rows($result)>0){
                 while($row=mysqli_fetch_assoc($result)){
                $_SESSION['admin_name']=$row['admin_name'];
                 $_SESSION['customer_id']=$row['customer_id'];
                 $_SESSION['admin_email']=$row['admin_email'];
                 header("location:http://localhost/rento-html/cars_avail_details.php");
                }
         }
        else{
                 echo "<div class='alert alert-danger'>Username and password does not match</div> ";
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
 <div class="container justify-content-center mt-5 p-5 shadow">
  <div class="row">
     <div class="col-md-6">
        <!---login form--->
        <h1>Admin Sign In</h1><hr/>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="mt-5">
        <div class="form-group">
    <label for="uname">Username:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="admin_name" required>
    
  </div>

  <div class="form-group">
    <label for="uname">Email:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="admin_email" required>
    
  </div>


  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    
  </div>
  
  <button type="submit" class="btn btn-primary btn-block" name="admin_login">Sign In </button>
  <p>Go back to Sign up page ? <a href="userlogin.php">Sign_Up</a></p>
      </form>
    </div> 

    <div class="col-md-6">
       <img src="https://media.mktg.workday.com/is/image/workday/illustration-people-login?fmt=png-alpha&wid=1000" alt="img" class="img-fluid" />
     </div> 


</div>
</div>
</body>
                    
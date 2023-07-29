<?php
session_start();
include "config.php";

    if(isset($_POST["login"])){
        $user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        // $password = md5($_POST['password']);
        // echo $password;

        $sql="SELECT * FROM signupusers WHERE user_name='{$user_name}' AND password='{$password}'";
        $result=mysqli_query($conn,$sql) or die("Query failed");
        
        if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION['user_name']=$row['user_name'];
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['user_email']=$row['user_email'];          
              
                header("location:http://localhost/rento-html/check_cars_available.php");      
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
        <h1>Sign In</h1><hr/>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="mt-5">
        <div class="form-group">
    <label for="uname">Username:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="user_name" required>
    
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    
  </div>
  
  <button type="submit" class="btn btn-primary btn-block" name="login">SignIn</button>
  <p>Go back to Sign up page ? <a href="usersignup.php">Sign_Up</a></p>
      </form>
    </div> 
    <div class="col-md-6">
       <img src="images/login.jpg" alt="img" class="img-fluid" />
     </div> 


</div>
</div>
</body>
</html>
                    
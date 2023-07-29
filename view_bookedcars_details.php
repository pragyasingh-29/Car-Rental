<?php
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body> 
<div id="admin-content">
    <?php
    include "adminheader.html";
    ?>
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="mt-5">Cars booked Details</h1><br/>
              </div>
              <div class="col-md-12">
              <?php
                     include "config.php";
                     $limit=4;
                     $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                     //$page=$_GET["page"];
                     $offset=($page-1)* $limit;
                     $sql = "SELECT * FROM booked_cars ORDER BY user_id DESC LIMIT {$offset},{$limit}";
                     $result = mysqli_query($conn,$sql) or die("Query1 failed");
                     if(mysqli_num_rows($result)>0){
                    ?>
                  <table class="table-responsive table-bordered table-striped table-content">
                      <thead>
                          
                          <th class="pr-5 pl-5 pt-3 pb-3 text-center">USER ID</th>
                          <th class="pr-5 pl-5 text-center">USER NUMBER</th>
                          <th class="pr-5 pl-5 text-center">CONTACT NUMBER</th>
                          <th class="pr-5 pl-5 text-center">EMAIL ID</th>
                          <th class="pr-5 pl-5 text-center">RESIDENTIAL ADDRESS</th>
                          <th class="pr-5 pl-5 text-center">NUMBER OF DAYS</th>
                          <th class="pr-5 pl-5 text-center">VEHICLE_MODEL</th>
                          <th class="pr-5 pl-5 text-center">DELETE</th>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                          <tr>
                          <td class="pt-3 pb-3 text-center"><?php echo $row['user_id'];?></td>
                              <td class="pt-3 pb-3 text-center"><?php echo $row['user_name'];?></td>
                              <td class="pt-3 pb-3 text-center"><?php echo $row['contact_number'];?></td>
                              <td class="m-5 text-center"><?php echo $row['email_id'];?></td>
                              <td class="m-5 text-center"><?php echo $row['resi_address'] ?></td>
                              <td class="m-5 text-center"><?php echo $row['days'] ?></td>
                              <td class="m-5 text-center"><?php echo $row['vehicle_model'] ?></td>                            
                              <td class="mx-5 text-center"><a href='delete_details_user.php?vid=<?php echo $row["vehicle_id"]?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  <?php
                 } 
                  
                 $sql1 = "SELECT * FROM availablecars";
                 $result1=mysqli_query($conn,$sql1) or die("query2 failed");
                 if(mysqli_num_rows($result1)>0){
                    $total_records=mysqli_num_rows($result1);
                    $total_page=ceil($total_records / $limit);
                      
                    echo "<ul class='pagination admin-pagination justify-content-center mt-5'>";
                    if($page>1){
                    echo '<li class="page-item"><a class="page-link" href="view_bookedcars_details.php?page='.($page - 1).'">Prev</a></li>';
                    }
                    for($i=1;$i<=$total_page;$i++){
                        if($i == $page){
                            $active="active";
                        }else{
                            $active="";
                        }
                        echo '<li class="'.$active.' page-item"><a class="page-link" href="view_bookedcars_details.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($page<$total_page){
                    echo '<li class="page-item"><a class="page-link" href="view_bookedcars_details.php?page='.($page + 1).'">Next</a></li>';
                    }
                    echo"</ul>";
                 }
                  ?>
                 
              </div>
          </div>
      </div>
  </div>
</body>
</html>

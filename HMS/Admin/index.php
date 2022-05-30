<?php
include("../Admin/include/include.php");
$q="select * from admin";
 $go=mysqli_query($attach,$q);
$run=mysqli_num_rows($go);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
     
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-2" style="margin-left:-20px;">
                 <?php
                 include('sidenav.php');
                 ?>
             </div>
             <div class="col-md-10">
                 <h5 class="text-center">Admin Dashboard</h5>
                       <div class="col-md-12 my-1" >
                           <div class="row">
                               <div class="col-md-3 bg-success mx-1" style="height:120px;">
                                        <div class="row">
                                            <div class="col-md-12 text-center mt-3">
                                            <i class="bi bi-person-check"></i>
                                                <h5>Admin</h5>
                                                <h5 class="text-white"><?php echo  $run ?></h5>
                                            </div>
                                        </div>
                               </div>
                               <div class="col-md-3 bg-info mx-1" style="height:120px;">
                               <div class="row">
                                            <div class="col-md-12 text-center mt-3">
                                                <i class="bi bi-activity"></i>
                                                <h5>Doctor</h5>
                                                <h5 class="text-white">1</h5>
                                            </div>
                                        </div>
                               </div> 
                               <div class="col-md-3 bg-danger mx-1" style="height:120px;">
                               <div class="row">
                                            <div class="col-md-12 text-center mt-3">
                                                 <i class="fa fa-bed" aria-hidden="true"></i>
                                                <h5>Patient</h5>
                                                <h5 class="text-white">1</h5>
                                            </div>
                                        </div>
                               </div>
                               <div class="col-md-3 bg-danger mx-1 my-1" style="height:120px;">
                               <div class="row">
                                            <div class="col-md-12 text-center mt-3">
                                            <i class="fa fa-plus-square"></i>
                                                <h5>Report</h5>
                                                <h5 class="text-white">1</h5>
                                            </div>
                                        </div>
                               </div> 
                               <div class="col-md-3 bg-success mx-1 my-1" style="height:120px;">
                               <div class="row">
                                            <div class="col-md-12 text-center mt-3">
                                            <i class="fa fa-book"></i>
                                                <h5>Job Request</h5>
                                                <h5 class="text-white">1</h5>
                                            </div>
                                        </div>
                               </div>
                               <div class="col-md-3 bg-secondary mx-1 my-1" style="height:120px;">
                               <div class="row">
                                            <div class="col-md-12 text-center mt-3">
                                            <i class="fa fa-usd"></i>
                                                <h5>Income</h5>
                                                <h5 class="text-white">1</h5>
                                            </div>
                                        </div>
                               </div>
                           </div>
                       </div>
             </div>
             

         </div>
     </div>
</body>
</html>
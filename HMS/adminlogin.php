<?php
include('include/DB.php');
session_start();
if(!isset($_SESSION['Admin_Login']))
{
if(isset($_REQUEST['Login']))
{
    $Admin_Nam=$_REQUEST['Name'];
    $Admin_Pass=$_REQUEST['Pass'];
     if(empty($Admin_Nam AND $Admin_Pass))
     {
         $Show="FiLL All Filed";
     }
     else
     {
         $query="SELECT A_Name,A_pass FROM admin where A_Name='$Admin_Nam' AND A_pass='$Admin_Pass'";
         $go=mysqli_query($attach,$query);
         $run=mysqli_num_rows($go);
         if($run>0)
         {
             $Show="Login";
             $_SESSION['Admin_Login']=$Admin_Nam;
              header("location:Admin/index.php");
         }
         else
         {
             $Show="Not Login";
         }
    }
}
}
else
{
    echo "<script>location.href='adminlogin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lagoin</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" 
    integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 shadow ">
            <div class="text-center mb-5"><h3>Admin Login</h3></div>
                <form action="" method="post" class="mt-3">
                    <label for="">Username</label>
                    <input type="text" placeholder="Enter UserName" name="Name" class="form-control mb-3">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter Password" name="Pass" class="form-control mb-3">
                    <button type="submit" name="Login" class="btn btn-dark mb-2 active" role="button" aria-pressed="true">Login</button>
                    <button type="cancel" class="btn btn-dark mb-2 active" role="button" aria-pressed="true">Cancel</button>
               <?php
                    if(isset($Show))
                {
                    echo $Show;
                }
                ?>
                </form>
                
            </div>
        </div>
    </div>
    
</body>
</html>
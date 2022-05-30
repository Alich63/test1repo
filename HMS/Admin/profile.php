<?php
include("include/include.php");
$session=$_SESSION['Admin_Login'];

$q="select * from admin where A_Name='$session'";
$move=mysqli_query($attach,$q);
while($run=mysqli_fetch_array($move))
{
       $name=$run['A_Name'];
       $pix=$run['A_profile'];
       $A_id=$run['Admin_id'];       
}

if(isset($_REQUEST['upbutton']))
{
    $fil=$_FILES['updateprofile']['name'];
    $tmp=$_FILES['updateprofile']['tmp_name'];
    $up="update admin set A_profile='$fil' where Admin_id='$A_id' && A_Name='$session'";
    $imp=mysqli_query($attach,$up);
    if($imp)
    {
        $detail=move_uploaded_file($tmp,"adminimg/".$fil);
        if($detail==true)
        {
            echo "Update";
        }
        else
        {
            echo "Not Update";
        }
    }
    else
    {
        echo "not update";
    }
}
if(isset($_REQUEST['setpass']))
{
    $fil=$_REQUEST['pw'];
    $up="update admin set A_pass='$fil' where Admin_id='$A_id' && A_Name='$session'";
    $imp=mysqli_query($attach,$up);
    if($imp)
    {
        echo "Set Password Successful";
    }
    else
    {
        echo "Not Set Pass";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="container-fluid">
         <div class="row">
             <div class="col-md-2" style="margin-left:-20px;">
                 <?php
                 include('sidenav.php');
                 ?>
             </div>
             <div class="col-md-10 text-center">
                 <div class="row">
                     <div class="col-md-6">
                         <h3><?php echo $name ?></h3>
                         <form action="" method="post" enctype="multipart/form-data">
                         <img src="adminimg/<?php echo $pix?>" height="100"><br><br
                         <label for=""><h3>Update Profile Pix</h3></label>
                         <input type="file" name="updateprofile" class="form-control" accept="image/*" required>
                         <button class="btn btn-dark mt-3" type="submit" name="upbutton">Update</button>
                         </form>
                         
                     </div>
                     <div class="col-md-6">
                         <form action="profile.php" method="post">
                             <label for="">Password</label>
                             <input type="text" name="pw" placeholder="Enter New Password" class="form-control" required>
                             <button type="submit" name="setpass" class="btn btn-dark mt-5">Set New Password</button>
                             <button type="cancel" name="" class="btn btn-dark mt-5">Cancel</button>
                         </form>
                     </div>
                 </div>
             </div>
    </div>
</div>
</body>
</html>
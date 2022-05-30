<?php
include("../Admin/include/include.php");

 if(isset($_GET['admin_id'])) //jub user remove pr click kry ga ye walla fuction chllly ga
     {
      $ad_id=$_GET['admin_id'];
      $q="delete from admin where Admin_id='$ad_id'"; 
      $run=mysqli_query($attach,$q);
      if($run)
      {
        echo "<script>alert('Delete');</script>";
      }
        else
     { 
        echo "<script>alert('Not Delete');</script>";
     }
}

if(isset($_REQUEST['add']))
{
    $nam=$_REQUEST['Name'];
    $pw=$_REQUEST['Pass'];
    $imgnam=$_FILES['File_up']['name'];
    $imgsize=$_FILES['File_up']['size'];
    $imgtmp=$_FILES['File_up']['tmp_name'];
    $imgtyp=$_FILES['File_up']['type'];
    $insert="insert into admin (A_name,A_pass,A_profile) values('$nam','$pw','$imgnam')";
    $run=mysqli_query($attach,$insert);
    if($run)
    {   if(!$imgnam==NULL)
        {
            move_uploaded_file($imgtmp,"adminimg/".$imgnam);
            echo "Data Uploaded";
        }
        else
        {
            echo "Empty";
        }
        
    }
    else
    {
        echo "Not Uploaded";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                 <div class="row">
                     <div class="col-md-6">
                         <h5 class="text-center">All Admin</h5>
                         <table class="table table-bordered">
                           <th>ID</th>
                           <th>UserName</th>
                           <th>Action</th>
                           <th>Profile_Pix</th>
                         <?php
                         $adm=$_SESSION['Admin_Login'];
                         $q="select * from admin";
                         $move=mysqli_query($attach,$q);
                         while($row=mysqli_fetch_array($move))
                         {
                             ?>
                             <!-- $id=$row['Admin_id'];
                             $username=$row['A_Name']; -->
                             
                             <tr>
                               <td><?php echo $row['Admin_id'] ?></td>
                               <td><?php echo$row['A_Name'] ?></td>
                               <td><button onclick='return myfun()' class='btn-danger btn'><a href='admin.php?admin_id=<?php echo $row['Admin_id'] ?>'>
                               Remove</a></button></td>
                               <td><img src="adminimg/<?php echo $row['A_profile']; ?>" height="100px" width="100px"></td>
                           </tr>
                                 
                        <?php
                         }
                         ?>        
                         </table>
                         <?php
                         if(isset($show))
                         {
                             echo $show;
                         }
                         ?>
                     </div>
                     <div class="col-md-6">
                         <h5 class="text-center">Add Admin</h5>
                         <form action="" method="post" enctype="multipart/form-data">
                             <div class="form-group">
                                 <label for="">Admin Name</label>
                                 <input type="text" class="form-control" placeholder="Name" name="Name" value="" required>
                             </div>
                             <div class="form-group">
                                 <label for="">Admin_Pass</label>
                                 <input type="text" class="form-control" placeholder="Password" name="Pass" value="" required>
                             </div>
                             <div class="form-group">
                                 <label for="">Admin Profile</label>
                                 <input type="File" class="form-control" placeholder="Admin" name="File_up" value="" required>
                             </div>

                             <button type="Submit" name="add" value="" class="btn btn-danger">Add</button>
                             <button type="cancel"  value="" class="btn btn-danger">Cancel</button>
                         </form>
                     </div>
                 </div>

             </div>
         </div>
     </div>
     
<script>
    function myfun()
    {
        return confirm("Do You Want TOo Delete Record");
    }
</script>
    
</body>
</html>
<?php 
include('connect.php');
session_start();
if(isset($_SESSION['id']))
{
    header('location:../partials/dashboard.php');
}
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$std=$_POST['std'];
$sql="select * from userdata where username='$username' and mobile='$mobile' and password='$password' and standard='voter'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
     $sql="select username,photo,votes,id from userdata where standard='group'";
     $resultgroup=mysqli_query($con,$sql); 
     if(mysqli_num_rows($resultgroup)>0){
         $groups=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
         $_SESSION['groups']= $groups;
     }
     $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $_SESSION['id']=$data['id'];
     $_SESSION['status']=$data['status'];
     $_SESSION['data']=$data;
    
     echo '<script>
    window.location="../partials/dashboard.php";
    </script>';
}
else{
    echo '<script>
    alert("Invalid credentials or you  are group ");
    window.location="../login.html";
    </script>';
}


?>

<?php 
include('connect.php');
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword']; 
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$std=$_POST['std'];

if($password=="" || $password!=$cpassword){
    echo '<script>
    alert("Invalid credientials");
    window.location="../register.html";
    </script>';
}
else{
     if($std=='group')
     {
        move_uploaded_file($tmp_name,"../uploads/$image");
        $sql="insert into userdata (username,mobile,password,photo,standard,status,votes) values ('$username',0,'$password','$image','$std',0,0)";
        $result=mysqli_query($con,$sql);
     }
     else
     {
    move_uploaded_file($tmp_name,"../uploads/$image");
    $sql="insert into userdata (username,mobile,password,photo,standard,status,votes) values ('$username','$mobile','$password','$image','$std',0,0)";
    $result=mysqli_query($con,$sql);
     }

    if($result)
    {
        echo '<script>
        alert("Registration succesfull");
        window.location="../";
        </script>';
    }
}

  
?>

<?php
if (isset($_POST['addUser'])) {
require "dbh.inc.php";

$username = $_POST['userName'];
$password = $_POST['userPass'];
$passwordcon = $_POST['userPassCon'];
$fullname = $_POST['fullName'];
$userRole = $_POST['userRole'];
$stmt = mysqli_stmt_init($conn);

if (empty($username)||empty($password)||empty($passwordcon)||empty($fullname)||empty($userRole)) {
  header("Location:../registeruser.php?error=emptyfields");
  exit();
}
else{
    if($password!=$passwordcon){
        header("Location:../registeruser.php?error=similarpassword");
        exit();
    }else{
      if ($userRole=='Staff') {
        $sql1 = "INSERT INTO staff_details(user_username,user_fullname,user_password,user_role) values ('$username','$fullname',SHA2('$password',256),'$userRole')";
        if(!mysqli_query($conn,$sql1)){
            die('Error:'.mysqli_error($conn));
            header("Location:../registeruser.php?error=error1".$username);
            exit();
            }
            else{
              header("Location:../users.php?success=success");
              exit();
            }
      }elseif ($userRole=='Manager') {
        $sql1 = "INSERT INTO staff_details(user_username,user_fullname,user_password,user_role) values ('$username','$fullname',SHA2('$password',256),'$userRole')";
        if(!mysqli_query($conn,$sql1)){
          die('Error:'.mysqli_error($conn));
          header("Location:../registeruser.php?error=error1".$username);
          exit();
          }
        $sql2 = "INSERT INTO manager_details(user_username,user_fullname,user_password,user_role) values ('$username','$fullname',SHA2('$password',256),'$userRole')";
        if(!mysqli_query($conn,$sql2)){
            die('Error:'.mysqli_error($conn));
            header("Location:../registeruser.php?error=error2".$username);
            exit();
            }
            else{
              header("Location:../users.php?success=success");
              exit();
            }
      }


    }

}
 
mysqli_stmt_close($stmt);
mysqli_close($conn);
}else{
  header("Location:../registeruser.php");
  exit();
}
 ?>
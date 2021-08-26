<?php
if (isset($_POST['logUser'])) {
require "dbh.inc.php";

$userName = $_POST['userName'];
$userPass = $_POST['userPass'];
$userRole = $_POST['userRole'];


if (empty($userName)||empty($userRole)||empty($userPass)) {
  header("Location:../users.php?error=emptyfields");
  exit();
}
else{
if ($userRole == 'Staff') {

  $sql = "SELECT * FROM staff_details WHERE user_username ='".$userName."' AND user_password = SHA2('".$userPass."',256)";

  $result = $conn->query($sql);

  if(mysqli_num_rows($result)==1){
    header("Location:../staff.php?success=loggedIn");
    exit();
  }else{
    echo "You have entered incorrect username or password";
    exit();
  }

}elseif ($userRole == 'Manager') {
  $sql = "SELECT * FROM manager_details WHERE user_username ='".$userName."' AND user_password = SHA2('".$userPass."',256)";

  $result = $conn->query($sql);

  if(mysqli_num_rows($result)==1){
    header("Location:../manager.php?success=loggedIn");
    exit();
  }else{
    echo "You have entered incorrect username or password";
    exit();
  }

}

}

}else{
  header("Location:../users.php");
  exit();
}
 ?>
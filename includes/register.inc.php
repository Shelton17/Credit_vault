<?php
if (isset($_POST['addCard'])) {
require "dbh.inc.php";

$key_string = 'pass123';
$cardHolderNumber = $_POST['cardHolderNumber'];
$cardHolderFirst = $_POST['cardHolderFirst'];
$cardHolderLast = $_POST['cardHolderLast'];
$cardNo = $_POST['cardNo'];
$cardExpiry = $_POST['cardExpiry'];
$cardCVV = $_POST['cardCVV'];
$stmt = mysqli_stmt_init($conn);

if (empty($cardHolderNumber)||empty($cardHolderFirst)||empty($cardHolderLast)||empty($cardNo)||empty($cardExpiry)||empty($cardCVV)) {
  header("Location:../staff.php?error=emptyfields");
  exit();
}

$sql1 = "INSERT INTO customer_details(cardholder_account_no,cardholder_first_name,cardholder_last_name) values (AES_ENCRYPT('$cardHolderNumber','$key_string'),'$cardHolderFirst','$cardHolderLast')";
if(!mysqli_query($conn,$sql1)){
die('Error:'.mysqli_error($conn));
header("Location:../staff.php?error=error2".$cardHolderNumber);
exit();
}

$sql2 = "INSERT INTO card_details(card_number,card_expiry_date,card_cvv,cardholder_account_no) values (AES_ENCRYPT('$cardNo','$key_string'),'$cardExpiry',AES_ENCRYPT('$cardCVV','$key_string'),AES_ENCRYPT('$cardHolderNumber','$key_string'))";
if(!mysqli_query($conn,$sql2)){
die('Error:'.mysqli_error($conn));
header("Location:../staff.php?error=error3".$cardHolderNumber);
exit();
}
else{
  header("Location:../staff.php?success=success");
  exit();
}
  
mysqli_stmt_close($stmt);
mysqli_close($conn);
}else{
  header("Location:../staff.php");
  exit();
}
 ?>

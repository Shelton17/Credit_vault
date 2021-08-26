<?php
  require "dbh.inc.php";
    if (isset($_POST['delCustomer'])) {

    $cardHolder = $_POST['cardHolderNumber1'];

    $sql = "DELETE FROM customer_details WHERE  cardholder_account_no = '$cardHolder'";
    if(!mysqli_query($conn,$sql)){
            die('Error:'.mysqli_error($conn));
            header("Location:../manager.php?error=error1");
            exit();
        }
        header("Location:../manager.php?sucess=customerdeleted");
        exit();
    }elseif (isset($_POST['delCard'])) {
        # code...
        $cardNumber = $_POST['cardNo1'];
        $sql = "DELETE FROM card_details WHERE card_number = '$cardNumber'";
        if(!mysqli_query($conn,$sql)){
            die('Error:'.mysqli_error($conn));
            header("Location:../manager.php?error=error2");
            exit();
        }
        header("Location:../manager.php?sucess=carddeleted");
        exit();
    }elseif (isset($_POST['delUser'])) {
        # code...
        $userName = $_POST['userName'];
        $sql = "DELETE FROM staff_details WHERE user_username = '$userName'";
        if(!mysqli_query($conn,$sql)){
            die('Error:'.mysqli_error($conn));
            header("Location:../manager.php?error=error3");
            exit();
        }
        $sql = "DELETE FROM manager_details WHERE user_username = '$userName'";
        if(!mysqli_query($conn,$sql)){
            die('Error:'.mysqli_error($conn));
            header("Location:../manager.php?error=error3");
            exit();
        }
        header("Location:../manager.php?sucess=userdeleted");
        exit();
    }else{
        header("Location:../manager.php?sucess=success");
        exit();
    }
 ?>

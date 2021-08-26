<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword="";
$dBName="credit_vault_db";
$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
//checking if their is a fann_get_total_connections
if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
?>

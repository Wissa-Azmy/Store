<?php
/**
 * Created by PhpStorm.
 * User: wissaazmy
 * Date: 1/25/16
 * Time: 2:57 PM
 */
session_start();
if(!isset($_SESSION["manager"])){
    header("location:admin_login.php");
    exit();
}
$id = preg_replace('#[^0-9]#i',"", $_SESSION['id']);
$adminUser = preg_replace('#[^A-Za-z0-9]#i',"", $_SESSION['manager']);
$password = preg_replace('#[^A-Za-z0-9]#i',"", $_SESSION['password']);

include '../scripts/db-connect.php';

$query = "SELECT * FROM admin WHERE id='$id' AND username='$adminUser' AND password='$password'";
$sql = mysqli_query($connection, $query);

$existCount = mysqli_num_rows($sql);

if($existCount == 0){
    unset($_SESSION['manager']);
    header("location:../index.php");
    exit();
}
?>
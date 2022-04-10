<?php
session_start();
include "connection.php";

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    $sql = "select * from user where
    username='$username' and password='$password'";
    $hasil = mysqli_query($connect, $sql);
    echo $sql;

   if (mysqli_num_rows($hasil) > 0) {
       $user = mysqli_fetch_array($hasil);
       $_SESSION["user"] = $user;
       header("location:list-user.php");
   } else {
        header("location:login.php");
   }
}
?>
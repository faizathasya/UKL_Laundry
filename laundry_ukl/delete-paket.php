<?php
include 'connection.php';

$id_paket = $_GET['id_paket'];
//echo $id_paket

// memberikan perintah sql
$sql ="delete from paket where id_paket = '".$id_paket."'" ;

$result = mysqli_query($connect,$sql);

if ($result) {
    header('Location:list-paket.php');
} else {
    printf('Gagal ya'.mysqli_error($connect));
    exit();
}

?>
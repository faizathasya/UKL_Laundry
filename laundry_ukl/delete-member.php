<?php
include 'connection.php';

$id_member = $_GET['id_member'];
//echo $id_member

//memberikan perintah sql
$sql ="delete from member where id_member = '".$id_member."'" ;

$result = mysqli_query($connect,$sql);

if ($result) {
    header('Location:list-member.php');
} else {
    printf('Gagal ya'.mysqli_error($connect));
    exit();
}

?>
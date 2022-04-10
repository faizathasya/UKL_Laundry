<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Paket</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font.css">
</head>
<body>
<div class="container">
        <div class="card">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top mb-2">
        <a href="form-transaksi.php" class="navbar-brand">Laundry</a>

        <ul class="navbar-nav">
        <li class="nav-item dropdown">
                <a href="list-transaksi.php" class="nav-link log">
                    Transaksi
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="list-paket.php" class="nav-link log">
                    Paket
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="list-user.php" class="nav-link log">
                    User
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="list-member.php" class="nav-link log">
                    Member
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="login.php" class="nav-link log">
                    Logout
                </a>
            </li>
        </ul> 
    </nav>
            <div class="container">
                <div class="card">
                <div class="card-header bg-secondary">
                <h4 class="text-white">
                    Data Paket Laundry
                </h4>
            </div>

            <div class="card-body">
                <form action="list-paket.php" method ="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from paket 
                        where jenis like '%$search%' 
                        or harga like '%$search%' 
                        or id_paket like '%$search%'";
                    }else {
                        $sql = "select * from paket";
                    }
                    # eksekusi SQL
                    $hasil = mysqli_query($connect, $sql);
                    while ($paket = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-8">
                                    <!-- untuk deskripsi paket -->
                                    <h5><?=$paket["jenis"]?></h5>
                                    <h6>ID paket : <?=$paket["id_paket"]?></h6>
                                    <h6>Harga /kg: <?=$paket["harga"]?></h6>
                                </div>
                                <div class="col-lg-4">
                                    <a href="form-paket.php?id_paket=<?=$paket["id_paket"]?>">
                                        <button class="btn btn-info btn-block">
                                         Edit
                                         </button>
                                    </a>

                                    <div class="card-footer">
                                      <a href="process-paket.php?id_paket=<?=$paket["id_paket"]?>"
                                         onclick="return confirm('Are you sure?')">
                                    </div>
                                        <button class="btn btn-danger btn-block">
                                          Hapus
                                        </button>
                                      </a>
                                    
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="card-footer">
                <a href="form-paket.php"> 
                    <button class="btn btn-success">
                        Tambah Data paket
                    </button>
                </a>
            </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
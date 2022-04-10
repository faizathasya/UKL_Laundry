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
    <title>List User</title>
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
                     <!-- card header -->
            <div class="card-header bg-secondary">
                <h4 class="text-white"> Data User Laundry</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!-- kotak pencarian data anggota -->
                <form action="list-user.php" method="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian" required />
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat loadd halaman ini,
                        # akan mengecek apakah data dengan method
                        # GET yg bernama_user "search"
                        $search = $_GET ["search"];
                        $sql = "select * from user
                        where id_user like '%$search%'
                        or nama_user like '%$search%' 
                        or role like '%$search%'
                        or username like '%$search%'";
                    } else {
                        $sql = "select * from user";
                    }
                    
                    //eksekusi perintah SQL
                    $query = mysqli_query($connect, $sql);
                    while ($user = mysqli_fetch_array($query)) {?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data anggota -->
                            <div class="col-lg-8 col-md-10">
                                <h6>ID user : <?php echo $user["id_user"];?></h6>
                                <h5>Nama  : <?php echo $user["nama_user"];?></h5>
                                <h6>Username : <?php echo $user["username"];?></h6>
                                <h6>Role : <?php echo $user["role"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan -->
                            <div class="col-lg-4 col-md-2">
                                <a href="form-user.php?id_user=<?php echo $user["id_user"];?>">
                                <button class="btn btn-info btn-block">
                                    Edit
                                </button>
                            </a>
                                <div class="card-footer">
                                    <a href="process-user.php?id_user=<?=$user["id_user"]?>"
                                    onClick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                </div>
                                <button class="btn btn-block btn-danger">
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
                <a href="form-user.php"> 
                    <button class="btn btn-success">
                        Tambah Data User
                    </button>
                </a>
            </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>List Member</title>
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
                <h4 class="text-white">Data Member Laundry </h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!-- kotak pencarian data member -->
                <form action="list-member.php" method="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Masukkan Keyword Pencarian" required />
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pada saat loadd halaman ini,
                        # akan mengecek apakah data dengan method
                        # GET yg bernama "search"
                        $search = $_GET ["search"];
                        $sql = "select * from member
                        where id_member like '%$search%'
                        or nama_member like '%$search%' 
                        or alamat like '%$search%'
                        or tlp like '%$search%'";
                    } else {
                        $sql = "select * from member";
                    }
                    
                    //eksekusi perintah SQL
                    $query = mysqli_query($connect, $sql);
                    while ($member = mysqli_fetch_array($query)) {?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data member -->
                            <div class="col-lg-8 col-md-10">
                                <h5>Nama : <?php echo $member["nama_member"];?></h5>
                                <h6>ID Member: <?php echo $member["id_member"];?></h6>
                                <h6>Alamat: <?php echo $member["alamat"];?></h6>
                                <h6>Jenis Kelamin: <?php echo $member["jenis_kelamin"];?></h6>
                                <h6>Telepon: <?php echo $member["tlp"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan -->
                            <div class="col-lg-4 col-md-2">
                                <a href="form-member.php?id_member=<?php echo $member["id_member"];?>">
                                <button class="btn btn-info btn-block">
                                    Edit
                                </button>
                            </a>
                                <div class="card-footer">
                                    <a href="process-member.php?id_member=<?=$member["id_member"]?>"
                                    onclick="return confirm('Are you sure?')">
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
                <a href="form-member.php"> 
                    <button class="btn btn-success">
                        Tambah Data member
                    </button>
                </a>
            </div>
            <!-- card footer -->
        </div>
                </div>
</body>
</html>
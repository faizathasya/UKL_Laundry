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
    <title>Form Transaksi</title>
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
                    Form Transaksi Laundry
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_transaksi"])) {
                    include "connection.php";
                    $id_transaksi = $_GET["id_transaksi"];
                    $sql = "select * from transaksi where id_transaksi='$id_transaksi'";
                    # eksekusi perintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi ke bentuk array
                    $transaksi = mysqli_fetch_array($hasil);
                ?>
                <form action="process-transaksi.php" method="post">
                    <!-- input kode transaksi -->
                    ID Transaksi
                      <input type="text" name="id_transaksi" class="form-control mb-2" required
                      value="<?=$transaksi["id_transaksi"];?>" readonly>
                      
                    Status
                    <select name="status" class="form-control mb-2" required
                    value="<?=$transaksi["status"];?>">
                        <option value="baru">baru</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="diambil">diambil</option>
                    </select>

                    Status Pembayaran
                    <select name="dibayar" class="form-control mb-2" required
                    value="<?=$transaksi["dibayar"];?>">
                        <option value="dibayar">dibayar</option>
                        <option value="belum_bayar">belum_bayar</option>
                    </select>
               
                <button type="submit "class="btn btn-block btn-success" name="edit_status">
                    Simpan Edit Transaksi
                </button>
                </form>

                <?php
                }else{
                ?>
                <form action="process-transaksi.php" method="post">
                    <!-- input kode transaksi -->
                    ID Transaksi
                      <input type="text" name="id_transaksi" class="form-control mb-2" required>

                    Pilih Data Member
                    <select name="id_member" class="form-control mb-2" required>
                        <?php
                        include "connection.php";
                        $sql = "select * from member";
                        $hasil = mysqli_query($connect, $sql);
                        while ($member = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($member["id_member"])?>">
                            <?=($member["nama_member"])?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>

                    <!-- transaksi ambil dari data login -->
                    <input type="hidden" name="id_user" 
                    value="<?=($_SESSION["user"]["id_user"])?>">
                
                    User
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" readonly
                    value="<?=($_SESSION["user"]["nama_user"])?>">
                    <!-- tgl_pinjam dibuat otomatis -->

                    <?php
                     date_default_timezone_set('Asia/Jakarta');
                    ?>
                    Tanggal Laundry
                    <input type="text" name="tgl" class="form-control mb-2" 
                    readonly value="<?=(date("Y-m-d"))?>">

                    Tanggal Ambil
                    <input type="date" name="batas_waktu" class="form-control mb-2" required>
                
                    Tanggal bayar
                    <input type="date" name="tgl_bayar" class="form-control mb-2" required>

                    Status
                    <select name="status" class="form-control mb-2" required>
                        <option value="baru">baru</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="diambil">diambil</option>
                    </select>

                    Status Pembayaran
                    <select name="dibayar" class="form-control mb-2" required>
                        <option value="dibayar">dibayar</option>
                        <option value="belum_bayar">belum_bayar</option>
                    </select>

                <!-- tampilkan pilihan paket yg akan dipinjam -->
                Pilih paket yang akan di transaksi
                <select name="id_paket" class="form-control mb-2" 
                required>
                    <?php
                    $sql = " select * from paket";
                    $hasil = mysqli_query($connect, $sql);
                    while ($paket = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($paket["id_paket"])?>">
                           <?=($paket["jenis"])?>
                           <?=($paket["harga"] .  " /kg")?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

                Jumlah Laundry (Kg)
                <input type="number" name="qty" 
                class="form-control mb-2" >
               
                <button type="submit "class="btn btn-block btn-success" name="simpan_transaksi">
                    Simpan Transaksi
                </button>
                </form>
                <?php
                }?>
            </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
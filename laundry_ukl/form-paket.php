<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Paket</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary">
                <h4 class="text-white text-center">
                    Form Paket
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_paket"])) {
                    # form untuk edit
                    $id_paket = $_GET["id_paket"];
                    $sql = "select * from paket where id_paket='$id_paket'";
                    include "connection.php";
                    #ekseukusi SQL
                    $hasil = mysqli_query($connect, $sql);

                    #konversi ke array
                    $paket = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-paket.php" method="post" enctype="multipart/form-data">
                    Id paket
                    <input type="text" name="id_paket" class="form-control mb-2" required
                    value="<?=$paket["id_paket"];?>" readonly>

                    Jenis Paket
                    <select name="jenis" class="form-control mb-2" required>
                        <option value="<?=$paket["jenis"];?>" selected>
                           <?=$paket["jenis"]?>
                        </option>
                        <option value="kiloan">Kiloan</option>
                        <option value="selimut">Selimut</option>
                        <option value="bed_cover">Bed Cover</option>
                        <option value="kaos">Kaos</option>
                    </select>

                   Harga
                   <input type="number" name="harga" class="form-control mb-2" required
                   value="<?=$paket["harga"];?>">

                    <button type="submit" class="btn btn-info btn-block" name="update_paket">
                        Simpan Paket
                    </button>
                </form>
                    <?php
                } else {
                    # form untuk insert
                    ?>
                    <form action="process-paket.php" method="post" enctype="multipart/form-data">
                    Id paket
                    <input type="text" name="id_paket" class="form-control mb-2" required>

                    jenis
                    <select name="jenis" class="form-control mb-2" required>
                        <option value="kiloan">kiloan</option>
                        <option value="selimut">selimut</option>
                        <option value="bed_cover">bed_cover</option>
                        <option value="kaos">kaos</option>
                    </select>

                    Harga
                    <input type="number" name="biaya_sewa_perhari" class="form-control mb-2" required>

                    <button type="submit" class="btn btn-info btn-block" name="simpan_paket">
                        Simpan Paket
                    </button>
                </form>
                    <?php
                }
                
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary">
                <h4 class="text-white">
                    Form Member
                </h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_member"])) {
                    include "connection.php";
                    $id_member = $_GET["id_member"];
                    $sql = "select * from member where id_member='$id_member'";
                    $hasil = mysqli_query($connect, $sql);
                    $member = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-member.php" method="post"
                    onsubmit="return comfirm('Apakah anda yakin untuk mengubah data ini?')">

                    Nama member
                    <input type="text" name="_member" 
                    class="form-control mb-2" required
                    value="<?=$member["nama_member"];?>" />

                    Alamat member
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required
                    value="<?=$member["alamat"];?>" />

                    Jenis kelamin
                    <select name="jenis_kelamin" class="form-control mb-2">
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>

                   Tlp Member
                    <input type="number" name="tlp" 
                    class="form-control mb-2" required
                    value="<?=$member["tlp"];?>"/>

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_member">
                        Simpan Member
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form member digunakan untuk insert
                    ?>
                    <form action="process-member.php" method="post">
                  
                    Nama member
                    <input type="text" name="nama_member" 
                    class="form-control mb-2" required />

                    Alamat member
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required />

                    Jenis kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>

                    tlp
                    <input type="text" name="tlp" 
                    class="form-control mb-2" required />

                    <button type="submit" class="btn btn-success btn-block"
                    name="simpan_member">
                        Simpan Member
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
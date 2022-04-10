<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title> Form User </title>
</head>
<body>
    <div class="container">
    <div class="card">
            <div class="card-header bg-secondary">
                <h4 class="text-white text-center">
                    Form User
                </h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_user"])){
                    include "connection.php";
                    $id_user = $_GET["id_user"];
                    $sql = "select * from user where id_user='$id_user'";
                    $hasil = mysqli_query($connect, $sql);
                    $user = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-user.php" method="post"
                    onsubmit="return confirm ('R u sure want to edit this?')">

                    ID user
                    <input type="text" name="id_user" 
                    class="form-control mb-2" required
                    value="<?=$user["id_user"];?>" readonly />

                    Nama 
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" required
                    value="<?=$user["nama_user"];?>" />

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required
                    value="<?=$user["username"];?>" />

                    Password
                    <input type="password" name="password" 
                    class="form-control mb-2" />

                    Role
                    <select name="role" class="form-control mb-2">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_user">
                        Simpan User
                    </button>
                    </form>
                    <?php
                }else{
                    ?>
                    <form action="process-user.php" method="post">
                    ID user
                    <input type="text" name="id_user" 
                    class="form-control mb-2" required /> -->

                    Nama 
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" required/>

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required />

                    Password
                    <input type="password" name="password" 
                    class="form-control mb-2"  />

                    Role
                    <select name="role" class="form-control mb-2" required>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>

                    <button type="submit" class="btn btn-success btn-block"
                    name="simpan_user">
                        Simpan User
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card col-lg-6 mx-auto">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Login 
                </h4>
            </div>
            <div class="card-body">
                <form action="login-post.php" method="post">
                    username
                    <input type="text" name="username"
                    class="form-control mb-2" required>

                    Password
                    <input type="password" name="password"
                    class="form-control mb-2" required>

                    <button type="submit" name="login"
                    class="btn btn-info btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
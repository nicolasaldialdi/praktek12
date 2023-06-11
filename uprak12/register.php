<?php
session_start();
include 'conn.php';

if (isset($_POST['regist'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    // menambahkan username dan password di database

    // Periksa apakah password dan konfirmasi password sama
    if ($password != $confirmPassword) {
        echo "Password tidak sama";
        exit();
    }
    
    $query = " SELECT * FROM admin (`username`, `password`) VALUES ('$username', '$password')";
    $result = mysqli_query($koneksi, $query);


    if($result){
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-4">
        <h1>Register</h1>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="btn btn-primary" id="regist" name="regist">register</button>
            
        </form>
        <p><a href="login.php"><p>register</p></a></p>
        <div>
            <img style="margin-left:250px" src="https://i.pinimg.com/736x/ba/1b/ba/ba1bba7912812cba682517ac0c8fae86--school-logo-design-process.jpg" alt="">
        </div>
    </>
</body>
</html>
<?php
@include '../php/config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $select = "SELECT * FROM logininfo WHERE email = '$email' && password = '$password'";

    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['id'];
        header('location:homepage.php');
    } else {
        $linError[] = 'Incorrect email or password !';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
<div class="container">
    <div class="leftside">
        <h1>Problem<span class="theme-color"> Solved</span></h1>
        <p>Your one step <span class="theme-color"> solution</span> to your problems.</p>
    </div>

    <form action="" method="post">
        <?php
        if (isset($linError)) {
            foreach ($linError as $error) {
                echo '<span class = "login-error-message">' . $error . "</span>";
            }
        }
        ?>
        <input type="email" name="email" required placeholder="email">

        <input type="password" name="password" required placeholder="password">

        <input type="submit" name="submit" value="login" class="login-button">

        <a href="" class="forgot-button">Forgot password!</a>
        <a href="" class="create-button">Create new account</a>    </form>        
    </div>

</body>

</html>
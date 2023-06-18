<?php
@include '../php/config.php';

if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $skill = mysqli_real_escape_string($conn, $_POST['skill']);
  $level = mysqli_real_escape_string($conn, $_POST['level']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
  // $image = mysqli_real_escape_string($conn, $_POST['image']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);

  $select = "SELECT * FROM logininfo WHERE email = '$email'";

  $result = mysqli_query($conn, $select);

  if (mysqli_num_rows($result) > 0) {
    $error[] = 'User already exist!';
  } else {

    if ($password != $cpassword) {
      $error[] = 'Password not matched !';
    } else {
      $insert= "INSERT INTO `logininfo` (`name`, `email`, `password`, `address`, `phone`, `skill`, `level`, `image`, `longitude`, `latitude`, `description`, `dob`, `date`) VALUES ('$name', '$email', '$password', '$address', '$phone', '$skill', '$level', 'luffy.jpeg', '84.514562', '27.612585', '$description', '2001-02-12', current_timestamp())";

      mysqli_query($conn, $insert);
      header('location:login.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/register.css">
</head>

<body>
  <div class="container">
    <h1>Problem <span class="theme-color"> Solved</span></h1>
    <div class="content">
      <form action="" method="post">
        <?php
        if (isset($error)) {
          foreach ($error as $error) {
            echo '<span class = "error-msg">' . $error . "</span>";
          }
        }
        ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your Adress" name="address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your Phone" name="phone" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your Email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Skill</span>
            <input type="text" placeholder="Enter your skill" name="skill" required>
          </div>
          <div class="input-box">
            <span class="details">Skill level</span>
            <input type="text" placeholder="Enter your Skill level" name="level" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="cpassword" required>
          </div>
        </div>

        <div>
          <textarea class="description" name="description" rows="5" cols="60" placeholder="Describe about yourself"></textarea>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Create Account">
        </div>

        <p>Already have an account ? <a href="login.php">Login here</a></p>
      </form>
    </div>
  </div>
</body>

</html>
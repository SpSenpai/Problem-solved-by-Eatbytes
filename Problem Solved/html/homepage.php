<?php
@include '../php/config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

// Post problem
if (isset($_POST['submit'])) {
    $pro_title = mysqli_real_escape_string($conn, $_POST['pro_title']);
    $pro_description = mysqli_real_escape_string($conn, $_POST['pro_description']);
    $pro_image = mysqli_real_escape_string($conn, $_POST['pro_image']);
    $id = $_SESSION['user_id'];

    $insert = "INSERT INTO `problems` (`pro_title`, `pro_description`, `pro_image`, `id`, `pro_date`) VALUES ('$pro_title', '$pro_description', '$pro_image', '$id', current_timestamp());";
    mysqli_query($conn, $insert);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Css -->
    <link rel="stylesheet" href="../css/homepage.css">
</head>

<body>
    <div class="black-box"></div>
    <div class="sidebar">
        <div class="logo"> Problem <span>Solved</span></div>
        <div class="cross"><i class="fa-solid fa-x"></i></div>
        <div class="profile-img"><img src="../image/<?php echo $_SESSION['user_image']; ?>" alt="profile-pic"></div>
        <div class="sidebar-options">
            <div class="sidebar-option"><i class="fa-solid fa-user"></i>
                <?php echo $_SESSION['user_name']; ?>
            </div>
            <div class="sidebar-option"><i class="fa-solid fa-clock-rotate-left"></i> Work History</div>
            <div class="sidebar-option"><i class="fa-solid fa-key"></i> Privacy and control</div>
            <div class="sidebar-option"><i class="fa-solid fa-question"></i> Help & feedback</div>
            <div class="sidebar-option"><i class="fa-solid fa-gear"></i> Settings</div>
            <a href="../php/logout.php" class="sidebar-option logout-option"><i
                    class="fa-solid fa-right-from-bracket"></i> Log Out</a>
        </div>
    </div>


    <nav class="nav-bar">
        <div class="search-bar">
            <div class="hamburger"><i class="fa-solid fa-bars"></i></div>
            <input type="text" placeholder="Search here">
            <button class="search-glass"><i class="fa-solid fa-magnifying-glass"></i></button>

        </div>

        <div class="top-searches">
            <div class="ts-item">Electricians</div>
            <div class="ts-item">Doctors</div>
            <div class="ts-item">Plumbers</div>
            <div class="ts-item">Labors</div>
            <div class="special-item" id="post-problem-btn">Post Problem</div>
        </div>

        <div class="notification"><i class="fa-solid fa-bell"></i></div>
        <div class="side-logo"><img src="../image/<?php echo $_SESSION['user_image']; ?>" alt="logo" srcset=""></div>
    </nav>


    <div class="search-result-container">
        <div class="search-profile-box">
            <div class="sp-img"><img src="../image/rajesh hamal.jpg" alt=""></div>
            <div class="sp-details">
                <div class="sp-name">Rajesh Hamal</div>
                <div class="sp-proff">
                    <div class="sp-proff-name">Plumber</div>
                    <div class="sp-proff-lvl">Beginner</div>
                </div>
                <div class="sp-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="sp-options">
                <div class="sp-option">Hire now</div>
                <div class="sp-option">Contact</div>
                <div class="sp-option">Location</div>
                <div class="sp-option">Details</div>
            </div>
        </div>
        <div class="search-profile-box">
            <div class="sp-img"><img src="../image/rajesh hamal.jpg" alt=""></div>
            <div class="sp-details">
                <div class="sp-name">Rajesh Hamal</div>
                <div class="sp-proff">
                    <div class="sp-proff-name">Plumber</div>
                    <div class="sp-proff-lvl">Beginner</div>
                </div>
                <div class="sp-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="sp-options">
                <div class="sp-option">Hire now</div>
                <div class="sp-option">Contact</div>
                <div class="sp-option">Location</div>
                <div class="sp-option">Details</div>
            </div>
        </div>
        <div class="search-profile-box">
            <div class="sp-img"><img src="../image/rajesh hamal.jpg" alt=""></div>
            <div class="sp-details">
                <div class="sp-name">Rajesh Hamal</div>
                <div class="sp-proff">
                    <div class="sp-proff-name">Plumber</div>
                    <div class="sp-proff-lvl">Beginner</div>
                </div>
                <div class="sp-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="sp-options">
                <div class="sp-option">Hire now</div>
                <div class="sp-option">Contact</div>
                <div class="sp-option">Location</div>
                <div class="sp-option">Details</div>
            </div>
        </div>
        <div class="search-profile-box">
            <div class="sp-img"><img src="../image/rajesh hamal.jpg" alt=""></div>
            <div class="sp-details">
                <div class="sp-name">Rajesh Hamal</div>
                <div class="sp-proff">
                    <div class="sp-proff-name">Plumber</div>
                    <div class="sp-proff-lvl">Beginner</div>
                </div>
                <div class="sp-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="sp-options">
                <div class="sp-option">Hire now</div>
                <div class="sp-option">Contact</div>
                <div class="sp-option">Location</div>
                <div class="sp-option">Details</div>
            </div>
        </div>
        <div class="search-profile-box">
            <div class="sp-img"><img src="../image/rajesh hamal.jpg" alt=""></div>
            <div class="sp-details">
                <div class="sp-name">Rajesh Hamal</div>
                <div class="sp-proff">
                    <div class="sp-proff-name">Plumber</div>
                    <div class="sp-proff-lvl">Beginner</div>
                </div>
                <div class="sp-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="sp-options">
                <div class="sp-option">Hire now</div>
                <div class="sp-option">Contact</div>
                <div class="sp-option">Location</div>
                <div class="sp-option">Details</div>
            </div>
        </div>

    </div>


    <!-- Post Problem div -->
    <div class="post-problem-container">
        <form action="" method="post" class="problem">
            <input type="text" name="pro_title" placeholder="Short title of your problem">
            <textarea cols="50" name="pro_description" rows="10" type="text"
                placeholder="Short description of your problem"></textarea>
            <input type="file" name="pro_image" class="upload-image">
            <input type="submit" name="submit" value="post-problem" class="login-button">
            <div class="cross-post-problem"><i class="fa-solid fa-x"></i></div>

        </form>
    </div>
    <!-- Map Area -->
    <div id="map"></div>

    <div id="id" style={opacity=0;}><?php echo $_SESSION['user_id']; ?></div>

    <div class="user-details">
        <div class="img-container">
        <div class="cross-user-details"><i class="fa-solid fa-x"></i></div>
        <div class="details">
        <img class="bis" src="../image/luffy.jpeg" alt="img">
            <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            </div>
            <h2>Bishmit Regmi</h2>
            <p> <span>Phone</span> : 9802828372</p>
            <p><span>Gmail </span>: Bishmitregmi@gmail.com</p>
            <p><span>Addres</span> : Bharatpur, malpot chowk</p>
            <p><span>Joined since</span> : 2022/02/15</p>
            <p><span>Skill</span>: Electrician</p>
            <p><span>Level</span>: Expert</p>
            <p><span>Description</span>:
            <p class="des">
                Hello my name is bishmit regmi. I am part time graphic designer and i love coding and watching aniime.
            </p>
            </p>
        </div>
        </div>
    </div>
    <script src="../js/home-page.js"></script>
</body>

</html>
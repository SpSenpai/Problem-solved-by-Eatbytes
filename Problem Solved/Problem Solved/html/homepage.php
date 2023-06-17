<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Leaflet  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <!-- Css -->
    <link rel="stylesheet" href="../css/home-page.css">
</head>
<body>
    <div class="black-box"></div>
    <div class="sidebar">
        <div class="logo"> Problem <span>Solved</span></div>
        <div class="cross"><i class="fa-solid fa-x"></i></div>
        <div class="profile-img"><img src="../image/rajesh hamal.jpg" alt="profile-pic"></div>
        <div class="sidebar-options">
            <div class="sidebar-option"><i class="fa-solid fa-user"></i> Rajesh Hamal</div>
            <div class="sidebar-option"><i class="fa-solid fa-clock-rotate-left"></i> Work History</div>
            <div class="sidebar-option"><i class="fa-solid fa-key"></i> Privacy and control</div>
            <div class="sidebar-option"><i class="fa-solid fa-question"></i> Help & feedback</div>
            <div class="sidebar-option"><i class="fa-solid fa-gear"></i> Settings</div>
            <div class="sidebar-option logout-option"><i class="fa-solid fa-right-from-bracket"></i> Log Out</div>
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
            <div class="special-item">Post Problem</div>
        </div>

        <div class="notification"><i class="fa-solid fa-bell"></i></div>
        <div class="side-logo"><img src="../image/rajesh hamal.jpg" alt="logo" srcset=""></div>
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

    <!-- Map Area -->
    <div id="map"></div>

    <script src="../js/home-page.js"></script>
</body>
</html>
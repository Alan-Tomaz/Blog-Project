<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Blog/config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="shortcut icon" href="<?php echo ROOT_URL ?>img/favicon7.png" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>css/style.css">
    <!-- Iconscout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Font (Montserrat) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        
</head>

<body>
    <nav>
        <div class="container nav-container">
            <a href="<?php echo ROOT_URL ?>index.php" class="nav-logo">BLOG WEBSITE</a>
            <ul class="nav-items">
                <li><a href="<?php echo ROOT_URL ?>pages/blog.php">Blog</a></li>
                <li><a href="<?php echo ROOT_URL ?>pages/about.php">About</a></li>
                <li><a href="<?php echo ROOT_URL ?>pages/services.php">Services</a></li>
                <li><a href="<?php echo ROOT_URL ?>pages/contact.php">Contact</a></li>
                <!-- <li><a href="pages/signin.php">Sign In</a></li> -->
                <li class="nav-profile">
                    <div class="avatar">
                        <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                    </div>
                    <ul>
                        <li><a href="<?php echo ROOT_URL ?>admin/dashboard.php">Dashboard</a></li>
                        <li><a href="<?php echo ROOT_URL ?>pages/logout.php">Logout</a></li>
                    </ul>

                </li>
            </ul>
            <button id="open-nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close-nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!--======================================== End Of Nav ==================================== -->
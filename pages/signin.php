<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/Blog/config/constants.php';

// get back form data if there was a login error
$usernameEmail = $_SESSION["signin-data"]["username-email"] ?? null;
$password = $_SESSION["signin-data"]["password"] ?? null;
//delete signin data session
unset($_SESSION['signin-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="shortcut icon" href="../img/favicon7.png" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Iconscout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Font (Montserrat) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <section class="form-section">
        <div class="container form-section-container">
            <h2>Sign In</h2>
            <?php if (isset($_SESSION['signup-success'])) : ?>
            <div class="alert-message success">
                <p>
                    <?= 
                        $_SESSION['signup-success'];
                        unset($_SESSION['signup-success']);
                    ?>
                </p>
            </div>
            <?php elseif(isset($_SESSION['signin'])) : ?>
            <div class="alert-message error">
                <p>
                    <?= 
                        $_SESSION['signin'];
                        unset($_SESSION['signin']);
                    ?>
                </p>
            </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>pages/signin-logic.php" method="POST">
                <input type="text" name="username-email" value="<?= $usernameEmail ?>" placeholder="Username or Email">
                <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
                <button type="submit" class="btn" name="submit">Sign In</button>
                <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
            </form>
        </div>
    </section>

</body>

</html>
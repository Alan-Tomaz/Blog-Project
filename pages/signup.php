<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Blog/config/constants.php';

// get back form data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null; //null coalesscence operator
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createPassword = $_SESSION['signup-data']['create-password'] ?? null;
$confirmPassword = $_SESSION['signup-data']['confirm-password'] ?? null;
//delete signup data session
unset($_SESSION['signup-data']);
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
            <h2>Sign Up</h2>
            <?php if (isset($_SESSION['signup'])) : ?>
                    <div class="alert-message error">
                <p>
                    <?= $_SESSION['signup']; 
                        unset($_SESSION['signup']);
                    ?>
                </p>
                
            </div>
                <?php endif ?>

            <form action="<?= ROOT_URL ?>pages/signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
                <input type="password" name="create-password" value="<?= $createPassword ?>"placeholder="Create Password">
                <input type="password" name="confirm-password" value="<?= $confirmPassword ?>" placeholder="Confirm Password">
                <div class="form-control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" class="btn" name="submit">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>

</body>

</html>
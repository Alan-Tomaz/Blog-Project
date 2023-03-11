<?php
require $_SERVER["DOCUMENT_ROOT"] . "/Blog/admin/config/database.php";

//Get user form data if submit button was clicked
if (isset($_POST["submit"])) {
    $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $createPassword = filter_var($_POST["create-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST["confirm-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $isAdmin = filter_var($_POST['user-role'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES["avatar"];

    /* Shows the values 
    #region
    echo $firstname . ", " . $lastname . ", " . $username . ", " . $email . ", " . $createPassword . ", " . $confirmPassword;
    echo "<pre>";
    var_dump($avatar);
    echo "</pre>";
    #endregion
    */



    //validate input values
    if (!$firstname) {
        $_SESSION["add-user"] = "Please Enter The First Name";
    } else if (!$lastname) {
        $_SESSION["add-user"] = "Please Enter The Last Name";
    } else if (!$username) {
        $_SESSION["add-user"] = "Please Enter The Username";
    } else if (!$email) {
        $_SESSION["add-user"] = "Please Enter a Valid E-mail";
    } else if (strlen($createPassword) < 8 || strlen($confirmPassword) < 8) {
        $_SESSION["add-user"] = "Please The Password Should Be 8+ Characters";
    } else if (!$avatar["name"]) {
        $_SESSION["add-user"] = "Please Add a Avatar";
    } else {
        //check if passwords don"t match
        if ($createPassword !== $confirmPassword) {
            $_SESSION["add-user"] = "Passwords Do Not Match";
        } else {

            // hash password
            $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);

            //check if username and email already exist in database
            $userCheckQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $userCheckResult = mysqli_query($connection, $userCheckQuery);
            if (mysqli_num_rows($userCheckResult) > 0) {
                $_SESSION["add-user"] = "Username or Email Already Exists";
            } else {

                //WORK ON AVATAR
                //rename avatar
                $time = time(); //make each image name unique using current timestamp
                $avatarName = $time . "-" . $avatar["name"];
                $avatarTmpName = $avatar["tmp_name"];
                $avatarDestinationPath = "../img/" . $avatarName;

                //make sure file is an image
                $allowed_files = ["png", "jpg", "jpeg"];
                $extention = explode(".", $avatarName);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    //make sure image is not too large (1MB)
                    if ($avatar["size"] < 1000000) {
                        //upload avatar 
                        move_uploaded_file($avatarTmpName, $avatarDestinationPath);
                    } else {
                        $_SESSION["add-user"] = "File Size Too Big. Should Be Less Than 1MB";
                    }
                } else {
                    $_SESSION["add-user"] = "File Should Be PNG, JPG or JPEG";
                }
            }
        }
    }

    // redirect back to add-user page if there was any problem
    if (isset($_SESSION["add-user"])) {
        //pass form data back to add-user page
        $_SESSION['add-user-data'] = $_POST;
        header("location:" . ROOT_URL . "admin/add-user.php");
        die();
    } else {
        // insert new user into users table
        $insertUserQuery = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword', '$avatarName', '$isAdmin')";
        $insertUserResult = mysqli_query($connection, $insertUserQuery);

        if (!mysqli_errno($connection)) {
            //redirect to login page with success message
            $_SESSION['add-user-success'] = "New User $firstname $lastname added successfully";
            header("location: " . ROOT_URL . "admin/manage-users.php");
            die();
        }
    }
} else {
    //if button wasn"t clicked, bounce back to add-user page
    header("location:" . ROOT_URL . "admin/add-user.php");
    die();
}

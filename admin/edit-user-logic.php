<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/config/database.php';

if (isset($_POST['submit'])) {
    //get updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $isAdmin = filter_var($_POST['user-role'], FILTER_SANITIZE_NUMBER_INT);
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Invalid Form Input";
    } else {
        // update user 
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin='$isAdmin' WHERE id='$id' limit 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "Failed to Update User";
        } else {
            $_SESSION['edit-user-success'] = "User $firstname $lastname Updated Successfully";
        }
    }
}

header("location: " . ROOT_URL . "admin/manage-users.php");
die();

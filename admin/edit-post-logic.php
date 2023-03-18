<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/config/database.php';

if (isset($_POST["submit"])) {
    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $previousThumbnailName = filter_var($_POST["previous-thumbnail-name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST["body"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST["category"], FILTER_SANITIZE_NUMBER_INT);
    $isFeatured = filter_var($_POST["is-featured"], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES["thumbnail"];


    //set is_featured to 0 if unchecked
    $isFeatured = $isFeatured == 1 ?: 0;

    //validate form data
    if (!$title) {
        $_SESSION["edit-post"] = "Enter Post Title";
    } elseif (!$body) {
        $_SESSION["edit-post"] = "Enter Post Body";
    } elseif (!$categoryId) {
        $_SESSION["edit-post"] = "Select Post Category";
    } else {


        if ($thumbnail["name"]) {
            $previousThumbnailPath = "../img/" . $previousThumbnailName;
            if ($previousThumbnailPath) {
                unlink($previousThumbnailPath);
            }


            //work on thumbnail
            //rename the image
            $time = time(); // make each image name unique
            $thumbnailName = $time . $thumbnail["name"];
            $thumbnailTmpName = $thumbnail["tmp_name"];
            $thumbnailDestinationPath = "../img/" . $thumbnailName;

            //make sure file is an image 
            $allowedFiles = ["png", "jpg", "jpeg"];
            $extension = explode(".", $thumbnailName);
            $extension = end($extension);
            if (in_array($extension, $allowedFiles)) {
                //make sure image is not too big (2MB)
                if ($thumbnail["size"] < 2_000_000) {
                    //upload thumbnail
                    move_uploaded_file($thumbnailTmpName, $thumbnailDestinationPath);
                } else {
                    $_SESSION["edit-post"] = "File Size Too Big. Should Be Least Than 2MB ";
                }
            } else {
                $_SESSION["edit-post"] = "File Should Be PNG, JPG or JPEG";
            }
        }
    }

    //redirect back (with form data) to edit-post page if there is any problem
    if (isset($_SESSION['edit-post'])) {
        $_SESSION["edit-post-data"] = $_POST;
        header("location: " . ROOT_URL . "admin/edit-post.php");
        die();
    } else {
        // set is_featured of all posts to 0 if isFeatured for this post is 1
        if ($isFeatured == 1) {
            $zeroAllIsFeaturedQuery = "UPDATE posts SET is_featured=0";
            $zeroAllIsFeaturedResult = mysqli_query($connection, $zeroAllIsFeaturedQuery);
        }

        //set thumbnail name if a new one was uploaded, else keep old thumbnail name
        $thumbnailToInsert = $thumbnailName ?? $previousThumbnailName;

        //insert post into database
        $query = "UPDATE posts SET title= '$title', body = '$body', thumbnail = '$thumbnailToInsert', category_id='$categoryId', is_featured='$isFeatured' WHERE id='$id' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            $_SESSION["edit-post-success"] = "New Post Edited Successfully";
            header("location: " . ROOT_URL . "admin/index.php");
            die();
        }
    }
}
header("location: " . ROOT_URL . "admin/edit-post.php");
die();

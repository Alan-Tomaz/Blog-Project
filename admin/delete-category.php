<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/config/database.php';

if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM categories WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);



    //FOR LATER
    // update category_id of posts that belong to this category to id of uncategorized category

    //delete category
    $deleteCategoryQuery = "DELETE FROM categories WHERE id='$id' LIMIT 1";
    $deleteCategoryResult = mysqli_query($connection, $deleteCategoryQuery);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-category'] = "Couldn't Delete '{$category['title']}' Category";
    } else {
        $_SESSION['delete-category-success'] = "'{$category['title']}' Category Deleted Successfully";
    }
}

header('location: ' . ROOT_URL . "admin/manage-categories.php");
die();

<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/header.php';

if (isset($_GET["search"]) && isset($_GET["submit"])) {
    $search = filter_var($_GET["search"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
} else {
    header("location: " . ROOT_URL . "pages/blog.php");
    die();
}

?>

<?php if (mysqli_num_rows($posts) > 0) : ?>
    <section class="posts section-extra-margin">
        <div class="container posts-container">
            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                <article class="post">

                    <div class="post-thumbnail">
                        <img src="../img/<?= $post["thumbnail"] ?>">
                    </div>
                    <div class="post-info">
                        <?php
                        //fetch category from categories table using category_id of post 
                        $category_id = $post["category_id"];
                        $categoryQuery = "SELECT * FROM categories WHERE id = $category_id";
                        $categoryResult = mysqli_query($connection, $categoryQuery);
                        $category = mysqli_fetch_assoc($categoryResult);
                        ?>
                        <a href="<?= ROOT_URL ?>pages/category-posts.php?id=<?= $category["id"] ?>" class="category-button"><?= $category["title"] ?></a>
                        <h3 class="post-title">
                            <a href="<?= ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>"><?= $post["title"] ?></a>
                        </h3>
                        <p class="post-body">
                            <?= substr($post["body"], 0, 150) ?>...
                        </p>
                        <div class="post-author">
                            <?php
                            //fetch author from users table using author_id
                            $authorId = $post["author_id"];
                            $authorQuery = "SELECT * FROM users WHERE id = $authorId";
                            $authorResult = mysqli_query($connection, $authorQuery);
                            $author = mysqli_fetch_assoc($authorResult);
                            ?>
                            <div class="post-author-avatar">
                                <img src="../img/<?= $author["avatar"] ?>">
                            </div>
                            <div class="post-author-info">
                                <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                                <small><?= date("M d, Y - H:i", strtotime($post["date_time"])) ?></small>
                            </div>
                        </div>
                    </div>
                </article>

            <?php endwhile ?>
        </div>
    </section>
<?php else : ?>
    <div class="alert-message error lg section-extra-margin">
        <p style="text-align: center;">No Posts Found For This Search</p>
    </div>
<?php endif ?>

<!--======================================== End Of Posts ==================================== -->

<section class="category-buttons">
    <div class="container category-buttons-container">
        <?php
        $allCategoriesQuery = "SELECT * FROM categories";
        $allCategories = mysqli_query($connection, $allCategoriesQuery);

        ?>
        <?php while ($category = mysqli_fetch_assoc($allCategories)) : ?>
            <a href="<?= ROOT_URL ?>pages/category-posts.php?id=<?= $category["id"] ?>" class="category-button"><?= $category["title"] ?></a>
        <?php endwhile ?>
    </div>
</section>

<!--======================================== End Of Category Buttons ==================================== -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
?>
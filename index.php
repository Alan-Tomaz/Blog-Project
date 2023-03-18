<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/header.php';

//fetch featured post from database
$featuredQuery = "SELECT * FROM posts WHERE is_featured = 1";
$featuredResult = mysqli_query($connection, $featuredQuery);
$featured = mysqli_fetch_assoc($featuredResult);

// fetch 9 posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>

<!-- Show Featured Post if There's Any -->
<?php if (mysqli_num_rows($featuredResult) == 1) : ?>
    <section class="featured">
        <div class="container featured-container">
            <div class="post-thumbnail">
                <img src="./img/<?= $featured["thumbnail"] ?>">
            </div>

            <div class="post-info">
                <?php
                //fetch category from categories table using category_id of post 
                $category_id = $featured["category_id"];
                $categoryQuery = "SELECT * FROM categories WHERE id = $category_id";
                $categoryResult = mysqli_query($connection, $categoryQuery);
                $category = mysqli_fetch_assoc($categoryResult);
                ?>
                <a href="<?= ROOT_URL ?>pages/category-posts.php?id=<?= $category["id"] ?>" class="category-button"><?= $category["title"] ?></a>
                <h2 class="post-title"><a href="<?= ROOT_URL ?>pages/post.php?id=<?= $featured["id"] ?>"><?= $featured["title"] ?></a></h2>
                <p class="post-body"><?= substr($featured["body"], 0, 300) ?>...</p>
                <div class="post-author">
                    <?php
                    //fetch author from users table using author_id
                    $authorId = $featured["author_id"];
                    $authorQuery = "SELECT * FROM users WHERE id = $authorId";
                    $authorResult = mysqli_query($connection, $authorQuery);
                    $author = mysqli_fetch_assoc($authorResult);
                    ?>
                    <div class="post-author-avatar">
                        <img src="./img/<?= $author["avatar"] ?>">
                    </div>
                    <div class="post-avatar-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                        <small><?= date("M d, Y - H:i", strtotime($featured["date_time"])) ?></small>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<!--======================================== End Of Featured ==================================== -->

<section class="posts <?= $featured ? '' : 'section-extra-margin' ?>">
    <div class="container posts-container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">

                <div class="post-thumbnail">
                    <img src="./img/<?= $post["thumbnail"] ?>">
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
                            <img src="./img/<?= $author["avatar"] ?>">
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
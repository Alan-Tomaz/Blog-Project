  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/header.php';

    //fetch posts if id is set
    if (isset($_GET["id"])) {
        $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE category_id = $id ORDER BY date_time DESC";
        $result = mysqli_query($connection, $query);
    } else {
        header("location: " . ROOT_URL . "pages/blog.php");
        die();
    }
    ?>

  <header class="category-title">
      <?php
        //fetch category from categories table using category_id of post 
        $categoryQuery = "SELECT * FROM categories WHERE id = $id";
        $categoryResult = mysqli_query($connection, $categoryQuery);
        $category = mysqli_fetch_assoc($categoryResult);
        echo "<h2>" . $category["title"] . "</h2>";
        ?>
  </header>

  <?php if (mysqli_num_rows($result) > 0) : ?>
      <section class="posts">
          <div class="container posts-container">
              <?php while ($post = mysqli_fetch_assoc($result)) : ?>
                  <article class="post">

                      <div class="post-thumbnail">
                          <img src="../img/<?= $post["thumbnail"] ?>">
                      </div>
                      <div class="post-info">
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
      <div class="alert-message error lg">
          <p style="text-align: center;">No Posts Founds For This Category</p>
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
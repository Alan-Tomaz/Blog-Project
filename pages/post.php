  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/header.php';

    //fetch post from database if id is set
    if (isset($_GET["id"])) {
        $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($result);
    } else {
        header("location: " . ROOT_URL . "pages/blog.php");
        die();
    }
    ?>


  <section class="single-post">
      <div class="container single-post-container">
          <h2><?= $post["title"] ?></h2>
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
          <div class="single-post-thumbnail">
              <img src="../img/<?= $post["thumbnail"] ?>">
          </div>
          <p>
              <?= $post["body"] ?>
          </p>


      </div>
  </section>

  <!--======================================== END OF SINGLE POSTS  ==================================== -->

  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
    ?>
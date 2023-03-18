  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/partials/header.php';

    // fetch categories from database 
    $categoryQuery = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $categoryQuery);

    // fetch post data from database if id is set
    if (isset($_GET["id"])) {
        $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($result);
    } else {
        header("location: " . ROOT_URL . "admin/");
        die();
    }


    ?>



  <section class="form-section add-content">
      <div class="container form-section-container ">
          <h2>Edit Post</h2>
          <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
              <input type="hidden" name="id" value="<?= $post["id"]  ?>">
              <input type="hidden" name="previous-thumbnail-name" value="<?= $post["thumbnail"]  ?>">
              <input type="text" name="title" value="<?= $post["title"]  ?>" placeholder="Title">
              <select name="category">
                  <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                      <option value="<?= $category["id"] ?>"><?= $category["title"] ?></option>
                  <?php endwhile ?>
              </select>
              <textarea name="body" rows="10" placeholder="Body"><?= $post["body"]  ?></textarea>
              <div class="form-control inline">
                  <input type="checkbox" name="is-featured" id="is-featured" value="1" checked>
                  <label for="is-featured">Featured</label>
              </div>
              <div class="form-control">
                  <label for="thumbnail">Change Thumbnail</label>
                  <input type="file" name="thumbnail" id="thumbnail">
              </div>
              <button type="submit" name="submit" class="btn">Edit Post</button>
          </form>
      </div>
  </section>

  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
    ?>
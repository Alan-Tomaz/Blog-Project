  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/partials/header.php';


    //fetch  categories from database 
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);

    // get back form data if there was a registration error
    $title = $_SESSION['add-post-data']['title'] ?? null; //null coalesscence operator
    $body = $_SESSION['add-post-data']['body'] ?? null;
    //delete add-posts data session
    unset($_SESSION['add-post-data']);
    ?>


  <section class="form-section add-content">
      <div class="container form-section-container ">
          <h2>Add Post</h2>
          <?php if (isset($_SESSION['add-post'])) : ?>
              <div class="alert-message error">
                  <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?>
              </div>
          <?php endif ?>
          <form action="<?= ROOT_URL . "admin/add-post-logic.php" ?>" enctype="multipart/form-data" method="POST">
              <input type="text" name="title" placeholder="Title" value="<?= $title ?>">
              <select name="category">
                  <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                      <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                  <?php endwhile ?>
              </select>
              <textarea name="body" rows="10" placeholder="Body"><?= $body ?></textarea>
              <?php if (isset($_SESSION['user-is-admin'])) : ?>
                  <div class="form-control inline">
                      <input type="checkbox" name="is-featured" id="is-featured" value="1" checked>
                      <label for="is-featured">Featured</label>
                  </div>
              <?php endif ?>
              <div class="form-control">
                  <label for="thumbnail">Add Thumbnail</label>
                  <input type="file" name="thumbnail" id="thumbnail">
              </div>
              <button type="submit" name="submit" class="btn">Add Post</button>
          </form>
      </div>
  </section>

  <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
    ?>
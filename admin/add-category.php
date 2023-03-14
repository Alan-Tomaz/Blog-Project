  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/partials/header.php';

  // get back form data if there was a registration error
  $title = $_SESSION['add-category-data']['title'] ?? null; //null coalesscence operator
  $description = $_SESSION['add-category-data']['description'] ?? null;
  //delete add-categories data session
  unset($_SESSION['add-category-data']);
  ?>


  <section class="form-section">
    <div class="container form-section-container">
      <h2>Add Category</h2>
      <?php if (isset($_SESSION['add-category'])) : ?>
        <div class="alert-message error">
          <?= $_SESSION['add-category'];
          unset($_SESSION['add-category']);
          ?>
        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
        <input type="text" name="title" placeholder="Title" value="<?= $title ?>">
        <textarea name="description" rows="4" placeholder="Description"><?= $description ?></textarea>
        <button type="submit" name="submit" class="btn">Add Category</button>
      </form>
    </div>
  </section>

  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
  ?>
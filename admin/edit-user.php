  <?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/header.php';
    ?>


    <section class="form-section add-content">
        <div class="container form-section-container ">
            <h2>Edit User</h2>

            <form action="" enctype="multipart/form-data">
                <input type="text" name="" id="" placeholder="First Name">
                <input type="text" name="" id="" placeholder="Last Name">
                <select name="" id="">
                    <option value="0" selected>Author</option>
                    <option value="1">Admin</option>
                </select>
                <button type="submit" class="btn">Edit User</button>
            </form>
        </div>
    </section>

      <?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
    ?>

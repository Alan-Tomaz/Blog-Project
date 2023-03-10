  <?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/admin/partials/header.php';
    ?>


    <section class="form-section add-content">
        <div class="container form-section-container ">
            <h2>Add User</h2>
            <div class="alert-message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" id="" placeholder="First Name">
                <input type="text" name="" id="" placeholder="Last Name">
                <input type="text" name="" id="" placeholder="Username">
                <input type="email" name="" id="" placeholder="E-mail">
                <input type="password" name="" id="" placeholder="Create Password">
                <input type="password" name="" id="" placeholder="Confirm Password">
                <select name="" id="">
                    <option value="0" selected>Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form-control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="" id="avatar">
                </div>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

  <?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
    ?>

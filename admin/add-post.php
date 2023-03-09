  <?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/header.php';
    ?>


    <section class="form-section add-content">
        <div class="container form-section-container ">
            <h2>Add Post</h2>
            <div class="alert-message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" id="" placeholder="Title">
                <select name="" id="">
                    <option value="1">Wild Life</option>
                    <option value="2">Art</option>
                    <option value="3">Travel</option>
                    <option value="4">Music</option>
                    <option value="5">Science and Technology</option>
                    <option value="6">Food</option>
                </select>
                <textarea name="" id="" rows="10" placeholder="Body"></textarea>
                <div class="form-control inline">
                    <input type="checkbox" name="" id="is-featured" checked>
                    <label for="is-featured">Featured</label>
                </div>
                <div class="form-control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="" id="thumbnail">
                </div>
                <button type="submit" class="btn">Add Post</button>
            </form>
        </div>
    </section>

  <?php
include $_SERVER['DOCUMENT_ROOT'] . '/Blog/partials/footer.php';
    ?>

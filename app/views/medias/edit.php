<?php require APPROOT . '/views/inc/header.php'; ?>
<?= flash('media_message'); ?>

<a href="<?= URLROOT; ?>/medias" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

<div class="card card-body bg-light mt-5">
    <h2>Edit Medium</h2>
    <p>Edit a medium with this form</p>
    <form action="<?php echo URLROOT;?>/medias/edit/<?= $data['id']; ?>" method="POST">
        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" 
            name="title" 
            class="form-control form-control-lg 
            <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['title']; ?>"
            >
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="isbn_asin">ISBN (for Books) or ASIN (for CD/DVD): <sup>*</sup></label>
            <input
            type="text" 
            name="isbn_asin" 
            class="form-control form-control-lg <?php echo (!empty($data['isbn_asin_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['isbn_asin']; ?>">
            <span class="invalid-feedback"><?php echo $data['isbn_asin_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="description">Desciption: <sup>*</sup></label>
            <input
            type="text" 
            name="description" 
            class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>">
            <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="genre">Genre: <sup>*</sup></label>
            <input
            type="text" 
            name="genre" 
            class="form-control form-control-lg <?php echo (!empty($data['genre_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['genre']; ?>">
            <span class="invalid-feedback"><?php echo $data['genre_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="img">Image (url): <sup>*</sup></label>
            <input
            type="text" 
            name="img" 
            class="form-control form-control-lg <?php echo (!empty($data['img_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['img']; ?>">
            <span class="invalid-feedback"><?php echo $data['img_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="year">Release Year (YYYY): <sup>*</sup></label>
            <input
            type="number" 
            name="year" 
            class="form-control form-control-lg <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['year']; ?>">
            <span class="invalid-feedback"><?php echo $data['year_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="type">Type: <sup>*</sup></label>
            <select
            name="type" 
            id="type"
            class="form-control form-control-lg <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>">
                <option value="">Choose a genre</option>
                <option value="1">Book</option>
                <option value="2">CD</option>
                <option value="3">DVD</option>
            </select>
            <script type="text/javascript">
                document.getElementById('type').value = "<?php echo $data['type'];?>";
            </script>

            <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="author">Author: <sup>*</sup></label>
            <select
            name="author" 
            id="author"
            class="form-control form-control-lg <?php echo (!empty($data['author_err'])) ? 'is-invalid' : ''; ?>">
                <option value="">Choose an author</option>
                <?php
                    foreach ($data['authors'] as $author) {
                        echo "<option value='" . $author->author_id . "'>" . $author->author_fname . " " . $author->author_lname . "</option>";
                    }
                ?>
                <script type="text/javascript">
                document.getElementById('author').value = "<?php echo $data['author'];?>";
            </script>
                </select>
            <span class="invalid-feedback"><?php echo $data['author_err']; ?></span>
            <a href="<?php echo URLROOT;?>/medias/addauthor/<?= $data['id']; ?>" class="btn btn-success mt-3">Add Author</a>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher: <sup>*</sup></label>
            <select
            name="publisher" 
            id="publisher"
            class="form-control form-control-lg <?php echo (!empty($data['publisher_err'])) ? 'is-invalid' : ''; ?>">
                <option value="">Choose an author</option>
                <?php
                    foreach ($data['publishers'] as $publisher) {
                        echo "<option value='" . $publisher->publisher_id . "'>" . $publisher->publisher_name . "</option>";
                    }
                ?>
                </select>
                <script type="text/javascript">
                document.getElementById('publisher').value = "<?php echo $data['publisher'];?>";
            </script>
            <span class="invalid-feedback"><?php echo $data['publisher_err']; ?></span>
            <a href="<?php echo URLROOT;?>/medias/addpublisher/<?= $data['id']; ?>" class="btn btn-success mt-3">Add Publisher</a>
        </div>
        <div class="form-group">
            <label for="status">Select a status: <sup>*</sup></label>
            <select
            name="status" 
            id="status"
            class="form-control form-control-lg <?php echo (!empty($data['status_err'])) ? 'is-invalid' : ''; ?>">
                <option value="">Choose a status</option>
                <option value="available">Available</option>
                <option value="reserved">Reserved</option>
                </select>
                <script type="text/javascript">
                document.getElementById('status').value = "<?php echo $data['status'];?>";
            </script>
            <span class="invalid-feedback"><?php echo $data['status_err']; ?></span>
        </div>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

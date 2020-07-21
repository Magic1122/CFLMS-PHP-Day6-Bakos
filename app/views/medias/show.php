<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?= URLROOT; ?>/medias" class="btn btn-light mb-3"><i class="fa fa-backward"></i> Back</a>
<br>
<?= flash('media_message'); ?>


<div class="card text-center mt-5 mb-2">
    <div class="card-header">
        <?= $data['media']->media_title ?>
    </div>
    <div class="card-body">
        <img style="max-width: 500px;" src="<?= $data['media']->media_img ;?>" class="card-title"><img>
        <p class="card-text">ISBN/ASIN: <?= $data['media']->isbn_asin; ?></p>
        <p class="card-text">Type of medium: <?= strtoupper($data['media']->type) ;?></p>
        <p class="card-text">Genre: <?= $data['media']->media_genre ;?></p>
        <p class="card-text">Publisher's/Releaser's address: <?= $data['media']->publisher_address . " " . $data['media']->publisher_zip . " " . $data['media']->publisher_city ;?></p>
        <p class="card-text">Author/Writer: <?= $data['media']->author_fname . " " . $data['media']->author_lname ;?></p>
        <p class="card-text">Description: <?= $data['media']->media_description;?></p>
        <p class="card-text">Availabe : <?php if ($data['media']->media_status == 'available') {
                                                    echo '<i class="fa fa-check-circle"> Yes</i>';
                                                } else {
                                                    echo '<i class="fa fa-times-circle"> No</i>';
                                                }
                                                ?></p>
    </div>
    <div class="card-footer text-muted">
        <a href="<?= URLROOT ?>/medias/publisher/<?= $data['media']->fk_publisher_id?>" > <p><?= $data['media']->publisher_name; ?></p></a>
        <p>Created at: <?= $data['media']->created_at; ?> by <?= $data['media']->name; ?></p>
    </div>
</div>

<?php if ($_SESSION['admin']) : ?>
<a href="<?= URLROOT ?>/medias/edit/<?= $data['media']->media_id ?>" class="btn btn-dark">Edit</a>
<form class="pull-right" action="<?= URLROOT; ?>/medias/delete/<?= $data['media']->media_id?>" method="POST">
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>

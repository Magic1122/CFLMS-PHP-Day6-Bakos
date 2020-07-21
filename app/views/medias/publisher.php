<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-3">
    <div class="col-md-6">
        <h1>Medias from <?= $data['medias'][0]->publisher_name ?></h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT ?>/medias/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Media
        </a>
    </div>
</div>
<h1>Book</h1>
<div class="row mt-5 d-flex justify-content-center">
    <?php foreach ($data['medias'] as $media) : ?>
        <?php if ($media->fk_type_id == 1) : ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card mb-4 bg-white text-dark">
                    <img src="<?= $media->media_img ?>" class="d-inline-block d-none d-md-inline-block card-img-top " alt="picture of a media">
                    <div class="card-body">
                        <h5 class="card-title"><?= $media->media_title ?></h5>
                        <p class="card-text"><?= $media->isbn_asin; ?></p>
                        <p class="card-text"><?= $media->media_genre ?></p>
                        <?php echo $media->media_status == 'available' ? 
                        $media->media_status . " <i class='fa fa-check-circle'></i>" : 
                        $media->media_status . " <i class='fa fa-times-circle'></i>" ; ?>
                        </p>
                        <a href="<?= URLROOT; ?>/medias/show/<?= $media->media_id; ?>" class="btn btn-dark">Show Media</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<h1>CD</h1>
<div class="row mt-5 d-flex justify-content-center">
    <?php foreach ($data['medias'] as $media) : ?>
        <?php if ($media->fk_type_id == 2) : ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card mb-4 bg-white text-dark">
                    <img src="<?= $media->media_img ?>" class="d-inline-block d-none d-md-inline-block card-img-top" alt="picture of a media">
                    <div class="card-body">
                        <h5 class="card-title"><?= $media->media_title ?></h5>
                        <p class="card-text"><?= $media->isbn_asin; ?></p>
                        <p class="card-text"><?= $media->media_genre ?></p>
                        <?php echo $media->media_status == 'available' ? 
                        $media->media_status . " <i class='fa fa-check-circle'></i>" : 
                        $media->media_status . " <i class='fa fa-times-circle'></i>" ; ?>
                        </p>
                        <a href="<?= URLROOT; ?>/medias/show/<?= $media->media_id; ?>" class="btn btn-dark">Show Media</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<h1>DVD</h1>
<div class="row mt-5 d-flex justify-content-center">
    <?php foreach ($data['medias'] as $media) : ?>
        <?php if ($media->fk_type_id == 3) : ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card mb-4 bg-white text-dark">
                    <img src="<?= $media->media_img ?>" class="d-inline-block d-none d-md-inline-block card-img-top" alt="picture of a media">
                    <div class="card-body">
                        <h5 class="card-title"><?= $media->media_title ?></h5>
                        <p class="card-text"><?= $media->isbn_asin; ?></p>
                        <p class="card-text"><?= $media->media_genre ?></p>
                        <?php echo $media->media_status == 'available' ? 
                        $media->media_status . " <i class='fa fa-check-circle'></i>" : 
                        $media->media_status . " <i class='fa fa-times-circle'></i>" ; ?>
                        </p>
                        <a href="<?= URLROOT; ?>/medias/show/<?= $media->media_id; ?>" class="btn btn-dark">Show Media</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>




<?php require APPROOT . '/views/inc/footer.php'; ?>

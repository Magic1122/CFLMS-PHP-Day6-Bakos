<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?= URLROOT; ?>/medias" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

<div class="card card-body bg-light mt-5">
    <h2>Add Author</h2>
    <p>Add a new author with this form</p>
    <form action="<?php echo URLROOT;?>/medias/addauthor/<?= $data['id'] ?>" method="POST">
        <div class="form-group">
            <label for="name">First Name: <sup>*</sup></label>
            <input type="text" 
            name="fname" 
            class="form-control form-control-lg 
            <?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['fname']; ?>"
            >
            <span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="lname">Last Name: <sup>*</sup></label>
            <input
            type="text" 
            name="lname" 
            class="form-control form-control-lg <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
            <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
        </div>
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
const form = document.getElementById('search-form')

form.addEventListener('input', (e) => {
    const text = e.target.value

    
    //$("#display").load(filePath);

    $.ajax({
        type: "POST",
        url: `searches/${text}`,
        success: function(response) {
            const medias = JSON.parse(response)
            console.log(medias)

            $('#book').empty()
            $('#cd').empty()
            $('#dvd').empty()

            medias.map((media) => {

                const status = media.media_status === 'available' ? 
                `${media.media_status} <i class='fa fa-check-circle'></i>` :
                `${media.media_status} <i class='fa fa-times-circle'></i>`

                const html = 
                `<div class="col-12 col-md-6 col-lg-3">
                <div class="card mb-4 bg-white text-dark">
                    <img src=${media.media_img} class="d-inline-block d-none d-md-inline-block card-img-top" alt="picture of a media">
                    <div class="card-body">
                        <h5 class="card-title">${media.media_title}</h5>
                        <p class="card-text">${media.isbn_asin}</p>
                        <p class="card-text">${media.media_genre}</p>
                        <p>${status}</p>
                        <a href="http://localhost/ajax_trial/medias/show/${media.media_id}" class="btn btn-dark">Show Media</a>
                    </div>
                </div>
            </div>`

            if (media.fk_type_id === '1') {
                $('#book').append(html)
            } else if (media.fk_type_id === '2') {
                $('#cd').append(html)
            } else {
                $('#dvd').append(html)
            }
            })
        }
    });

})


/* <div class="col-12 col-md-6 col-lg-3">
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
            </div> */
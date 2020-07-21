<?php
class Medias extends Controller
{
    public function __construct()
    {

        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->mediaModel = $this->model('Media');
    }

    // This function loads the view after the login with all the medias

    public function index()
    {

        // Get medias

        $medias = $this->mediaModel->getMedias();


        $data = [
            'medias' => $medias
        ];


        $this->view('medias/index', $data);
    }

    // This funtion shows a simple media when clicking the show media button

    public function show($id = '')
    {
        // Redirects if there is no value in the argument instead of showing error message to the user
        if ($id == '') {
            redirect('medias');
        }

        $media = $this->mediaModel->getMediaById($id);


        $data = [
            'media' => $media,
        ];

        $this->view('medias/show', $data);
    }

    // Adds a media

    public function add()
    {   
        if ($_SESSION['admin']) {

            $publishers = $this->mediaModel->getPublishers();
            $authors = $this->mediaModel->getAuthors();
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    
                $data = [
                    'title' => trim($_POST['title']),
                    'isbn_asin' => trim($_POST['isbn_asin']),
                    'description' => trim($_POST['description']),
                    'genre' => trim($_POST['genre']),
                    'img' => trim($_POST['img']),
                    'year' => trim($_POST['year']),
                    'type' => $_POST['type'],
                    'author' => $_POST['author'],
                    'publisher' => $_POST['publisher'],
                    'title_err' => '',
                    'isbn_asin_err' => '',
                    'description_err' => '',
                    'genre_err' => '',
                    'img_err' => '',
                    'year_err' => '',
                    'type_err' => '',
                    'author_err' => '',
                    'publisher_err' => '',
                    'publishers' => $publishers,
                    'authors' => $authors,
                ];
    
                // Validate data
                if (empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }
    
                if (empty($data['isbn_asin'])) {
                    $data['isbn_asin_err'] = 'Please enter a valid isbn/asin';
                }
    
                if (empty($data['description'])) {
                    $data['description_err'] = 'Please enter a description';
                }
    
                if (empty($data['genre'])) {
                    $data['genre_err'] = 'Please enter a genre';
                }
    
                if (empty($data['img'])) {
                    $data['img_err'] = 'Please add an img url';
                } elseif (!validImage($data['img'])) {
                    $data['img_err'] = 'Please add a valid url';
                }
    
                if (empty($data['year'])) {
                    $data['year_err'] = 'Please add a relese year';
                } elseif (strlen($data['year']) != 4) {
                    $data['year_err'] = 'Year must be in a 4 digits format (YYYY)';
                }
    
                if (empty($data['type'])) {
                    $data['type_err'] = 'Please choose a type';
                }
    
                if (empty($data['author'])) {
                    $data['author_err'] = 'Please choose an author';
                }
    
                if (empty($data['publisher'])) {
                    $data['publisher_err'] = 'Please choose a publisher';
                }
    
    
    
                // Make sure no errors
                if (
                    empty($data['title_err'])
                    && empty($data['isbn_asin_err'])
                    && empty($data['description_err'])
                    && empty($data['genre_err'])
                    && empty($data['img_err'])
                    && empty($data['year_err'])
                    && empty($data['type_err'])
                    && empty($data['author_err'])
                    && empty($data['publisher_err'])
                ) {
                    // Validated
                    if ($this->mediaModel->addMedia($data)) {
                        flash('media_message', 'Media Added');
                        redirect('medias');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('medias/add', $data);
                }
            } else {
                $data = [
                    'title' => '',
                    'isbn_asin' => '',
                    'description' => '',
                    'genre' => '',
                    'img' => '',
                    'year' => '',
                    'type' => '',
                    'author' => '',
                    'publisher' => '',
                    'publishers' => $publishers,
                    'authors' => $authors
                ];
    
                $this->view('medias/add', $data);
            }
        } else {
            redirect('medias');
        }
    }

    // Edit page logic

    public function edit($id)
    {
        if ($_SESSION['admin']) {

            $publishers = $this->mediaModel->getPublishers();
            $authors = $this->mediaModel->getAuthors();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'isbn_asin' => trim($_POST['isbn_asin']),
                    'description' => trim($_POST['description']),
                    'genre' => trim($_POST['genre']),
                    'img' => trim($_POST['img']),
                    'year' => trim($_POST['year']),
                    'status' => $_POST['status'],
                    'type' => $_POST['type'],
                    'author' => $_POST['author'],
                    'publisher' => $_POST['publisher'],
                    'title_err' => '',
                    'isbn_asin_err' => '',
                    'description_err' => '',
                    'genre_err' => '',
                    'img_err' => '',
                    'year_err' => '',
                    'status_err' => '',
                    'type_err' => '',
                    'author_err' => '',
                    'publisher_err' => '',
                    'publishers' => $publishers,
                    'authors' => $authors,
                ];

                // Validate data
                if (empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                if (empty($data['isbn_asin'])) {
                    $data['isbn_asin_err'] = 'Please enter a valid isbn/asin';
                }

                if (empty($data['description'])) {
                    $data['description_err'] = 'Please enter a description';
                }

                if (empty($data['genre'])) {
                    $data['genre_err'] = 'Please enter a genre';
                }

                if (empty($data['img'])) {
                    $data['img_err'] = 'Please add an img url';
                } elseif (!validImage($data['img'])) {
                    $data['img_err'] = 'Please add a valid url';
                }

                if (empty($data['year'])) {
                    $data['year_err'] = 'Please add a relese year';
                } elseif (strlen($data['year']) != 4) {
                    $data['year_err'] = 'Year must be in a 4 digits format (YYYY)';
                }

                if (empty($data['type'])) {
                    $data['type_err'] = 'Please choose a type';
                }

                if (empty($data['author'])) {
                    $data['author_err'] = 'Please choose an author';
                }

                if (empty($data['publisher'])) {
                    $data['publisher_err'] = 'Please choose a publisher';
                }

                if (empty($data['status'])) {
                    $data['status_err'] = 'Please choose a status';
                }



                // Make sure no errors
                if (
                    empty($data['title_err'])
                    && empty($data['isbn_asin_err'])
                    && empty($data['description_err'])
                    && empty($data['genre_err'])
                    && empty($data['img_err'])
                    && empty($data['year_err'])
                    && empty($data['type_err'])
                    && empty($data['author_err'])
                    && empty($data['publisher_err'])
                    && empty($data['status_err'])
                ) {
                    // Validated
                    if ($this->mediaModel->updateMedia($data)) {
                        flash('media_message', 'Media Edited');
                        redirect('medias/show/' . $id);
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('medias/edit', $data);
                }
            } else {

                $media = $this->mediaModel->getMediaById($id);


                $data = [
                    'id' => $id,
                    'title' => $media->media_title,
                    'isbn_asin' => $media->isbn_asin,
                    'description' => $media->media_description,
                    'genre' => $media->media_genre,
                    'img' => $media->media_img,
                    'year' => $media->media_published_year,
                    'status' => $media->media_status,
                    'type' => $media->fk_type_id,
                    'author' => $media->fk_author_id,
                    'publisher' => $media->fk_publisher_id,
                    'publishers' => $publishers,
                    'authors' => $authors,
                ];

                $this->view('medias/edit', $data);
            }
        } else {
            redirect('medias');
        }
    }

    // Delete logic

    public function delete($id)
    {
        if ($_SESSION['admin']) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $media = $this->mediaModel->getMediaById($id);


                if ($this->mediaModel->deleteMedia($id)) {
                    flash('media_message', 'Media Removed');
                    redirect('medias');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('medias');
            }
        } else {
            redirect('medias');
        }
    }

    public function addpublisher($id = '')
    {   if ($id = '') {
        redirect('medias');
    }   
        if ($_SESSION['admin']) {

            if ($_SESSION['admin']) {
    
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Sanitize POST array
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    
    
                    $data = [
                        'id' => $id,
                        'name' => trim($_POST['name']),
                        'address' => trim($_POST['address']),
                        'city' => trim($_POST['city']),
                        'zip' => trim($_POST['zip']),
                        'type' => $_POST['type'],
                        'name_err' => '',
                        'city_err' => '',
                        'zip_err' => '',
                        'type_err' => '',
                    ];
    
    
                    // Validate data
                    if (empty($data['name'])) {
                        $data['name_err'] = 'Please enter a name';
                    }
    
                    if (empty($data['address'])) {
                        $data['address_err'] = 'Please enter an address';
                    }
    
                    if (empty($data['city'])) {
                        $data['city_err'] = 'Please enter a city';
                    }
    
                    if (empty($data['zip'])) {
                        $data['zip_err'] = 'Please enter a zip code';
                    } elseif (!is_int(intval($data['zip']))) {
                        $data['zip_err'] = 'Please enter just digits';
                    }
    
                    if (empty($data['type'])) {
                        $data['type_err'] = 'Please choose a type';
                    }
    
    
    
                    // Make sure no errors
                    if (
                        empty($data['name_err'])
                        && empty($data['city_err'])
                        && empty($data['address_err'])
                        && empty($data['zip_err'])
                        && empty($data['type_err'])
                    ) {
                        // Validated
                        if ($this->mediaModel->addPublisher($data)) {
                            if ($id == 0) {
                                flash('media_message', 'Publisher Added');
                                redirect('medias/add');
                            } else {
                                flash('media_message', 'Publisher Added');
                                redirect('medias/edit/' . $id);
                            }
                        } else {
                            flash('media_message', 'Publisher Exists');
                            $this->view('medias/addpublisher', $data);
                        }
                    } else {
                        // Load view with errors
                        $this->view('medias/addpublisher', $data);
                    }
                } else {
    
    
                    $data = [
                        'id' => $id,
                        'name' => '',
                        'city' => '',
                        'address' => '',
                        'zip' => '',
                        'type' => '',
                        'name_err' => '',
                        'city_err' => '',
                        'zip_err' => '',
                        'type_err' => '',
                    ];
    
                    $this->view('medias/addpublisher', $data);
                }
            } else {
                redirect('medias');
            }
        }
        
    }

    // Add author logic

    public function addauthor($id = '')
    {   if ($id == '') {
        redirect('medias');
    }
        if ($_SESSION['admin']) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    
    
                $data = [
                    'id' => $id,
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'fname_err' => '',
                    'lname_err' => ''
                ];
    
    
                // Validate data
                if (empty($data['fname'])) {
                    $data['fname_err'] = 'Please enter a first name';
                }
    
                if (empty($data['lname'])) {
                    $data['lname_err'] = 'Please enter a last name';
                }
    
    
                // Make sure no errors
                if (
                    empty($data['fname_err'])
                    && empty($data['lname_err'])
                ) {
                    // Validated
                    if ($this->mediaModel->addAuthor($data)) {
                        if ($id == 0) {
                            flash('media_message', 'Author Added');
                            redirect('medias/add');
                        } else {
                            flash('media_message', 'Author Added');
                            redirect('medias/edit/' . $id);
                        }
                    } else {
                        flash('media_message', 'Publisher Exists');
                        $this->view('medias/addauthor', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('medias/addauthor', $data);
                }
            } else {
    
    
                $data = [
                    'id' => $id,
                    'fname' => '',
                    'lname' => '',
                    'fname_err' => '',
                    'lname_err' => ''
                ];
    
                $this->view('medias/addauthor', $data);
            }
        } else {
            redirect('medias');
        }
    }

    // Shows medias by publisher logic

    public function publisher($id)
    {

        // Get medias

        $medias = $this->mediaModel->getMediasByPublisher($id);


        $data = [
            'medias' => $medias
        ];


        $this->view('medias/publisher', $data);
    }
}

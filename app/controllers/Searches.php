<?php

class Searches extends Controller
{
    public function __construct()
    {

        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->mediaModel = $this->model('Media');
    }

    public function index($text = '') {


            $data = $this->mediaModel->searchMedias($text);
            //var_dump($data);
    
            echo json_encode($data);

    }
}
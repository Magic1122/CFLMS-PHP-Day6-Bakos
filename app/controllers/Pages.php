<?php
    class Pages extends Controller {
        public function __construct() {

        }

        public function index() {

            if (isLoggedIn()) {
                redirect('medias');
            }

            $data = [
                'title' => 'The Big Library', 
                'description' => 'This is the Big Library Proejct build in MVC Pattern with pure PHP.'
            ];

            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About Us', 
                'description' => 'App to control library data' 
            ];
            
            $this->view('pages/about', $data);
        }
    }
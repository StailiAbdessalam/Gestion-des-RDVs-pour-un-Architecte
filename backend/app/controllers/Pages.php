<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'TraversyMVC',
      ];
     
      // $this->view('pages/index', $data);
      $this->json(["message" => "success"]);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $model = $this->model("User");
      // $this->view('pages/about', $data);
      $this->json(["message" => "success"]);
    }
  }
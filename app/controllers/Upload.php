<?php

class Upload extends Controller
{
  public function index($page = "")
  {
    header("Location:" . ROOT . "upload/image");
    die();
  }

  public function image()
  {
    $user = $this->loadModel("user");

    if (!$result = $user->checkLoggedIn()) {
      header("Location:" . ROOT . "login");
      die();
    }
    $data['page_title'] = "Upload";
    $this->view("minimalista/upload", $data);
  }
}

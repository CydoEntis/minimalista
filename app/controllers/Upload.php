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

    if (isset($_POST['title']) && isset($_FILES['file'])) {
      $uploader = $this->loadModel("UploadFile");
      $uploader->upload($_POST, $_FILES);
    }

    $data['page_title'] = "Upload";
    $this->view("minimalista/upload", $data);
  }
}

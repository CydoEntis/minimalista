<?php

class Signup extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Signup";

    if (isset($_POST['email'])) {
      $user = $this->loadModel("user");
      $user->signup($_POST);
    } else if (isset($_POST['username']) && !isset($_POST['email'])) {
      $user = $this->loadModel("user");
      $user->login($_POST);
    }

    $this->view("minimalista/signup", $data);
  }
}

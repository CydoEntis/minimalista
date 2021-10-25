<?php

class Login extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Login";

    if (isset($_POST['email'])) {
      $user = $this->loadModel("user");
      $user->signup($_POST);
    } else if (isset($_POST['username']) && !isset($_POST['email'])) {
      $user = $this->loadModel("user");
      $user->login($_POST);
    }

    $this->view("minimalista/login", $data);
  }
}

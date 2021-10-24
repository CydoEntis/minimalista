<?php

class Login extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Login";
    $this->view("minimalista/login", $data);
  }
}

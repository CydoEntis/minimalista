<?php

class Signup extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Signup";
    $this->view("minimalista/signup", $data);
  }
}

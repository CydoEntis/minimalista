<?php

class Home extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Home Page";
    $this->view("home", $data);
  }
}

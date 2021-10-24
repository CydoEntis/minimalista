<?php

class Home extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Homepage";
    $this->view("minimalista/index", $data);
  }
}

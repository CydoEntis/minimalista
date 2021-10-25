<?php

class Home extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Homepage";

    $posts = $this->loadModel("Posts");
    $result = $posts->getAll();

    $data['posts'] = $result;

    $this->view("minimalista/index", $data);
  }
}

<?php

class Upload extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Upload";
    $this->view("minimalista/upload", $data);
  }

  public function image($page = "")
  {
    $data['page_title'] = "Upload";
    $this->view("minimalista/upload", $data);
  }
}

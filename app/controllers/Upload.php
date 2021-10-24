<?php

class Upload extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Upload";
    $this->view("minimalista/upload", $data);
  }
}

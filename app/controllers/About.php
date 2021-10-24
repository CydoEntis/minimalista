<?php

class About extends Controller
{
  public function index()
  {
    $data['page_title'] = "About page";
    $this->view("minimalista/about-us", $data);
  }
}

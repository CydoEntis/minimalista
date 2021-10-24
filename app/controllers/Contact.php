<?php

class Contact extends Controller
{
  public function index($page = "")
  {
    $data['page_title'] = "Contact";
    $this->view("minimalista/contact", $data);
  }
}

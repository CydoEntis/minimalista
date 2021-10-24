<?php

class Home extends Controller
{
  public function index($page = "")
  {
    $this->view("home");
  }
}

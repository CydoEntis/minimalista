<?php

class Logout extends Controller
{
  public function index()
  {
    $user = $this->loadModel("User");
    $user->logout();
  }
}

<?php

class User
{
  public function login($post)
  {
    $db = new Database();
    $_SESSION['error'] = '';
    if (isset($post['username']) && isset($post['password'])) {
      $arr = ['username' => $post['username'], 'password' => $post['password']];

      $sql = "SELECT * FROM users WHERE username = :username && password = :password LIMIT 1";
      $data = $db->read($sql, $arr);

      if (is_array($data)) {
        $_SESSION['username'] = $data[0]->username;
        $_SESSION['user_url'] = $data[0]->url_address;

        header("Location:" . ROOT . "home");
        die();
      } else {
        $_SESSION['error'] = "Incorrect username or password";
      }
    } else {
      $_SESSION['error'] = "Please enter a valid username and password";
    }
  }

  public function signUp($post)
  {
    $db = new Database();
    $_SESSION['error'] = '';

    if (isset($post['username']) && isset($post['password'])) {
      $arr = ['username' => $post['username'], 'password' => $post['password'], 'email' => $post['email']];

      $sql = "INSERT INTO users (username, email, password) values (:username, :email, :password)";
      $data = $db->write($sql, $arr);

      if ($data) {
        header("Location: " . ROOT . "login");
        die();
      }
    } else {
      $_SESSION['error'] = "Please enter a valid username and password";
    }
  }

  public function checkLoggedIn()
  {
    $db = new Database();

    if (isset($_SESSION['user_url'])) {
      $arr = ['user_url' => $_SESSION['user_url']];
      $sql = "SELECT * FROM users WHERE url_address = :user_url LIMIT 1";
      $data = $db->read($sql, $arr);

      if (is_array($data)) {
        $_SESSION['username'] = $data[0]->username;
        $_SESSION['user_url'] = $data[0]->url_address;

        return true;
      } else {
        $_SESSION['error'] = "Incorrect username or password";
      }
    }
    return false;
  }
}

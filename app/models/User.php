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

  public function logout()
  {
    unset($_SESSION['username']);
    unset($_SESSION['user_url']);

    header("Location:" . ROOT . "login");
    die();
  }


  public function signUp($post)
  {
    $db = new Database();
    $_SESSION['error'] = '';

    if (isset($post['username']) && isset($post['password'])) {
      $arr = [
        'username' => $post['username'],
        'password' => $post['password'],
        'email' => $post['email'],
        'url_address' => get_random_string_max(60),
        'date' => date("Y-m-d H:i:s"),
      ];

      $sql = "INSERT INTO users (username, email, password, url_address, date) values (:username, :email, :password, :url_address, :date)";
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

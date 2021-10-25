<?php

class UploadFile
{
  function upload($post, $files)
  {
    $db = new Database();
    $_SESSION['error'] = "";
    $allowedTypes = ['image/jpeg'];

    if (isset($post['title']) && isset($files['file'])) {
      // Upload file
      if ($files['file']['name'] !== "" && $files['file']['error'] === 0 && in_array($files['file']['type'], $allowedTypes)) {
        $folder = "uploads/";
        if (!file_exists($folder)) {
          mkdir($folder, 0777, true);
        }

        $destination = $folder . $files['file']['name'];
        move_uploaded_file($files['file']['tmp_name'], $destination);
      } else {
        $_SESSION['error'] = "This file could not be uploaded";
      }

      if ($_SESSION['error'] === "") {
        $arr['title'] = $post['title'];
        $arr['description'] = $post['description'];
        $arr['image'] = $destination;

        $arr['url_address'] = get_random_string_max(60);
        $arr['date'] = date("Y-m-d H:i:s");

        $sql = "insert into images (title, description, url_address, date, image) values (:title, :description, :url_address, :date, :image)";

        $data = $db->write($sql, $arr);

        if ($data) {
          header("Location: " . ROOT . "Home");
          die();
        }
      }
    }
  }
}

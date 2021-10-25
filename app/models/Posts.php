<?php

class Posts
{
  public function getAll()
  {
    $db = new Database();
    $sql = "SELECT * FROM images ORDER BY id DESC LIMIT 12";
    $data = $db->read($sql);

    if (is_array($data)) {
      return $data;
    }

    return false;
  }
}

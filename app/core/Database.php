<?php

class Database
{
  public function databaseConnect()
  {
    try {
      $dsn = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
      return $database = new PDO($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function read($sql, $data = [])
  {
    $db = $this->databaseConnect();
    $stmt = $db->prepare($sql);

    if (count($data) === 0) {
      $stmt = $db->query($sql);
      $check = 0;

      if ($stmt) {
        $check = 1;
      }
    } else {
      $check = $stmt->execute($data);
    }

    if ($check) {
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    return false;
  }

  public function write($sql, $data = [])
  {
    $db = $this->databaseConnect();
    $stmt = $db->prepare($sql);

    if (count($data) === 0) {
      $stmt = $db->query($sql);
      $check = 0;

      if ($stmt) {
        $check = 1;
      }
    } else {
      $check = $stmt->execute($data);
    }

    if ($check) {
      return true;
    }
    return false;
  }
}

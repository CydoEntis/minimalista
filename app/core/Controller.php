<?php

class Controller
{
  /**
   * Check to see if a view exists
   * If it does display otherwise 404
   *
   * @param string $view 
   * @param array $data
   * @return void
   */
  protected function view(string $view, array $data = []): void
  {
    if (file_exists("../app/views/{$view}.php")) {
      include "../app/views/{$view}.php";
    } else {
      include "../app/views/404.php";
    }
  }

  /**
   * Check to see if a model exists
   * if it does instantiate the model
   *
   * @param string $model
   * 
   */
  protected function loadModel($model)
  {
    if (file_exists("../app/models/{$model}.php")) {
      include "../app/models/{$model}.php";

      return $model = new $model();
    }

    return false;
  }
}

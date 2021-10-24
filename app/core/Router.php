<?php

class Router
{

  private $controller = "Home";
  private $method = "index";
  private $params = [];

  public function __construct()
  {

    $url = $this->splitUrl(); // Split the URL

    $url = $this->getControllerFromUrl($url); // Grab the controller from the URL
    $url = $this->getMethodFromUrl($url); // Grab the method from the URL
    $url = $this->getParamsFromUrl($url); // Grab the params from the URL
    $url = $this->runControllerAndMethod($url); // Run the controller and method
  }


  /**
   * Runs the controller class and corresponding method.
   *
   * @return void
   */
  private function runControllerAndMethod(): void
  {
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  /**
   * Gets the params from the url.
   *
   * @param array $url
   * @return void
   */
  private function getParamsFromUrl(array $url): void
  {
    $this->params = array_values($url);
  }

  /**
   * Gets the method from the url.
   * If the method exists store it as the current method.
   * Remove the method from the array.
   *
   * @param array $url
   * @return void
   */
  private function getMethodFromUrl(array $url): array
  {
    if (isset($url[1])) {

      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }
    return $url;
  }

  /**
   * Get the controller from the url.
   * If the controller exists format it and set is as the current controller.
   * Remove controller from the array.
   *
   * @param array $url
   * @return void
   */
  private function getControllerFromUrl(array $url): array
  {
    if (file_exists("../app/controllers/" . ucfirst(strtolower($url[0])) . ".php")) {
      $this->controller = ucfirst(strtolower($url[0]));
      unset($url[0]);
    }

    require "../app/controllers/{$this->controller}.php";
    $this->controller = new $this->controller;
    return $url;
  }

  /**
   * Sanitize the url.
   * Split the url on the /'s
   * Store in an array
   *
   * @return array
   */
  private function splitUrl(): array
  {
    $url = isset($_GET['url']) ? $_GET['url'] : "home";
    return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
  }
}

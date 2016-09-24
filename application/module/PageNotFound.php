<?php
use app\Module;

class PageNotFound extends Module {
  public function __construct() {
    parent::__construct();
  }
  public function run() {
    $this->View->load("template/header");
    $this->View->load("404");
    $this->View->load("template/footer");
  }
}
?>
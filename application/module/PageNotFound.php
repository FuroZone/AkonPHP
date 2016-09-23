<?php
use app\Module;

class PageNotFound extends Module {
  public function __construct() {
    parent::__construct();
  }
  public function run() {
    $this->View->load("404");
  }
}
?>
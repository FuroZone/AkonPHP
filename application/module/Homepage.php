<?php
use app\Module;

class Homepage extends Module {
  public function __construct() {
    parent::__construct();
  }
  public function run() {
    $this->title("FuroZone: Under Construction");
    $this->View->load("template/header");
    $this->View->load("home");
    $this->View->load("template/footer");
  }
}
?>
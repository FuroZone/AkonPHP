<?php
use app\Module;

class Homepage extends Module {
  public function __construct() {
    parent::__construct();
  }
  public function run() {
    $this->View->load("default");
  }
}
?>
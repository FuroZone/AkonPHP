<?php
use app\Module;

class PageNotFound extends Module {
  private $HeaderData;
  public function __construct() {
    parent::__construct();
    $this->HeaderData['current'] = null;
  }
  public function run() {
    $this->title("FuroZone Technologies: 404");
    $this->View->load("template/header", $this->HeaderData);
    $this->View->load("404");
    $this->View->load("template/footer");
  }
}
?>
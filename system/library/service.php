<?php
namespace app;

abstract class Service {
  protected $Redirect;
  public function __construct() {
    $this->Redirect = "/";
  }
  
  public function endService() {
    header("Location: ".$this->Redirect);
  }
  
  public function header($status = "200 OK") {
    header("HTTP/1.1 $status");
  }
  
  public abstract function run();
}
<?php
namespace app\library;
use app\redefines\View;

class Modal {
  private $Title;
  private $Message;
  private $Closeable;
  
  private $View;
  
  public function __construct($title = "", $message = "", $closeable = true) {
    $this->Title = $title;
    $this->Message = $message;
    $this->Closeable = $closeable;
    
    $this->View = new View();
    $this->View->load("modal/startup");
  }
  
  public function title($title = null) {
    if(!$title) {
      return $this->Title;
    }
    $this->Title = $title;
  }
  
  public function message($message = null) {
    if(!$message) {
      return $this->Message;
    }
    $this->Message = $message;
  }
  
  public function closeable($closeable = null) {
    if($closeable === null) {
      return $this->Closeable;
    }
    $this->Closeable = $closeable;
  }
  
  public function generate() {
    $data = array("header" => $this->Title,
                  "message" => $this->Message,
                  "closeable" => $this->Closeable);
    
    $this->View->load("modal/default", $data);
  }
}

?>
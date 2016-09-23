<?php
namespace app;

class Utility {
  public function binarySearch($array, $key) {
    $sorted = $array;
    asort($sorted);
    if($sorted != $array) {
      return false;
    }
    return $this->binSearch_recur($sorted, $key, 0, sizeof($sorted));
  }
  private function binSearch_recur($array, $key, $begin, $end) {
    $mid = floor($end/2);
    $cmp = strcmp($key, $array[$mid]);
    if($cmp != 0 && ($mid == $end || $begin == $mid)) {
      return false;
    }elseif($cmp < 0) {
      return $this->binSearch_recur($array, $key, $begin, $mid);
    }elseif($cmp > 0) {
      return $this->binSearch_recur($array, $key, $mid, $end);
    }else{
      return $mid;
    }
  }
}
?>
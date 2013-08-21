<?php
namespace mychaelstyle\fops;

use \mychaelstyle\fops\Ops;

class OpsShow implements Ops {
  public function __construct(){
  }
  public function canDo($path){
    return true;
  }
  public function ooops($filePath,Printers $printers){
    echo $filePath."\n";
  }
}

<?php
/**
 * Folder operation object class
 * @package mychaelstyle
 * @subpackage fops
 */
namespace mychaelstyle\fops;

use \mychaelstyle\fops\Ops;
use \mychaelstyle\fops\Printer;
use \mychaelstyle\fops\Printers;

/**
 * Folder operation object class
 * @package mychaelstyle
 * @subpackage fops
 */
class Folder {
  /**
   * @var $path
   */
  private $path = null;
  /**
   * @var array $oops
   */
  private $oops = array();
  /**
   *
   */
  private $printers;
  /**
   * constructor
   * @param string $path
   */
  public function __construct($path){
    if(is_null($path) || strlen($path)==0){
      throw new Exception(get_class($this).' folder path is required!');
    } else if(!is_dir($path)){
      throw new Exception(get_class($this).' folder path is not exist! '.$path);
    }
    $this->path = $path;
    $this->printers = new Printers();
  }
  /**
   * Add File Ops object
   * @param Ops $ops
   */
  public function addOps(Ops $ops){
    $this->oops[] = $ops;
  }
  /**
   * add printer
   * @param Printer $printer
   */
  public function addPrinter(Printer $printer){
    $this->printers->add($printer);
  }
  /**
   * operate
   */
  public function operate(){
    $this->scan($this->path);
  }
  /**
   * do ooops!!
   */
  private function ooops($filePath){
    if(!file_exists($filePath)){
      throw new Exception(get_class($this).' file does not exist! '.$filePath);
    }
    foreach($this->oops as $ops){
      if($ops->canDo($filePath)){
        $ops->ooops($filePath,$this->printers);
      }
    }
  }
  /**
   * scan dir
   */
  private function scan($dir,$recursive=true){
    $files = scandir($dir);
    foreach($files as $file){
      if('.'==$file || '..'==$file){
        continue;
      }
      $path = $dir.'/'.$file;
      if(is_dir($path)){
        $this->ooops($path);
        if($recursive){
          $this->scan($path,$recursive);
        }
      } else if(is_file($path)){
        $this->ooops($path);
      }
    }
  }
}

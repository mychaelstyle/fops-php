<?php
namespace mychaelstyle\fops;
require_once dirname(__FILE__).'/Printer.php';

class PrinterStdOut implements Printer {
  private $attrs = array();
  public function output($string,$tag=null){
    echo "[$tag] $string\n";
  }
  public function notify($message,$tag=null,$priorigy=60){
    echo "[$tag] $priorigy\n";
  }
}

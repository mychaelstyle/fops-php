<?php
/**
 * printer
 * @package mychaelstyle
 * @subpackage fops
 */
namespace mychaelstyle\fops;

/**
 * printer
 * @package mychaelstyle
 * @subpackage fops
 */
interface Printer {
  const DEBUG = 70;
  const INFO  = 60;
  const NOTICE = 50;
  const WARN = 40;
  const ERROR = 30;
  const CRITICAL = 20;
  const ALERT = 10;
  const EMERGENCY = 0;
  public function notify($message,$tag=null,$priority=60);
  public function output($strings,$tag=null);
}


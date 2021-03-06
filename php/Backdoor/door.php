<?php
// set start time
define('START',microtime(true));

//Global Constant
define('ROOT',realpath('../../').'/');
define('_PHP',ROOT.'php/');
define('_FILES',ROOT.'files/');
define('__APP',_PHP.'App/');
define('__CONF',_PHP.'Conf/');
define('__CORE',_PHP.'Core/');
define('__TPL',_PHP.'Tpl/');

error_reporting(E_ALL & ~E_NOTICE);
set_error_handler(function($no,$str,$file,$line){
  #debug_print_backtrace();
  while(@ob_end_clean());
  header('Content-type: application/json');
  echo json_encode(['status'=>'FAIL',
  'message'=>'<strong>Jarm Engine - เกิดข้อผิดพลาด!</strong><br>
    [ domain: '.$_SERVER['HTTP_HOST'].' ]<br>
    [ no: '.$no.' ]<br>
    [ msg: '.str_replace(ROOT,'/',$str).' ]<br>
    [ line: '.$line.' in '.str_replace(ROOT,'/',$file).' ]<br>
    [ server: '.$_SERVER['SERVER_ADDR'].' ]'
  ]);
  exit;
},E_ALL & ~E_NOTICE);

//Autoload function
spl_autoload_register(function($c)
{
  $cl=[
    'Jarm'=>'',
    'Browser'=>'Vendor/cbschuld/browser.php/lib/Browser',
    'Facebook'=>'Vendor/facebook/graph-sdk/src/Facebook/autoload',
  ];
  list($n,$f)=explode('\\',$c,2);
  if(isset($cl[$n]))
  {
    require_once(_PHP.($cl[$n]?:str_replace('\\','/',$f)).'.php');
  }
});

#
Jarm\Core\Load::Init([]);

$db=Jarm\Core\Load::DB();
$time=Jarm\Core\Load::Time();
$upload=Jarm\Core\Load::Upload();
$folder=Jarm\Core\Load::Folder();

?>

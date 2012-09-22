<?php

  function render($view){
    $GLOBALS['file'] = "../views/{$view}.php";
    include('../views/layout.php');
  }

  function yield(){
    include($GLOBALS['file']);
  }

  function get($path){
    $values = explode('/', substr($_SERVER['REQUEST_URI'],1));
    $conditions = explode('/', substr($path,1));
    if(sizeof($values) != sizeof($conditions))
      return false;
    $index = 0;
    foreach($conditions as $condition){
      if(substr($condition,0,1) == ':'){
        $GLOBALS[substr($condition, 1)] = $values[$index];
      }else{
        if($condition != $values[$index])
          return false;
      }
      $index++;
    }
    return true;
  }

  function loadDir($dir){
    $root = scandir($dir);
    foreach($root as $value){
      if($value === '.' || $value === '..') {continue;}
        if(is_file("$dir/$value")) {$result[]="$dir/$value";continue;}
          foreach(loadDir("$dir/$value") as $value){
            $result[]=$value;
          }
    }
    return $result;
  }

  foreach(loadDir('../lib') as $file){
    if($file != '../lib/framework.php')
      include($file);
  }

  function underscore($string){
    return strtolower(preg_replace('/(?<!^)([A-Z])/', '_\\1', $string));
  }

  include('../index.php');

?>

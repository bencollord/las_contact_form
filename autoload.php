<?php

function loadClass($class) {
  //parse namespace and class into file path
  $classPath = LIB_PATH . strtolower(str_replace('\\', DS, $class)) . '.class.php';
  //$rulePath  = "library/rules/$fileName";
  
  if(file_exists($classPath))
  {
    include_once $classPath;
    return true;
  }
  return false; 
}

function loadTrait($trait) {
  $traitPath = LIB_PATH . strtolower($trait).'.trait.php';
  if(file_exists($traitPath))
  {
    include_once $traitPath;
    return true; 
  }
  return false;
  
}

spl_autoload_register('loadClass');
spl_autoload_register('loadTrait');
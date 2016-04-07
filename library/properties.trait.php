<?php 

/**
 * Allows classes that use it to use properties as
 * in C# and Java.
 * 
 * When an inaccessable object property 
 * is accessed, it searches the class for a getter or 
 * setter method that matches the property name
 */
trait Properties
{
  public function __get($name)
  {
    if(substr($name, 0, 2) == 'is' && method_exists($this, $name))
    {
      return $this->{$name}();
    }
    if(method_exists($this, 'get'.ucfirst($name))) 
    {
      return $this->{'get'.ucfirst($name)}();
    }
    throw new Exception('Could not get property "'.$name.'"');
  }

  public function __set($name, $value)
  {
    if (method_exists($this, 'set'.ucfirst($name))) 
    {
      return $this->{'set'.ucfirst($name)}($value);
    }
    throw new Exception('Could not set property "'.$name.'"');
  }
  
}

<?php

class User
{
  private $_id;
  private $_username;
  private $_email;
  private $_type;
  private $_password;

  public function getId()
  {
    return $this->_id;
  }

  public function getUsername()
  {
    return $this->_username;
  }

  public function getEmail()
  {
    return $this->_email;
  }

  public function getType()
  {
    return $this->_type;
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function setId($x)
  {
    $this->_id = $x;
  }

  public function setUsername($x)
  {
    $this->_username = $x;
  }

  public function setEmail($x)
  {
    $this->_email = $x;
  }

  public function setType($x)
  {
    $this->_type = $x;
  }
  
  public function setPassword($x)
  {
    $this->_password = $x;
  }
}

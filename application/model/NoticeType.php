<?php

class NoticeType
{
  private $_id;
  private $_typeName;
  private $_color;

  public function getId()
  {
    return $this->_id;
  }
  public function getTypeName()
  {
    return $this->_typeName;
  }
  public function getColor()
  {
    return $this->_color;
  }
  public function setId($x)
  {
    $this->_id = $x;
  }
  public function setTypeName($x)
  {
    $this->_typeName = $x;
  }
  public function setColor($x)
  {
    $this->_color = $x;
  }
}

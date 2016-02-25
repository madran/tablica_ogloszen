<?php

class Notice
{
  private $_id;
  private $_title;
  private $_content;
  private $_addDate;
  private $_userId;
  private $_noticeTypeId;
  private $_color;

  public function getId()
  {
    return $this->_id;
  }
  public function getTitle()
  {
    return $this->_title;
  }
  public function getContent()
  {
    return $this->_content;
  }
  public function getAddDate()
  {
    return $this->_addDate;
  }
  public function getUserId()
  {
    return $this->_userId;
  }
  public function getNoticeTypeId()
  {
    return $this->_noticeTypeId;
  }
  public function getColor()
  {
    return $this->_color;
  }
  public function setId($x)
  {
    $this->_id = $x;
  }
  public function setTitle($x)
  {
    $this->_title = $x;
  }
  public function setContent($x)
  {
    $this->_content = $x;
  }
  public function setAddDate($x)
  {
    $this->_addDate = $x;
  }
  public function setUserId($x)
  {
    $this->_userId = $x;
  }
  public function setNoticeTypeId($x)
  {
    $this->_noticeTypeId = $x;
  }
  public function setColor($x)
  {
    $this->_color = $x;
  }
}

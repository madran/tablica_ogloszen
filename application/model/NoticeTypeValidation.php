<?php

class NoticeTypeValidation
{
  protected $_validator;
  public function __construct($validator)
  {
    $validator->add(
        [
          'name' => 'type_name',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars'],
          'validators' => [
                            'StringLenght' => ['max' => 25]
                          ]
        ]
    );

    $validator->add(
        [
          'name' => 'color',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags'],
          'validators' => [
                            'StringLenght' => ['max' => 6],
                            'RegExp' => '/^[0-9ABCDEF]+$/'
                          ]
        ]
    );

    $this->_validator = $validator;
  }

  public function isValid($values)
  {
    return $this->_validator->isValid($values);
  }

  public function getValidator()
  {
    return $this->_validator;
  }
}

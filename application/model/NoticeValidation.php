<?php

class NoticeValidation
{
  protected $_validator;
  public function __construct($validator)
  {
    $validator->add(
        [
          'name' => 'title',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars'],
          'validators' => [
                            'StringLenght' => ['max' => 75]
                          ]
        ]
    );

    $validator->add(
        [
          'name' => 'content',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars']
        ]
    );

    $validator->add(
        [
          'name' => 'notice_type_id',
          'require' => true,
          'validators' => [
                            'RegExp' => '/^[0-9]+$/'
                          ]
        ]
    );

    $validator->add(
        [
          'name' => 'user_id',
          'require' => true,
          'validators' => [
                            'RegExp' => '/^[0-9]+$/'
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

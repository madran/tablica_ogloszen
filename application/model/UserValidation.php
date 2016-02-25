<?php

class UserValidation
{
  protected $_validator;
  public function __construct($validator)
  {
    $validator->add(
        [
          'name' => 'username',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars'],
          'validators' => [
                            'StringLenght' => ['max' => 75]
                          ]
        ]
    );

    $validator->add(
        [
          'name' => 'email',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars'],
          'validator' => ['EMail' => true]
        ]
    );

    $validator->add(
        [
          'name' => 'password',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars']
        ]
    );

    $validator->add(
        [
          'name' => 'type',
          'require' => true,
          'filters' => ['StringTrim', 'StripTags', 'HTMLSpecialChars'],
          'validators' => [
                            'RegExp' => '/admin|user/'
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

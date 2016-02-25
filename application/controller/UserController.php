<?php

class UserController extends Mpf\GenericController
{
  public function indexAction()
  {
    $userMapper = new UserMapper();

    $users = $userMapper->getAll();

    $this->_view->users = $users;
  }

  public function showAction()
  {
    $userMapper = new UserMapper();

    $user = $userMapper->getAll();

    $this->_view->user = $user;
  }

  public function addAction()
  {

    if ($this->_request->isPost()) {
      $userValidator = new UserValidation(new Mpf\Validator());
      $validationResult = $userValidator->isValid($this->_request->getPostValues());
      if ($validationResult) {
        $user = new User();
        $user->setUsername($userValidator->getValidator()->get('username'));
        $user->setEmail($userValidator->getValidator()->get('email'));
        $user->setPassword($userValidator->getValidator()->get('password'));
        $user->setType($userValidator->getValidator()->get('type'));

        $userMapper = new UserMapper();
        $userMapper->save($user);

        $this->_registry->getResource('application')->setNewRoute('user', 'index');
      } else {
        $this->_view->error = $userValidator->getValidator()->getAllResults();
      }
    }
  }

  public function editAction()
  {
    $view = $this->_registry->getResource('view');
    if ($this->_request->isPost()) {
      $userValidator = new UserValidation(new Mpf\Validator());
      $validationResult = $userValidator->isValid($this->_request->getPostValues());
      if ($validationResult) {
        $user = new User();
        $user->setId($this->_request->getPostValue('id'));
        $user->setUsername($userValidator->getValidator()->get('username'));
        $user->setEmail($userValidator->getValidator()->get('email'));
        $user->setType($userValidator->getValidator()->get('type'));

        $userMapper = new UserMapper();
        $userMapper->update($user);

        $this->_registry->getResource('application')->setNewRoute('user', 'index');
      } else {
        $this->_view->error = $userValidator->getValidator()->getAllResults();
      }
    } else {
      $userMapper = new UserMapper();
      $user = $userMapper->find($this->_request->getGetValue('id'));
      $view->user = $user;
    }
  }

  public function deleteAction()
  {
    $userMapper = new UserMapper();
    $userMapper->delete($this->_request->getGetValue('id'));
    $this->_registry->getResource('application')->setNewRoute('user', 'index');
  }

  public function registerAction()
  {
    $view = $this->_registry->getResource('view');
    if ($this->_request->isPost()) {
      $userValidator = new UserValidation(new Mpf\Validator());
      $validationResult = $userValidator->isValid($this->_request->getPostValues());
      $passwordCheck = ($this->_request->getPostValue('password') == $this->_request->getPostValue('password2'));
      if ($validationResult && $passwordCheck) {
        $user = new User();
        $user->setUsername($userValidator->getValidator()->get('username'));
        $user->setEmail($userValidator->getValidator()->get('email'));
        $user->setPassword($userValidator->getValidator()->get('password'));
        $user->setType($userValidator->getValidator()->get('type'));

        $userMapper = new UserMapper();
        $userMapper->save($user);

        $this->_registry->getResource('application')->setNewRoute('user', 'login');
      } else {
        $this->_view->error = $userValidator->getValidator()->getAllResults();
      }
    }
  }

  public function loginAction()
  {
    if ($this->_request->isPost()) {
      $session = $this->_registry->getResource('session');

      $authentication = new Mpf\Authentication((new UserMapper())->getTable()->getAdapter()->getDbHandler());
      $authentication->setIdentity($this->_request->getPostValue('username'));
      $authentication->setCredential($this->_request->getPostValue('password'));

      $result = $authentication->authenticate();

      if ($result) {
        $view = $this->_registry->getResource('view');

        $session->setSessionVar('logged', $result);
        $view->loggedUser = $result;

        $this->_registry->getResource('application')->setNewRoute('notice', 'index');
      } else {
        $session->setSessionVar('logged', false);
      }
    }
  }

  public function logoutAction()
  {
    $session = $this->_registry->getResource('session');
    $view = $this->_registry->getResource('view');

    $session->setSessionVar('logged', false);
    $view->loggedUser = false;

    $this->_registry->getResource('application')->setNewRoute('notice', 'index');
  }
}

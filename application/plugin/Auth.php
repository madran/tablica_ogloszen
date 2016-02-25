<?php

use Mpf\Authorization\Role;
use Mpf\Authorization\Resource;

class Auth extends Mpf\Application\Plugin
{
  public function run()
  {
    $auth = new Mpf\Authorization();

    $auth->addRole(new Role('guest'));
    $auth->addRole(new Role('user'), ['guest']);
    $auth->addRole(new Role('admin'), ['user']);

    $auth->addResource(new Resource('notice', 'index'));
    $auth->addResource(new Resource('notice', 'show'));
    $auth->addResource(new Resource('notice', 'add'));
    $auth->addResource(new Resource('notice', 'edit'));
    $auth->addResource(new Resource('notice', 'delete'));
    $auth->addResource(new Resource('noticeType', 'index'));
    $auth->addResource(new Resource('noticeType', 'show'));
    $auth->addResource(new Resource('noticeType', 'add'));
    $auth->addResource(new Resource('noticeType', 'edit'));
    $auth->addResource(new Resource('noticeType', 'delete'));
    $auth->addResource(new Resource('user', 'index'));
    $auth->addResource(new Resource('user', 'show'));
    $auth->addResource(new Resource('user', 'add'));
    $auth->addResource(new Resource('user', 'edit'));
    $auth->addResource(new Resource('user', 'delete'));
    $auth->addResource(new Resource('user', 'login'));
    $auth->addResource(new Resource('user', 'logout'));
    $auth->addResource(new Resource('user', 'register'));

    $auth->allow('guest', 'user', 'login');
    $auth->allow('guest', 'user', 'register');
    $auth->allow('guest', 'notice', 'index');
    $auth->allow('guest', 'notice', 'show');

    $auth->allow('user', 'user', 'logout');
    $auth->allow('user', 'notice', 'add');
    $auth->allow('user', 'notice', 'delete');

    $auth->allow('admin', 'user', 'index');
    $auth->allow('admin', 'user', 'show');
    $auth->allow('admin', 'user', 'add');
    $auth->allow('admin', 'user', 'edit');
    $auth->allow('admin', 'user', 'delete');
    $auth->allow('admin', 'notice', 'edit');
    $auth->allow('admin', 'noticeType', 'index');
    $auth->allow('admin', 'noticeType', 'show');
    $auth->allow('admin', 'noticeType', 'add');
    $auth->allow('admin', 'noticeType', 'edit');
    $auth->allow('admin', 'noticeType', 'delete');

    $user = $this->_registry->getResource('session')->getSessionVar('logged');
    $user = $user['type'] ? $user['type'] : 'guest';

    $request = $this->_registry->getResource('request');

    if (!$auth->isAllowed($user, $request->getGetValue('controller'), $request->getGetValue('action'))) {
      $app = $this->_registry->getResource('application');
      $app->setController('ErrorController');
      $app->setAction('error401');
    }
  }
}

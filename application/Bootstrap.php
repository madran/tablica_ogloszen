<?php

class Bootstrap extends Mpf\Application\Bootstrap
{
  public function initAuth()
  {
    $pluginStorage = $this->_registry->getResource('plugin_storage');

    $pluginStorage->addBetweenRouteDispach(new Auth($this->_registry));
  }

  public function initLogin()
  {
    $view = $this->_registry->getResource('view');
    $session = $this->_registry->getResource('session');

    $view->loggedUser = $session->getSessionVar('logged');
  }
}

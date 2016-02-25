<?php

class NoticeTypeController extends Mpf\GenericController
{
  public function indexAction()
  {
    $noticeTypeMapper = new NoticeTypeMapper();

    $types = $noticeTypeMapper->getAll();

    $this->_view->types = $types;
  }

  public function showAction()
  {
    $noticeTypeMapper = new NoticeTypeMapper();

    $type = $noticeTypeMapper->find($this->_request->getGetValue('id'));

    $this->_view->type = $type;
  }

  public function addAction()
  {
    if ($this->_request->isPost()) {
      $noticeTypeValidator = new NoticeTypeValidation(new Mpf\Validator());
      $validationResult = $noticeTypeValidator->isValid($this->_request->getPostValues());
      if ($validationResult) {
        $type = new NoticeType();
        $type->setTypeName($noticeTypeValidator->getValidator()->get('type_name'));
        $type->setColor($noticeTypeValidator->getValidator()->get('color'));

        $noticeTypeMapper = new NoticeTypeMapper();
        $noticeTypeMapper->save($type);

        $this->_registry->getResource('application')->setNewRoute('noticeType', 'index');
      } else {
        $this->_view->error = $noticeTypeValidator->getValidator()->getAllResults();
      }
    }
  }

  public function editAction()
  {
    $view = $this->_registry->getResource('view');

    if ($this->_request->isPost()) {
      $noticeTypeValidator = new NoticeTypeValidation(new Mpf\Validator());
      $validationResult = $noticeTypeValidator->isValid($this->_request->getPostValues());
      if ($validationResult) {
        $type = new NoticeType();
        $type->setId($this->_request->getPostValue('id'));
        $type->setTypeName($noticeTypeValidator->getValidator()->get('type_name'));
        $type->setColor($noticeTypeValidator->getValidator()->get('color'));

        $noticeTypeMapper = new NoticeTypeMapper();
        $noticeTypeMapper->update($type);

        $this->_registry->getResource('application')->setNewRoute('noticeType', 'index');
      } else {
        $this->view->error = $noticeTypeValidator->getValidator()->getAllResults();
      }
    } else {
      $noticeTypeMapper = new NoticeTypeMapper();
      $noticeType = $noticeTypeMapper->find($this->_request->getGetValue('id'));

      $view->noticeType = $noticeType;
    }
  }

  public function deleteAction()
  {
    $noticeTypeMapper = new NoticeTypeMapper();
    $noticeTypeMapper->delete($this->_request->getGetValue('id'));
    $this->_registry->getResource('application')->setNewRoute('noticeType', 'index');
  }
}

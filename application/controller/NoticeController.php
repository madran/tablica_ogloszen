<?php

class NoticeController extends Mpf\GenericController
{
    public function indexAction()
    {
        $noticeMapper = new NoticeMapper();
        $noticeTypeMapper = new NoticeTypeMapper();

        $notices = $noticeMapper->getAll();
        $noticeTypes = $noticeTypeMapper->getAll();

        $this->_view->notices = $notices;
        $this->_view->noticeTypes = $noticeTypes;
    }

    public function showAction()
    {
        $noticeMapper = new NoticeMapper();

        $notice = $noticeMapper->find($this->_request->getGetValue('id'));

        $this->_view->notice = $notice;
    }

    public function addAction()
    {
        $session = $this->_registry->getResource('session');
        $this->_view->user = $session->getSessionVar('logged');
        if ($this->_request->isPost()) {
            $noticeValidator = new NoticeValidation(new Mpf\Validator());
            $validationResult = $noticeValidator->isValid($this->_request->getPostValues());
            if ($validationResult) {
                $notice = new Notice();
                $notice->setTitle($noticeValidator->getValidator()->get('title'));
                $notice->setContent($noticeValidator->getValidator()->get('content'));
                $notice->setNoticeTypeId($noticeValidator->getValidator()->get('notice_type_id'));
                $notice->setUserId($noticeValidator->getValidator()->get('user_id'));

                $noticeMapper = new NoticeMapper();
                $noticeMapper->save($notice);

                $this->_registry->getResource('application')->setNewRoute('notice', 'index');
            } else {
                $this->_view->error = $noticeValidator->getValidator()->getAllResults();
            }
        } else {
            $noticeTypeMapper = new NoticeTypeMapper();

            $types = $noticeTypeMapper->getAll();

            $this->_view->types = $types;
        }
    }

    public function editAction()
    {
        $view = $this->_registry->getResource('view');

        if ($this->_request->isPost()) {
            $noticeValidator = new NoticeValidation(new Mpf\Validator());
            $validationResult = $noticeValidator->isValid($this->_request->getPostValues());
            if ($validationResult) {
                $notice = new Notice();
                $notice->setId($noticeValidator->getValidator()->get('id'));
                $notice->setTitle($noticeValidator->getValidator()->get('title'));
                $notice->setContent($noticeValidator->getValidator()->get('content'));
                $notice->setNoticeTypeId($noticeValidator->getValidator()->get('notice_type_id'));

                $noticeMapper = new NoticeMapper();
                $noticeMapper->update($notice, $this->_request->getPostValue('id'));

                $this->_registry->getResource('application')->setNewRoute('notice', 'index');
            } else {
                $this->view->error = $validationResult->getAllResults();
            }
        } else {
            $noticeMapper = new NoticeMapper();
            $notice = $noticeMapper->find($this->_request->getGetValue('id'));

            $noticeTypeMapper = new NoticeTypeMapper();
            $types = $noticeTypeMapper->getAll();

            $view->types = $types;
            $view->notice = $notice;
        }
    }

    public function deleteAction()
    {
        $session = $this->_registry->getResource('session');
        $user = $session->getSessionVar('logged');

        $noticeMapper = new NoticeMapper();
        $notice = $noticeMapper->find($this->_request->getGetValue('id'));

        if($notice->getUserId() == $user['id'] || $user['type'] == 'admin') {
            $noticeMapper->delete($this->_request->getGetValue('id'));
            $this->_registry->getResource('application')->setNewRoute('notice', 'index');
        } else {
            $this->_registry->getResource('application')->setNewRoute('notice', 'index');
        }
    }
}

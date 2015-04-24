<?php

/**
 * seccion actions.
 *
 * @package    Cono Sur
 * @subpackage seccion
 * @author     Your name here
 */
class seccionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->seccions = SeccionPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->seccion = SeccionPeer::retrieveByPk($request->getParameter('sec_id'));
    $this->forward404Unless($this->seccion);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new seccionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new seccionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($seccion = SeccionPeer::retrieveByPk($request->getParameter('sec_id')), sprintf('Object seccion does not exist (%s).', $request->getParameter('sec_id')));
    $this->form = new seccionForm($seccion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($seccion = SeccionPeer::retrieveByPk($request->getParameter('sec_id')), sprintf('Object seccion does not exist (%s).', $request->getParameter('sec_id')));
    $this->form = new seccionForm($seccion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($seccion = SeccionPeer::retrieveByPk($request->getParameter('sec_id')), sprintf('Object seccion does not exist (%s).', $request->getParameter('sec_id')));
    $seccion->delete();

    $this->redirect('seccion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $seccion = $form->save();

      $this->redirect('seccion/edit?sec_id='.$seccion->getSecId());
    }
  }
}

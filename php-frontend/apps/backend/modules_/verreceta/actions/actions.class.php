<?php

/**
 * verreceta actions.
 *
 * @package    Cono Sur
 * @subpackage verreceta
 * @author     Your name here
 */
class verrecetaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->recetas = RecetaPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->receta = RecetaPeer::retrieveByPk($request->getParameter('rec_id'));
    $this->forward404Unless($this->receta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new recetaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new recetaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($receta = RecetaPeer::retrieveByPk($request->getParameter('rec_id')), sprintf('Object receta does not exist (%s).', $request->getParameter('rec_id')));
    $this->form = new recetaForm($receta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($receta = RecetaPeer::retrieveByPk($request->getParameter('rec_id')), sprintf('Object receta does not exist (%s).', $request->getParameter('rec_id')));
    $this->form = new recetaForm($receta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($receta = RecetaPeer::retrieveByPk($request->getParameter('rec_id')), sprintf('Object receta does not exist (%s).', $request->getParameter('rec_id')));
    $receta->delete();

    $this->redirect('verreceta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $receta = $form->save();

      $this->redirect('verreceta/edit?rec_id='.$receta->getRecId());
    }
  }
}

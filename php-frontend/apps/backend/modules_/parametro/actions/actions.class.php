<?php

/**
 * parametro actions.
 *
 * @package    Cono Sur
 * @subpackage parametro
 * @author     Your name here
 */
class parametroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->parametros = ParametroPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->parametro = ParametroPeer::retrieveByPk($request->getParameter('par_id'));
    $this->forward404Unless($this->parametro);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new parametroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new parametroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($parametro = ParametroPeer::retrieveByPk($request->getParameter('par_id')), sprintf('Object parametro does not exist (%s).', $request->getParameter('par_id')));
    $this->form = new parametroForm($parametro);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($parametro = ParametroPeer::retrieveByPk($request->getParameter('par_id')), sprintf('Object parametro does not exist (%s).', $request->getParameter('par_id')));
    $this->form = new parametroForm($parametro);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($parametro = ParametroPeer::retrieveByPk($request->getParameter('par_id')), sprintf('Object parametro does not exist (%s).', $request->getParameter('par_id')));
    $parametro->delete();

    $this->redirect('parametro/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $parametro = $form->save();

      $this->redirect('parametro/edit?par_id='.$parametro->getParId());
    }
  }
}

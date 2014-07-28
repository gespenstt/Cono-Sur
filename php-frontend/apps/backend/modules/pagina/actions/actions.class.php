<?php

/**
 * pagina actions.
 *
 * @package    Cono Sur
 * @subpackage pagina
 * @author     Your name here
 */
class paginaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->paginas = PaginaPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->pagina = PaginaPeer::retrieveByPk($request->getParameter('pag_id'));
    $this->forward404Unless($this->pagina);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new paginaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new paginaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pagina = PaginaPeer::retrieveByPk($request->getParameter('pag_id')), sprintf('Object pagina does not exist (%s).', $request->getParameter('pag_id')));
    $this->form = new paginaForm($pagina);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pagina = PaginaPeer::retrieveByPk($request->getParameter('pag_id')), sprintf('Object pagina does not exist (%s).', $request->getParameter('pag_id')));
    $this->form = new paginaForm($pagina);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pagina = PaginaPeer::retrieveByPk($request->getParameter('pag_id')), sprintf('Object pagina does not exist (%s).', $request->getParameter('pag_id')));
    $pagina->delete();

    $this->redirect('pagina/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $pagina = $form->save();

      $this->redirect('pagina/edit?pag_id='.$pagina->getPagId());
    }
  }
}

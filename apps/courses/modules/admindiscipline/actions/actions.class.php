<?php

/**
 * discipline actions.
 *
 * @package    sf_sandbox
 * @subpackage discipline
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class admindisciplineActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$c = new Criteria();
  	$c->add(EnumItemPeer::PARENT_ID,skuleadminConst::DISCIPLINE_PARENT_ID);
    $this->enum_item_list = $this->getDisciplineList($c);
    $values=array('discipline'=>1);
    $this->form = new EnumItemForm(new EnumItem(),$values);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    
    $values=array('discipline'=>1);
    $this->form = new EnumItemForm(new EnumItem(),$values);

    $this->processForm($request, $this->form);
    $c = new Criteria();
  	$c->add(EnumItemPeer::PARENT_ID,skuleadminConst::DISCIPLINE_PARENT_ID);
    $this->enum_item_list = $this->getDisciplineList($c);
    $this->setTemplate('index');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($enum_item = EnumItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object enum_item does not exist (%s).', $request->getParameter('id')));
    $c = new Criteria();
  	$c->add(EnumItemPeer::PARENT_ID,skuleadminConst::DISCIPLINE_PARENT_ID);
    $this->enum_item_list = $this->getDisciplineList($c);
    $values=array('discipline'=>1);
    $this->form = new EnumItemForm($enum_item,$values);
     $this->setTemplate('index');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($enum_item = EnumItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object enum_item does not exist (%s).', $request->getParameter('id')));
    $values=array('discipline'=>1);
    $this->form = new EnumItemForm($enum_item,$values);

    $this->processForm($request, $this->form);
    $c = new Criteria();
  	$c->add(EnumItemPeer::PARENT_ID,skuleadminConst::DISCIPLINE_PARENT_ID);
    $this->enum_item_list = $this->getDisciplineList($c);
    $this->setTemplate('index');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($enum_item = EnumItemPeer::retrieveByPk($request->getParameter('id')), sprintf('Object enum_item does not exist (%s).', $request->getParameter('id')));
    $enum_item->delete();

    $this->redirect('admindiscipline/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $form->getObject()->setParentId(skuleadminConst::DISCIPLINE_PARENT_ID);
    if ($form->isValid())
    {
      $enum_item = $form->save();

      $this->redirect('admindiscipline/edit?id='.$enum_item->getId());
    }
  }
  
  protected function getDisciplineList(Criteria $c = null){
  	if($c===null){
     return EnumItemPeer::doSelect(new Criteria());
  	}else{
     return EnumItemPeer::doSelect($c);
  	}
  }
}

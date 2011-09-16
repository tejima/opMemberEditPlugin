<?php

/**
 * opMemberEditPlugin actions.
 *
 * @package    OpenPNE
 * @subpackage opMemberEditPlugin
 * @author     Your name here
 */
class opMemberEditPluginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new opMemberEditPluginConfigForm();
    if ($request->isMethod(sfWebRequest::POST))
    {
      $this->form->bind($request->getParameter('me'));
      if ($this->form->isValid())
      {
        $this->form->save();
        $this->redirect('opMemberEditPlugin/index?done=1&member_id='.$this->form->getValue("member_id"));
      }
    }else{
      if($request->getParameter("done")){
        $this->done = true;
      }
      $target_member_id = $request->getParameter("member_id") ? $request->getParameter("member_id") : 1;
      $this->member = Doctrine::getTable("Member")->find($target_member_id);
      $this->form->setMember($target_member_id);
    }
  }
}

<?php

/**
 * me actions.
 *
 * @package    OpenPNE
 * @subpackage me
 * @author     Your name here
 */
class meActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
}

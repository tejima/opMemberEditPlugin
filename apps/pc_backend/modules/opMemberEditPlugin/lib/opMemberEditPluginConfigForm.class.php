<?php
class opMemberEditPluginConfigForm extends sfForm
{
  protected $configs = array(
    'pc_address' => 'zuniv_us_pc_address',
    'password' => 'zuniv_us_password',
    'password_keep' => 'zuniv_us_password_keep',
    'member_id' => 'zuniv_us_member_id',
  );
  public function setMember($member_id){
    if(!$member_id){
      $member_id = 1;
    }
    $this->getWidgetSchema()->setDefault("member_id",$member_id);
    $member = Doctrine::getTable("Member")->find($member_id);
    $this->getWidgetSchema()->setDefault("pc_address",$member->getConfig("pc_address"));
    $this->getWidgetSchema()->setDefault("password_keep",true);
  }
  public function configure()
  {
    $this->setWidgets(array(
      'pc_address' => new sfWidgetFormInput(array()),
      'password' => new sfWidgetFormInputPassword(array()),
      'password_keep' => new sfWidgetFormInputCheckbox(),
      'member_id' => new sfWidgetFormInputHidden(array()),
    ));
    $this->setValidators(array(
      'pc_address' => new sfValidatorEmail(array(),array()),
      'password' => new sfValidatorString(array('required'=>false),array()),
      'password_keep' => new sfValidatorBoolean(array(),array()),
      'member_id' => new sfValidatorInteger(array(),array()),
    ));
    $this->widgetSchema->setLabels(array(
      'pc_address' => 'PCメールアドレス',
      'password_keep' => 'パスワードを変更しない',
    ));
    $this->getWidgetSchema()->setNameFormat('me[%s]');

  }
  public function save()
  {
    $pc_address = $this->getValue("pc_address");
    $password = $this->getValue("password");
    $password_keep = $this->getValue("password_keep");
    $member_id = $this->getValue("member_id");
    $member = Doctrine::getTable("Member")->find($member_id);
    if(!$member){
      return;
    }
    $member->setConfig("pc_address",$pc_address);
    if(!$password_keep){
      $member->setConfig("password",md5($password));
    }
  }
  public function validate($validator,$value,$arguments = array())
  {
    return $value;
  }
}

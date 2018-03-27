<?php

if( !defined('CMS_VERSION') ) exit;
$db = \cms_utils::get_db();

$message='';

if($_REQUEST['monitor_send_email'] == 1){
    $this->SetPreference('monitor_send_email', TRUE);
}else{
    $this->SetPreference('monitor_send_email', FALSE);
}

if(ISSET($_REQUEST['monitor_email_address'])){
    //should we validate this email?
    $this->SetPreference('monitor_email_address', $_REQUEST['monitor_email_address']);
}

if($_REQUEST['certificate_check'] == 1){
    $this->SetPreference('certificate_check', TRUE);
}else{
    $this->SetPreference('certificate_check', FALSE);
}

if($_REQUEST['file_check'] == 1){
    $this->SetPreference('file_check', TRUE);
}else{
    $this->SetPreference('file_check', FALSE);
}

$this->SetMessage("Preferences updated");

// put mention into the admin log
$this->Audit(0,$this->GetName(),'Monitor preferences updated');

$this->RedirectToAdminTab();
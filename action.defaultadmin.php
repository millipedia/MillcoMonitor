<?php


if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Use Monitor') ) return;

$mm=array();

$mm['run_report']=$params['run_report'];

$mm['monitor_last_run']= date("Y-m-d H:i:s", $this->GetPreference('monitor_last_run'));
$mm['monitor_run_every']=$this->GetPreference('monitor_run_every');
$mm['monitor_send_email']=$this->GetPreference('monitor_send_email');
$mm['monitor_email_address']=$this->GetPreference('monitor_email_address');

$mm['certificate_check']=$this->GetPreference('certificate_check');
$mm['file_check']=$this->GetPreference('file_check');
$mm['update_check']=$this->GetPreference('update_check');

$smarty->assign("mm", $mm) ;

// if we have a run now param then run our tasks now.
if($mm['run_report']){

    $report=$this->monitor_tasks();

}else{
    
    $report='';
}

$smarty->assign("report",$report ) ;

echo $this->ProcessTemplate('admin_dash.tpl');
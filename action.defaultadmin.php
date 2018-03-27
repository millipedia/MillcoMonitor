<?php


if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Use Monitor') ) return;

$mm=array();
$mm['run_report']=$params['run_report'];
$mm['monitor_last_run']= date("Y-m-d H:i:s", $this->GetPreference('monitor_last_run'));
$mm['certificate_check']=$this->GetPreference('certificate_check');
$mm['file_check']=$this->GetPreference('file_check');
$mm['monitor_send_email']=$this->GetPreference('monitor_send_email');
$mm['monitor_email_address']=$this->GetPreference('monitor_email_address');

$smarty->assign("mm", $mm) ;

// echo "certificate expires : ";
// echo $this->check_certificate();
// echo  '<br/>';


// echo sha1(serialize(Map($config['root_path'] . '/modules/')));
// print_r($config);

//$recent=$this->file_dir_walk($path);


// sha1(serialize(Map('root_path/', true))) != /* previous stored hash */)
// {
//     // directory contents has changed
// }

//$db =& $this->GetDb();

// $subject = 'Millco monitor test message';
// $body = 'This is a very simple test to remind myself how the mailer works now CMSMailer is deprecated.';
//
// $cmsmailer = new cms_mailer;
// if( $cmsmailer ) {
//
// 		$cmsmailer->AddAddress( "millipedia@gmail.com" );
// 		$cmsmailer->SetSubject($subject);
// 		$cmsmailer->IsHTML( false );
// 		$cmsmailer->SetBody( $body );
// 		$cmsmailer->Send();
// }

// if we have a run now param then run our tasks now.
if($mm['run_report']){

    $report=$this->monitor_tasks();

}else{
    
    $report='';
}

$smarty->assign("report",$report ) ;

echo $this->ProcessTemplate('admin_dash.tpl');
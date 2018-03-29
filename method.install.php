<?php
#-------------------------------------------------------------------------
# Module: MillcoMonitor
# Version: 1.0
# Method: Install
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

// create a permission
$this->CreatePermission('Use MillcoMonitor', 'Use MillcoMonitor');

// set initial preferences
$this->SetPreference('certificate_check', FALSE);
$this->SetPreference('file_check', TRUE);

$this->SetPreference('monitor_send_email', TRUE);
$this->SetPreference('monitor_email_address', '');

$this->SetPreference('monitor_last_run',000000);
$this->SetPreference('monitor_run_every',21600); //default is now every 6 hours.

$this->SetPreference('monitor_message','Hello from install.');

$this->SetPreference('monitor_latest_file_name','');
$this->SetPreference('monitor_latest_file_path','');
$this->SetPreference('monitor_latest_filetime',0);

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed', $this->GetVersion()));

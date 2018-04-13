<?php
#-------------------------------------------------------------------------
# Module: MillcoMonitor
# Version: 1.0
# Method: Uninstall
#-------------------------------------------------------------------------

if( !defined('CMS_VERSION') ) exit;

// remove the permissions
$this->RemovePermission('Use MillcoMonitor');

$this->RemovePreference('certificate_check');
$this->RemovePreference('file_check');
$this->RemovePreference('update_check');

$this->RemovePreference('monitor_send_email');
$this->RemovePreference('monitor_email_address');

$this->RemovePreference('monitor_last_run');
$this->RemovePreference('monitor_run_every');
$this->RemovePreference('monitor_message');

$this->RemovePreference('monitor_latest_file_name');
$this->RemovePreference('monitor_latest_file_path');
$this->RemovePreference('monitor_latest_filetime');

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
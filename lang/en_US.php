<?php

$lang['friendlyname'] = 'Millco Monitor';
$lang['postinstall'] = 'Be sure to set "Manage Millco Monitor" permissions to use this module!';
$lang['postuninstall'] = 'All gone. Hope you really meant it."';
$lang['really_uninstall'] = 'Are you sure you want to uninstall this module?.';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['prefsupdated'] = 'Module preferences updated.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['error'] = 'Error!';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['title_mod_prefs'] = 'Module Preferences';
$lang['title_mod_admin'] = 'Module Admin Panel';
$lang['title_admin_panel'] = 'MillcoMonitor';

$lang['moddescription'] = 'Various monitoring diagnostics for CMSMS sites. ';

$lang['changelog'] = '<ul>
<li>Version 1.0  180119 Initial creation of module</li>
</ul>';

$lang['help'] = '

<p>MillcoMonitor adds a background job that performs a couple of tests on CMS installs and alerts an admin if it finds anything suspicious.</p>

<h2>Monitor options.</h2>
<h3>Last file update</h3>
<p>Monitor will keep a record of the last file to be changed in the default CMSMS directories (excluding upload and tmp) and send an alert if a newer file is detected. If a file appears or is changed that you weren\'t expecting then it can be investigated.</p>
<h3>Certificate check</h3>
<p>Fire an alert if the SSL certificate  on the site is within a day of expiry.</p>
<h3>Update check</h3>
<p>Fire an alert if there is a new version of CMSMS available.</p>

<p>At the moment this module hasn\'t been submitted to the forge. You should check the GitHub repository for changes: <a href="https://github.com/millipedia/MillcoMonitor">https://github.com/millipedia/MillcoMonitor</a>
    </p>
    <p>Stephen at <a href="https://www.millipedia.co.uk/">millipedia</a></p>
';

?>

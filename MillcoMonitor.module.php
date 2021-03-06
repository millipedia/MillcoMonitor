<?php
/*
#-------------------------------------------------------------------------
# Module: MillcoMonitor
# Version: 1.0
# 
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
*/

class MillcoMonitor extends CMSModule
{

	function GetName(){return 'MillcoMonitor';}
	function GetFriendlyName(){	return $this->Lang('friendlyname');}
	function GetVersion(){ return '1.0';}
	function GetHelp(){	return $this->Lang('help');}
	function GetAuthor(){ return 'stephen at millipedia';}
	function GetAuthorEmail(){ return 'stephen at millipedia.co.uk';}
	function GetChangeLog(){ return $this->Lang('changelog');}

	/*---------------------------------------------------------
	   IsPluginModule()
	   This function returns true or false, depending upon
	   whether users can include the module in a page or
	   template using a smarty tag of the form
	   {cms_module module='MillcoMonitor' param1=val param2=val...}

	   If your module does not get included in pages or
	   templates, return "false" here.
	  ---------------------------------------------------------*/
	function IsPluginModule(){ return FALSE;}

	/*---------------------------------------------------------
	   HasAdmin()
	   This function returns a boolean value, depending on
	   whether your module adds anything to the Admin area of
	   the site. For the rest of these comments, I'll be calling
	   the admin part of your module the "Admin Panel" for
	   want of a better term.
	  ---------------------------------------------------------*/
	function HasAdmin()
	{
		return true;
	}

	/*---------------------------------------------------------
	   GetAdminSection()
	   If your module has an Admin Panel, you can specify
	   which Admin Section (or top-level Admin Menu) it shows
	   up in. This method returns a string to specify that
	   section. Valid return values are:

	   main        - the Main menu tab.
	   content     - the Content menu
	   layout      - the Layout menu
	   usersgroups - the Users and Groups menu
	   extensions  - the Extensions menu (this is the default)
	   siteadmin   - the Site Admin menu
	   viewsite    - the View Site menu tab
	   logout      - the Logout menu tab

	   Note that if you place your module in the main,
	   viewsite, or logout sections, it will show up in the
	   menus, but will not be visible in any top-level
	   section pages.
	  ---------------------------------------------------------*/
	function GetAdminSection()
	{
		return 'siteadmin';
	}


	/*---------------------------------------------------------
	   GetAdminDescription()
	   If your module does have an Admin Panel, you
	   can have it return a description string that gets shown
	   in the Admin Section page that contains the module.

	   See the note on localization at the top of this file.
	  ---------------------------------------------------------*/
	function GetAdminDescription()
	{
		return $this->Lang('moddescription');
	}

	/*---------------------------------------------------------
	   VisibleToAdminUser()
	   If your module does have an Admin Panel, you
	   can control whether or not it's displayed by the boolean
	   that is returned by this method. This is primarily used
	   to hide modules from admins who lack permission to use
	   them.
	   In this case, the module will only be visible to admins
	   who have "Use MillcoMonitor" permissions.
	  ---------------------------------------------------------*/
	function VisibleToAdminUser()
	{
        return $this->CheckPermission('Use MillcoMonitor');
	}

	/*---------------------------------------------------------
	   GetDependencies()
	   Your module may need another module to already be installed
	   before you can install it.
	   This method returns a list of those dependencies and
	   minimum version numbers that this module requires.

	   It should return an hash, eg.
	   return array('somemodule'=>'1.0', 'othermodule'=>'1.1');
	  ---------------------------------------------------------*/
	function GetDependencies()
	{
		return false;
	}

	/*---------------------------------------------------------
	   MinimumCMSVersion()
	   This method returns a string representing the
	   minimum version that this module requires.
	   ---------------------------------------------------------*/
	function MinimumCMSVersion()
	{
		return "2.2.2";
	}

	/*---------------------------------------------------------
	   SetParameters()
	   This function enables you to create mappings for
	   your module when using "Pretty Urls".

	   ---------------------------------------------------------*/
	function SetParameters()
	{

		$this->RestrictUnknownParams();

  		// syntax for creating a parameter is parameter name, default value, description
		//   $this->CreateParameter('showcat','','showcat parameter');
		//   $this->SetParameterType('showcat',CLEAN_INT);


	}

	/*---------------------------------------------------------
	GetEventDescription()
	If your module can create events, you will need
	to provide the API with documentation of what
	that event does. This method wraps up a simple
	return of the localized description.
	---------------------------------------------------------*/
	function GetEventDescription ( $eventname )
	{
		return $this->Lang('event_info_'.$eventname );
	}


	/*---------------------------------------------------------
	GetEventHelp()
	If your module can create events, you will need
	to provide the API with documentation of how to
	use the event. This method wraps up a simple
	return of the localized description.
	---------------------------------------------------------*/
	function GetEventHelp ( $eventname )
	{
		return $this->Lang('event_help_'.$eventname );
	}


	/*---------------------------------------------------------
	   InstallPostMessage()
	   After installation, there may be things you want to
	   communicate to your admin. This function returns a
	   string which will be displayed.

	   See the note on localization at the top of this file.
	  ---------------------------------------------------------*/
	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	/*---------------------------------------------------------
	   UninstallPostMessage()
	   After removing a module, there may be things you want to
	   communicate to your admin. This function returns a
	   string which will be displayed.

	   See the note on localization at the top of this file.
	  ---------------------------------------------------------*/
	function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}


	function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}


	function SearchResult($returnid, $fdid, $attr = '')
	{
		$result = array();

		// if ($attr == 'MillcoMonitor')
		// {
		// $db =& $this->GetDb();
		// $sql = 'SELECT `fdTitle` FROM `cms_module_MillcoMonitor` WHERE `fdid` = '.$fdid.'';
		// $dbResult =$db->Execute($sql);
		// 	if ($dbResult)
		// 	{
		// 		$row = $dbResult->FetchRow();

		// 		//0 position is the prefix displayed in the list results.
		// 		$result[0] = $this->GetFriendlyName();

		// 		//1 position is the title
		// 		$result[1] = $row['fdTitle'];

		// 		//2 position is the URL to the title.
		// 		$result[2] = $this->CreateLink('cntnt01', 'default', $returnid, '', array('fdsearchid' => $fdid) ,'', true, false, '', true);
		// 	}
		// }

		return $result;
	}


  function DoEvent( $originator, $eventname, &$params )
	{

		if ($originator == 'Core' && $eventname == 'ContentDeletePost'){
			// would need to delete content
			// doesn't yet.

		 }

		 if ($originator == 'Core' && $eventname == 'ContentEditPost'){
 			// would need to save page content
 			// doesn't yet.

 		 }

	}

	//add eg dataTables call to admin.
	function GetHeaderHTML(){

		return '';

	}

	public function HasCapability($capability, $params = array())
	{
			if( $capability == 'tasks' ){
				return TRUE;
			}else{
				return FALSE;
			}

	}

	public function get_tasks()
	{
			$out = array();
			$out[] = new MillcoMonitorTask();
			return $out;
	}

	// run our tasks and compile a report.
	function monitor_tasks($pseudocron=0){

			$report='';
			$report.='Report generated at  ' . date("Y-m-d H:i", time()) . '<br><br>';
			$something_changed=0;

			// flag if there is a new version of CMSMS
			if($this->GetPreference('update_check')){
				if( CmsAdminUtils::site_needs_updating() ){
					$something_changed=1;
					$report.='<p>There is a newer version of CMSMS available.</p>';

				}else{
					$report.='<p>CMS version is up to date.</p>';
				}
			}

			// Are we doing the file check? Really should...
			if($this->GetPreference('file_check')){

				$recent=$this->cmsms_dir_walk();

				// cmsm_dir_walk returns an array with:
				// [mostRecentFileMTime]
				// [mostRecentFilePath]  
                // [mostRecentFileName]
                // [FileCount]
                				
				if($recent['mostRecentFileName']!==$this->GetPreference('monitor_latest_file_name') || $recent['FileCount']!=$this->GetPreference('monitor_file_count')){
					
					$something_changed=1;

					// Add to report.
					$report.='<h2>File changed</h2>';

					// update the last values.
					$this->SetPreference('monitor_latest_file_name', $recent['mostRecentFileName']);
					$this->SetPreference('monitor_latest_file_path', $recent['mostRecentFilePath']);
                    $this->SetPreference('monitor_latest_filetime', $recent['mostRecentFileMTime']);
                    $this->SetPreference('monitor_file_count', $recent['FileCount']);

				}else{
                    $report.='<h2>No files changed.</h2>';
                    
                }

                // TODO: should template this really.
                $report.='<b>Newest file :</b> ' .  $recent['mostRecentFileName'] . '<br>';
                $report.='<b>Previous file :</b> ' .  $this->GetPreference('monitor_latest_file_name') . '<br>';
                $report.='<b>File date time :</b> ' .   date("Y-m-d h:m:s", $recent['mostRecentFileMTime']) . '<br>';
                $report.='<b>File path :</b> ' .  $recent['mostRecentFilePath'] . '<br>';
                $report.='<b>File count :</b> ' .  $recent['FileCount'] . ' (previous was ' . $this->GetPreference('monitor_file_count') . ')<br>';
                $report.='<br><br>';
			}

			// Check certificate expiry date
			if($this->GetPreference('certificate_check')){

				$cert_time=$this->check_certificate();

				// sometimes we just don't get a sensible response from the server so 
				// let's only do this if we have a time.
				if($cert_time){

					$two_days = time() + (2 * 24 * 60 * 60); // 2 days; 24 hours; 60 mins; 60 secs
					
					if($cert_time < $two_days){
						
						$something_changed=1;

						$report.='<p><b>Certificate expires within two days</b></p><br>';
						$report.='<p><b>Expiry date is :</b>' . date("Y-m-d" , $cert_time) . '</p>';
					
					}else{
					
						$report.='<p><b>Certificate expiry</b></p>';
						$report.='<p><b>Expiry date is :</b> ' . date("Y-m-d" , $cert_time) . '</p>';
					
					}

				}

				
			}

			// if we're in cron and something had changed then see if we need to email this report
			if($pseudocron && $something_changed){

					if($this->GetPreference('monitor_send_email')){

						// if email preference set ... send email.
						$to=$this->GetPreference('monitor_email_address');

						if($to!==''){

							$subject="Monitor report for " . $this->config['root_url'];

							$cmsmailer = new cms_mailer;
							if( $cmsmailer ) {
		
									$cmsmailer->AddAddress( $to );
									$cmsmailer->SetSubject($subject);
									$cmsmailer->IsHTML( true );
									$cmsmailer->SetBody( $report );
									$cmsmailer->Send();
							}

							$this->Audit( 0, 'MillcoMonitor', 'Monitor alert. Report emailed to ' . $to );

						}else{
							$this->Audit( 0 ,$this->GetName(),'Monitor email address not found.');
						}
		

					}else{ // really don't know why you wouldn't want to email, but hey.

						$this->Audit(0,$this->GetName(),'Monitor alert. We found something you should check.');

					}

				//return success for job manager.
				return true;

			}else{ // we're in admin so just return our report.
				return $report;
			}

	}


	 /**
     * check when the site ssl certificate is going to expire.
     */	
    function check_certificate(){

		$config = \cms_config::get_instance();
		$url = $config['root_url'];
		
		$orignal_parse = parse_url($url, PHP_URL_HOST);
		$get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE)));
		$read = stream_socket_client("ssl://".$orignal_parse.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
		$cert = stream_context_get_params($read);
		$certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

		return $certinfo['validTo_time_t'];
	}

	/**
     * Walks all suitable CMSMS directories and returns the most recent filename and time
     * and now a file count.
     */
	function cmsms_dir_walk(){

        $file_count=0;

		$mostRecentFileMTime =0;
		$mostRecentFilePath = '';
		$mostRecentFileName = '';

		$root_path = $this->config['root_path'];

		// top level files
		foreach (new DirectoryIterator($root_path) as $fileinfo) {
			if ($fileinfo->isFile()) {

				if ($fileinfo->getMTime() > $mostRecentFileMTime) {
					$mostRecentFileMTime = $fileinfo->getMTime();
					$mostRecentFilePath = $fileinfo->getPathname();
					$mostRecentFileName = $fileinfo->getBasename();
                }
                
                $file_count++;
			}
		}
		
		
		// loop through all the CMSMS dirs
		// that aren't silly to check.
 		$dirs_to_check=array(
			"assets",
			"doc",
			"lib",
            "modules");

        // add admin dir from config in case we have a custom one.
        $dirs_to_check[]=$this->config['admin_dir'];

        // TODO: be nice to be able to pass extra directories from the module
        // as a preference

		foreach($dirs_to_check as $dir){

            $path=$root_path . '/' . $dir .'/';
            
            if(is_dir($path)){

                $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);
                foreach ($iterator as $fileinfo) {
                    if ($fileinfo->isFile()) {
    
                        if ($fileinfo->getMTime() > $mostRecentFileMTime) {
                            
                            // let's ignore sitemap.xml
                            // TODO: it might be nice to have an ignore list one day.
                            if($fileinfo->getBasename() !=='sitemap.xml'){
                                $mostRecentFileMTime = $fileinfo->getMTime();
                                $mostRecentFilePath = $fileinfo->getPathname();
                                $mostRecentFileName = $fileinfo->getBasename();
                            }
    
                        }
                        $file_count++;
                    }
                }
            }	
		}

		$info=array(
				"mostRecentFileMTime" => $mostRecentFileMTime,
				"mostRecentFilePath" => $mostRecentFilePath,
                "mostRecentFileName" => $mostRecentFileName,
                "FileCount" => $file_count
			);

		return $info;

	}


	// check we have the config file as read only.
	// ... we must have this func somewhere already cos we do get warned about it.
	function check_config_permissions(){

		// TODO: get file path check permisions.
		// $file=''
		// decoct(fileperms($file) & 0777); // return "755" for example
	}

	// TODO: how about a check for bak.config php and maybe removing that?
		
	/**
     * Check a url with curl
     * 
     */
	function check_url( $url ) {
		
		$timeout = 10;
		
        $ch = curl_init();
        
		// If the given URL is missing a scheme name (such as "http://" or "ftp://" etc) 
		// then libcurl will make a guess based on the host.
		curl_setopt ( $ch, CURLOPT_URL, $url );
		
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
		$http_respond = curl_exec($ch);
		$http_respond = trim( strip_tags( $http_respond ) );
		$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

		curl_close( $ch );

		if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
			return true;
		} else {
			// return $http_code;, possible too
			return false;
		}

	}
	
}

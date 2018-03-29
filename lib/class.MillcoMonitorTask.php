<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: MillcoMonitor (c) 2018 by millipedia www.millipedia.co.uk
#
# Adds a background job to run various monitoring tasks including last
# file change.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005-2010 by Ted Kulp (wishy@cmsmadesimple.org)
# This projects homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin
# section that the site was built with CMS Made simple.
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
#END_LICENSE

class MillcoMonitorTask implements CmsRegularTask
{
    public function get_name()
    {
        return get_class($this);
    }


    public function get_description()
    {
       return "Monitor job.";
    }


    public function test($time = '')
    {
        if( !$time ) $time = time();

        $mod = cms_utils::get_module('MillcoMonitor');
        $last_execute = $mod->GetPreference('monitor_last_run');
        $interval = (int)$mod->GetPreference('monitor_run_every');
        
        // lets have a minimum of 15 mins 
        if($interval<900){ $interval=900; };

        if(($time - $interval) >= $last_execute ){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function execute($time = '')
    {
        if( !$time ){
					$time = time();
				};

        $mod = cms_utils::get_module('MillcoMonitor');
        $pseudocron=1;
        $mod->SetPreference('monitor_last_run',$time);
        $result=$mod->monitor_tasks($pseudocron);
        
        return true;
    }

    public function on_success($time = '')
    {

        if( !$time ) $time = time();
        
        $mod = cms_utils::get_module('MillcoMonitor');
        $mod->SetPreference('monitor_last_run',$time);

    }


    public function on_failure($time = '')
    {
        $mod = cms_utils::get_module('MillcoMonitor');
        $mod->Audit( 0, 'MillcoMonitor', 'Job failed.');
    }

} // end of class

#
# EOF
#
?>

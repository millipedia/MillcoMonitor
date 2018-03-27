
<h2>Report</h2>

<p><b>Report last run automagically: </b> {$mm.monitor_last_run}</p>
<br>
<p><a href="{cms_action_url action=defaultadmin run_report=1}" >{admin_icon icon='run.gif' class='editicon'} Run a report now</a></p>
<p style="font-size:smaller">(NB Running a report can take some time.)</p>

{if $mm.run_report}
<div style="padding:2em;margin:2em;border:2px solid #666;background-color:#fafafa;">
    {$report}
</div>
{/if}

<h2>Preferences</h2>

<div class="millco-edit-form" >
{form_start action="admin_save_prefs" id="millco_edit"}

<input type="hidden" name="mm_save_prefs" value="1"/>

<p>
    <input type="checkbox" name="file_check" value="1" {if $mm.file_check}checked="checked"{/if} autocomplete="off"/>Run last file update check.
</p>
<p>
    <input type="checkbox" name="certificate_check" value="1" {if $mm.certificate_check}checked="checked"{/if} autocomplete="off"/>Check Certificate expiry date.
</p>

<br>

<p>
<input type="checkbox" name="monitor_send_email" value="1" {if $mm.monitor_send_email}checked="checked"{/if} autocomplete="off"/>Email report if we find something.
</p>
<p>
<input type="text" name="monitor_email_address" value="{$mm.monitor_email_address}" autocomplete="off"/>Email address for reports.
</p>
<br>
<input type="submit" value="Save these preferences">

</div>
<br><br><br>

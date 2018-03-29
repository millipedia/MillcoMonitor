
<h2>Report</h2>

<p>
    <b>Report last run automagically: </b> {$mm.monitor_last_run}
</p>
<br>
<p>
    <a href="{cms_action_url action=defaultadmin run_report=1}" >{admin_icon icon='run.gif' class='editicon'} Run a report now</a>
</p>
<p style="font-size:smaller">(NB Running a report can take some time.)</p>

{if $mm.run_report}
    <div style="padding:2em;margin:2em 0 ;border:2px solid #666;background-color:#fafafa;max-width:400px;">
        {$report}
    </div>
{/if}

<h2>Preferences</h2>

<div class="millco-edit-form" >
{form_start action="admin_save_prefs" id="millco_edit"}

<input type="hidden" name="mm_save_prefs" value="1"/>

<p>
    <input type="checkbox" name="file_check" value="1" {if $mm.file_check}checked="checked"{/if} autocomplete="off"/>Check changes to last updated file.
</p>
<p>
    <input type="checkbox" name="certificate_check" value="1" {if $mm.certificate_check}checked="checked"{/if} autocomplete="off"/>Check SSL certificate expiry date.
</p>
<p>
    <input type="checkbox" name="update_check" value="1" {if $mm.update_check}checked="checked"{/if} autocomplete="off"/>Check for new versions of CMSMS.
</p>
<br>

<p>
<input type="checkbox" name="monitor_send_email" value="1" {if $mm.monitor_send_email}checked="checked"{/if} autocomplete="off"/>Email report if we find something.
</p>
<p>
<label>Email address for reports.</label>
<input type="email" name="monitor_email_address" value="{$mm.monitor_email_address}" autocomplete="off"/>
</p>
<p>
<label>Frequency of monitor runs in seconds (min 900).</label>
<input type="number" name="monitor_run_every" value="{$mm.monitor_run_every}" autocomplete="off"/>
</p>
<br>
<input type="submit" value="Save these preferences">

</div>
<br><br><br>

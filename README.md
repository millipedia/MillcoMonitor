# MillcoMonitor

[CMS Made Simple](https://www.cmsmadesimple.org/) module to run a couple of background monitoring tasks:  

## File Monitoring
The module will walk the default CMSMS directories that shouldn't change and keep track of the last file that was changed by modified date. We now also keep track of the number of files.

If there are changes then we fire off an email and you can check it out.

Obviously this is no substitute for running Maldet, Sucuri or whatever, or even using the CMS system verification, but we've found it useful.

## Certificate Check
A task that checks the expiry date of your site's SSL certificate and fires an alert if there is less <small>(and no, I don't mean *fewer*)</small> than 2 days before it expires. Handy if you want to renew a certificate manually rather than relying on your automated Let's Encrypt renewal.

## Update Check
Checks the latest available version of CMSMS and sends an email if there is an upgrade available. 

That's all it does at the moment, but happy to add more tasks if they'd be useful.
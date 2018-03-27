# MillcoMonitor

[CMS Made Simple](https://www.cmsmadesimple.org/) module to run a couple of background monitoring tasks:  

### File Monitoring
The module will walk the default CMSMS directories that shouldn't change and keep track of the last file that was modified.  
If the file changes then we fire off an email and you can check it out.

Obviously this is no substitute for running Maldet or even using the CMS system verification, but we've found it useful.

## Certificate Check
A task that checks the expiry date of your site's SSL certificate and fires an alert if there is less than 2 days before it expires. Handy if you want to renew a certificate manually rather than relying on your automated Let's Encrypt renewal.


That's all it does at the moment, but happy to add more tasks if they'd be useful.
# Management Console: Forced Errors

If you want to completely block certain deliveries and don't plan on sending them at a later moment, you can
manually force MailerQ to return an error whenever such a delivery is attempted. The Forced Errors view lists
these forced errors and allows you to configure them.

Deliveries can be blocked by specifying either the name of a tag or an MTA-domain combination, in which case you may use a 
wildcard "*" to indicate that deliveries should be blocked from (or to) all IPs.
Next, you should specify the error you want to return. This specification is split in three parts:
* an error code, such as 403 or 511, as specified by the SMTP protocol,
* an extended error code, such as 4.0.11 or 5.0.0, which can carry more information than the classic error code,
* a description, which is at your discretion.
The generated error will be mimic an SMTP response by a remote server.



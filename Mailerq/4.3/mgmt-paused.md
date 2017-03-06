# Management Console: Paused deliveries

If there is an issue with some deliveries or if a domain does not respond well to your messages, you may want
to temporarily stop MailerQ from sending them. You can do this either automatically, by configuring a 
[flood-pattern](mgmt-throttling), or manually by specifying either an MTA-domain combination or a tag.

The Paused deliveries view shows you exactly what email deliveries are currently paused and gives you the
option to resume them. New paused deliveries can be added using the appropriate button in the overview.
If you want to pause an MTA-domain combination, note that you can use a wildcard "*" to indicate that
deliveries from (or to) all IPs should be paused. The entire application can be paused by setting both
the source and target to a wildcard.

# Management Console: Redirected deliveries

Email delivery can also be redirected from one IP to another IP. As an 
example: when one of your IPs is greylisted by a receiving domain, this view 
allows you to temporarily redirect from the greylisted IP address to a new one. 
The redirected delivery shows all redirecting rules and which delivery is 
currently being redirected. You can also manually set up redirections.

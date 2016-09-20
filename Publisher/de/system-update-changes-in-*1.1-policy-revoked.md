The changed way Copernica handles error messages from email providers
has been revoked. A while ago we changed our policy by no longer
handling \*.1.1 message as bounces immediately. This however did not
improved the deliverability the way we envisioned, leading to our
decision to revoke this amendment.\
\
**What’s a \*1.1 message?**\
A \*.1.1 message is an error message a mail providers returns at the
moment an email can not immediately be delivered. \
\
**What changed?\
**In practice however, in some cases there proved to be other reasons
why a provider would return such a notification. That’s why a few weeks
ago we decided to offer an email a few more times before handling it as
a bounce. This however did not result in the improved deliverability we
envisioned, leading to our decision to revoke this amendment. 

**How will this affect Copernica users?\
**This change influences (mini)selections based on irrecoverable errors
in email delivery. (Sub)profiles that registered a \*.1.1 notice will no
longer appear in these (mini)selections. 

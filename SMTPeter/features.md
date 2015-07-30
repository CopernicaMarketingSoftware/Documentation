# SMTPeter features

SMTPeter has several optional features which can be enabled or 
disabled per email message. 

> **Note:** These features are currently being worked on and should be implemented 
soon.

## Inlining CSS

Enabling the inline css feature means all css in the style header of your email
will be placed inline by SMTPeter. This is sometimes nessecary because some ISPs
(e.g. Google) do not support style headers. By placing the CSS inline the style
of your email will be displayed correctly in the inbox of recipients using these
ISPs. 

[Read more about inlining CSS](copernica-docs:SMTPeter/features/inline-css "Inlining CSS Documentation")


## Bounce Tracking

Enabling bounce tracking in SMTPeter means all the bounce messages that mail servers 
return when an email cannot be delivered, are tracked by SMTPeter. To do so SMTPeter 
adds its own return-path address and then forwards the bounce to the address or webhook 
you specified in your dashboard. If you already have a return-path address in the MIME 
of your email, SMTPeter will override this address. 

The bounce statistics are shown in your SMTPeter dashboard overview. 

[Read more about bounce tracking](copernica-docs:SMTPeter/features/bounce-tracking "Bounce Tracking Documentation")

## Click Tracking

Enabling the click tracking function means all clicks on links
in your email will be tracked by SMTPeter. These statistics will
be shown in the statistic overview of your SMTPeter dashboard. 



## Open Tracking

Enabling the open tracking function means all opens of your email will be tracked
by SMTPeter. These statistics will be shown in the statistics overview of your SMTPeter
dashboard. 








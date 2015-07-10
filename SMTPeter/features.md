# SMTPeter features

SMTPeter has several optional features which can be enabled or 
disabled per email message. 

> **Note:** These features are currently being worked on and should be implemented 
soon.

## Click Tracking

Enabling the click tracking function means all clicks on links
in your email will be tracked by SMTPeter. These statistics will
be shown in the statistic overview of your SMTPeter dashboard. You 
can enable click tracking when using the SMTP API by creating
an SMTP login with the feature enabled. 

The following variable should be added to enable click tracking in the REST API:
```javascript
"clicktracking": true
```

## Open Tracking

Enabling the open tracking function means all opens of your email will be tracked
by SMTPeter. These statistics will be shown in the statistics overview of your SMTPeter
dashboard. You can enable open tracking when using the SMTP API by creating SMTP 
login with the feature enabled. 

The following variable should be added to enable open tracking in the REST API:
```javascript
"openstracking": true
```

## Bounce Tracking

Enabling the bounce tracking function means all bounces of your email will be tracked
by SMTPeter. These statistics will be shown in the statistics overview of your SMTPeter
dashboard. You can enable bounce tracking when using the SMTP API by creating SMTP 
login with the feature enabled. 

The following variable should be added to enable bounce tracking in the REST API:
```javascript
"bouncetracking": true
```

## Inline CSS

Enabling the inline css feature means all css in the style header of your email
will be placed inline by SMTPeter. This is sometimes nessecary because some ISPs
(e.g. Google) do not support style headers. By placing the CSS inline the style
of your email will be displayed correctly in the inbox of recipients using these
ISPs. You can enable inling css when using the SMTP API by creating SMTP 
login with the feature enabled. 

The following variable should be added to enable inline css in the REST API:
```javascript
"inlinizecss": true
```

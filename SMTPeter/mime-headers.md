# MIME headers

You can send your created MIME messages to SMTPeter and SMTPeter will take
care of the rest. If you want to, you can influence SMTPeters behavior be
setting some specific x-smtpeter headers in the MIME message. This is especially
useful if you are using the SMTP API, since, SMTP does not allow to pass
separate parameters with a message. However, the MIME headers can also be
used to overwrite the options that are passed to the REST API. Note that
these extra headers that are used to set SMTPeter's options are stripped
out before the message is send to the recipient. Thus, they will not show
up in the recipients message.


## Optional headers

The headers in the table below can be used to affect SMTPeter's behavior.

| Header                   | Description                               |
| ------------------------ | ----------------------------------------- |
| x-smtpeter-inlinecss:    | When set to true, all CSS will be inlined |
| x-smtpeter-trackclicks:  | When set to true, links will be tracked   |
| x-smtpeter-trackbounces: | When set to true, bounces will be tracked |
| x-smtpeter-trackopens:   | When set to true, opens will be tracked   |
| x-smtpeter-preventscam:  | When set to true, links with labels equal to the link will not be tracked |
| x-smtpeter-tags:         | Comma-separated list of message tags      |
| x-smtpeter-embedded:     | When set to hosted, [embedded images](images) will be hosted by us |

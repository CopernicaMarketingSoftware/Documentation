# REST API method: stats

To view statistics using the REST API you use the `stats` method. This method
can be called by using the following URI:

```text
https://www.smtpeter.com/v1/stats/[tag]?access_token=YOUR_API_TOKEN
```

Whenever you send an email using SMTPeter, you can use one or more tags for the
message. Statistics are recorded for the message and logged under each of these
tags. The accumulated statistics for all messages sharing the tag can then be
retrieved using the `stats` method.

If you have sent messages before using the tag `abc` you can retrieve information
about these messages by sending a GET request to the following URI:

```text
https://www.smtpeter.com/v1/stats/abc?access_token=YOUR_API_TOKEN
```

As a result of this request, you will get a JSON-object with the following keys:

```json
{
    "first":        "2016-01-01 12:00:00",
    "last":         "2016-01-01 16:00:00",
    "opens":        10,
    "clicks":       5,
    "messages":     15,
    "deliveries":   15
}
```

The `first` and `last` keys indicate the first and last time activity was
detected on the tag, respectively. Activity can either be a message being
sent, delivered or an open or click that was detected by SMTPeter.

Note that if click- or openstracking is disabled - as per the clicktracking
and openstracking options when sending the message - clicks and opens for
this message will not influence the `first` and `last` time for the tag, as
well as of course not being counted towards the total number of clicks and
opens itself.

The `opens` and `clicks` keys show the number of opens and clicks detected.
Note that the number of opens is - at best - an approximation. We use a
tracking image to detect opens and quite a lot of email clients block
external images by default and thus will not download the tracking image,
making it impossible for us to track the open.

The `messages` key will indicate the number of messages that have been sent
using the given tag while the `delivery` key indicates the number of messages
that were successfully delivered to the receiving to their receiving mail
servers. Ideally these numbers should be close to the same. If the number
of deliveries is much lower it means that either SMTPeter cannot connect
to the destination server or that the destination server is refusing to
accept our messages - either because the email address does not exist,
the mailbox is permanently full or the server thinks that it is spam.

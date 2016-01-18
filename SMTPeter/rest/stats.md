# REST API method: stats

To view statistics using the REST API you use the `stats` method. This method
can be called by using the following URI:

```text
https://www.smtpeter.com/v1/stats?access_token=YOUR_API_TOKEN
```

## Overview of recent activity

Whenever you send an email using SMTPeter, you can use one or more tags for the
message. Statistics are recorded for the message and logged under each of these
tags. The accumulated statistics for all messages sharing the tag can then be
retrieved using the `stats` method.

The `stats` method - without any parameters will give basic statistics about
the 10 most recently active tags. Whenever activity is detected on a message,
all the tags it is linked to are bumped to the top.

An example response to the `stats` method might be something like this:

```json
[{
    "tag":              "tag1",
    "first":            "2016-01-01 12:00:00",
    "last":             "2016-01-01 18:00:00",
    "all_opens":        10,
    "unique_opens":     8,
    "all_clicks":       5,
    "unique_clicks":    3,
    "messages":         15,
    "deliveries":       15
},{
    "tag":              "tag2",
    "first":            "2016-01-01 12:00:00",
    "last":             "2016-01-01 16:00:00",
    "all_opens":        20,
    "unique_opens":     15,
    "all_clicks":       10,
    "unique_clicks":    9,
    "messages":         30,
    "deliveries":       30
}]
```

The response will be an array with a maximum of ten recently active tags.
For each of these tags, the key `tag` obviously tells the tag under which
the messages were sent.

The `first` and `last` keys indicate the first and last time activity was
detected on the tag, respectively. Activity can either be a message being
sent, delivered or an open or click that was detected by SMTPeter.

Note that if click- or openstracking is disabled - as per the clicktracking
and openstracking options when sending the message - clicks and opens for
this message will not influence the `first` and `last` time for the tag, as
well as of course not being counted towards the total number of clicks and
opens itself.

The `all_opens` and `all_clicks` keys show the number of opens and clicks
detected. This are all opens and clicks we detected, even if multiple opens
or clicks originated from the same receiver of the same message.

The `unique_opens` and `unique_clicks` keys keys show the number of opens
and clicks unique to a message. Say a person clicks twice on a link in a
received message, it will only show as a single unique click, but as two
clicks under all_clicks.

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

## Detailed information about a specific tag

It is also possible to retrieve information for a specific tag - instead of
the most recently active ones. To retrieve information for messages sent out
using the tag 'tag1' (as seen in the previous example), a request to the
following URI can be made:

```text
https://www.smtpeter.com/v1/stats/tag1?access_token=YOUR_API_TOKEN
```

As a result of this request, you will get a JSON-object with the following keys:

```json
{
    "tag":              "tag1",
    "first":            "2016-01-01 12:00:00",
    "last":             "2016-01-01 16:00:00",
    "all_opens":        10,
    "unique_opens":     8,
    "all_clicks":       5,
    "unique_clicks":    3
    "messages":         15,
    "deliveries":       15
}
```

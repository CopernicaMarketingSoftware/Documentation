# Get all events for a given characteristic

Everything that passes through SMTPeter gets logged: deliveries, bounces,
clicks, opens - all these events are written to log files. These log
files are accessible through the [REST API](rest-logfiles). Yet, if you
are only interested in particular events that fulfill a certain requirement
you can use the events rest call. All calls that are supported are:

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
https://www.smtpeter.com/v1/events/email/EMAILADDRESS
https://www.smtpeter.com/v1/events/tags/TAG1;OPTIONALTAG2;OPTIONALTAG3
```
after this call you receive a JSON with all the information you have requested.

The layout of this json is:
```json
[
    {
        "type" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2",
            ...
        }
    },
    {
        "type" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2",
            ...
        }
    },
    ...
]
```
The `type` in the JSON describes which type of record it is. The types that
are available are listed in the table below. The data that these types
contain are described on the page of the particular log file.

| Type                                        | Description                                           |
| ------------------------------------------- | ----------------------------------------------------- |
| [attempt](log-attempts "attempts log file") | General information about the message                 |
| [bounce](log-bounces "bounces log file")    | information about a bounce                            |
| [click](log-clicks "clicks log file")       | information about the clicks generated                |
| [delivery](log-deliveries)                  | information about the delivery                        |
| [failure](log-failures)                     | information about a failed delivery                   |
| [open](log-opens "opens log file")          | information about when the message is opened          |
| [response](log-responses)                   | information about response mails received by SMTPeter |


## Events based on messageid

If you want to retreive all information about a particular message you can 
make a get request to

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
```
where `MESSAGEID` is the messageid of interest.


## Events based on an email address

If you want to retrieve all inforamtion about a particular email address
you can make a get request to:

```text
https://www.smtpeter.com/v1/events/email/EMAILADDRESS
```
where `EMAILADDRESS` is the address you are interested in


## Events based on tags

If you want to retrieve all information about one tag, you can make a get
request to:

```text
https://www.smtpeter.com/v1/events/tags/TAG
```
where `TAG` is the tag you are interested in. Optionally you can also filter
on multiple tags. If you want to do so, you can extend the call to:

```text
https://www.smtpeter.com/v1/events/tags/TAG1;TAG2;TAG3;...
```
The returned JSON will only contain information for messages that have
all tags set.

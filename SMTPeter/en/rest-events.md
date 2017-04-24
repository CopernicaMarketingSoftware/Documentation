# Retrieve events

Everything that passes through SMTPeter gets logged: deliveries, bounces,
clicks, opens - all these events are written to log files. These log
files are accessible through the [REST API](rest-logfiles). Yet, if you
are only interested in particular events that fulfill a certain requirement
you can use the events rest call. All calls that are supported are:

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
https://www.smtpeter.com/v1/events/email/EMAILADDRESS
https://www.smtpeter.com/v1/events/template/TEMPLATE
https://www.smtpeter.com/v1/events/tags/TAG1;OPTIONALTAG2;OPTIONALTAG3
```

## Available parameters

You can specify extra options while retrieving events. You can add these
extra options by adding an `&` after your access token, followed by the name
of the option a `=` and the value of the option.
The following parameters can be added to the URL as variables:

- **start**: the start date (yyyy-mm-dd) from which you want to retrieve the events,
- **end**:   the (exclusive) end date (yyyy-mm-dd) until you want to retrieve events,
- **tags**:  optional tags you want to filter for.

## Start and end parameters

If no start and end parameters are provided you will get the default period
for the particular events. 

If you provide a start you will get events from the start
date up to one month after the start.

If you provide an end, you will get the events from one month before the end 
up to (but excluding) the end.

If you provide both a start and an end and the interval between the two
is longer than a month, it will be shortened to a month where the start is
leading. 

Take into account that the dates are treated as UTC dates. 
Also take into account that the monthly period limitation is subject to
change if performance requires this.

## Tags

If you provide a tags parameter, your events will also be filtered on the
provided tag. If you filter on multiple tags you can separate the tags
with a semicolon.


## Returned information

After this call you receive a JSON with all the information you have requested.

The layout of this JSON is:

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

If you want to retrieve the information about a particular message till one
month after you have sent the message you can make a get request to

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
```
where `MESSAGEID` is the messageid of interest. If you want to have events
for a different period, you can specify the `start` and/or `end` option.


## Events based on an email address

If you want to retrieve information about a particular email address for
the last monthly period, you can make a get request to:

```text
https://www.smtpeter.com/v1/events/email/EMAILADDRESS
```
where `EMAILADDRESS` is the address you are interested in. If you want to have events
for a different period, you can specify the `start` and/or `end` option.
Optionally, you can filter on tags as well by providing the `tags` option.


## Events based on a template

If you want to retrieve the information about a particular template for
the last monthly period, you can make a get request to:

```text
https://www.smtpeter.com/v1/events/template/TEMPLATE
```
where `TEMPLATE` is the id of the template you are interested in. If you 
want to have events for a different period, you can specify the `start`
and/or `end` option. Optionally, you can filter on tags as well by providing
the `tags` option.


## Events based on tags

If you want to retrieve information about one tag, for the last monthly
period you can make a get request to:

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

If you want to have events for a different period, you can specify the 
`start` and/or `end` option.

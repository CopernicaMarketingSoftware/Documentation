# Rest events

Everything that passes through SMTPeter gets logged: deliveries, bounces, clicks, opens 
all these events are written to log files. These log files are accessible through the 
REST API. Yet, if you are only interested in particular events that fulfill a certain 
requirement you can use the events rest call. All calls that are supported are:


```text
https://api.copernica.com/v1/events/destinationid/$id?access_token=xxxx
https://api.copernica.com/v1/events/email/$email?access_token=xxxx
https://api.copernica.com/v1/events/tags/$tag1/$optionaltag2/$optionaltag3/...?access_token=xxxx
https://api.copernica.com/v1/events/profile/$id?access_token=xxxx
https://api.copernica.com/v1/events/subprofile/$id?access_token=xxxx
https://api.copernica.com/v1/events/template/$id?access_token=xxxx
https://api.copernica.com/v1/events/document/$id?access_token=xxxx
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
are available are listed in the tables below. The data that these types
contain are described on the page of the particular log file.

| Marketing Suite Event Type            | Description                                                 |
| ------------------------------------- | ----------------------------------------------------------- |
| [attempt](./cdm-attempts-logfile.md)  | General info about mails sent with Marketing Suite (MS)     |
| [abuse](./cdm-abuse-logfile.md)       | Info about mails sent via MS that triggered a notification  |
| [click](./cdm-click-logfile.md)       | Info about clicks generated from mails sent with MS         |
| [delivery](./cdm-delivery-logfile.md) | Info about delivered mails sent with MS                     |
| [error](./cdm-error-logfile.md)       | Info about mails sent with MS that triggered an error       |
| [open](./cdm-impression-logfile.md)   | Info about opens from mails sent with MS                    |
| [retry](./cdm-retry-logfile.md)       | Info about mails sent via MS for which we retry a delivery  |
| [unsubscribe](./cdm-unsubscribe.md)   | Info about mails sent via MS that triggered an unsubscribe  |


| Publisher Event Type                         | Description                                                        |
| -------------------------------------------- | ------------------------------------------------------------------ |
| [attempt](./pom-attempts-logfile.md)         | General info about mails sent with Publisher                       |
| [abuse](./pom-abuses-logfile.md)             | Info about mails sent via Publisher that triggered a notification  |
| [click](./pom-clicks-logfile.md)             | info about clicks generated from mails sent with Publisher         |
| [delivery](./pom-deliveries-logfile.md)      | Info about delivered mails sent with Publisher                     |
| [error](./pom-errors-logfile.md)             | Info about failed mails sent with Publisher                        |
| [open](./pom-impressions-logfile.md)         | Info about impressions from mails sent with Publisher              |
| [retry](./pom-retries-logfile.md)            | Info about mails sent via Publisher for which we retry a delivery  |
| [unsubscribe](./pom-unsubscribes-logfile.md) | Info about mails sent via Publisher that triggered an unsubscribe  |


## Events based on destinationid

If you want to retrieve all information about a particular message you can 
make a get request to

```text
https://api.copernica.com/v1/events/destinationid/$id?access_token=xxxx
```
where `$id` is the destinationid of interest.

## Events based on an email address

If you want to retrieve all inforamtion about a particular email address
you can make a get request to:

```text
https://api.copernica.com/v1/events/email/$email?access_token=xxxx
```
where `$email` is the address you are interested in

## Events based on tags

If you want to retrieve all information about one tag, you can make a get
request to:

```text
https://api.copernica.com/v1/events/tags/$tag1?access_token=xxxx
```
where `TAG` is the tag you are interested in. Optionally you can also filter
on multiple tags. If you want to do so, you can extend the call to:

```text
https://www.smtpeter.com/v1/events/tags/TAG1/TAG2/TAG3/...
```
The returned JSON will only contain information for messages that have
all tags set.

## More information

* [REST API](./rest-api)
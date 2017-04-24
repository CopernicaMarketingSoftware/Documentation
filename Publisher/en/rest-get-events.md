# Get all events for a given characteristic

```text
https://api.copernica.com/v1/events/destinationid/$id?access_token=xxxx
https://api.copernica.com/v1/events/email/$email?access_token=xxxx
https://api.copernica.com/v1/events/tags/$tag1/$optionaltag2/$optionaltag3/...?access_token=xxxx
https://api.copernica.com/v1/events/profile/$id?access_token=xxxx
https://api.copernica.com/v1/events/subprofile/$id?access_token=xxxx
https://api.copernica.com/v1/events/template/$id?access_token=xxxx
https://api.copernica.com/v1/events/document/$id?access_token=xxxx
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
are available are listed in the tables below. The data that these types
contain are described on the page of the particular log file.

| Marketing Suite Event Type            | Description                                                 |
| ------------------------------------- | ----------------------------------------------------------- |
| [attempt](./cdm-attempts-logfile.md)  | General info about mails sent with Marketing Suite (MS)     |
| [abuse](./cdm-abuse-logfile.md)       | Info about mails sent via MS that triggered a notification |
| [click](./cdm-click-logfile.md)       | Info about clicks generated from mails sent with MS         |
| [delivery](./cdm-delivery-logfile.md) | Info about delivered mails sent with MS                     |
| [error](./cdm-error-logfile.md)       | Info about mails sent with MS that triggered an error       |
| [open](./cdm-impression-logfile.md)   | Info about opens from mails sent with MS                    |
| [retry](./cdm-retry-logfile.md)       | Info about mails sent via MS for which we retry a delivery  |
| [unsubscribe](./cdm-unsubscribe.md)   | Info about mails sent via MS that triggered an unsubscribe  |


| Publisher Event Type                         | Description                                                        |
| -------------------------------------------- | ------------------------------------------------------------------ |
| [attempt](./pom-attempts-logfile.md)         | General info about mails sent with Publisher                       |
| [abuse](./pom-abuses-logfile.md)             | Info about mails sent via Publisher that triggered a notification |
| [click](./pom-clicks-logfile.md)             | info about clicks generated from mails sent with Publisher         |
| [delivery](./pom-deliveries-logfile.md)      | Info about delivered mails sent with Publisher                     |
| [error](./pom-errors-logfile.md)             | Info about failed mails sent with Publisher                        |
| [open](./pom-impressions-logfile.md)         | Info about impressions from mails sent with Publisher              |
| [retry](./pom-retries-logfile.md)            | Info about mails sent via Publisher for which we retry a delivery  |
| [unsubscribe](./pom-unsubscribes-logfile.md) | Info about mails sent via Publisher that triggered an unsubscribe  |


## Events based on destinationid

If you want to retreive all information about a particular message you can 
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

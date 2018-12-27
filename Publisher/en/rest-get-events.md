# Rest API: GET events

Everything that happens with your mailings gets logged: deliveries, bounces, clicks, opens, etc..
All of these events are written to log files. These log files are accessible through the 
REST API. However, if you are only interested in particular events that fulfill a certain 
requirement you can use the events REST calls. You can find all supported calls and links 
to their full documentation in the table below:

| Call                                                                                              | Description                     |
|---------------------------------------------------------------------------------------------------|---------------------------------|
|[api.copernica.com/v2/tags/$tag1;$optionaltag2;$optionaltag3;.../events](./rest-get-tags-events)   | Events for a tag                |
|[api.copernica.com/v2/email/$email/events](./rest-get-email-events)                                | Events for an email address     |
|[api.copernica.com/v2/profile/$id/events](./rest-get-profile-events)                               | Events for a profile            |
|[api.copernica.com/v2/subprofile/$id/events](./rest-get-subprofile-events)                         | Events for a subprofile         |
|[api.copernica.com/v2/ms/message/$id/events](./rest-get-ms-message-events)                         | Events for an MS message        |
|[api.copernica.com/v2/ms/template/$id/events](./rest-get-ms-template-events)                       | Events for an MS template       |
|[api.copernica.com/v2/publisher/message/$id/events](./rest-get-publisher-message-events)           | Events for a Publisher message  |
|[api.copernica.com/v2/publisher/template/$id/events](./rest-get-publisher-template-events)         | Events for a Publisher template |
|[api.copernica.com/v2/publisher/document/$id/events](./rest-get-publisher-document-events)         | Events for a Publisher document |

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
        "event" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2",
            ...
        }
    },
    {
        "event" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2",
            ...
        }
    },
    ...
]
```

The `event` property in the JSON describes which type of event it is. The types that
are available are listed in the [event types page](./event-types.md).

## More information

* [Overview of all REST API calls](./rest-api)

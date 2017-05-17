# Rest events

Everything that happens with your mailings gets logged: deliveries, bounces, clicks, opens, etc..
All these events are written to log files. These log files are accessible through the 
REST API. Yet, if you are only interested in particular events that fulfill a certain 
requirement you can use the events rest call. All calls that are supported are:


```text
https://api.copernica.com/v1/message/$id/events?access_token=xxxx
https://api.copernica.com/v1/old/message/$id/events?access_token=xxxx
https://api.copernica.com/v1/email/$email/events?access_token=xxxx
https://api.copernica.com/v1/tags/$tag1;$optionaltag2;$optionaltag3;.../events?access_token=xxxx
https://api.copernica.com/v1/profile/$id/events?access_token=xxxx
https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx
https://api.copernica.com/v1/template/$id/events?access_token=xxxx
https://api.copernica.com/v1/old/template/$id/events?access_token=xxxx
https://api.copernica.com/v1/old/document/$id/events?access_token=xxxx
```


## Available parameters

You can specify extra options while retrieving events. You can add these
extra options by adding an `&` after your access token, followed by the name
of the option a `=` and the value of the option.
The following parameters can be added to the URL as variables:

- **start**: the start date (yyyy-mm-dd) from which you want to retrieve the events,
- **end**:   the (exclusive) end date (yyyy-mm-dd) until you want to retrieve events,
- **tags**:  optional tags you want to filter for.


### Start and end parameters

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


### Tags

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


## Events based on a message id

If you want to retrieve information about a message sent with Marketing
Suite till one month after the message has been sent you can make a get request to:

```text
https://api.copernica.com/v1/message/$id/events?access_token=xxxx
```
where `$id` is the id of the message of interest. If you want to have this
information for a  message sent with Publisher you can make the following
call:

```text
https://api.copernica.com/v1/old/message/$id/events?access_token=xxxx
```

If you want to have events for a different period, you can specify the `start`
and/or `end` option.


## Events based on an email address

If you want to retrieve information about a particular email address for
the last monthly period, you can make a get request to:

```text
https://api.copernica.com/v1/email/$email/events?access_token=xxxx
```
where `$email` is the address you are interested in. If you want to have events
for a different period, you can specify the `start` and/or `end` option.
Optionally, you can filter on tags as well by providing the `tags` option.


## Events based on tags

If you want to retrieve information about one tag, for the last monthly
period you can make a get request to:

```text
https://api.copernica.com/v1/tags/$tag1/events?access_token=xxxx
```
where `$tag1` is the tag you are interested in. Optionally you can also filter
on multiple tags. If you want to do so, you can extend the call to:

```text
https://www.copernica.com/v1/tags/TAG1;TAG2;TAG3;.../events?access_token=xxxx
```
The returned JSON will only contain information for messages that have
all tags set. 

If you want to have events for a different period, you can specify the 
`start` and/or `end` option.


## Events based on a profile

If you want to retrieve the information about a particular profile for
the last monthly period, you can make a get request to:

```text
https://api.copernica.com/v1/profile/$id/events?access_token=xxxx
```
where `$id` is the profile id of interest.
If you want to have events for a different period, you can specify the 
`start` and/or `end` option. Optionally, you can filter on tags as well by providing
the `tags` option.


## Events based  on a sub profile

If you want to retrieve the information about a particular sub profile for
the last monthly period, you can make a get request to:
```text
https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx
```
where `$id` is the sub profile id of interest.
If you want to have events for a different period, you can specify the 
`start` and/or `end` option. Optionally, you can filter on tags as well by providing
the `tags` option.


## Events base on template

If you want to retrieve the information about a particular Marketing Suite
template for the last monthly period, you can make a get request to:
```text
https://api.copernica.com/v1/template/$id/events?access_token=xxxx
```
If you want to have the events for a Publisher template you can make a call to:
```text
https://api.copernica.com/v1/old/template/$id/events?access_token=xxxx
```
If you want to have events for a different period, you can specify the 
`start` and/or `end` option. Optionally, you can filter on tags as well by providing
the `tags` option.


## Events base on a document

If you want to retrieve the information about a particular document for
the last monthly period, you can make a get request to:

https://api.copernica.com/v1/old/document/$id/events?access_token=xxxx

If you want to have events for a different period, you can specify the 
`start` and/or `end` option. Optionally, you can filter on tags as well by providing
the `tags` option.


## More information

* [REST API](./rest-api)

According to the [CAN-SPAM
Act](http://www.business.ftc.gov/documents/bus61-can-spam-act-compliance-guide-business),
subscribers should always be able to unsubscribe from a mailinglist.
Copernica allows you to configure the unsubscribe behaviour on each
database or collection you send emails to. With this function you tell
the application what to do after a subscriber hits the {unsubscribe}
link provided in your emails. We distinguish 3 options: change a value
of a field or multiple fields, remove the subprofile from the
collection, or do nothing (default).

This request URL lets you retrieve information about the currently set
unsubscribe behaviour on a collection or set the unsubscribe behaviour
using a POST request.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/collection/\$collectionID/unsubscribe | GET, POST | none |

GET Request
-----------

Retrieve information about the currently configured unsubscribe
behaviour on the collection associated with \$collectionID.

Possible values are `nothing` (do nothing), `remove` (remove the
subprofile from the collection) or `update` (change the value of a field
or multiple fields in the subprofile).

### Example JSON encoded result

In the example below the unsubscribe behaviour is set to 'update'. When
the behaviour is triggered, the field Newsletter will be set to 'no'.

```
{
    "behavior": "update",
    "fields": {
        "Newsletter": "no",
    }
}
```

POST request
------------

Update the unsubscribe behaviour on the collection associated with
\$collectionID.

Possible values are `nothing` (do nothing), `remove` (remove the
subprofile from the collection) or `update` (change the value of a field
in the subprofile).

### Example of JSON encoded POST message

The unsubscribing subprofile will be updated, two fields are affected.

```
{
    "behavior": "update",
    "fields": {
        "Newsletter": "no",
        "Loyal_customer" : "No"
    }
}
```

Another example: the unsubscribing subprofile will immediately be
deleted from existence.

```
{
    "behavior": "remove"
}
```

DELETE request
--------------

*Not applicable.*

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)


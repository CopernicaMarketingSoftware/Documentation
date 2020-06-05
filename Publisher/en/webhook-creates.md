# Webhooks: (sub)profile creations

If you set up a profile creation Webhook you are notified in real-time
whenever a profile or subprofile in one of your databases.
For each event we send an HTTP(S) POST call to your server with the 
relevant information about the newly created profile.

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

A created profile returns the following variables:

| Variables          | Description                                                                  |
|--------------------|------------------------------------------------------------------------------|
| type               | Type of action that triggered the Webhook ('create')                         |
| parameters         | Parameters that the action was performed with                                |
| timestamp          | Timestamp for when the profile was created (in YYYY-MM-DD HH:MM:SS format)   |
| time               | Unix time for when the profile was created                                   |
| profile            | Unique identifier of the profile that was created                            |
| database           | Unique identifier of the database to which the profile belongs               |
| created            | Timestamp for when the profile was created (in YYYY-MM-DD HH:MM:SS format)   |
| modified           | Timestamp for when the profile was modified (in YYYY-MM-DD HH:MM:SS format)  |
| fields             | Current fields of the profile                                                |
| interests          | Current interests of the profile                                             |

A created subprofile returns the following variables:

| Variables          | Description                                                                      |
|--------------------|----------------------------------------------------------------------------------|
| type               | Type of action that triggered the Webhook ('create')                             |
| parameters         | Parameters that the action was performed with                                    |
| timestamp          | Timestamp for when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)    |
| time               | Unix time for when the subprofile was created                                    |
| subprofile         | Unique identifier of the profile/subprofile that was created that was created    |
| profile            | Unique identifier of the profile to which this subprofile belongs                |
| database           | Unique identifier of the database to which this subprofile belongs               |
| collection         | Unique identifier of the collection to which this subprofile belongs             |
| created            | Time when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)             |
| modified           | Time when the subprofile was modified (in YYYY-MM-DD HH:MM:SS format)            |
| fields             | Current fields of the subprofile                                                 |

## Example

A decoded POST request for a profile might look similar to this:

```json
    {
        "type":         "create",
        "profile":      123,
        "parameters": {
            "name":     "Johny",
            "mail":     "johny@example.com",
            "blue":     1,
            "red":      0
        },
        "timestamp":    "1979-02-12 12:49:23",
        "id":           123,
        "database":     1,
        "fields": {
            "name":     "Johny",
            "mail":     "johny@example.com"
        },
        "interests": {
            "blue":     1,
            "red":      0
        },
        "created":      "1979-02-12 12:49:23",
        "modified":     "1979-02-12 12:49:23"
    }
```
    
An example for a subprofile looks like this:

```json
    {
        "type":         "create",
        "subprofile":   123,
        "parameters": {
            "name":     "Johny",
            "mail":     "johny@example.com",
        },
        "timestamp":    "1979-02-12 12:49:23",
        "id":           12,
        "database":     1,
        "collection":   2,
        "profile":      123,
        "fields": {
            "name":     "Johny",
            "mail":     "johny@example.com"
        },
        "created":      "1979-02-12 12:49:23",
        "modified":     "1979-02-12 12:49:23"
    }
```

## More information

* [Webhooks](./webhooks)
* [Update Webhook](./webhook-updates)
* [Delete Webhook](./webhook-deletes)

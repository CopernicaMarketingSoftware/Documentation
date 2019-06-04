# Webhooks: (sub)profile creations

If you set up a profile creation webhook you are notified in real-time
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

| Variables          | Description                                                                              |
|--------------------|------------------------------------------------------------------------------------------|
| action             | action that triggered the webhook                                                        |
| profile            | unique identifier of the profile that was created                                        |
| type               | which type of action was performed on the profile ('create', 'update' or 'delete')       |
| parameters         | parameters that the action was performed with                                            |
| timestamp          | time when the profile was created (in YYYY-MM-DD HH:MM:SS format)                        |
| id                 | unique identifier of the profile                                                         |
| database           | unique identifier of the database to which the profile belongs                           |
| fields             | current fields of the profile                                                            |
| interests          | current interests of the profile                                                         |
| created            | time when the profile was created (in YYYY-MM-DD HH:MM:SS format)                        |
| modified           | time when the profile was modified (in YYYY-MM-DD HH:MM:SS format)                       |


A created subprofile returns the following variables:

| Variables          | Description                                                                              |
|--------------------|------------------------------------------------------------------------------------------|
| action             | action that triggered the webhook                                                        |
| subprofile         | unique identifier of the profile/subprofile that was created that was created            |
| type               | which type of action was performed on the subprofile ('create', 'update' or 'delete')    |
| parameters         | parameters that the action was performed with                                            |
| timestamp          | time when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)                     |
| id                 | unique identifier of the subprofile                                                      |
| profile            | unique identifier of the profile to which this subprofile belongs                        |
| database           | unique identifier of the database to which this subprofile belongs                       |
| collection         | unique identifier of the collection to which this subprofile belongs                     |
| fields             | current fields of the subprofile                                                         |
| created            | time when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)                     |
| modified           | time when the subprofile was modified (in YYYY-MM-DD HH:MM:SS format)                    |

The "action" variable will always have the value 'create'; this helps discern
these messages from messages that are sent when a profile is
[updated](webhook-updates) or [deleted](webhook-deletes).

## Example

A decoded POST request for a profile might look similar to this:

```json
    {
        "action":       "create",
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
        "action":       "create",
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
* [Update webhook](./webhook-updates)
* [Delete webhook](./webhook-deletes)

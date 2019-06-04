# Webhooks: (sub)profile updates

If you set up a profile update webhook, you are notified in real-time
whenever a profile or subprofile is updated in one of your databases.
For each event we send an HTTP(S) POST call to your server with the 
relevant information about the profile at the time of the update.

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

For profiles this consists of the following variables:

| Variable   | Description                                                                             |
|------------|-----------------------------------------------------------------------------------------|
| profile    | unique identifier of the profile that was updated                                       |
| type       | which type of action was performed on the (sub)profile ('create', 'update' or 'delete') |
| parameters | parameters that the action was performed with                                           |
| timestamp  | time when the (sub)profile was updated (in YYYY-MM-DD HH:MM:SS format)                  |
| id         | unique identifier of the profile                                                        |
| database   | unique identifier of the database to which the profile belongs                          |
| fields     | current fields of the profile                                                           |
| interests  | current interests of the profile                                                        |
| created    | time when the profile was created (in YYYY-MM-DD HH:MM:SS format)                       |
| modified   | time when the profile was modified (in YYYY-MM-DD HH:MM:SS format)                      |

For subprofiles, this consists of the following variables:

| Variable    | Description                                                                             |
|-------------|-----------------------------------------------------------------------------------------|
| subprofile  | unique identifier of the subprofile that was updated                                    |
| type        | which type of action was performed on the (sub)profile ('create', 'update' or 'delete') |
| parameters  | parameters that the action was performed with                                           |
| timestamp   | time when the (sub)profile was updated (in YYYY-MM-DD HH:MM:SS format)                  |
| id          | unique identifier of the subprofile                                                     |
| profile     | unique identifier of the profile to which this subprofile belongs                       |
| database    | unique identifier of the database to which this subprofile belongs                      |
| collection  | unique identifier of the collection to which this subprofile belongs                    |
| fields      | current fields of the subprofile                                                        |
| created     | time when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)                    |
| modified    | time when the subprofile was modified (in YYYY-MM-DD HH:MM:SS format)                   |

The "action" variable will always have the value 'update'; this helps discern
these messages from messages that are sent when a profile is
[created](webhook-creates) or [deleted](webhook-deletes).

## Example

A decoded POST request for a profile might look similar to this:

```json
{
    "action":       "update",
    "profile":      123,
    "parameters": {
        "mail":     "johny+newemail@example.com",
    },
    "timestamp":    "1979-02-12 12:49:23",
    "id":           123,
    "database":     1,
    "fields": {
        "name":     "Johny",
        "mail":     "johny+newemail@example.com",
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
    "action":       "update",
    "subprofile":   123,
    "parameters": {
        "mail":     "johny+newemail@example.com",
    },
    "timestamp":    "1979-02-12 12:49:23",
    "id":           12,
    "database":     1,
    "collection":   2,
    "profile":      123,
    "fields": {
        "name":     "Johny",
        "mail":     "johny+newemail@example.com",
    },
    "created":    "1979-02-12 12:49:23",
    "modified":   "1979-02-12 12:49:23"
}
```

## More information

* [Webhooks](./webhooks)
* [Creation feedback](./webhook-creates)
* [Delete feedback](./webhook-deletes)

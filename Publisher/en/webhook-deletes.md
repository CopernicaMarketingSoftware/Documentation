# Webhooks: (sub)profile deletions

If you set up a profile deletion webhook, you are notified in real-time
whenever a profile or subprofile is deleted from your account's databases.
For each event we send an HTTP(S) POST call to your server with the 
relevant information about the profile that was removed.

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

For profiles the response consists of the following variables:

| Variable  | Description                                                                             |
|-----------|-----------------------------------------------------------------------------------------|
| profile   | unique identifier of the profile that was deleted                                       |    
| type      | which type of action was performed on the (sub)profile ('create', 'update' or 'delete') |
| timestamp | time when the (sub)profile was deleted (in YYYY-MM-DD HH:MM:SS format)                  |
| database  | unique identifier of the database to which the profile belongs                          |

For subprofiles, it consists of the following variables:

| Variable   | Description                                                                             |
|------------|-----------------------------------------------------------------------------------------|
| subprofile | unique identifier of the subprofile that was deleted                                    |
| type       | which type of action was performed on the (sub)profile ('create', 'update' or 'delete') |
| timestamp  | time when the (sub)profile was deleted (in YYYY-MM-DD HH:MM:SS format)                  |
| profile    | unique identifier of the profile to which this subprofile belongs                       |
| database   | unique identifier of the database to which this subprofile belongs                      |
| collection | unique identifier of the collection to which this subprofile belongs                    |

The "action" variable will always have the value 'delete'; this helps discern
these messages from messages that are sent when a profile is
[created](webhook-creates) or [updated](webhook-updates).

## Example

A decoded POST request for a profile might look similar to this:

```json
    {
        "action":       "delete",
        "profile":      123,
        "timestamp":    "1979-02-12 12:49:23",
        "database":     1,
    }
```
    
An example for a subprofile looks like this:

```json
    {
        "action":       "delete",
        "subprofile":   456,
        "timestamp":    "1979-02-12 12:49:23",
        "profile":      123
        "collection":   2,
    }
```

## More information

* [Webhooks](./webhooks)
* [Creation feedback](./webhook-creates)
* [Update feedback](./webhook-updates)

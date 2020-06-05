# Webhooks: (sub)profile deletions

If you set up a profile deletion Webhook, you are notified in real-time
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

| Variable  | Description                                                                               |
|-----------|-------------------------------------------------------------------------------------------|
| type      | Type of action that triggered the Webhook ('delete')                                      |
| timestamp | Timestamp for when the profile was deleted (in YYYY-MM-DD HH:MM:SS format)                |
| time      | Unix time for when the profile was deleted                                                |
| profile   | Unique identifier of the profile that was deleted                                         |   
| database  | Unique identifier of the database to which the profile belongs                            |
| fields    | The fields that belong to the deleted profile                                             |

For subprofiles, it consists of the following variables:

| Variable   | Description                                                                              |
|------------|------------------------------------------------------------------------------------------|
| type       | Type of action that triggered the Webhook ('delete')                                     |
| timestamp  | Time for when the subprofile was deleted (in YYYY-MM-DD HH:MM:SS format)                 |
| time       | Unix time for when the subprofile was deleted                                            |
| profile    | Unique identifier of the profile to which this subprofile belongs                        |
| subprofile | Unique identifier of the subprofile that was deleted                                     |
| database   | Unique identifier of the database to which this subprofile belongs                       |
| collection | Unique identifier of the collection to which this subprofile belongs                     |
| fields     | The fields that belong to the deleted subprofile                                         |

## Example

A decoded POST request for a profile might look similar to this:

```json
    {
        "type":         "delete",
        "profile":      123,
        "timestamp":    "1979-02-12 12:49:23",
        "database":     1,
    }
```
    
An example for a subprofile looks like this:

```json
    {
        "type":         "delete",
        "subprofile":   456,
        "timestamp":    "1979-02-12 12:49:23",
        "profile":      123
        "collection":   2,
    }
```

## More information

* [Webhooks](./webhooks)
* [Creation Webhook](./webhook-creates)
* [Update Webhook](./webhook-updates)

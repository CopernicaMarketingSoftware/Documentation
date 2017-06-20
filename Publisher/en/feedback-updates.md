# Feedback loops: (sub)profile updates

If you set up a profile update feedback loop, you are notified in real-time
whenever a profile or subprofile is updated in one of your databases.
For each event we send an HTTP(S) POST call to your server with the 
relevant information about the profile at the time of the update.

## Variables

With each POST call the following variables are sent over:

| Variables          | Description                                                                             |
|--------------------|-----------------------------------------------------------------------------------------|
| profile/subprofile | unique identifier of the profile/subprofile that was updated                            |
| type               | which type of action was performed on the (sub)profile ('create', 'update' or 'delete') |
| parameters         | parameters that the action was performed with                                           |
| timestamp          | time when the (sub)profile was updated (in YYYY-MM-DD HH:MM:SS format)                  |

The "action" variable will always have the value 'update'; this helps discern
these messages from messages that are sent when a profile is
[created](feedback-creates) or [deleted](feedback-deletes).
Additional information about the profile or subprofile is also sent. 
For profiles this consists of the following variables:

| Variable  | Description                                                        |
|-----------|--------------------------------------------------------------------|
| id        | unique identifier of the profile                                   |
| database  | unique identifier of the database to which the profile belongs     |
| fields    | current fields of the profile                                      |
| interests | current interests of the profile                                   |
| created   | time when the profile was created (in YYYY-MM-DD HH:MM:SS format)  |
| modified  | time when the profile was modified (in YYYY-MM-DD HH:MM:SS format) |

For subprofiles, this consists of the following variables:

| Variable   | Description                                                           |
|------------|-----------------------------------------------------------------------|
| id         | unique identifier of the subprofile                                   |
| profile    | unique identifier of the profile to which this subprofile belongs     |
| database   | unique identifier of the database to which this subprofile belongs    |
| collection | unique identifier of the collection to which this subprofile belongs  |
| fields     | current fields of the subprofile                                      |
| created    | time when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)  |
| modified   | time when the subprofile was modified (in YYYY-MM-DD HH:MM:SS format) |

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

## More information

* [Feedback loops](./feedback-loops)
* [Creation feedback](./feedback-creates)
* [Delete feedback](./feedback-deletes)

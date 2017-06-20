# Feedback loops: (sub)profile deletions

If you set up a profile deletion feedback loop, you are notified in real-time
whenever a profile or subprofile is deleted from your account's databases.
For each event we send an HTTP(S) POST call to your server with the 
relevant information about the profile that was removed.

## Variables

With each POST call the following variables are sent over:

| Variables          | Description                                                                             |
|--------------------|-----------------------------------------------------------------------------------------|
| profile/subprofile | unique identifier of the profile/subprofile that was deleted                            |
| type               | which type of action was performed on the (sub)profile ('create', 'update' or 'delete') |
| timestamp          | time when the (sub)profile was deleted (in YYYY-MM-DD HH:MM:SS format)                  |

The "action" variable will always have the value 'delete'; this helps discern
these messages from messages that are sent when a profile is
[created](feedback-creates) or [updated](feedback-updates).
Additional information about the profile or subprofile is also sent 
for profiles this consists of the following variables:

| Variable  | Description                                                    |
|-----------|----------------------------------------------------------------|
| database  | unique identifier of the database to which the profile belongs |

For subprofiles, this consists of the following variables:

| Variable   | Description                                                          |
|------------|----------------------------------------------------------------------|
| profile    | unique identifier of the profile to which this subprofile belongs    |
| database   | unique identifier of the database to which this subprofile belongs   |
| collection | unique identifier of the collection to which this subprofile belongs |

## More information

* [Feedback loops](./feedback-loops)
* [Creation feedback](./feedback-creates)
* [Update feedback](./feedback-updates)

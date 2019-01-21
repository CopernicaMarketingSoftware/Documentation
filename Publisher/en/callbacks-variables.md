# Callbacks Variabeles
Callbacks can be used to receive real-time data about a (sub)profile that is created, edited or deleted. With each action we send a message through a HTTP POST request to your server containing all relevant information about a (sub)profile. The variables that are sent with a request are the same for all three actions (create, update, and delete).

## Profile variables
| Variables     | Description                                                              | Type      | 
| ------------- | -------------------------------------------------------------------------|-----------|
| id            | unique identifier of the profile                                         | id        |
| action        | the action that triggered this callback ('create', 'update' or 'delete') | id        |
| fields        | current fields of the profile                                            | object    |
| interests     | current interests of the profile                                         | array     |

## Subprofile variables
| Variables     | Description                                                               | Type      | 
| ------------- | --------------------------------------------------------------------------|-----------|
| id            | unique identifier of the subprofile                                       | id        |
| action        | the action that trigggered this callback ('create', 'update' or 'delete') | id        |
| interests     | current interests of the subprofile                                       | array     |

# More information
* [Callbacks] (./callbacks)

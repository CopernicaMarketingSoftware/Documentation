# Follow-up actions

Copernica offers the option to add follow-up actions to your templates or documents. This allows you to carry out automatic actions based on conditions. 
For example, you can automatically send an email whenever a user clicks on a link or apply lead scoring whenever an open is registered. There are 
practically no limits.

## Two separate systems

You can add a follow-up action in your template or document by clicking on __'Followups'__ in the toolbar. You'll then be given the choice between
__'Create followup'__ and __'Create action'__. These options differ in their underlying systems.

The __'Create followup'__ option utilizes our powerful Follow-up Manager. However, you may be missing some functionalities that you're used to from the Publisher 
module. For that reason, you can also use the __'Create action'__ option.

## Creating a follow-up

### Trigger

Follow-up actions are always initiated by a specific event (a trigger). The following triggers are available in the [Email editor](https://ms.copernica.com/#/design):

* Unsubscribe
* Link click
* Email delivery
* Every email impression
* First email impression
* Email error

### Blocks

Once you've set a trigger, you can add blocks to your follow-up action using the Follow-up Manager.

We make a distinction between two types of blocks: (1) **'Intermediate'** blocks and (2) **'Actions'**. An intermediate determines the conditions
on the basis of which an action is initiated.

The available blocks are:

| Block                    | Type                                                                                                    |
|--------------------------|---------------------------------------------------------------------------------------------------------|
| Is subscribed            | Intermediate                                                                                            |
| Check destination        | Intermediate                                                                                            |
| Check subprofiles        | Intermediate                                                                                            |
| Find profile             | Intermediate                                                                                            |
| Find subprofile          | Intermediate                                                                                            |
| Check clicked link       | Intermediate                                                                                            |
| Delay                    | Intermediate                                                                                            |
| Update destination       | Action                                                                                                  |
| Create profile           | Action                                                                                                  |
| Create subprofile        | Action                                                                                                  |
| Unsubscribe destination  | Action                                                                                                  |
| Remove destination       | Action                                                                                                  |
| Send email               | Action                                                                                                  |

### Example

Imagine that you're looking to modify a profile field after a mailing is sent. However, you only intend to modify profiles for which 
the _'Mailing'_ field is set to _'Subscribed'_.

You do this by selecting the __'Email delivery'__ trigger. You can then drag an intermediate of the __'Check destination'__ type 
to the circle visible at the end of the line below __'FollowUp start'__. The block is now linked to the follow-up action. You can then use the __'Edit'__
option to specify that the _'Mailing'_ field should be set to _'Subscribed'_.

You can create the profile modification itself by clicking on the __'Check destination'__ block and selecting __'Create 'match' link'__.
A new line will appear below the block. This line can be linked to a new block. You can then add a __'Check destination'__ action to specify
the data you'd like to modify.

## JavaScript blocks in advanced mode

You can add JavaScript blocks by clicking on **'Advanced mode'** in the bottom section of the Follow-up Manager. Here you can specify checks that 
are carried out whenever follow-up actions are evaluated or executed.

Click [here](./data-object) for a list of available JavaScript objects.

__Note:__ Adding a delay to a follow-up action may cause the profile to meet conditions at evaluation (the moment at which the follow-up action 
is invoked) but not at the moment of execution.

## Creating an action

__Note:__ the __'Create action'__ option can only be used for HTML templates and -documents.

There are four steps involved in creating a follow-up action using the Publisher system.

### Name

You assign a __'Name'__ to the follow-up action. This name is visible in the overview of follow-up actions within your template or document.

### Delay

You specify the __'Delay'__ between the activation of the trigger and the execution of the follow-up action. For example, you can set
a delay based on a fixed period of time (for example 2 hours) or set a variable delay using JavaScript. Immediate execution
is also possible.

### Cause 

You set the __'Cause'__ (trigger) on the basis of which the follow-up action is executed. When doing so, you can add extra conditions that relate
to fields and interests. Conditions are evaluated as soon as the follow-up action is triggered.

There are four causes available:

* The sending of the document;
* The registration of an impression;
* The registration of a click;
* The registration of an error.

### Action

You select the __'Action'__ that you'd like to execute. The following actions are available:

* Send a formatted document by email;
* Send a drag and drop template by email;
* Send a formatted document to mobile device;
* Send a text email;
* Send text message;
* Contact the addressee;
* Create a new subprofile;
* Change (sub)profile data;
* Remove data of addressee.

Conditions can also be added to an action. When utilizing a delay, for example, you could set a condition that checks whether a customer is still registered for the newsletter whenever the follow-up action is executed.

## Advanced JavaScript conditions for HTML templates and -documents

Basic conditions that relate to a cause or action can be set by selecting a field in the interface and comparing it to a specific value.

It's also possible to add advanced JavaScript conditions in the **'Advanced mode'**. In these cases, your script should result in _true_ 
(the follow-up action should be executed) or _false_ (the follow-up action should not be executed).

## Extra variables

You can add extra variables relating to the follow-up action in your HTML template or -document:
```
// Time at which the mailing was sent
$mailing.sendtime

// Time at which the follow-up action was triggered
$mailing.trigger.triggertime

// Time at which the follow-up action was executed
$mailing.trigger.executetime

// Retrieve profile fields for which the follow-up action was executed
$mailing.trigger.profile.FIELD NAME (only functions when the profile is the destination)

// Retrieve subprofile fields for which the follow-up action was executed
$mailing.trigger.subprofile.FIELD NAME (only functions when the subprofile is the destination)
```

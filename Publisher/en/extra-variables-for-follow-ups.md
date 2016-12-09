For follow-up actions, extra variables are made available that enable
you to recieve information about the action that preceded. This can be
usefull for example when you want to make a follow-up action that sends
an email to a fixed address containing information about a webform or
survey that was submitted.

Please note that smarty 2 is still being used within follow-up actions.
This requires the oldschool foreach syntax to loop through the array.

#### Example:

```
<ul>
    {foreach from=$mailing.trigger.fields.interests key=k item=v}
      <li>$k}: $v}</li>
    {/foreach}
</ul>
```

Variables available in follow-up actions
----------------------------------------

```
//always available

$mailing // return NULL

// When was the mailing sent

.sendtime $mailing.sendtime

// ++ when was the mailing triggered ++ //

// what time was the follow-up action triggered? (datetime)

$mailing.trigger.triggertime

// What time was the follow-up action executed? (datetime)

$mailing.trigger.executetime

// by which profile was the follow-up triggered (array)

$mailing.trigger.profile.fieldname
...

// The subprofile that triggered the follow-up action. 

// Without a fieldname specified, it will return an array with data of the subprofile. 

$mailing.trigger.subprofile.fieldname     
...

// ++ by database or collection ++ //

// The fields that were updated in the follow up (array)

$mailing.trigger.fields.fields

// only for profiles, the Interest fields that were updated (array)

$mailing.trigger.fields.interests

// ++ by webform ++ //

// the submitted fields (array)

$mailing.trigger.webform.fields

// the submitted interests (profiles only, array)

$mailing.trigger.webform.interests

// information about the person who submitted the form (array)

$mailing.trigger.webform.submitter.fieldname

// information about the (sub)profiles updated/created (array)

$mailing.trigger.webform.submittees.fieldname

// ++ by survey ++ //

// outputs an xml file with given answers

$mailing.trigger.survey.xml
    
// outputs an html file with given answers

$mailing.trigger.survey.html

// returns an array with answers of respondent

$mailing.trigger.survey.questions

// ++ by any mailing ++ //

// timestamp of mail sent in follow-up acion (datetime)

$mailing.trigger.sendtime

// ++ by mailing ++ //

// Name of the document that triggered the follow-up (string)

$mailing.trigger.snapshot.name

//  Document date created of the snaphot triggered (datetime)

$mailing.trigger.snapshot.created

//  Subject of the document in the follow-up (string)

$mailing.trigger.snapshot.subject
```

Binnen opvolgacties zijn er extra variabelen beschikbaar gemaakt waarmee
je informatie kan opvragen over de actie die de opvolgactie getriggerd
heeft of de actie die naar aanleiding van de follow-up is uitgevoerd. Je
kan deze variabelen bijvoorbeeld inzetten als je een notificatie e-mail
wilt versturen naar een vast adres, waarin je de gegeven antwoorden van
een ingevuld formulier wilt meesturen/tonen.

Let op, binnen opvolgacties wordt nog alijd gebruik gemaakt van smarty
2. Je dient dus de oude syntax gebruiken voor de foreach om door een
array te loopen.

#### Bijvoorbeeld:

```
<ul>
    {foreach from=$mailing.trigger.fields.interests key=k item=v}
      <li>$k}: $v}</li>
    {/foreach}
</ul>
```

Beschikbare variabelen voor opvolgacties
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

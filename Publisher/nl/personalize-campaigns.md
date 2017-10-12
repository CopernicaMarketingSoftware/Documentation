# Personaliseer campagnes

Personalisatie is het toespitsen van publicaties op de individuele
ontvanger. Hierbij kan je denken aan het aanspreken van geadresseerden
met de naam bij mailings, het tonen van verschillende afbeeldingen aan
verschillende doelgroepen op basis van een interesse, of het varieren
met tekst op basis van relatiegegevens.

Voor het personaliseren van je templates en documenten maak je gebruik
van **Smarty code**. Dit is een externe en zeer uitgebreid
gedocumenteerde php-gebaseerde scripttaal. Je kan in Copernica dus
vrijwel alles dat beschreven is op
[http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/).

In Copernica kan je vrijwel overal gebruik maken van Smarty
personalisatie. Dus niet alleen in templates en documenten, maar ook in
bijvoorbeeld **webformulieren** en **opvolgacties**.

## Smarty variabelen voor opvolgacties

Binnen opvolgacties zijn er extra variabelen beschikbaar gemaakt waarmee
je informatie kan opvragen over de actie die de opvolgactie getriggerd
heeft of de actie die naar aanleiding van de follow-up is uitgevoerd. Je
kan deze variabelen bijvoorbeeld gebruiken als je een notificatie e-mail
wilt versturen, waarin je de gegeven antwoorden van een ingevuld
formulier wilt tonen.

### Beschikbare variabelen in opvolgacties

```txt
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

// The subprofile that triggered the follow-up action. 
// Without a fieldname specified, it will return an array with data of the subprofile. 
$mailing.trigger.subprofile.fieldname     

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

## Javascript condities

Naast personalisatie met Smarty, kan je in Copernica condities opstellen
met JavaScript. Al voldoet voor de meeste gebruikers de eenvoudige
script editor. Je gebruikt JavaScript condities onder andere voor het
wel/niet tonen van content blokken aan een doelgroep. Maar ook aan
bijvoorbeeld opvolgacties kunnen condities worden gehangen.


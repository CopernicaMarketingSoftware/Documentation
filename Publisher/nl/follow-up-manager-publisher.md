# De Follow-up manager van de Publisher

De Follow-up manager biedt een handig overzicht van alle ingestelde
opvolgacties op een database, collectie, document, enquête of
webformulier. Het is tevens mogelijk om vanuit het overzicht nieuwe
opvolgacties aan te maken en bestaande opvolgacties te bewerken.

![](../images/overview1.png)

**Afbeelding:** een database met hieraan een heel web aan opvolgacties*

## Waar vind ik de Follow-up manager?

Je vindt de follow-up manager achter een extra tab bij de database,
document, formulier of enquete.

![](../images/follow-up-tab.png)

**Afbeelding:** deze database heeft twee opvolgacties. Wanneer een nieuw
profiel is aangemaakt wordt automatisch een e-mail verzonden naar het
profiel. Wanneer een profiel wordt gewijzigd, wordt het profiel na 5
dagen automatisch verwijderd.*

## Nieuwe opvolgactie maken

Je kunt een opvolgactie aanmaken in het menu van een database, collectie, 
formulier, document of enquete. Je belandt dan in het
scherm waarmee je een trigger en een bijhorende actie in kunt stellen.

Bestaande opvolgacties kunnen vanuit het overzicht gemakkelijk worden
aangepast door op de actie zelf te klikken.

### Aanleiding

Aanleiding zijn gebeurtenissen die ertoe leiden dat de actie wordt uitgevoerd. 
Je kunt bij elke trigger ook nog extra condities instellen op velden en 
interesses.

| Database                          | Collectie                          |
|-----------------------------------|------------------------------------|
| Profiel aangemaakt                | Subprofiel aangemaakt              |
| Profiel aangepast                 | Subprofiel aangepast               |
| Profiel aangemaakt of aangepast   | Subprofiel aangemaakt of aangepast |
|                                   | Subprofiel verwijderd              |

| Document                  | Enquête                      | Webformulier          |
|---------------------------|------------------------------|-----------------------|
| Document verzonden        | Enquête verstuurd            | Formulier verstuurd   |
| Fout geregistreerd        | Specifiek antwoord ingediend | Nieuw (sub)profiel    |
| Impressie geregistreerd   |                              | (Sub)profiel gevonden |
| Klik geregistreerd        |                              |                       |

### Acties

Een opvolgactie kan de volgende acties uitvoeren:

-   Verstuur een Publisher document
-   Verstuur een Marketing Suite template
-   Verstuur een PDF document als fax
-   Verstuur een document naar een mobiel
-   Verstuur een tekst e-mail
-   Verstuur een SMS
-   Maak een actiepunt aan
-   Maak een nieuw (sub)profiel
-   Pas de gegevens van een (sub)profiel aan
-   Verwijder de gegevens van de geadresseerde


## Condities        
Het is daarnaast ook mogelijk om condities mee te geven aan opvolgacties. Om een conditie aan te maken ga je eerst naar de aangemaakte opvolgactie. Klik op **wijzingen** om de opvolgactie aan te passen. In het volgende venster staan de aanleiding en de actie beschreven, op beiden kan een conditie ingesteld worden. Klik op **conditie bewerken** om een conditie aan te passen of toe te voegen. Klik op voer **[Voer een JavaScript conditie in](./advanced-javascript-conditions)** om een Javascript conditie aan te maken of gebruik de editor om een conditie aan te maken. De actie of aanleiding zal alleen gestart worden als er aan deze conditie voldaan wordt. 

## Beschikbare variabelen in opvolgacties

Binnen opvolgacties zijn er extra variabelen beschikbaar gemaakt waarmee je informatie kan opvragen over de actie die de opvolgactie getriggerd heeft of de actie die naar aanleiding van de follow-up is uitgevoerd. Je kan deze variabelen bijvoorbeeld inzetten als je een notificatie e-mail wilt versturen naar een vast adres, waarin je de gegeven antwoorden van een ingevuld formulier wilt meesturen/tonen.

Let op, binnen opvolgacties wordt nog alijd gebruik gemaakt van smarty 2. Je dient dus de oude syntax gebruiken voor de foreach om door een array te loopen. 

    {foreach from=$mailing.trigger.fields.interests key=k item=v}
      <li>{$k}: {$v}</li>
    {/foreach}


### Bijvoorbeeld: 

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
    

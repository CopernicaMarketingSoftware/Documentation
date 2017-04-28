# Personaliseren van e-mails

Zoals je hebt kunnen [lezen](rest-send-multiple-recipients) kan je met
SMTPeter een mail naar meerdere personen tegelijk sturen. Soms wil je inderdaad
identieke mails naar een groep mensen sturen, maar vaak wil je elke mail
toch persoonlijk maken. Dit kan met SMTPeter door in je bericht code op te
nemen die vervangen moet worden met gegevens van de ontvanger. Voordate
SMTPeter het bericht verstuurd, vult het de gegevens van de ontvanger in
op de aangegeven plaatsen.

De manier waarop je in je bericht aangeeft waar iets vervangen moet worden
is gebaseerd op [SMARTY](http://www.smarty.net/). SMARTY maakt het makkelijk
om tekst met code te mengen, maar meer hierover later. Allereerst bespreken
we hoe je personalisatie data meegeeft.


## Personalisatie data bij één ontvanger

Als je een mail verstuurd naar één ontvanger dan kun je de personalisatie
data in de JSON meegeven in de `data` property. Een mogelijke JSON ziet er
als volgt uit:

```json
{
    "recipient": "john@doe.com",
    "data"     : {
        "voornaam"  : "John",
        "achternaam" : "Doe",
        "kinderen"   : ["Jane", "Joe", "Jacky", "Josef"]
    },
    ...
}
```

Voor het personaliseren beschik je nu over de variabelen `voornaam`,
`achternaam` en `kinderen`. De variabelen `voornaam` en `achternaam` hebben
respectievelijke de waardes `John` en `Doe`. De variable `kinderen` is een
array met daarin de waardes `Jane`, `Joe`, `Jacky` en `Josef`. De namen van
de variabelen mag je zelf kiezen maar er gelden enige regels. Deze regels
staan beschreven in [@todo](), maar als je alleen letters en cijfer gebruikt
en begint met een letter, dan heb je altijd een correcte naam.


## Personalisatie data bij meerdere ontvangers

Als je mail verstuurd naar meerdere ontvangers tegelijkertijd dan kun je
de personalisatie data per ontvanger als een array achter de ontvanger zetten.
Een mogelijk JSON ziet er als volgt uit:

```json
{
    "recipients" : [
        "jane@doe.com": {
            "voornaam": "Jane",
            "achternaam": "Doe",
            "kinderen" : ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "voornaam": "John",
            "achternaam": "Doe",
            "kinderen" : ["Jacky", "Joe"]
        }
    ],
    ...
}
```

Voor het versturen beschik je ook hier over de variabelen `voornaam`,
`achternaam` en `kinderen`. Echter, wanneer de mail naar `jane@doe.com` wordt
verstuurd bevat de variabel `voornaam` de waarde `Jane` en wanneer de 
mail naar `john@doe.com` wordt verstuurd dan bevat deze de waarde `John`.


## Gebruik van personalisatie variabelen

Zoals gezegd is het aangeven wat er gepersonaliseerd moet worden gebaseerd
op SMARTY. Wanneer je variabel in SMARTY wilt aanroepen dan gebruik je
`{$variabeleNaam}`. Een simpel voorbeeld hiervan is:

```json
{
    "recipients" : [
        "jane@doe.com": {
            "voornaam": "Jane",
            "achternaam": "Doe",
            "kinderen" : ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "voornaam": "John",
            "achternaam": "Doe",
            "kinderen" : ["Jacky", "Joe"]
        }
    ],
    "from"    : "info@example.com",
    "to"      : "{$recipient}",
    "subject" : "Hallo {$voornaam}",
    "text"    : "Hallo {$voornaam} {$achternaam}!"
}
```
Als de mail naar Jane wordt verstuurd, wordt de subject: "Hallo Jane"
en de text: "Hallo Jane Doe!". Bij John wordt dit "Hallo John" en "Hallo
John Doe!". De variabele `recipient` krijg je automatisch en is gelijk aan
het recipient adres. In bovenstaand voorbeeld wordt dit gebruikt in de "to"
header. Dit voorbeeld is erg simpel. Er zijn veel meer mogelijkheden met
SMARTY om de mail te personaliseren. Voor meer informatie welke mogelijkheden
SMARTY allemaal biedt verwijzen we je naar de onderstaand links. 

Wat mogelijk ook interessant is voor jou, is het gebruiken van personalisatie
in combinatie met onze [e-mail templates](rest-send-template). 


* [Personalisatie gebruiken](personalization)
* [Overzicht modifiers](personalization-modifiers)


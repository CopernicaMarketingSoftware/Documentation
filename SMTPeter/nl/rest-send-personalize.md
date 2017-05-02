# Personaliseren van e-mails

Je hebt al kunnen [lezen](rest-send-multiple-recipients) hoe je met
SMTPeter een e-mail naar meerdere personen tegelijk kunt sturen. Soms wil 
je inderdaad identieke e-mails naar een groep mensen sturen, maar vaak wil 
je elke mail toch persoonlijk maken. Dit kan met SMTPeter door in je bericht
code op te nemen die vervangen moet worden met gegevens van de ontvanger. 
De gegevens van de ontvanger worden, op de aangegeven plaatsen, ingevuld 
door SMTPeter nog voordat het bericht daadwerkelijk wordt verstuurd. 

De manier waarop je in je bericht aangeeft waar iets vervangen moet worden
is gebaseerd op [SMARTY](http://www.smarty.net/). SMARTY maakt het makkelijk
om tekst met code te mengen. Meer hierover volgt later. Allereerst bespreken
we hoe je personalisatie data meegeeft.


## Personalisatie data bij één ontvanger

Als je een e-mail verstuurd naar één ontvanger, kun je de personalisatie
data in de JSON meegeven in de `data` property. Een JSON ziet er wellicht
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
respectievelijke de waardes `John` en `Doe`. De variabele `kinderen` is een
array met daarin de waardes `Jane`, `Joe`, `Jacky` en `Josef`. De namen van
de variabelen mag je zelf kiezen, maar er gelden enige regels. Deze regels
staan beschreven in [@todo](), maar als je alleen letters en cijfer gebruikt
en begint met een letter, dan heb je altijd een correcte naam.


## Personalisatie data bij meerdere ontvangers

Als je e-mail verstuurt naar meerdere ontvangers, kun je
de personalisatiedata per ontvanger meegeven door een array achter de ontvanger
in kwestie te zetten. Een mogelijk JSON ziet er dan als volgt uit:

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

In het bovenstaande voorbeeld is het mogelijk om met de variabelen `voornaam`,
`achternaam` en `kinderen` in je e-mails aan de slag te gaan. Je kunt deze 
variabelen op allerlei plekken in je e-mails aangeven. Vervolgens wordt de 
e-mail verstuurd (naar bijvoorbeeld jane@doe.com) en zorgt SMTPeter ervoor dat
de variabele "voornaam" de waarde "Jane" bevat. Respectievelijk bevat de 
variabele "John" als de e-mail naar john@doe.com wordt verstuurd.


## Gebruik van personalisatie variabelen

Eerder is al besproken hoe je kunt aangeven wat precies gepersonaliseerd moet worden.
Je doet dit door middel van SMARTY. Je kunt de variabele in SMARTY aanroepen 
door `{$variabeleNaam}` te gebruiken. Een simpel voorbeeld hiervan is:

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

Verstuur je een e-mail naar Jane? Dan wordt het "subject": "Hallo Jane" en de
"text": "Hallo Jane Doe!"
In het geval van John wordt het "subject": "Hallo John" en de "text":
"Hallo John Doe!".
De variabele `recipient` krijg je automatisch en is gelijk aan
het recipient adres.


Als de mail naar Jane wordt verstuurd, wordt de subject: "Hallo Jane"
en de text: "Hallo Jane Doe!". Bij John wordt dit "Hallo John" en "Hallo
John Doe!". De variabele `recipient` krijg je automatisch en is gelijk aan
het recipient adres. In bovenstaand voorbeeld wordt dit gebruikt in de "to"
header. Dit voorbeeld is erg simpel en er zijn tal van mogelijkheden om met
SMARTY e-mails te personaliseren. Voor uitgebreide informatie over de mogelijkheden
van SMARTY, verwijzen we je graag naar de onderstaand links. 

Weet je al dat je met SMTPeter ook templates kunt versturen? Dit scheelt een hoop 
tijd en ziet er professioneel uit:
[e-mail templates](rest-send-template) 


* [Personalisatie gebruiken](personalization)
* [Overzicht modifiers](personalization-modifiers)
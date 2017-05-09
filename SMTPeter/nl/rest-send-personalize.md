# Personaliseren van e-mails

Je hebt al kunnen [lezen](rest-send-multiple-recipients) hoe je met
SMTPeter een e-mail naar meerdere personen tegelijk kunt sturen. Soms wil 
je inderdaad identieke e-mails naar een groep mensen sturen, maar vaak wil 
je dat elke e-mail toch persoonlijk is. Dit kan met SMTPeter door in je bericht
code op te nemen die vervangen moet worden met gegevens van de ontvanger. 
De gegevens van de ontvanger worden, op de aangegeven plaatsen, ingevuld 
door SMTPeter nog voordat het bericht daadwerkelijk wordt verstuurd. 

De manier waarop je in je bericht aangeeft waar iets vervangen moet worden
is gebaseerd op een speciale syntax. Deze syntax maakt het makkelijk
om tekst met code te mengen. Meer hierover volgt later. Allereerst bespreken
we hoe je personalisatie data meegeeft.


## Personalisatie data bij één ontvanger

Als je een e-mail verstuurd naar één ontvanger, kun je de personalisatie
data in de JSON meegeven in de `data` property. Een JSON ziet er dan als 
volgt uit:

```json
{
    "recipient": "john@doe.com",
    "data"     : {
        "voornaam"  : "John",
        "achternaam" : "Doe",
        "kinderen"   : ["Jane", "Joe", "Jacky", "Josef"]
    }
}
```

Voor het personaliseren beschik je nu over de variabelen `voornaam`,
`achternaam` en `kinderen`. De variabelen `voornaam` en `achternaam` hebben
respectievelijke de waardes `John` en `Doe`. De variabele `kinderen` is een
array met daarin de waardes `Jane`, `Joe`, `Jacky` en `Josef`. De namen van
de variabelen mag je zelf kiezen, maar er gelden enige regels. Deze regels
staan beschreven in het gedeelte over [personalisatie](personalization).


## Personalisatie data bij meerdere ontvangers

Als je e-mail verstuurt naar meerdere ontvangers, kun je
de personalisatiedata per ontvanger meegeven door een array achter de ontvanger
in kwestie te zetten. Een JSON ziet er dan als volgt uit:

```json
{
    "recipients": {
        "jane@doe.com": {
            "voornaam": "Jane",
            "achternaam": "Doe",
            "kinderen": ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "voornaam": "John",
            "achternaam": "Doe",
            "kinderen": ["Jacky", "Joe"]
        }
    }
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
Je doet dit door middel van een gemakkelijke syntax. Je kunt de variabelen aanroepen 
door bijvoorbeeld `{$variabeleNaam}` te gebruiken. Een simpel voorbeeld hiervan is:

```json
{
    "recipients": {
        "jane@doe.com": {
            "voornaam": "Jane",
            "achternaam": "Doe",
            "kinderen": ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "voornaam": "John",
            "achternaam": "Doe",
            "kinderen": ["Jacky", "Joe"]
        }
    },
    "from": "info@example.com",
    "to": "{$recipient}",
    "subject": "Hallo {$voornaam}",
    "text": "Hallo {$voornaam} {$achternaam}!"
}
```

Verstuur je een e-mail naar Jane? Dan ziet dat er zo uit:

```text
"subject": "Hallo Jane" 
"text": "Hallo Jane Doe!"
```

Verstuur je een e-mail naar John? Dan ziet dat er zo uit:

```text
"subject": "Hallo John"
"text": "Hallo John Doe!"
```

De variabele `recipient` krijg je automatisch en is gelijk aan
het recipient adres. Je kunt nagaan dat in dit voorbeeld de 
recipient variabele in de "to" header wordt gebruikt.
Voor uitgebreide informatie over de mogelijkheden
van deze syntax, verwijzen we je graag naar het overzicht van
de [modifiers](personalization-modifiers). 

Wist je al dat je met SMTPeter ook templates kunt versturen? 
Dit scheelt een hoop tijd en ziet er professioneel uit:

* [E-mail templates](rest-send-template)
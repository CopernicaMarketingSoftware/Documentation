# Emails versturen op basis van een template

Er zijn een aantal voorbeelden gegeven ([1](rest-send-json "MIME door SMTPeter laten maken"), 
[2](rest-mime)) van hoe je data naar SMTPeter stuurt voor het versturen
van een e-mail. Daarnaast kun je ook mails versturen met behulp van
[Responsive Email](https://www.responsiveemail.com/) templates. Het gebruik
van Responsive Email templates heeft een aantal voordelen ten opzicht van
de eerder genoemde methodes. Allereerst kan een mail via de uitgebreide
*drag-and-drop* editor in het dashboard samenstellen in plaats van zelf
HTML schrijven. Daarnaast zijn de mails die hiermee verzonden worden 
responsive, Dit betekent dat een email geopend op een PC een andere opmaak
kan hebben dan de een email geopend op een tablet of smartphone. Hierdoor
ziet uw mail er altijd goed uit!


## Gebruik een template

In het SMTPeter dashboard heb je toegang tot de uitgebreide *drag-and-drop* editor.
Hier kun je *responsive e-mail* templates maken, bewerken en beheren. Elke template
krijgt een eigen *id* die je kunt gebruiken om e-mail te versturen via de REST API.
Een mogelijk JSON voor het versturen ziet er als volgt uit:

```json
{
    "recipient":    "john@doe.com",
    "template":     12
}
```

Omdat de templates gebruik maken van [Responsive Email](https://www.responsiveemail.com/)
en Responsive Email JSON ondersteunt, kun je in plaats van een template ID
ook een complete JSON bij de template property meegeven. Dit kan als string
of als echte JSON:

```json
{
    "recipient":    "john@doe.com",
    "template":     {
        "from":         "jane@doe.com",
        "subject":      "this is the subject"

        /* plus many other properties documented on [responsiveemail.com](https://www.responsiveemail.com/) */
    }
}
```


## Gebruik maken van personalisatie en templates

Net als wanneer je mails verstuurt waarbij je zelf de HTML of MIME genereert,
kun je bij templates gebruik maken van personalisatiedata. Ook hier geldt
dat wanneer je één rercipient hebt je de data mee kan geven via de *data* 
property, zoals in onderstaand voorbeeld:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "data": {
        "voornaam":    "John",
        "achternaam":     "Doe"
    }
}
```

Als je meerdere recipients hebt dan kun je de data per recipient toevoegen:

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
    "template":     12
}
```

In de template kun je vervolgens de variabelen `{$voornaam}`, `{$achternaam}`
en `{$kinderen}` gebruiken. Voor meer informatie over personaliseren verwijzen
we je naar de onderstaand links. 

* [Personalisatie gebruiken](personalization)
* [Overzicht modifiers](personalization-modifiers)


## Onderdelen van de template overschrijven

Normaal gesproken maak je je templates met de template editor van het SMTPeter
dashboard. Onder de motorkap worden deze templates als JSON opgeslagen. Dit 
kun je ook zien in de editor: er is een optie in het menu om de JSON broncode 
van de template te bekijken en te bewerken.

Als je via de API naar een template verwijst (in bovenstaande voorbeelden
verwezen we bijvoorbeeld steeds naar template 12), dan wordt de JSON code van 
de bijbehorende template geladen, omgezet naar een MIME en vevolgens gebruikt 
voor de mailing. Je kunt daarom via de API nog extra properties meegegeven
om de waardes in de template te overschrijven:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "subject":      "alternatief onderwerp"
}
```

Met bovenstaand voorbeeld verstuur je een mailing op basis van template 12, 
maar met een afwijkende subject line. Doordat je de property "subject" hebt
meegegeven, wordt niet het subject van de template gebruikt, maar het 
alternatieve onderwerp dat je met je REST call hebt opgegeven.

De volgende template properties kunnen allemaal worden overschreven:

    * subject
    * text
    * from
    * replyTo
    * to
    * cc
    * headers
    * attachments

Hierdoor is het bijvoorbeeld mogelijk om een mailing op basis van template 12
te versturen, maar met een extra attachment:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "attachments":  [{
        "data":         "base64-encoded data",
        "name":         "attachment.pdf",
        "type":         "application/pdf"
    }]
}
```

Of, als je wilt dat SMTPeter het attachment voor je downloadt:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "attachments":  [{
        "url":          "http:://example.com/path/to/document.pdf",
    }]
}
```

Zoals hierboven al gezegd, worden de templates opgeslagen volgens het systeem
van Copernica's [Responsive Email](https://www.responsiveemail.com) service.
Daar vind je dus ook [uitgebreide documentatie](https://www.responsiveemail.com/json/top-level-properties) 
en voorbeelden van alle properties, inclusief de properties die via de REST 
call kunnen worden overschreven.


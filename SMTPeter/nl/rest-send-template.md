# Emails op basis van templates

Er is een aantal voorbeelden gegeven ([1](rest-send-json "MIME door SMTPeter laten maken"), 
[2](rest-mime)) van hoe je data naar SMTPeter stuurt voor het versturen
van een e-mail. Daarnaast kun je ook e-mails versturen met behulp van templates. 
Het gebruik van templates heeft een aantal voordelen ten opzichte van de eerder 
genoemde methodes. Zo hoef je zelf geen HTML code meer te schrijven als je 
templates gebruikt, maar kun je de berichten via de *drag-and-drop* editor 
samenstellen. Bovendien zijn templates *responsive*. Dit betekent 
dat de opmaak van de e-mail altijd aansluit op het device waarop de mail
wordt geopend. Hierdoor ziet de e-mail er altijd goed uit!


## Template ID's

In het SMTPeter dashboard heb je toegang tot de uitgebreide *drag-and-drop* editor.
Hier kun je *responsive e-mail* templates maken, bewerken en beheren. Elke template
krijgt een eigen *id* die je kunt gebruiken om e-mail te versturen via de REST API.
Een mogelijke JSON voor het versturen ziet er als volgt uit:

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

        /* plus alle andere properties beschreven op https://www.responsiveemail.com */
    }
}
```


## Personaliseren van templates

Net als wanneer je e-mails verstuurt waarbij je zelf de HTML of MIME genereert,
kun je bij templates gebruik maken van personalisatiedata. Ook hier geldt
dat wanneer je één recipient hebt je de data mee kan geven via de *data* 
property, zoals in onderstaand voorbeeld:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "data": {
        "voornaam": "John",
        "achternaam": "Doe"
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
    "template": 12
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
voor de mailing. Je kunt via de API echter extra properties meegegeven om
de opgeslagen waardes van de template te overschrijven:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "subject":      "alternatief onderwerp"
}
```

Met bovenstaand voorbeeld verstuur je een mailing op basis van template 12, 
maar met een afwijkende subject line. Doordat je de property "subject" hebt
meegegeven, wordt niet het opgeslagen subject van template 12 gebruikt, maar het 
alternatieve onderwerp dat met de REST call is meegegeven.

De volgende template properties kunnen allemaal worden overschreven:

* subject;
* text;
* from;
* replyTo;
* to;
* cc;
* headers;
* attachments.

Hierdoor is het bijvoorbeeld mogelijk om, zoals we boven lieten zien, een 
ander subject line op te geven, maar ook om attachments aan een mailing toe
te voegen:

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

Zoals hierboven al beschreven, worden de templates opgeslagen volgens het JSON
formaat van Copernica's [Responsive Email](https://www.responsiveemail.com) service.
Op de speciale website over Responsive Email vind je [uitgebreide documentatie](https://www.responsiveemail.com/json/top-level-properties) 
en voorbeelden van alle properties, inclusief de opgesomde properties die via de REST 
call mogen worden overschreven.
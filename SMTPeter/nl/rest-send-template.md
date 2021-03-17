# Versturen van templates

Er zijn een aantal voorbeelden gegeven ([1](rest-send-json "MIME door SMTPeter laten maken"), 
[2](rest-mime)) hoe je data naar SMTPeter stuurt voor het versturen van een e-mail. 
Het gebruik van templates heeft een aantal voordelen ten opzichte van de eerder
genoemde methodes. 

Ten eerste, je maakt de templates met de handige drag-and-drop 
editor, waardoor je geen HTML hoeft te schrijven. Uiteraard kun je dit wel blijven doen
als je daarvoor voor kiest. Ten tweede, het is niet alleen makkelijk om templates
te maken, maar je kunt ze ook opslaan en bewerken. Zo heb je alle templates netjes op
een plek, binnen het dashboard van SMTPeter. Tot slot, de gecreëerde templates worden
gemaakt door middel van JSON. Door onze geavanceerde [Responsive E-mail](https://www.responsiveemail.com)
service, worden alle JSON templates automatisch responsive gemaakt. Dit betekent
dat de e-mails, ongeacht op welk type apparaat, altijd goed worden weergegeven.

Het verzenden van een template doe je op dezelfde manier als een MIME-bericht, maar dan geef je in je JSON aan welk template verstuurd moet worden. De URL hiervoor ziet er als volgt uit:

`www.smtpeter.com/v1/send?access_token={JOUW_API_TOKEN}`


## Template ID's

Elke template krijgt een eigen *id* die je kunt gebruiken om e-mail te versturen 
via de REST API. Een mogelijke JSON voor het versturen ziet er als volgt uit:

```json
{
    "recipient":    "john@doe.com",
    "template":     12
}
```

Omdat templates die gemaakt zijn met de drag-and-drop editor gebruik maken van 
[Responsive Email](https://www.responsiveemail.com/) en Responsive Email 
JSON ondersteunt, kun je in plaats van een template ID ook een complete JSON
bij de template property meegeven. Dit kan als string of als echte JSON:

```json
{
    "recipient":    "john@doe.com",
    "template":     {
        "from":         "jane@doe.com",
        "subject":      "this is the subject",
        ...
        /* plus alle andere eigenschappen beschreven op https://www.responsiveemail.com */

    }
}
```


## Personaliseren van templates

Het is bekend dat je zelf HTML en MIME kunt maken en mee kunt geven aan de API call. 
De e-mails die je hebt gemaakt kunnen een groot scala aan personalisatiedata bevatten, 
zoals eerder al is uitgelegd. Bij het gebruik van templates heb je ook de volledige 
beschikking over het invoegen van personalisatiedata. In onderstaande voorbeeld wordt een 
recipient gebruikt met tempalate 12. Vervolgens wordt in de "data" property de 
personalisatiedata meegegeven. 
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

Meerdere recipients? Voeg dan de data per recipient toe:

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

In een template kun je vervolgens variabelen zoals `{$voornaam}`, `{$achternaam}`
en `{$kinderen}` gebruiken. Voor meer informatie over personaliseren verwijzen
we je naar de onderstaand links. 

* [Personalisatie gebruiken](personalization)
* [Overzicht modifiers](personalization-modifiers)


## Onderdelen van de template overschrijven

Als je met onze tool templates maakt, worden de deze onder 
de motorkap als JSON opgeslagen. Dit kun je ook zien in de 
eenvoudige template editor: er is een optie in het menu om
de JSON broncode van de template te bekijken en te bewerken.

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
    "attachments":  [
        {
            "data":         "base64-encoded data",
            "name":         "attachment.pdf",
            "type":         "application/pdf"
        }
    ]
}
```

Of, als je wilt dat SMTPeter het attachment voor je downloadt:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "attachments":  [
        {
            "url":          "http:://example.com/path/to/document.pdf"
        }
    ]
}
```

De templates worden opgeslagen volgens het JSON formaat van Copernica's 
[Responsive Email](https://www.responsiveemail.com) service.
Op de speciale website over Responsive Email vind je [uitgebreide documentatie](https://www.responsiveemail.com/json/top-level-properties) 
en voorbeelden van alle properties, inclusief de opgesomde properties die via de REST 
call mogen worden overschreven.

## Meer informatie

* [REST API](./rest-api)
* [Geavanceerde verzender opties](./rest-send-advanced)
* [Verzenden van MIME data](./rest-mime)
* [Aanmaken van MIME data met SMTPeter](./rest-send-json)
* [Personalizatie](./personalization)

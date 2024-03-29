# MIME door SMTPeter laten maken

Je kunt SMTPeter e-mails laten versturen door een *MIME property* toe tevoegen aan de JSON. Deze MIME property
bevat het volledige MIME object dat je wilt versturen. Echter, je kunt SMTPeter ook een MIME string 
laten maken. In dit geval specificeer je geen MIME property, maar wel een aparte "subject", "text" of 
"HTML" property. Nu wordt de MIME gecreëerd door SMTPeter. De volgende tabel bevat alle ondersteunde eigenschappen:

| Property      | Omschrijving                  |
|---------------|-------------------------------|
| from          | "From:" header                |
| to            | "To:" header                  |
| cc            | "Cc:" header                  |
| subject       | Onderwerp                     |
| text          | Tekst versie                  |
| html          | HTML versie                   |
| unsubscribe   | De "list-unsubscribe" header  |
| extra         | Extra "x-\*" headers          |
| attachments   | Bijlagen van de e-mail        |


## E-mailadressen

De "from", "to" en "cc" velden beslissen welke e-mailadressen worden aangemaakt binnen het MIME-object. De "from" variabele 
moet bestaan uit één enkel e-mailadres, maar er is geen limiet voor het aantal adressen die kunnen worden gebruikt 
voor de "to" en "cc" velden.

De notatie voor e-mailadressen in de "from", "to" en "cc" velden is veel flexibeler dan de "envelope" en "recipient" velden. 
Je kunt onder andere namen weergeven of gebruik maken van punthaken. Voor de "to" en "cc" velden kun je ook kommagescheiden 
lijsten gebruiken. De "from", "to" en "cc" velden bepalen welke e-mailadressen worden toegevoegd aan de MIME data. Deze 
e-mailadressen hoeven niet per se identiek te zijn aan de adressen die gebruikt worden in de "envelope" en "recepient" 
velden. Uiteraard is het een goede gewoonte om e-mails te versturen naar de e-mailadressen die in het "to" veld worden 
gespecificeerd.


```json
{
    "from": "info@example.com",
    "to": [
        "one@example.com",
        "two@example.com",
        "\"Number three\" <three@example.com>, info@example.com"
    ],
    "cc": "John Doe <johndoe@example.org>"
}
```


## Subject, text en HTML

De "subject", "text" en "HTML" properties kunnen gebruikt worden om het onderwerp, de tekstversie en de HTML versie toe te voegen.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the e-mail"
}
```

## Unsubscribe header

Als je een *list-unsubscribe* header wilt toevoegen aan je e-mail kun je de JSON "unsubscribe" optie toevoegen. De unsubscribe optie kan een e-mailadres en een url bevatten of een van beide.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the e-mail",
    "unsubscribe": {
        "email": "unsubscribe@example.com",
        "url": "http://www.example.com"
    }
}
```

Als je afmeldformulier aan [RFC 8058](https://datatracker.ietf.org/doc/html/rfc8058) voldoet, kun je de "oneclick"-optie toevoegen aan de "unsubscribe"-instellingen. Als je deze optie gebruikt, dan wordt er een extra "list-unsubscribe-post" header aan de e-mail toegevoegd. Hierdoor kan ontvangende software zien dat een afmeldpagina onderscheid maakt tussen "one-click" afmeldingen en "gewone" afmeldingen. Let op: als je van deze optie gebruik maakt dan moet de afmeldpagina op je website inderdaad aan deze specificatie voldoen. Afmeldingen die via HTTP POST binnenkomen dienen zonder verdere interactie verwerkt te worden, voor afmeldingen via HTTP GET is het toegestaan dat er eerst een bevestigingspagina wordt getoond.

Het is sterk aan te raden om deze optie te gebruiken omdat sommige ontvangers, waaronder gmail.com, dit laten meewegen bij de deliverability. Maar hier dien je dus eerst je website voor aan te passen om onderscheid te maken tussen HTTP POST afmeldingen en HTTP GET afmeldingen, daarna kun je de "oneclick" optie toevoegen aan de JSON.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the e-mail",
    "unsubscribe": {
        "url": "http://www.example.com",
        "oneclick": true
    }
}
```

## Extra "x-*" headers

De "extra" property kun je gebruiken als je een custom header wilt toevoegen aan je e-mail. Om te voorkomen dat een custom header niet conflicteert met een andere header mag je alleen custom headers toevoegen met een "x-*" prefix.

```json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the e-mail",
    "extra": {
        "x-my-identifier": "abcdefg",
        "x-custom-property": "custom"
    }
}
```

## Bijlagen

Met de "attachments" property kun je bestanden toevoegen aan een mailing. SMTPeter verwacht een array met JSON objecten. Er zijn twee verschillende objecten die ondersteund worden. Of je voegt een link toe die naar de bijlage verwijst of je voegt de data in het JSON object toe. De data moet dan wel base64 encoded zijn. Bovendien kun je optioneel specificeren wat voor type data je verstuurd.


```json
{
    "attachments": [ 
        {
            "url": "https://www.example.com/attachment1.pdf",
            "name": "attachment1.pdf",
            "type": "application/pdf"
        }, 
        {
            "data": "VGhpcyBpcyBqdXN0IGFuIGV4YW1wbGUgdGV4dCBmaWxlLi4=",
            "name": "test.txt",
            "type": "text/plain"
        } 
    ]
}
```

## Meer informatie

* [REST API](./rest-api)
* [Geavanceerde verzender opties](./rest-send-advanced)
* [Verzenden MIME data](./rest-mime)
* [Meerdere ontvangers emailen](./rest-send-multiple-recipients)
* [API respons](./rest-api-reaction)

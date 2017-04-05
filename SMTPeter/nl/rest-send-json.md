# MIME door SMTPeter laten maken

Als je de [REST API gebruikt om e-mail te versturen](rest-send) kun je een “mime” property toevoegen, die het volledige MIME object bevat wat je wilt versturen. Je kunt echter ook SMTPeter een MIME string laten maken. Als je geen “mime” property toevoegt aan je request maar een aparte “subject”, “text” of “HTML” property, wordt de MIME gecreëerd door SMTPeter. De volgende tabel bevat alle ondersteunde eigenschappen:

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
De “from”, “to” en “cc” velden beslissen welke e-mailadressen worden weergeven in het MIME-object. De “from” variabele moet bestaan uit één enkel e-mailadres, maar er is geen limiet voor het aantal adressen die kunnen worden gebruikt voor de “to” en “cc” velden.

De notatie voor e-mailadressen in het “from”, “to” en de “cc” velden is veel flexibeler dan de “envelope” en “recipient” velden. Je kan onder andere namen weergeven of gebruik maken van punthaken. Voor de “to” en “cc” velden kan je ook komma gescheiden lijsten gebruiken. Het is zo dat het “from”, “to” en “cc” velden alleen kiezen wat voor e-mailadressen er worden toegevoegd aan de MIME data, en verder niet identiek hoeven te zijn aan de adressen die gebruikt worden in de “envelope” en “recepient” velden. Al is het een goede gewoonte om e-mails te versturen naar de e-mailadressen in het veld “to”.

````json
{
    "from": "info@example.com",
    "to": [
        "one@example.com",
        "two@example.com",
        "\"Number three\" <three@example.com>, info@example.com"
    ],
    "cc": "John Doe <johndoe@example.org>"
}
````

## Subject, text en HTML
De “subject”, “text en “HTML” properties kunnen gebruikt worden om het onderwerp, de tekstversie en de HTML versie toe te voegen.

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email"
}
````

## Unsubscribe header
Als je een “list-unsubscribe header” wilt toevoegen aan je e-mail kun je de JSON “unsubscribe” optie toevoegen. 

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "unsubscribe": "unsubscribe@example.com"
}
````

Je kan ook een URL aan een unsubscribe header toevoegen:

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "unsubscribe": "http://www.example.com"
}
````

Of aan een URL en een e-mailadres:

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "unsubscribe": [ "http://www.example.com", "unsubscribe@example.com" ]
}
````

## Extra “x-*” headers
De “extra” property kun je gebruiken als je een custom header wilt toevoegen aan je e-mail. Om te voorkomen dat een custom header niet conflicteert met een andere header mag je alleen custom headers toevoegen met een ‘x-*” prefix.

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "extra": {
        "x-my-identifier": "abcdefg",
        "x-custom-property": "custom"
    }
}
````

## Bijlagen
Met de “attachments” property kun je bestanden toevoegen aan een mailing. SMTPeter verwacht een array met JSON objecten. Er zijn twee verschillende objecten die ondersteund worden. Of je voegt een link toe die naar de bijlage verwijst of je voegt de data in het JSON object toe. De data moet dan wel base64 encoded zijn. Bovendien kan je optioneel specificeren wat voor type data je verstuurd.


````json
{
    "attachments": [ 
        {
            "url": "https://www.example.com/attachment1.pdf"
        }, 
        {
            "data": "VGhpcyBpcyBqdXN0IGFuIGV4YW1wbGUgdGV4dCBmaWxlLi4=",
            "name": "test.txt",
            "type": "text/plain"
        } 
    ]
}
````

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
of als echte JSON.


## Gebruik maken van personalisatie en templates

Net als wanneer je mails verstuurd waarbij je zelf de HTML of MIME genereert,
kun je bij templates gebruik maken van personalisatie data. Ook hier geldt
dat wanneer je één rercipient hebt je de personalisatie data mee kan geven
als data property, zoals in onderstaand voorbeeld.

```json
{
    "recipient":    "john@doe.com",
    "template":     12 | **or string/object**,
    "data": {
        "voornaam":    "John",
        "achternaam":     "Doe"
    }
}
```

Als je meerdere recpients hebt dan kun je de data per recipient toevoegen:

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
    "template":     12 | **or string/object**,
}
```

In de template kun je vervolgens de variabelen `{$voornaam}`, `{$achternaam}`
en `{$kinderen}` gebruiken. Voor meer informatie over personaliseren verwijzen
we je naar de onderstaand links. 

* [Personalisatie gebruiken](personalization)
* [Overzicht modifiers](personalization-modifiers)


<!--- @todo how to set a to --->
<!--- @todo manage templates via rest --->

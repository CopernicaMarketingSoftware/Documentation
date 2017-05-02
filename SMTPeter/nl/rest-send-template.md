# Emails versturen op basis van een template

Er zijn een aantal voorbeelden gegeven ([1](rest-send-json "MIME door SMTPeter laten maken"),
[2](rest-mime)) van hoe je data meegeeft aaan SMTPeter en vervolgens gebruikt
voor het versturen van e-mails. Daarnaast kun je ook e-mails versturen met behulp van
[Responsive Email](https://www.responsiveemail.com/) templates. Het gebruik
van Responsive Email templates heeft een aantal voordelen ten opzichte van
de eerder genoemde methodes. Allereerst kun je een e-mail samenstellen via de 
uitgebreide *drag-and-drop* editor in het dashboard. Op die manier hoef je niet zelf HTML 
code te schrijven voor je e-mails. De e-mails die worden verzonden met Responsive Email
zijn responsive. Dit betekent dat een e-mail die wordt geopend op een PC, een andere opmaak
kan hebben dan de een e-mail die wordt geopend op een tablet of smartphone. Hierdoor
ziet je e-mail er altijd goed uit!


## Gebruik een template

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
of als echte JSON.


## Gebruik maken van personalisatie en templates

Je kunt bij templates ook gebruik maken van gepersonaliseerde data. Ook hier geldt
weer dat wanneer je één rercipient hebt, de personalisatiedata meegegeven kan worden
als data property:

```json
{
    "recipient": "john@doe.com",
    "template": 12 | **or string/object**,
    "data": {
        "voornaam": "John",
        "achternaam": "Doe"
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
    "template": 12 | **or string/object**,
}
```

In de template kun je vervolgens de variabelen `{$voornaam}`, `{$achternaam}`
en `{$kinderen}` gebruiken. Voor meer informatie over personaliseren verwijzen
we je naar de onderstaand links. 

* [Personalisatie gebruiken](personalization)
* [Overzicht modifiers](personalization-modifiers)


<!--- @todo how to set a to --->
<!--- @todo manage templates via rest --->

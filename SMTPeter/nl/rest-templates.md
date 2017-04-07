# 'Templates' beheren

In de 'dashboard' omgeving van SMTPeter kun je gemakkelijk 'templates' beheren.
Deze 'templates' zijn ook beschikbaar door gebruik van de REST API.
Er zijn methodes om 'templates' te downloaden, te editten of te creëren.
Daarnaast is het natuurlijk ook mogelijk om [een e-mail te versturen](rest-send)
door middel van 'templates'.

## Haal 'templates' op

Binnen je eigen SMTPeter omgeving kun je de algehele lijst van 'templates' opvragen.
Dit kun je doen door een 'HTTP GET call' te versturen  naar de volgende URL
(vergeet niet om je API sleutel toe te voegen):

```text
https://www.smtpeter.com/v1/templates/{start}/{length}
```

De 'templates' methode is alleen beschikbaar als je een 'HTTP GET' methode wilt doen.
Je kunt de grenzen afbakenen door middel van `{start}` en `{length}`, zodat je niet 
de ineens een groot aantal 'templates' terugkrijgt. De 'default' waarde is `0` en `100`.
De 'call' geeft een JSON array terug in het volgende formaat"

```json
[
    {
        "id"    : 1,
        "name"  : "Test email"
    }
    {   "id"    : 2,
        "name"  : "Test 123"
    }
]
```
Voor elke 'template' wordt een unieke 'identifier' en 'template' naam teruggegeven.
Je kunt meerdere 'properties' opvragen door de API aan te roepen met een uniek ID. 

## Een specifieke 'template' opvragen

Je kunt de REST API gebruiken om een specifieke 'template' op te vragen door middel van
een 'HTTP GET' call. Je moet hiervoor wel de specifieke ID van een 'template' weten.

```text
https://www.smtpeter.com/v1/template/{ID}/{format}
```

Je kunt ook hier weer gebruik maken van een specifiek formaat.
Dit kun je zelf opgeven in de 'call'. Het 'default' formaat is
overigens JSON. De andere formaten zijn:

- JSON: geeft de 'template' terug in JSON formaat;
- HTML: geeft de 'template' terug in HTML formaat, geoptimaliseerd voor e-mailcliënten;
- Webversion: geeft de 'template' terug in HTML formaat, geoptimaliseerd voor webcliënten;
- MIME: geeft de 'template' terug in MIME formaat, met extern gehoste afbeeldingen;
- Embedded: geeft de 'template' terug in MIME formaat, met 'embedded' afbeeldingen;
- Text: geeft de 'text' versie terug van een 'template'.

Je kunt ook extra personalisatie variabelen toevoegen in de 'GET' method, zodat je
'template' ook daadwerkelijk wordt gepersonaliseerd. 

## Creëren van 'templates'

Je kunt een nieuwe 'template' creëren door een 'HTTP POST' methode te versturen 
naar SMTPeter:

```text
https://www.smtpeter.com/v1/template/{format}
```

Je kunt de 'templates' aanmaken door de JSON code toe te voegen aan de body van de 
'POST request'. De volledige specificaties van de ondersteunde 'properties' kun je 
vinden op: [www.ResponsiveEmail.com](https://www.responsiveemail.com).

De API geeft een link terug van de nieuwe 'template' in de 'Location' header.
Ook wordt een klein JSON object terug gestuurd met daarin de 'template ID'.
De data die je in de body meegeeft aan de 'request' moet altijd in JSON formaat
zijn.

Voorbeeld van een 'request':

```json
POST /v1/template/html?access_token=yourtoken
Host: www.smtpeter.com
Content-Type: application/json

{ "name" : "template..." }

HTTP/1.1 201 Created
Location: https://www.smtpeter.com/v1/template/2/html?access_token=yourtoken
Content-Type: application/json

{ "id" : 2 }
```
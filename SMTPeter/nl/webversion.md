# Webversie

De webversie biedt een alternatief voor het lezen van de email binnen een 
email client. Dit is bijvoorbeeld nuttig voor ontvangers die binnen hun 
email client geen HTML mails kunnen lezen. Je kunt een link naar de webversie 
toevoegen in je mail of [template](./templates) door de `{$webversion}` tag te gebruiken.
Deze tag wordt automatisch omgezet naar een unieke URL voor elke gebruiker.


Met het volgende stukje HTML wordt de URL in een linkje omgezet:

```html
<a href="{$webversion}">View the web version</a>
```

Voor emails verstuurd in JSON formaat kun je de tag toevoegen onder de 
`url` eigenschap van een link` object. Deze JSON code is een voorbeeld van 
een link.

```json
{
    "type": "link",
    "label": "View the web version",
    "link": {
        "title": "View the web version",
        "url": "{$webversion}"
    }
}
```

De webversie is standaard gelijk aan de HTML versie in de mail. Emails 
verstuurd in JSON formaat optimalizeren daarnaast de HTML data voor het web.

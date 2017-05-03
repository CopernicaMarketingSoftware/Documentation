# REST API configureren

Voor het gebruik van de REST API heb je een zogeheten *access token* nodig. Deze kun je
eenvoudig genereren in het SMTPeter dashboard onder het kopje REST API.
Vervolgens kun je gebruik maken van alle toepassingen door middel van de onderstaande URL:

```text
https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN
```

Let wel op dat je METHOD moet vervangen door de methode die je gaat gebruiken. En dat
YOUR_ACCESS_TOKEN moet worden vervangen door de acces token. Wij raden aan om de
REST API te gebruiken, omdat die simpelweg een betere functionaliteit heeft dan de SMTP API.

Van een aantal programeertalen zijn voorbeeldscripts en *classes* beschikbaar.
Je kunt deze voorbeelden gebruiken om een verbinding op te zetten met de 
REST API. Zo hoef je geen *low-level calls* te schrijven en kun je direct
aan de slag.

* [PHP voorbeeld](php-example "PHP voorbeeld")
* [Python voorbeeld](python-example "Python voorbeeld")

## Meer informatie

* [Direct aan de slag](./introduction)
* [Direct aan de slag met de SMTP API](./introduction-smtp-api)
* [REST API](rest-api)

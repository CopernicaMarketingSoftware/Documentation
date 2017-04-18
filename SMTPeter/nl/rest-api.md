# Verzenden via REST API

SMTPeter heeft een betrouwbare REST API die gebruik maakt van het HTTPS 
protocol. Om toegang te krijgen tot de REST API heb je een een *API access token* 
nodig. Deze vind je terug in het SMTPeter dashboard. De REST API stelt je in staat
om gemakkelijk e-mail te versturen en tegelijkertijd geavanceerde toepassingen te 
injecteren in je e-mails. Door middel van een HTTP POST request kun je aangeven 
dat je gebruik wilt maken van de send method en kun je al bijna je eerste 
e-mail versturen:

```text
https://www.smtpeter.com/v1/send
```

Vervolgens zorg je dat aan een tweetal elementen wordt voldaan: 'het toevoegen van 
een e-mailbericht aan de *body* en het aangeven van de SMTPeter mogelijkheden die 
je wilt activeren. De opmaak ziet er dan als volgt uit:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```

## Verken de andere toepassingen

De REST API is uitgebreid en geeft je vrijheid in het maken van keuzes:

* [MIME data versturen](rest-mime)
* [MIME data door SMTPeter laten versturen](rest-send-json)
* [Versturen op basis van een template](rest-send-template)
* [Geavanceerde verzendopties](rest-send-advanced)
* [Terugkoppeling](rest-api-reaction)

*Alle beschikbare REST calls kun je [hier](all-rest-calls) vinden.*

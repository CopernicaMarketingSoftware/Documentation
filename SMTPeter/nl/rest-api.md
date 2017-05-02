# Verzenden via REST API

SMTPeter heeft een eenvoudige en veilig REST API die gebruik maakt van het HTTPS 
protocol. Om toegang te krijgen tot de REST API heb je een een *API access token* 
nodig. Deze vind je terug in het SMTPeter dashboard. De REST API stelt je in staat
om gemakkelijk e-mail te versturen en tegelijkertijd uitgebreide opties per e-mail
in te stellen. Door middel van een HTTP POST request kun je aangeven 
dat je gebruik wilt maken van de send method en kun je al bijna je eerste 
e-mail versturen:

```text
https://www.smtpeter.com/v1/send?access_token={JOUW_API_TOKEN}
```

`{JOUW_API_TOKEN}` is de access token die je via het dashboard hebt opgevraagd.
De extra data in de POST request, met daarin gegevens voor de e-mail, kunnen
als JSON worden meegegeven. De opmaak van een eenvoudige request ziet er 
dan als volgt uit:

```text
POST /v1/send?access_token={JOUW_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "from":         "info@example.com",
    "to":           "john@doe.com"
    "subject":      "Dit is het onderwerp",
    "text":         "Dit is de inhoud",
}
```

SMTPeter gaat, nadat je een request hebt gedaan, meteen aan de slag. Er wordt een MIME 
(een e-mail bericht) aangemaakt met de gespecificeerde from, to, subject en text velden.
De e-mail wordt uiteindelijk op de juiste manier afgeleverd bij de opgegeven recipient.

Het is ook mogelijk om een e-mail door middel van HTML of met bijlagen te versturen.
Alle opties die SMTPeter, bij het versturen van een e-mail, ondersteund zijn beschreven 
in de [MIME door SMTPeter laten maken](rest-send-json) documentatie.

Een zelfgemaakt MIME met SMTPeter versturen behoort ook tot de mogelijkheden.
Meer informatie hierover kun je vinden in de [MIME data versturen](rest-mime)
documentatie.


## Verken de andere toepassingen

De REST API is uitgebreid en geeft je vrijheid in het maken van keuzes:

* [MIME data versturen](rest-mime)
* [MIME data door SMTPeter laten versturen](rest-send-json)
* [Versturen naar meerdere afzenders](rest-send-multiple-recipients)
* [Versturen op basis van een template](rest-send-template)
* [Geavanceerde verzendopties](rest-send-advanced)
* [API respons](rest-api-respons)

*Alle beschikbare REST calls kun je [hier](all-rest-calls) vinden.*
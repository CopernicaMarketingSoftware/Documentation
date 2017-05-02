# Verzenden via REST API

SMTPeter heeft een eenvoudige en veilig REST API waarmee je e-mail kunt versturen
via het HTTPS protocol. Stuur een POST request naar onderstaande URL om een 
mail te versturen:

```text
https://www.smtpeter.com/v1/send?access_token={JOUW_API_TOKEN}
```

De string `{JOUW_API_TOKEN}` kun je via het dashboard opvragen. De body van
het POST request bevat het bericht dat je wilt versturen:

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

De data die je naar SMTPeter stuurt kan op verschillende manieren zijn opgemaakt.
In bovenstaand voorbeeld wordt het e-mailbericht door SMTPeter opgemaakt,
maar je kunt ook andersoortige velden opnemen, bijvoorbeeld omdat je zelf de MIME
hebt opgemaakt of om gebruik te maken van een voorgedefinieerde template.


## Verken de andere toepassingen

De REST API is uitgebreid en geeft je vrijheid in het maken van keuzes:

* [MIME data versturen](rest-mime)
* [MIME data door SMTPeter laten versturen](rest-send-json)
* [Versturen naar meerdere afzenders](rest-send-multiple-recipients)
* [Versturen op basis van een template](rest-send-template)
* [Geavanceerde verzendopties](rest-send-advanced)
* [API respons](rest-api-reaction)

*Alle beschikbare REST calls kun je [hier](all-rest-calls) vinden.*

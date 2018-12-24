# REST API: GET message body (Marketing Suite)

Als je de inhoud van een bericht verzonden met de Marketing Suite wil 
opvragen kun je een GET request sturen naar de volgende URL:

`https://api.copernica.com/v1/message/$id/body/$type?access_token=xxx`

waar `$id` de unieke string is die het bericht identificeert en `$type` 
het formaat is voor het bericht. Vergeet je access token niet toe te voegen! 
Deze methode kan niet aangeroepen worden met een PHP script.

## Types

Het bericht kan in drie formaten opgevraagd worden:

* **MIME**: Internet standaard voor email
* **HTML**: HyperText Language Markup/internet markup
* **Text**: Simpele platte tekst

Afhankelijk van het formaat ziet de output er anders uit. **MIME** bevat 
alle headers bijvoorbeeld, terwijl **text** alleen platte tekst laat zien. 
Je kunt het gewenste type in de URL toevoegen.

## Meer informatie

* [Alle API calls](./rest-api)
* [GET message](./rest-get-message)
* [GET message events](./rest-get-message-events)

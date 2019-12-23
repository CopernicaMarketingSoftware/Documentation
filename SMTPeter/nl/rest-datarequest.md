# Opvragen van gegevens aan de hand van een e-mailadres

SMTPeter houdt data bij over e-mailadressen, die ook via een API call op te 
vragen is. Het verzamelen van deze data neemt wat tijd in beslag, waardoor 
we dit proces hebben opgesplitst in twee delen. In het eerste deel dien je 
door middel van een POST request een verzoek bij ons in om de data te verzamelen. 
Je kunt hieraan een monitor adres meegeven, een e-mailadres waarnaar de 
verzamelde data verstuurd wordt. Kies je ervoor dit niet te doen, 
dan kun je met een tweede call in de vorm van een GET request de verzamelde 
data opvragen. In dit artikel bespreken we de stappen om alle data van een 
e-mailadres op te vragen.

## Creëren van een data verzoek

Om een data verzoek te creëren stuur je een POST request naar de volgende URL:

`https://www.smtpeter.com/v1/datarequest/`

Voor dit verzoek zijn de volgende parameters beschikbaar:

* **email**: Het e-mailadres waar data verzameld moet worden (verplicht).
* **monitor**: Het monitor adres voor dit verzoek. Dit kan een URL zijn 
waarnaar wij een POST verzoek verzenden, of een e-mailadres waarin we de 
data meesturen als een bijlage. Deze parameter is optioneel en de verzamelde 
data kan ook opgevraagd worden door middel van een nieuw GET verzoek.

Een succesvolle call geeft (ook met monitor) een unieke ID voor het 
dataverzoek terug, waarmee de data en de status van het verzoek opgevraagd 
kunnen worden.

## Opvragen van de status van een data verzoek

Je kan de status van een data verzoek opvragen door een HTTP GET request 
te versturen naar de volgende URL:

`https://www.smtpeter.com/v1/datarequest/$id/status`

waar **$id** de unieke ID van het verzoek is die je hebt ontvangen na 
de POST call.

## Opvragen van de data van een data verzoek

Je kan de data van een data verzoek opvragen door een HTTP GET request to
sturen naar de volgende URL:

`https://www.smtpeter.com/v1/datarequest/$id`

waar **$id** de unieke ID van het verzoek is die je hebt ontvangen na 
de POST call.

## Het JSON bestand

Als het verzoek reeds is afgerond, retourneren we een JSON met alle beschikbare
informatie voor het betreffende e-mailadres. Deze JSON heeft twee members **info**
en **data**. De info member heeft ook twee members **type** en **id**. Het type
geeft het type informatie aan. Dit zal altijd **email** zijn omdat de 
data opgevraagd wordt voor een e-mailadres. De **id** bevat het
specifieke e-mailadres waar de gegevens voor zijn. De data member in de
JSON bevat een array van arrays met daarin alle data die we voor het 
e-mailadres konden vinden. Voorbeelden hiervan zijn:

- De HTML en tekstversies van de emails die verzonden zijn
- Bijlagen
- Informatie over kliks en opens
- etc.

Als de data nog niet beschikbaar zijn dat bevat de data member de tekst:
"Data not available (yet).".

## Meer informatie

* [REST API](rest-api)
* [Overige REST calls](rest-other-calls)
* [All REST calls](all-rest-calls)

# Opvragen van gegevens aan de hand van een e-mailadres

SMTPeter houdt data bij over e-mailadressen, die ook via een API call op te 
vragen is. Het verzamelen van deze data neemt wat tijd in beslag, waardoor 
we dit proces hebben opgesplits in twee delen. In het eerste deel dien je 
door middel van een POST request een verzoek bij ons in om de data te verzamelen. 
Met een tweede call in de vorm van een GET request kun je vervolgens de data opvragen. 
In dit artikel bespreken we de stappen om alle data van een e-mailadres 
op te vragen.

## Creëren van een data verzoek

Om een data verzoek te creëren stuur je een POST request naar de volgende URL:

`https://www.smtpeter.com/v1/datarequest/`

Ook moet er een JSON meegestuurd worden met dit verzoek. In de JSON staat 
de **email** (verplicht) en optioneel een adres om naar te rapporteren als 
de data beschikbaar is. De JSON moet er als volgt uitzien:

```json
{
    "email": $emailaddress
    "report": $address          // optioneel
}
```

Hier is **email** het e-mailadres. Het adres om naar te rapporteren kan 
opgegeven worden als **address**, als een URL of e-mailadres. Als er een 
e-mailadres is opgegeven bij **address** wordt er een e-mail verstuurd 
naar het genoemde adres. De data wordt als bijlage meegestuurd indien 
mogelijk, of gelinkt wanneer het bestand te groot is. Als er een URL 
opgegeven wordt versturen wij door middel van een POST request de data 
naar de genoemde URL. De structuur van de data vind je verder in dit artikel.

In beide gevallen is het resultaat van deze POST request een unieke ID. 
Met deze ID kan de data opgevraagd worden.

## Opvragen van de data van een data verzoek

Je kan de data van een data verzoek opvragen door en HTTP GET request to
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

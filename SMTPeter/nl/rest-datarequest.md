# Opvragen van gegevens aan de hand van een e-mailadres

Om de hoeveelheid data die SMTPeter bijhoudt goed te ontsluiten is het mogelijk
om aan de hand van een e-mailadres, alle gegevens over dat adres op te vragen.
Omdat het verzamelen enige tijd kan vergen, is het opvragen opgesplitst in
twee delen. In het eerste deel dien je door middel van een POST request 
een verzoek bij ons in om de data te verzamelen. In het tweede deel kan 
je door middel van een GET request de data opvragen. Hieronder staat uitgelegd
hoe de stappen precies werken.

## Creëren van een data verzoek

Om een data verzoek te creëren stuur je een POST request naar de volgende URL:

`https://www.smtpeter.com/v1/datarequest/$email`

waar `$email` vervangen moet worden met het e-mailadres waarvoor de data
opgevraagd wordt. Optioneel kan je een JSON aan het POST request toevoegen.
In deze JSON kan je een adres zetten waar naar toe gerapporteerd wordt wanneer
de data beschikbaar zijn. De JSON moet er als volgt uitzien:

```json
{
    "report": $address
}
```
`address` mag hier een e-mailadres of een URL zijn. Als er een e-mailadres
is opgegeven, dan wordt er een e-mail verstuurd naar het genoemde adres. In
deze email bevat de data, of, wanneer dit te veel data zijn, een linkje waar
de data te downloaden zijn. Als er een URL opgegeven wordt, dan versturen wij
door middel van een POST request de data naar de genoemde URL (zie hieronder
hoe de data er uitzien).


## Resultaat van een POST request

Het resultaat van deze POST request is een unieke ID. Met deze ID kan de data
opgevraagd worden.

## Opvragen van de data van een data verzoek

Je kan de data van een data verzoek opvragen door en HTTP GET request to
sturen naar de volgende URL:

`https://www.smtpeter.com/v1/datarequest/$id`

waar `$id` de unieke ID van het verzoek is.


## Resultaat van een GET request

Als het verzoek reeds is afgerond, retourneren we een JSON met alle beschikbare
informatie voor het betreffende e-mailadres. Deze JSOn heeft twee members `info`
en `data`. De info member heeft ook twee members `type en `id`. Het type
geeft het type informatie aan. In dit geval is dit email. De `id` bevat het
specifieke e-mailadres waar de gegevens voor zijn. De data member in de
JSON bevat een array van arrays met daarin alle data die we voor het 
e-mailadres konden vinden. Voorbeelden hiervan zijn:
- De HTML en tekst versies van de emails die verzonden zijn,
- Attachments,
- Opens, en clicks informmatie,
- etc.

Als de data nog niet beschikbaar zijn dat bevat de data member de tekst:
"Data are not available (yet).".

## Meer informatie

* [REST API](rest-api)
* [Overige REST calls](rest-other-calls)
* [All REST calls](all-rest-calls)

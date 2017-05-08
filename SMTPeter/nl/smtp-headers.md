# MIME headers

Je kunt eenvoudig zelf gemaakt MIME-berichten meegeven aan SMTPeter.
Alles gaat vanaf daar automatisch. Indien gewenst kun je het gedrag van
SMTPeter beïnvloeden door specifieke 'x-smtpeter'-headers in het MIME-bericht
te zetten. Dit is vooral handig wanneer je gebruikt maakt van de SMTP API
in plaats van de REST API, omdat SMTP het doorgeven van aparte parameters
in een bericht niet ondersteunt zoals REST dat doet.

MIME headers kunnen ook gebruikt worden om de opties die doorgegeven
worden bij het maken van de REST call te overschrijven. Let wel op dat deze 
extra headers worden gestript nog voordat het bericht naar de ontvanger 
wordt verzonden. Ze staan dus niet meer in het bericht dat de ontvanger ziet.

Hieronder vind je een lijst van alle mogelijke optionele headers:

| Header                   | Omschrijving                                                                                                                    |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------- |
| x-smtpeter-inlinecss:    | Alle CSS wordt inline wanneer deze optie aanstaat                                                                               |
| x-smtpeter-trackclicks:  | Link tracking wordt geactiveerd wanneer deze optie aanstaat                                                                     |
| x-smtpeter-trackbounces: | Bounce tracking wordt geactiveerd wanneer deze optie aanstaat                                                                   |
| x-smtpeter-trackopens:   | Open tracking wordt geactiveerd wanneer deze optie aanstaat                                                                     |
| x-smtpeter-preventscam:  | Links met labels die overeenkomen met de link worden niet getrackt als deze optie aanstaat                                      |
| x-smtpeter-tags:         | Komma-gescheiden lijst van de tags van het bericht                                                                              |
| x-smtpeter-images:       | Als deze optie op ‘hosted’ staat, worden [embedded afbeeldingen](images) door SMTPeter zelf gehost 							 |

## Meer informatie

* [SMTP API](./smtp-api)
* [REST API instellingen](./rest-send-advanced)

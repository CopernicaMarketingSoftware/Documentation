# MIME headers
Wanneer je een MIME-bericht hebt gemaakt, kun je deze aan SMTPeter geven, waarop hij alles verder zal regelen. Als je wilt, kunt je het gedrag van SMTPeter beïnvloeden door specifieke 'x-smtpeter'-headers in het MIME-bericht te zetten. Dit is vooral handig wanneer je gebruikt maakt van de SMTP API in plaats van de REST API, omdat SMTP het doorgeven van aparte parameters in een bericht niet ondersteunt zoals REST dat doet.

MIME headers kunnen echter ook gebruikt worden om de opties die doorgegeven worden bij REST te overschrijven. Let wel dat deze extra headers worden gestript voordat het bericht naar de ontvanger wordt verzonden. Ze staan dus niet meer in het bericht dat de ontvanger ziet.

Hieronder vind je een lijst van alle mogelijke optionele headers:

| Header                   | Omschrijving                              |
| ------------------------ | ----------------------------------------- |
| x-smtpeter-inlinecss:    | Alle CSS wordt inline wanneer deze optie aanstaat|
| x-smtpeter-trackclicks:  | Link tracking wordt geactiveerd wanneer deze optie aanstaat  |
| x-smtpeter-trackbounces: | Bounce tracking wordt geactiveerd wanneer deze optie aanstaat |
| x-smtpeter-trackopens:   | Open tracking wordt geactiveerd wanneer deze optie aanstaat  |
| x-smtpeter-preventscam:  | Links met labels die overeenkomen met de link worden niet getrackt als deze optie aanstaat |
| x-smtpeter-tags:         | Komma-gescheiden lijst van de tags van het bericht |
| x-smtpeter-images:       | Als deze optie op ‘hosted’ staat, worden [embedded afbeeldingen](images "Afbeeldingen in een e-mail") door SMTPeter zelf gehost |

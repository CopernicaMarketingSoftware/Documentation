# Opvragen van DMARC reports

SMTPeter ondersteund *DMARC*. Via de *REST API* kun je de verstuurde DMARC reports ontvangen. 
Bij het gebruik van [DMARC](dmarc-deployment) versturen *ISPs* en e-mailproviders periodiek rapportages met *SPF* en *DKIM* statistieken.
Deze rapporten zijn te bereiken via de REST GET API via de volgende methodes:

```text
(1) https://www.smtpeter.com/v1/dmarc
(2) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR
(3) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR/ID
```

"DATE" is de datum van het rapport in de vorm YYYY-MM-DD, "FROM" is het domein die het rapport heeft verstuurd en FOR is het domein waarvoor het rapport is. Als er meerdere rapporten zijn voor een FROM-FOR combinatie of voor een bepaalde datum, kun je een ID (beginnend bij nul) gebruiken om de data te ontvangen. Als er meerdere rapporten zijn en er geen ID is meegegeven wordt alleen het eerste DMARC rapport (XML bestand) teruggegeven.

Als je een DMARC call maakt zonder extra argumenten (methode 1), dan krijg je een array met data die mogelijk DMARC rapporten kunnen bevatten. Echter, wij raden je aan de [logfiles methode](rest-logfiles) te gebruiken om te zien op welke data je [DMARC rapporten](dmarc-deployment) hebt ontvangen. De content in deze DMARC *log files* geeft je de informatie die je nodig hebt om DMARC rapporten te ontvangen, zoals FROM en FOR.
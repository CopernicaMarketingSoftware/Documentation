# SMTP Credentials

Om toegang te krijgen tot de REST API heb je geldige inloggegevens nodig. Deze gegevens moeten in een handshake zijn meegenomen voordat je het eerste bericht over de verbinding kunt sturen. SMTPeter ondersteunt zowel het [AUTH PLAIN als het AUTH LOGIN mechanisme](https://en.wikipedia.org/wiki/SMTP_Authentication). De inloggegevens moeten over een versleutelde verbinding worden verstuurd, die kan worden opgezet door een connectie te maken met [poort 456](smtp-credentials) of door de verbinding te versleutelen met STARTTLS. Meer over poorten en STARTTLS vind je in [het artikel over poorten](smtp-ports).

De gebruikersnaam en het wachtwoord kunnen worden aangemaakt en veranderd via het SMTPeter dashboard. Je kunt oneindig veel logins maken.

## Instellingen voor inloggegevens
Omdat het SMTP-protocol het doorgeven van parameters niet echt ondersteunt, gebruikt SMTPeter een andere manier om de opties te specificeren die gebruikt moeten worden bij verzonden berichten: Voor iedere set inloggegevens kun je de benodigde SMTPeter functies aan- en uitzetten. Je kunt meerdere logins maken met elk een andere set opties. Wanneer je e-mail verstuurt, kun je de gebruikersnaam en het wachtwoord gebruiken met de opties die je nodig hebt voor die specifieke mailing.

De beschikbare features zijn:
- hyperlinks aanpassen om clicks te tracken
- afbeeldingen aanpassen om opens te tracken
- niet aanpassen van links die waarschuwingsberichten zouden kunnen triggeren
- veranderen van het envelope address om bounces te verzamelen
- HTML-code aanpassen om inline CSS-attributen te creëren 

Je kunt logins maken en features aanpassen in het dashboard.

## Delivery Status Notifications
Als je gebruik maakt van de [bounce-tracking feature](bounce-handling) vervangt SMTPeter je envelope address door zijn eigen envelope address. Het adres dat de ontvanger ziet zal dan ook anders zijn dan het adres dat de verzender heeft aangegeven. Alle bounces gaan dan eerst langs SMTPeter, voordat ze worden doorgestuurd naar het adres dat de gebruiker heeft ingesteld.

Als je echter het verwerken van bounces niet aan SMTPeter overlaat, gedraagt SMTPeter zich als een normale MTA en stuurt hij Delivery Status Notifications naar je envelope address als er iets mis gaat.

SMTPeter ondersteunt ook de [SMTP DSN](https://tools.ietf.org/html/rfc3461https://tools.ietf.org/html/rfc3461) extensie, waarmee je parameters kunt doorgeven aan de “MAIL FROM” en “RCPT TO”-commando’s, die bepalen wanneer en welke DSN-berichten je ontvangt. 
s

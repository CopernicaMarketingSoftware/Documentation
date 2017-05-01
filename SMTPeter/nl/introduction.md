# Direct aan de slag

SMTPeter is een *cloud based e-mail gateway* die ervoor zorgt dat je op een makkelijke manier
e-mails kunt versturen. Je kunt kiezen om e-mails naar SMTPeter te versturen via de REST API 
of SMTP API. Als je start met SMTPeter, moet je (nadat je je hebt geregistreerd) een paar 
dingen doen, die we in dit artikel bespreken.

## Sender Domain opzetten en DNS instellen

SMTPeter gebruikt het concept "Sender Domains" om mail makkelijker te maken. 
Dit zorgt ervoor dat je makkelijk email kunt versturen via onze servers 
zonder je zorgen te hoeven maken over dingen als SPF, DKIM and DMARC. 
Het Sender Domain bevestigt dat we email sturen namens jou. Je moet eerst 
[je sender domain instellen](./introduction-sender-domains).
Maak je nog geen zorgen over click- en tracking domeinen of DMARC deployment voor 
nu, je kunt dit later nog aanpassen. Je moet dan je [DNS instellingen verwerken](./rest-dns) 
en de verificatie code gebruiken om je domein te verifiëren. Na deze 
stappen ben je klaar om mail te sturen met SMTPeter.

## REST vs SMTP

SMTPeter maakt het mogelijk om e-mails te versuren via de REST API en de 
SMTP API. We raden je sterk aan om, als je de keuze hebt, te gaan voor de 
REST API. Deze API geeft je meer opties, vrijheid en gebruiksgemak. 
En hij is sneller, omdat er geen complexe en tijdrovende *SMTP handshake* nodig is
om e-mails te versturen van de ene naar de andere server.

Dat is alles! SMTPeter is nu klaar voor gebruik.
Lees meer over de mogelijkheden van SMTPeter onder "Meer informatie"

## Meer informatie

- [Sender Domains](sender-domains "Sender Domains")
- [SMTP API](smtp-api "SMTP API")
- [REST API](rest-send "REST API")

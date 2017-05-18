# Direct aan de slag

SMTPeter is een *cloud based e-mail gateway* die ervoor zorgt dat je op een makkelijke manier
e-mails kunt versturen. Je kunt kiezen om e-mails naar SMTPeter te versturen via de REST API 
of SMTP API. Als je bent geregisteerd als gebruiker en start met SMTPeter, moet je nog een paar 
dingen doen. De stappen worden in dit artikel besproken.


## Sender Domain opzetten en DNS instellen

SMTPeter gebruikt het concept van *Sender Domains* om het versturen van e-mail
makkelijker te maken. Je kunt via onze servers namelijk e-mails versturen zonder 
je zorgen te hoeven maken over onderwerpen als SPF, DKIM and DMARC. Je moet eerst 
een [sender domain instellen](./introduction-sender-domains)(*dit is sinds kort verplicht*), 
zodat SMTPeter e-mail namens jou kan gaan versturen. Maak je voor nu nog geen zorgen over 
click- en tracking domeinen of DMARC deployment. Je kunt dit later altijd nog aanpassen. 
Je moet dan je [DNS instellingen](./rest-dns) verwerken en de verificatie code gebruiken 
om je domein te verifiëren. Na deze stappen ben je klaar om e-mails te versturen met SMTPeter.


## REST vs SMTP

SMTPeter maakt het mogelijk om e-mails te versuren via de REST API en de 
SMTP API. We raden je sterk aan om, als je de keuze hebt, te gaan voor de 
REST API. Deze API geeft je meer opties, vrijheid en gebruiksgemak. 
En hij is sneller, omdat er geen complexe en tijdrovende *SMTP handshake* nodig is
om e-mails te versturen van de ene naar de andere server.

Dat is alles! SMTPeter is nu klaar voor gebruik.

Lees meer over de mogelijkheden van SMTPeter:

- [Sender Domains](sender-domains "Sender Domains")
- [SMTP API](smtp-api "SMTP API")
- [REST API](rest-send "REST API")
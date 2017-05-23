# Sender domain instellen

Copernica gebruikt het concept van sender domains om e-mail simpeler te maken. 
Binnen de verschillende diensten van Copernica zijn sender domains verplicht gesteld, 
omdat het zo'n essentieel onderdeel is voor het succesvol versturen van e-mail.

Het gebruik van sender domains werkt als volgt: in het dashboard van de Marketing Suite
geef je aan vanaf welke domeinen je wilt mailen. Copernica laat je vervolgens weten hoe 
je DNS instellingen geconfigureerd moeten worden. 

Dus als je e-mails wilt versturen vanaf adressen die eindigen op "@example.com" of "@example.org",
gebruik je het dashboard om de domeinen "example.com" en "example.org" op te zetten. Copernica
geeft een lijst terug van DNS records als je de stappen succesvol hebt doorlopen. De DNS records
hoef je vervolgens alleen nog maar te overhandigen aan je DNS provider of je eigen DNS server.

Je kunt meer informatie vinden in het [achtergrond artikel voor sender domains](./sender-domains).


## Marketing Suite

De vernieuwde interface van de Marketing Suite zorgt ervoor dat je makkelijk en snel
een sender domain in kan stellen. Als je een sender domain hebt ingesteld, zorgt Copernica 
automatisch dat alle DNS instellingen goed staan. Je hoeft wat domeinnamen betreft niks
anders meer te configuren. Dit betekent dat je, na het instellen van een sender domain,
dus niet meer apart in hoeft te stellen welke domeinnaam moet worden gebruikt om clicks en 
bounces te registreren en om te bepalen wat de DKIM keys zijn. De instellingen van het 
sender domain hebben prioriteit, zelfs als je e-mails gaat versturen met Publisher. 

Je vindt de `SENDER DOMAIN` tool in het menu van de Marketing Suite.


## De volgende stap

Om de eerste mail te kunnen versturen, heb je natuurlijk [een database met profielen](quick-database-guide) 
nodig om die mailing naartoe te sturen.

## Meer informatie

* [Sender domains achtergrond](./sender-domains)
* [Database configureren](./quick-database-guide)
* [DKIM](./dkim)
* [DMARC](./dmarc)
* [SPF](./spf)

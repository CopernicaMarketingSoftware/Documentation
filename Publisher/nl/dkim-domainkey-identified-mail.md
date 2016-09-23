DKIM staat voor DomainKey Identified Mail en is een stukje code in de
DNS. Hiermee zet je een unieke digitale handtekening in de header van je
e-mail die jou bestempelt als veilige afzender. Ontvangende mailservers
zien of de e-mail echt door jou is verstuurd en niet vervalst of
geforward door een andere partij. Als dit niet is ingesteld, is dit voor
de meeste providers echter geen probleem. DKIM wordt nog niet breed
ondersteund, maar onder anderen Yahoo en Gmail controleren hier streng
op om spam te filteren.

Een domein beschermd door middel van DKIM is voor spammers niet
interessant. De kans dat hun berichten de inbox van een ontvanger
bereiken is namelijk een stuk kleiner. Dit heeft ook als voordeel dat
domeinen die door DKIM beschermd worden, minder vaak worden misbruikt.
Copernica raadt daarom aan de DKIM in te stellen als vorm van e-mail
authenticatie en als hulpmiddel bij het optimaliseren van je
[deliverability](./deliverability-better-email-delivery-with-copernica.md "Kennisartikel over deliverability").

Hoe werkt DKIM?
---------------

Als je een e-mailbericht als enen en nullen ziet, dan valt hier een
optelsom van te maken. Deze wordt gecodeerd opgenomen in de e-mail. De
mailserver die jouw e-mail ontvangt ontcijfert deze code met een sleutel
die wordt opgehaald uit jouw DNS gegevens. Op hetzelfde moment berekent
de mailserver zelf ook de optelsom van jouw e-mail. Als de som in jouw
DKIM overeenkomt met de som die de mailserver berekent, is je e-mail
authentiek en wordt hij doorgelaten tot de inbox.

Let wel: DKIM blokkeert geen e-mails die niet authentiek zijn. Het
markeert deze enkel als ongeldig. Een spamfilter kan dan op basis van
deze markering een e-mail blokkeren of als verdacht bestempelen.

Hoe versleutel ik mijn berichten met DKIM in Copernica
------------------------------------------------------

Het versleutelen van e-mails met DKIM is niet ingewikkeld, maar vereist
wel enige systeemkennis en tenminste toegang tot het beheergedeelte van
je domein. Handleiding: [E-mails vanuit Copernica versleutelen met
DKIM](./signing-your-emails-with-dkim.md)

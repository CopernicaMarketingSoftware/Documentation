# SPF records

Als je gebruik maakt van [sender domains](sender-domains), dan maakt Copernica
alle relevante [DNS records](dns) voor je aan en hoef je zelf alleen maar aliassen
aan te maken die verwijzen naar de DNS records van Copernca. Voor de meeste 
records adviseren we om CNAME's aan te maken (tracking domain, [DKIM](dkim), 
[DMARC](dmarc)), maar voor SPF hoef je geen CNAME aan te maken maar een TXT record.

Een SPF record is een record dat je plaatst in [DNS](dns) en waarin, heel simpel
gezegd, een lijst met IP adressen staat vanuit waar je normaal gesproken e-mail 
verstuurt. Met behulp van SPF records kun je dus, als domeineigenaar, aan de
wereld laten weten vanuit welke IP addressen jouw e-mail wordt verzonden. Een
ontvanger (zoals gmail.com of live.com) kan deze lijst opvragen. Als zo'n ontvanger 
een e-mail ontvangt die van jou afkomstig lijkt te zijn, maar is verstuurd vanaf 
een IP adres dat niet op de lijst staat, dan weet hij dat er mogelijk iets met 
de mail aan de hand is. Dit hoeft nog niet onmiddellijk een reden voor de ontvanger 
te zijn om de mail te blokkeren, maar het is in ieder geval geen goed teken. Daarom 
kun je er maar beter voor zorgen dat je SPF record goed staat.

Overigens, in de documentatie spreken we steeds over een SPF record alsof het 
een speciaal soort DNS record is, net als A, AAAA en MX records. Dat is, technisch
gezien, echter niet het geval. Een SPF records moet in DNS worden opgeslagen als
een TXT record, een record waarin vrije tekst kan worden geplaatst. Door helemaal
aan het begin van het TXT record de tekst "v=spf1" te plaatsen krijgt het voor
e-mailprogramma's een speciale betekenis, en noemen we het, voor het gemak, een
SPF record. Maar eigenlijk zouden we dus moeten spreken over "een TXT record dat
begint met v=spf1".

En om nog meer te muggenziften: we schreven dat in een SPF record een lijst met 
IP adressen staat. In essentie komt het daar inderdaad op neer, maar als je heel 
precies wilt zijn dan is dat toch een iets te simpele voorstelling van zaken. Er 
kunnen in een SPF record namelijk niet alleen IP adressen staan, maar ook andere
elementen zoals domeinnamen, verwijzingen en includes. Iemand die een SPF record
opvraagt krijgt dus niet een lijst van IP adressen terug, maar ook allerlei andere
elementen. Voor deze andere elementen worden echter nieuwe DNS lookups gedaan, 
net zo lang tot (binnen redelijke grenzen) alles is teruggebracht tot (uiteindelijk
toch) een lijst met IP adressen.

Copernica maakt gebruik van de mogelijkheid om de hierboven genoemde elementen 
in SPF records op te nemen. Als je het dashboard van de Marketing Suite gebruikt 
om een [Sender Domain](sender-domains) te configureren, zie je dat in het overzicht
van geadviseerde DNS instelligen er meestal CNAME records worden getoond. CNAME
is het gangbare aliassysteem van DNS. Voor SPF adviseren we echter om een gewoon
SPF record aan te maken, bestaande uit een "include" statement. In de praktijk 
komt het gebruik van een CNAME of een SPF record met een include op hetzelfde
neer, en wordt er vanuit jouw DNS records (als je de geadviseerde instellingen 
overneemt) verwezen naar onze server.


## Wat moet er in SPF staan?

Als je mail verstuurt met Copernica, dan moeten de IP adressen van Copernica
natuurlijk worden opgenomen in het SPF record. Alleen dan kunnen ontvangers
valideren dat de berichten die wij uit jouw naam vanaf onze servers versturen legitiem
zijn. Als je gebruik maakt van Sender Domains dan gaat dit automatisch. Wij maken
zelf het SPF record aan, en daarin plaatsen we (natuurlijk) onze IP adressen. 
In jouw DNS plaats je een verwijzing (door middel van een include) naar het door 
ons aangemaakte SPF record. Klaar is kees.

Zoals je wellicht weet heeft een e-mail twee verschillende afzenderadressen: het
"gewone" afzenderadres dat je ziet als je een mail opent, en een tweede adres
dat we het *envelope* adres noemen. Dit envelope adres wordt normaal gesproken
niet getoond aan de ontvanger van de e-mail, en is bedoeld voor de communicatie
tussen servers onderling. Als een e-mail bouncet (niet kan worden afgeleverd)
dan wordt naar dit envelope adres een notificatie gestuurd. Copernica gebruikt
voor mailings een envelope adres dat wordt afgevangen door de mailservers van 
Copernica, zodat wij de bounces kunnen verwerken. Voor de domeinnaam van het 
envelope adres gebruiken we een subdomein van jouw domeinnaam. Als je bedrijfsnaam.nl
als [sender domain](sender-domains) hebt ingesteld, dan wordt de mailing gestuurd
vanaf het via het dashboard in te stellen bijbehorende *bounce domain*, 
bijvoorbeeld feedback.bedrijfsnaam.nl.

Omdat Copernica de mail dus verstuurt vanaf een bounce *subdomain* moet je voor
dit bounce domain een SPF record aanmaken. Omdat waarschijnlijk alleen wij, 
Copernica, mail sturen vanaf het bounce domain is het door ons aangemaakte SPF
record, dat dus alleen onze IP adressen bevat, goed genoeg. Echter, als je, om 
wat voor reden dan ook, ook andere IP addressen (of andere elementen) in het SPF 
record wilt opnemen, dan kan dit. Je kunt gewoon het door ons geadviseerde SPF
record overnemen en aanpassen, en de aangepaste versie in je DNS plaatsen. Nodig 
is dit echter meestal niet.

# SPF records

Als je gebruik maakt van [sender domains](sender-domains), dan maakt Copernica
alle relevante [DNS records](dns) voor je aan en hoef je zelf alleen maar aliassen
(meestal CNAME records) aan te maken die verwijzen naar de DNS records van Copernca.
Dit werkt goed voor de meeste records (MX, DKIM, DMARC), maar vergt heel soms wat 
extra aandacht bij SPF.

Een SPF record is een record dat je plaatst in [DNS](dns) en waarin, heel simpel gezegd,
een lijst met IP adressen staat vanuit waar je normaal gesproken e-mail 
verstuurt. Met behulp van SPF records kun je dus, als domeineigenaar, aan de
wereld laten weten vanuit welke IP addressen jouw e-mail wordt verzonden. Een
ontvanger (zoals gmail.com of live.com) kan deze lijst opvragen. Als zo'n ontvanger 
een e-mail ontvangt dat van jou afkomstig lijkt te zijn, maar is verstuurd vanaf 
een IP adres dat niet op de lijst staat, dan weet hij dat er mogelijk iets met 
de mail aan de hand is. Dit hoeft nog niet onmiddellijk een reden voor de ontvanger 
te zijn om de mail te blokkeren, maar het is beter om er voor te zorgen dat je 
SPF gewoon goed staat.

We schreven dat in een SPF record een lijst met IP adressen staat. In essentie
komt het daar inderdaad op neer, maar als je heel precies wilt zijn dan is dat
toch een iets te simpele voorstelling van zaken. Er kunnen in een SPF record 
namelijk niet alleen IP adressen staan, maar ook andere elementen zoals domeinnamen, 
verwijzingen en includes. Iemand die een SPF record opvraagt krijgt dus niet een 
lijst van IP adressen terug, maar ook allerlei andere elementen. Voor deze andere 
elementen moeten echter nieuwe DNS lookups worden gedaan, net zo lang (binnen 
redelijke grenzen) tot alles is teruggebracht tot (uiteindelijk toch) een lijst 
van IP adressen.

Copernica maakt gebruik van de mogelijkheid om ook andere elementen in SPF records 
op te nemen. Als je het Copernicadashboard gebruikt om een [Sender Domain](sender-domains) 
te configureren, zie je dat in het overzicht van geadviseerde DNS instelligen er 
meestal CNAME records worden getoond. CNAME is het gangbare aliassysteem van DNS. 
Voor SPF adviseren we echter een "include" statement. In de praktijk komt het gebruik
van een CNAME of een include op hetzelfde neer, en wordt er vanuit jouw DNS records 
(als je de geadviseerde instellingen overneemt) verwezen naar onze instellingen.


## Wat moet er in SPF staan?

Als je mail gaat versturen met Copernica, dan moeten de IP adressen van Copernica
natuurlijk worden opgenomen in jouw SPF record. Alleen dan kunnen ontvangers
valideren dat de berichten die wij uit jouw naam vanaf onze servers versturen legitiem
zijn. Als je gebruik maakt van Sender Domains dan gaat dit automatisch. Wij maken
zelf het SPF record aan, en daarin plaatsen we (natuurlijk) onze IP adressen. 
In jouw DNS plaats je een verwijzing (door middel van een include) naar het door 
ons aangemaakte SPF record. Klaar is kees.

Wij versturen alle mailings vanuit een subdomain (zoals @feedback.bedrijfsnaam.nl). 
Dit doen we altijd, zelfs als je als afzenderadres gewoon een @bedrijfsnaam.nl
adres gebruikt. Dit subdomainadres gebruiken we als *envelope*-adres. Dit 
envelope-adres krijgt een ontvanger echter niet te zien (het is dus niet het *from* 
adres) en wordt door mailservers "onder de motorkap" gebruikt om bounces en 
out-of-office replies naar terug te sturen. Voor iemand die de e-mail ontvangt 
lijkt het dus alsof het bericht afkomstig is vanaf het gewone afzenderadres, maar in werkelijkheid komt het van een subdomein dat alleen door
Copernica wordt gebruikt, zodat wij de bounces kunnen afvangen.

De SPF technologie is alleen ontwerpen om envelope-adressen mee te controleren.
Omdat alleen wij, Copernica, mail sturen met een specifiek envelope-adres, is
het door ons aangemaakte SPF record, dat dus alleen onze IP adressen bevat, goed
genoeg. Echter, als je, om wat voor reden dan ook, ook andere IP addressen (of
andere elementen) in het SPF record wilt opnemen, dan kan dit. Maar nodig is dit 
dus meestal niet, omdat de reguliere e-mail die je verstuurt gebruik maakt van
andere envelope adressen.

Zoals hierboven beschreven, adviseren we voor SPF om gebruik te maken van
includes in plaats van CNAME's voor de verwijzing naar onze server. Een CNAME
record is enkel en alleen een alias, maar omdat wij adviseren om een include
te gebruiken, wordt er niet een gewone alias in jouw DNS geplaatst, maar een
volwaardig SPF record. Dit record bestaat weliswaar uit slechts één element 
(een include van data op onze server) en is daardoor feitelijk ook gewoon
een alias, maar niks staat je in de weg om ons advies niet geheel op te volgen, 
en ook andere elementen aan jouw SPF record toe te voegen.

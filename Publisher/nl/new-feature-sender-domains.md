De software van Copernica biedt nu de mogelijkheid om zogeheten Sender
Domains in te stellen. Dit is een handige tool waarmee het een stuk
makkelijker wordt om de Copernica software te configureren. Je hoeft
enkel nog maar in te voeren vanaf welk domein mail wordt verstuurd
(bijvoorbeeld vanaf @example.com), en de Sender Domain wizard geeft
automatisch advies welke gegevens in het DNS moeten worden geplaatst om
de mailings zo goed mogelijk te laten verlopen. Daarnaast controleert de
wizard of de gegeven instructies goed zijn opgevolgd en waarschuwt hij
als de instellingen nog niet (helemaal) goed zijn overgenomen. Hiermee
is het inregelen van Copernica een stuk eenvoudiger geworden en is de
kans op fouten verkleind.

Vroeger, voordat Sender Domains bestonden, was je zelf verantwoordelijk
voor het in orde brengen van je DNS instellingen. Gebruikers moesten
zelf zorgen voor het hosten van (bijvoorbeeld) de public DKIM keys, de
SPF records en de DMARC records en ze moesten zelf instellen welke klik-
en envelopedomeins voor mailings moesten worden gebruikt. Ook moesten ze
zelf zorgen dat alle ingestelde domeinen met elkaar in overeenstemming
waren. Dat klinkt ingewikkeld, en dat was het ook. Deze instellingen
moesten daarnaast met enige regelmaat worden bijgewerkt, bijvoorbeeld
omdat het verstandig is om van tijd tot tijd DKIM keys te roteren.
Kortom, het kostte behoorlijk wat tijd, moeite en expertise om alles in
te richten.

Met Sender Domains is dit een stuk makkelijker. Alles zit nu op één
centrale plek in de software en het hoeft maar één keer te worden
geconfigureerd. Bovendien vertelt de wizard je precies wat je moet doen,
en controleert Copernica of je de instellingen goed hebt overgenomen.
Het is ook niet langer nodig om naderhand DNS records bij te werken.

Alignment van domeinen en deliverability
----------------------------------------

Een aanvullend voordeel van Sender Domains is dat alle domeinnamen die
in mailings worden gebruikt voortaan gegarandeerd met elkaar in
alignment zijn. Vroeger moest je dit zelf expliciet instellen, maar nu
is dit automatisch in orde. Met “alignment” bedoelen we dat het
from-adres (het afzenderadres zichtbaar voor de ontvangers van de mail)
en het envelope-adres (het onzichtbare adres waar bounces en andere
automatische replies naartoe worden teruggestuurd) allebei op een of
andere manier gebruik maken van dezelfde domeinnaam: als je een mailing
verstuurt met afzender “info@example.com”, dan heeft het bijbehorende
envelope-adres bijvoorbeeld automatisch de vorm
“messageid@feedback.example.com”. Het domein “example.com” komt in zowel
het from-adres als het envelope-adres voor, en daarom zeggen we dat deze
adressen met elkaar “in alignment” zijn.

Zoals je misschien wel weet, worden hyperlinks in door Copernica
verstuurde mails vervangen door redirect-links om te kunnen registeren
wie op een link klikt. Voor deze links gebruiken we met Sender Domains
ook een domeinnaam die in alignment is met het from-adres: de links
worden bijvoorbeeld allemaal vervangen door links zoals
“clicks.example.com/path/to/file”.

Alignment is belangrijk. Veel “inbox providers” geven de voorkeur aan
domeinnamen die met elkaar in overeenstemming zijn. Als het
envelope-adres, de afzender en de links in de email allemaal naar andere
domeinen verwijzen, dan achten zij de kans groter dat er iets
merkwaardigs met de mail aan de hand is: de mail wordt dan eerder als
spam of ongewenst gemarkeerd en het is minder waarschijnlijk dat het
bericht in de inbox wordt geplaatst. Door gebruik te maken van de nieuwe
“Sender Domain” feature weet je echter zeker dat het from-, envelope- en
klikdomein altijd met elkaar in alignment”zijn. Dit verhoogt de
deliverability. In de hierboven gegeven voorbeelden maakten we gebruik
van de “feedback.example.com” en “clicks.example.com” subdomeinen voor
het registeren van bounces, kliks en opens. Dit is natuurlijk
configurabel. Als je liever andere subdomeinen gebruikt, dan kun je dat
via de “Sender Domain” tool instellen.

Automatische DKIM key rotering
------------------------------

Lang niet iedereen doet het, maar private keys voor DKIM signatures
moeten eigenlijk van tijd tot tijd worden vervangen. Dit is een secuur
werkje waarbij al enige tijd van te voren nieuwe keys moeten worden
geïnstalleerd, omdat het vanwege caching vaak een tijd duurt voordat
alle DNS servers in de wereld zijn bijgewerkt. Bovendien moeten oude
keys nog enige tijd in de lucht blijven zodat mails die met vertraging
worden ontvangen nog kunnen worden geverifieerd met de vorige sleutel.
Als je gebruik maakt van Sender Domains gaat het roteren van keys
volledig automatisch. Dit gebeurt iedere maand. De nieuwe keys worden
tijdig in het DNS geplaatst en de oude keys worden na verloop van tijd
verwijderd.

DMARC-rapporten
---------------

Sommige ontvangers (zoals Gmail, Microsoft en Yahoo) versturen een of
meerdere keren per dag een mail met daarin een DMARC-rapport. In dit
rapport staat een overzicht van alle IP-adressen die gebruik hebben
gemaakt van jouw domeinnaam voor het versturen van email. Ook staat in
dit rapport of deze berichten waren voorzien van een DKIM signature en
of ze werden verzonden van een valide IP-adres. Als je gebruik maakt van
Sender Domains dan worden deze rapporten door Copernica ontvangen en
verwerkt, en via het dashboard inzichtelijk gemaakt. De DMARC-rapporten
kunnen zeer nuttig zijn: ten eerste stellen ze je in staat om te zien of
je configuratie wel op orde is. Als je ziet dat mails worden verstuurd
zonder DKIM key of vanaf een IP-adres dat je nog niet had toegevoegd aan
het SPF record, dan kun je dit alsnog doen. Deze DMARC-rapporten maken
het ook mogelijk om te zien of iemand jouw domein misbruikt. Als je ziet
dat er mail vanuit jouw domein wordt verstuurd vanaf een IP-adres dat
jou helemaal niet toebehoort, dan weet je dat er iemand uit jouw naam
aan het spammen of “phishen” is. Ook dan kun je actie ondernemen. Als je
gebruik maakt van Sender Domains, dan worden ook alle DMARC-instellingen
door Copernica bijgehouden. De rapporten worden door Copernica ontvangen
en opgeslagen en je wordt via het dashboard van Copernica op de hoogte
gehouden van eventuele fouten in je configuratie en wanneer er misbruik
wordt gemaakt van jouw domein.

Hoe werken Sender Domains onder de motorkap? {#hoe-werken-sender-domains-onder-de-motorkap?}
--------------------------------------------

Zoals hierboven beschreven, hoef je slechts éénmalig een aantal records
aan de DNS toe te voegen, en zorgt Copernica er vanaf dat moment voor
dat alle instellingen goed staan en dat DKIM keys worden geroteerd. Maar
hoe kan Copernica eigenlijk jouw DNS instellingen wijzigen? Hiervoor
gebruiken we een truc. Op het moment dat je via de applicatie van
Copernica een Sender Domain configureert (bijvoorbeeld om te mailen
vanuit @example.com), worden alle relevante DNS instellingen door
Copernica al in het DNS van Copernica geplaatst. Copernica creëert alle
relevante SPF, DKIM, DMARC, A en MX records, inclusief alle daarbij
behorende configuratieopties. Het enige dat jij in jouw DNS plaatst,
zijn een paar verwijzingen (CNAME records) naar deze records bij
Copernica. De truc is dus dat je niet meer je eigen DKIM, DMARC en SPF
records maakt, maar dat je in jouw DNS verwijst naar de records op de
servers van Copernica. Omdat jouw DNS verwijst naar de servers van
Copernica, kunnen eventuele toekomstige wijzigingen gewoon door
Copernica worden aangebracht. Denk bijvoorbeeld aan het roteren van een
DKIM key, het toevoegen van een IP-adres aan een SPF record of het
veranderen van de DMARC policy. Voor dit soort veranderingen moet je
normaal gesproken zelf DNS records aanpassen, maar omdat dit nu in het
DNS van Copernica staat, hoef je dit niet te doen.

Hoe kun je van Sender Domains gebruik maken? {#hoe-kun-je-van-sender-domains-gebruik-maken?}
--------------------------------------------

In de Copernica Marketing Suite gaat dat als volgt: Nadat je bent
ingelogd, klik je in het linkermenu op 'configuration' en vervolgens op
'Setup sender domains'.

![List of sender domains](list-klein.jpg)

Op bovenstaande afbeelding zie je het overzicht van jouw Sender Domains
en welke aspecten ervan goed geconfigureerd zijn en welke niet.
Rechtsbovenin staat 'Add sender domain'. Dit is de wizard om je domein
toe te voegen. Klik je op 'Manage domain', dan kom je op het volgende
scherm:

![Sender domain management dashboard](manage-klein.jpg)

Hier kun je je domein beheren. Je kunt hier bijvoorbeeld je deployment
rate en je subdomeinen aanpassen. Ook kun je hier je reccomended DNS
settings vinden en je DMARC reports inzien. Wanneer je alle instellingen
hebt staan zoals je wilt, kun je het DNS settings toepassen en mail gaan
versturen met je Sender Domain-instellingen.

In Copernica Marketing Software is de Sender Domains wizard ook
aanwezig, hier vind je hem onder E-mailings \> Extra \> Sender Domains.

Als laatste een kleine waarschuwing. Als je al langdurig en in grote
volumes mailt, dan kan het zijn dat het sommige ontvangers opvalt als je
opeens berichten verstuurt met een ander envelope adres of met een ander
domein voor de links. Hoewel de nieuwe Sender Domain-instellingen in
theorie minstens even goed en vaak zelfs beter zijn dan de oude
instellingen, kan het in de praktijk gebeuren dat automatische scripts
bij de grote ontvangers mails blokkeren omdat er opeens andere adressen
worden gebruikt. Daarom hebben we een mogelijkheid toegevoegd om de
nieuwe Sender Domain-instellingen langzaam uit te rollen. Je kunt
bijvoorbeeld instellen dat in het begin slechts 10% van de mails met de
nieuwe Sender Domain-instellingen wordt verstuurd.  

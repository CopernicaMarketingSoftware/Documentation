Benieuwd wat er met je data gebeurt als je met Copernica Marketing
Software aan de slag gaat? Staat je data wel veilig opgeslagen en is
deze niet vatbaar voor cyberaanvallen? Hieronder geeft Copernica graag
tekst en uitleg over de hardware die wij gebruiken en over de beveiling
en hosting van jouw data bij Copernica.

**Hardware**\
De meeste hardware staat opgesteld in het [Evoswitch
Datacenter](http://www.evoswitch.com/nl/infrastructuur/security) in
Haarlem. Copernica heeft gekozen voor Evoswitch omdat wij zo beschikken
over hypermoderne en de allernieuwste technologieën. Onze
internetverbinding in het datacenter bestaat uit een redundante
1000Mbit/s verbinding.

Copernica beschikt over verschillende servers die elk hun eigen taken
hebben. Wij beschikken over:

-   Databaseservers: Hierop wordt alle data van onze gebruikers
    opgeslagen.
-   Replicationservers: Dit zijn de kopieën van de databaseservers (de
    mirror databases).
-   Webservers/Publisher-servers: Hierop draaien de applicaties van onze
    gebruikers en alle webpagina's die binnen de applicatie worden
    gehost.
-   Taskservers: Voeren alle taken in en rondom de applicatie uit zoals
    het opbouwen van e-mailings en selecties, afhandelen van follow-ups
    en imports & exports.
-   Twee loadbalancers: Verdeelt de taken over de webservers en de
    picservers. Er is hiervan steeds een actief zodat de andere het over
    kan nemen zodra de actieve loadbalancer zou uitvallen.
-   Controller: Beheert alle taken van de taskservers. Hier halen de
    taskservers hun taken op.
-   Mailsender/mailserver: Staat in voor het verzenden van de mailings
    van onze gebruikers.
-   Picservers: Deze server host alle afbeeldingen en hyperlinks van
    e-mailings en feeds van de gebruikers.

Back-ups
--------

Alle gegevens van de databases van Copernica worden gebackupt en
opgeslagen via de SAN (Storage Area Network). Het gebruik van dit
systeem biedt een grote opslagcapaciteit, transactiesnelheid en
vermindert de mogelijke downtime. Mocht er een databaseserver uitvallen,
kan deze gemakkelijk vervangen worden.

**Wachtwoorden van Copernica**

Copernica’s wachtwoorden zijn krachtig. Zo moet een wachtwoord bestaan
uit 6 of meer tekens en moet het de volgende tekens bevatten:

-   Kleine letters
-   Hoofdletters
-   Leestekens
-   Cijfers

Wachtwoorden worden na aanmaken digitaal en versleuteld opgeslagen.

**Nog enkele vragen beantwoord**

Om je nog meer gerust te stellen dat jouw data absoluut veilig wordt
opgeslagen bij Copernica, hieronder nog enkele vragen betreffende
beveiliging en uitwisseling van data en het passende antwoord:

**Hoe en door wie wordt mijn data bij Copernica aangeleverd?**

-   Klanten van Copernica kunnen zelfstandig data importeren. Dit kan op
    3 manieren; Handmatig, via FTP of via API.

**Is mijn data tijdens de aanlevering bij Copernica beveiligd?**

-   Ja, imports lopen via HTTPS. Indien je FTP wenst te gebruiken kan
    dit ook over SSL (FTPS)

**Indien aanlevering via FTP of download: is dit middels een beveiligde
internetverbinding (SSL, HTTPS, FTPS)?**

-   Ja, als klant kan je zelfstandig data importeren via FTPS of HTTPS.

**Hoe vatbaar is Copernica voor aanvallen?**

Online organisaties die beschikken over een rijkdom aan data kunnen
vatbaar zijn voor cyberaanvallen. Bijvoorbeeld D-DOS aanvallen,
Brute-Force-Attack, Cross-site scripting en SQL-injecties. Hieronder per
aanval een korte uitleg en hoe Copernica hiertegen is beveiligd:

**DDOS**

Denial-of-service aanvallen (dos-aanvallen) en distributed
denial-of-service aanvallen (ddos-aanvallen) zijn pogingen om een
computer, computernetwerk of dienst onbruikbaar te maken voor de
bedoelde gebruiker door ontzettend veel connecties te openen naar een
server waardoor deze vastloopt. Denk maar aan nieuwsitems over
VISA-servers die platligt of ING.

Het verschil tussen een 'gewone' dos-aanval en een distributed
dos-aanval is dat in het laatste geval meerdere computers tegelijk de
aanval uitvoeren. Hiervoor wordt vaak
een [botnet](http://nl.wikipedia.org/wiki/Botnet) gebruikt, maar het kan
ook gaan om meerdere personen die hun acties coördineren, iets wat
bijvoorbeeld gebeurt bij aanvallen van de
zogenaamde [*Anonymous*](http://nl.wikipedia.org/wiki/Anonymous_(groep))-beweging.\
 \
 Via onze hostingpartner Evoswitch is Copernica beveiligd tegen DDOS
aanvallen. Op de website schrijven zij hierover:

**Wij monitoren al het inkomende en uitgaande verkeer via onze Cisco
netflow.**\
Een flow word gedefinieerd als IP-verkeer met dezelfde IP-bron,
IP-bestemming, bronpoort en bestemmingspoort. Zodra een IP-adres meer
dan 35.00 flows per seconde ontvangt komt deze automatisch op een zwarte
lijst.

De eerste keer dat een IP-adres getroffen wordt door een DDOS-aanval,
wordt deze één uur op de zwarte lijst geplaatst. Iedere daarop volgende
aanval verdubbelt deze tijd. De technisch contactpersoon die is
opgegeven in het klantenportaal wordt direct per e-mail op de hoogte
gesteld van de DDOS-aanval en de tijdelijke vermelding op een zwarte
lijst.

**Brute-Force-Attack**

Een Brute-Force-Attack houdt in dat er bij de aanval vele malen wordt
getracht in te loggen.

Copernica monitort continue het verkeer op de servers en logt het aantal
inlogpogingen. Op het moment dat er geregistreerd is dat individuele
gebruikers veel verkeerde inlogpogingen doen, blokkeert Copernica deze
gebruiker, indien mogelijk, handmatig.

**Cross-Site-Scripting**

Overal waar we user-input binnen krijgen in de applicatie en deze weer
weergeven maken wij gebruik van escaping waardoor het niet mogelijk is
om met behulp van cross-site-scripting Copernica Marketing Software aan
te vallen.

**SQL injectie**

Vreemde karakters kunnen een bedreiging voor je database vormen als er
niet goed wordt ge-escaped. Denk aan het verhaal van ‘little bobby drop
tables’\
\
![Little Bobby Drop
Tables](../images/droptables.jpg "Little Johnny Drop Tables")

Het onderliggend framework van Copernica Marketing Software vangt dit af
doordat Copernica alle queries schrijft met zogenaamde placeholders, die
vervolgens automatisch ge-escaped worden.

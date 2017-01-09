# DNS

Als je Copernica configureert, bij voorkeur met behulp van een 
[Sender Domain](sender-domains), dan moet je allerlei wijzigingen aan je DNS
aanbrengen. DNS is het systeem dat wereldwijd door computers wordt gebruikt 
om voor mensen  begrijpelijke domeinnamen (zoals bedrijfsnaam.nl) om te zetten
in IP adressen die door computers worden gebruikt (zoals 45.3.22.230).

Om de door Copernica geadviseerde wijzigingen in DNS te plaatsen, moet je even 
uitzoeken welk bedrijf voor jou de DNS hosting verzorgt. Vaak is dit de 
organisatie die ook voor de hosting van je website zorgt, maar dat hoeft niet.
Het kan ook de organisatie zijn waar je oorspronkelijk de domeinnaam hebt
geregistreerd, of het bedrijf die je inkomende mail verwerkt - of nog een heel
andere partij. Als je weet wie de DNS hosting verzorgt, kan je de DNS 
instellingen wijzigen. Vaak is er een web interface beschikbaar waarmee je dit
zelf kunt doen, maar soms moet je ze een e-mail sturen met je wensen.

Copernica controleert of je instellingen goed staan. Nadat je de wijzigingen
hebt doorgevoerd, kun je terugkeren naar het configuratiescherm in het dashboard 
van de Copernica Marketing Suite. Als alle vinkjes op groen staan dan heb je 
het goed gedaan. Rode kruisjes en oranje driehoekjes geven aan dat je instelling 
niet (helemaal) goed is.


## Achtergrondinformatie

Zoals we schreven, is DNS het systeem om domeinnamen om te zetten naar IP adressen.
Dat klopt, maar DNS is meer dan dat. Eigenlijk is het een systeem om *allerlei
gegevens* over een domeinnaam op te vragen. Computers gebruiken DNS niet alleen
om IP adressen op te halen, maar ook voor andere dingen. Een aantal instellingen 
die in DNS kunnen worden opgeslagen zijn relevant voor e-mail:

* welke server verwerkt de inkomende mail voor een domeinnaam? ([MX](mx))
* vanaf welke IP adressen wordt uitgaande mail normaal gesproken verstuurd? ([SPF](spf))
* hoe kan de geldigheid van een digitale handtekening worden gecontroleerd? ([DKIM](dkim))
* hoe moet worden omgegaan met e-mail die niet correct (misschien vals) is? ([DMARC](dmarc))
    
Al bovenstaande gegevens kunnen in DNS worden gezet. Elke keer dat een server
een e-mail van jouw domein ontvangt worden er *DNS queries* (SPF, DKIM en DMARC) 
gedaan om op te vragen of de e-mail wel correct is, en elke keer dat een e-mail 
naar jouw domein wordt verstuurd wordt een MX record opgevraagd om te achterhalen
bij welke server het bericht moet worden afgeleverd.

Dit verklaart ook waarom je zo veel verschillende DNS records moet aanmaken als
je met Copernica gaat versturen. Copernica gaat namelijk uit jouw naam e-mail
versturen, en moet ook een deel van de e-mail die naar jouw domein wordt
verstuurd (namelijk de bounces) gaan ontvangen. Hiervoor moeten verschillende
soorten records worden aangemaakt.


## Caching

DNS is een gedistribuurd systeem en bestaat uit miljoenen nameservers wereldwijd.
Er is niet één DNS server die alle gegevens van alle domeinnamen van de hele
wereld heeft. Daarom kan een DNS lookup soms enige tijd duren: sommige DNS lookups
kunnen niet onmiddellijk worden beantwoord en worden doorgestuurd naar een server
op een hoger niveau, of, als het hoogste niveau eenmaal is bereikt, weer 
doorgestuurd naar een server op een lager niveau. 

Omdat de meeste gegevens in DNS bijna nooit wijzigen, houden veel DNS servers
een *cache* bij. Ze slaan de antwoorden van eerdere doorverwezen DNS queries
op, zodat ze de volgende keer het antwoord zelf kunnen geven.

Een voorbeeld. Als je een bepaalde domeinnaam invoert, zoals www.example.com,
dan doet jouw device (computer, telefoon, enzovoort) een DNS lookup bij de 
server van je provider. De DNS server van je provider kijkt vervolgens eerst 
in zijn cache: heeft iemand anders kortgeleden ook al opgevraagd wat het IP 
adres van www.example.com is? Als dat het geval is, dan kan hetzelfde antwoord 
ook onmiddellijk naar jou worden gestuurd.

Als het adres niet in de cache staat, dan doet de provider een lookup bij een
DNS server hoger in de hierarchie. Deze server weet het antwoord wellicht wel,
maar kan wel weer doorverwijzen: "nee, ik weet niet wat het ip adres van 
www.example.com is, maar vraag het eens bij server X, want die weet heel veel
van *.com adressen". Voor sommige lookups, vooral die van weiniggebruikte
domeinen in verre landen, zijn er meerdere doorverwijzingen en lookups nodig 
voordat de DNS server van je provider een antwoord kan terugsturen.
 

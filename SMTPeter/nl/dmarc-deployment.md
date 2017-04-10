# DMARC deployment

Naast [DKIM](dkim-signing) en [SPF](spf-validation) is er nog een derde 
technologie die ontvangers gebruiken om te bepalen of een e-mail
legitiem of onecht was. Deze technologie heet DMARC en is bedacht om
de tekortkomingen van DKIM en SPF op te vangen.

Om DMARC te begrijpen, moet je realiseren dat nieuwe toepassingen altijd
_optioneel_ zijn. DKIM en SPF zijn ooit bedacht om e-mail veiliger te,
maar het is volkomen legitiem om e-mails te versturen _zonder_ DKIM 
ondertekenignen of om e-mails te versturen vanaf servers die _niet_ zijn 
opgenomen in SPF 'records'. Het volgende scenario toont de waarde van DMARC:
Het kan voorkomen dat het IT departement van een organisatie ervoor heeft 
gezorgd dat iedereen e-mails kan versturen met geldige DKIM ondertekeningen.

Echter, er is een persoon in deze organisatie die thuis een mail server 
heeft lopen en zonder ondertekeningen e-mails verstuurt. Het is niet
mogelijk voor een ontvanger om na te gaan of de e-mail van deze organisatie
legitiem was. Het kon een fout zijn van de organisatie, maar ook een phiser 
die kwade bedoelingen had met de e-mail. Concluderend, een DKIM sleutel en 
SPF record zijn nog steeds niet genoeg om valide van invalide e-mails te 
onderscheiden. DMARC is bedacht om dit op te vangen.


## DMARC en DNS

Net zoals DKIM en SPF, is DMARC ook afhankelijk van de DNS. DMARC staat 
toe om een extra DNS toe te voegen met daarop instructies over de procedures
van een organisatie. Dit betekent concreet dat je tekst toe kunt voegen als:
"Al onze medewerkers versturen altijd e-mail, ondertekend door DKIM. Daarnaast
komen al onze e-mails van servers die met valide SPF 'records'. Mocht je een 
e-mail ontvangen zonder DKIM ondertekening en SPF, dan kun je de e-mail weggooien.
Laat ons alsjeblieft weten als je verdachte e-mails ontvangt en vervolgens weggooit.
Op die manier kunnen wij binnen onze organisatie bekijken, waar de fout eventueel
vandaan kan komen."

Bovenstaand scenario laat perfect zien wat DMARC precies is. Het stelt ontvangers
in staat om de DNS te raadplegen en daardoor is het voor de ontvangers mogelijk om 
te zien welke acties ze kunnen ondernemen als de DKIM ondertekening of SPF record 
mist of incompleet is. Op dezelfde manier is het ook mogelijk om na te gaan of het 
domein misbruikt wordt of dat door incomplete configuratie van een organisatie de 
e-mails alsnog valide blijken te zijn. Tot slot, DMARC stelt zenders in staat
om periodiek notificaties te ontvangen over de processen die misgaan.


## DMARC instellen

DMARC instellen is niet altijd even gemakkelijk. SPF en DKIM staan vele parameters 
toe en DMARC maakt dit dan ook alleen maar complexer. Het SMTPeter 'dashboard' helpt
je met het concept over 'sender domains'. Een 'sender domain' is een domein die je
gebruikt om e-mail vanaf te versturen. Bij gebruik van het 'dashboard' creëert SMTPeter
alle DNS 'records' en privésleutels voor je. Deze hoef je alleen maar te kopieren
naar je eigen DNS server (of aan je provider te geven) en je bent klaar om e-mails
te versturen via SMTPeter.


## Domeinen versus sub-domeinen

Op het moment dat je 'yourdomain.com' configureert als 'sender domain', creëert 
SMTPeter automatisch een voorbeeld DNS 'records' voor dit domein. Dit zijn 'records' 
voor SPF, DKIM, DMARC maar ook DNS 'records' voor de kliks en 'bounce' domeinen.
Deze DNS 'records' kun je vervolgens kopiëren naar je DNS server. Je kunt nu e-mail
versturen door middel van SMTPeter.com. Echter, wees wel voorzichtig!


Op het moment dat je de DNS 'records' update voor al je domeinen, zijn alle e-mails 
die je niet verstuurt door middel van SMTPeter ongeldig. Hoewel dit niet noodzakelijk
betekent dat deze e-mails worden geweigerd (je kan namelijk in het DMARC 'record' aangeven
dat ongeldige e-mails initieel altijd worden geaccepteer ), is het natuurlijk beter
om uiteindelijk je hele e-mail structuur te verbeteren. Op die manier kan je garanderen 
dat alle e-mail die door SMTPeter gaat correct worden ondertekend en verstuurd van de
juiste servers. 


Is het veranderen van de gehele e-mailstructuur nu nog teveel moeite?
Dan kun je de alternatieve manier proberen: het gebruik van '_subdomains_'.
Als je normale e-mail bijvoorbeeld wordt verstuurd vanuit het 'yourcompany.com'
domein kun je SMTPeter gebruiken om een 'sender domain' op te zetten voor een
'subdomain'. Bijvoorbeeld 'newsletter.yourcompany.com'. Nadat dit is opgezet
kun je SMTPeter gebruiken voor e-mails met een '_from_' adres dat eindigt op 
'@newsletter.example.com'. Je kunt nog steeds gebruik maken van je huidige
instellingen en het versturen van e-mail van example.com.


## DMARC deployment

De DMARC technologie stelt je in staat om te specificeren wat ontvangers (bedrijven
als Google, Yahoo en Microsoft) moeten doen met ongeldige e-mails die van jou
lijken te komen. Er zijn drie mogelijke instellingen waaruit te kiezen valt.
De meest toegevelijke instelling is '_none_', dit betekent dat je wilt dat de ontvangers 
de uitkomst van de SPF en DKIM checks negeren en de e-mails gewoon in de inbox
belanden. Een wat strengere instelling is de '_quarantine_'. Met deze instelling 
worden de e-mails met een foutieve SPF of DKIM check alsnog afgeleverd. Echter, 
de e-mails worden wel in een aparte folder geplaatst. Dit is meestal de spam folder.
De laatste instelling '_reject_' is de meest strenge. Deze instelling blokt daadwerkelijk
de aflevering van e-mails met foutieve DKIM ondertekeningen of IP adressen die niet in
SPF zijn opgenomen.

Naast het instellen van de verschillende opties geeft DMARC ook de mogelijkheid om een
percentage op te geven. Bijvoorbeeld de instelling 'reject' met een percentage van '25'.
Dit betekent dat 25% van de e-mails die niet door de DKIM en/of SPF checks komen volledig 
worden geblokt. Het andere deel van 75% wordt wel gewoon geaccepteerd. Het gebruik van 
percentages zorgt ervoor dat je kunt expirimenteren met het 'deployen' van DMARC, zonder
zorgen te hoeven maken over het feit dat alle e-mails worden afgewezen.

Het 'deployen' van DMARC is veilig: je kunt het beste starten met een hele losse DMARC
setting. Maak gebruik van de 'quarantine' instelling in combinatie met 1% checks.
Je kunt dat rustig het percentage omhoog doen, naarmate je tevreden bent met de 
resultaten. Je kunt dan later overstappen op de 'reject' instelling en die vervolgens 
ook weer laten oplopen qua percentage `(1% -> 100%)`.

Het SMTPeter 'dashboard' stelt je in staat om 'deployment' automatisch uit te laten 
voeren. Je kunt het percentage en de datum waarop de instellingen van kracht moeten 
worden aangeven. SMTPeter update elke dag automatisch je DNS 'records' om langzaam
tot het gewenste percentage te komen.


## Processing reports

Ontvangers van e-mail sturen dagelijks rapporten terug naar SMTPeter, waarin wordt
vertekd hoeveel e-mails de DKIM, SPF of DMARC checks hebben gefaald. Deze dagelijkse
rapporten worden verwerkt door SMTPeter en getoond via het 'dashboard'. Het stelt je
in staat om te monitoren of je configuratie in orde is en of je domein wordt misbruikt.

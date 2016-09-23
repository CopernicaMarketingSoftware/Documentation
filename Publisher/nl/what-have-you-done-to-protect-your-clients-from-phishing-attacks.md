Google is aardig op weg de oorlog tegen spam te winnen, zo schrijft de
zoekgigant op [zijn
blog](http://googleonlinesecurity.blogspot.nl/2013/12/internet-wide-efforts-to-fight-email.html).
Het toegenomen gebruik van DKIM en SPF zorgt ervoor dat het steeds
gemakkelijker wordt malafide en bonafide verzenders van elkaar te
onderscheiden. Van alle e-mails die Gmail momenteel ontvangt, is 91,4
procent geauthentiseerd met DKIM, SPF of beide.

Dit betekent echter wel dat bedrijven die hun e-mails nog niet
authentiseren een grotere kans dan ooit lopen om gespooft te worden. Wat
heb jij gedaan om de strijd tegen spammers te winnen en je klanten te
beschermen tegen phishing-aanvallen?

![91,4% of all emails received by Gmail were signed with DKIM or
SPF](articlesblog/dkim-spf-signing.jpg "91,4% of all emails received by Gmail were signed with DKIM or SPF")

70 procent alle e-mails is spam
-------------------------------

Van alle e-mails die wereldwijd worden verzonden, bestaat [70 procent
uit
spam](http://www.securelist.com/en/analysis/204792297/Spam_in_Q2_2013).
Dat blijkt uit onderzoek van IT Security Lab. Niet zo gek dus, dat
e-mailproviders hoge eisen stellen aan e-mails die ze doorlaten naar hun
gebruikers.

Als e-mailmarketeer moet je daarom werken aan een [goede
e-mailreputatie](./email-reputation.md "Hoe bnouw je e-mailreputatie op")
om te voorkomen dat je berichten worden geblokkeerd aan de poort. En dat
is nog maar het halve werk.

Want die goede reputatie moet je ook beschermen, om te voorkomen dat
iemand er mee aan de haal gaat om je klanten op te lichten. Deze
praktijk staat bekend als phishing, en ook jij kan er slachtoffer van
worden.

![SPF, DKIM and
SenderID](articlesblog/deliverability-copernica.jpg "SPF, DKIM and SenderID")

Phishing
--------

Afhankelijk van de beveiligingsinstellingen van je maibloxprovider,
krijg je misschien weleens e-mails die afkomstig lijken te zijn van je
bank, waarin staat dat je onmiddellijk bepaalde stappen moet ondernemen.
In dat geval proberen phishers ze je al je spaarcenten afhandig te
maken.

    Van: ACNE Bank 
    Aan: jouw.naam@bedrijf.nl
    Onderwerp: Alstublieft updaten uw beveiligings instellingen. Belangrijk!

    Lieve gewaardeerde klant, 

    Volgens recente beveiligings aanvallen op onze bank, nodig hebben wij uw 
    validatie instellingen aan te passen voor uw rekening. 

    Alstublieft doe dit binnen drie dagen om te voorkomen rekening vernietiging. 

    Wij beloven u dat wij echt van de ACNE Bank zijn, niet proberen uw geld te 
    steel. Pinkjezweer!

    KLIK HIER UW INSTELLINGEN UPDATEN ONMIDDELLIJK 

    Betreft, 
    ACNE Bank

Nog waarschijnlijker is echter de kans dat dit soort berichten je inbox
nooit bereiken omdat banken hun authenticatiedata over het algemeen op
orde hebben.

In de e-mail hierboven kan de afzender namelijk wel claimen de ACNE Bank
te zijn (zelfs het van-veld heeft een @acne-bank-adres), voor je
e-mailprovider moet het echter zonneklaar zijn dat dit niet het geval
is.

Authenticatiedata zal namelijk binnen mum van tijd uitwijzen dat:

-   Het ip-adres dat werd gebruikt voor het verzenden van de mail niet
    aan de ACNE Bank toebehoort
-   Dat het ook geen toestemming heeft om namens deze bank te verzenden
-   De e-mail helemaal niet is verzonden door klanten@acne-bank.com
-   Het bericht niet digitaal ondertekend is door ACNE Bank

Helaas verschijnt authenticatiesdata echter niet op magische wijze uit
het niets. Dus om te voorkomen dat jouw bedrijf wordt gespooft door
phishers, zal je zelf voorzorgsmaatregelen moeten nemen.

![SPF, DKIM and
SenderID](articlesblog/senderid-spf-dkim-email-copernica.jpg "SPF, DKIM and SenderID")

Autheniticatiedata instellen
----------------------------

Op zijn blog heeft Gmail het over DKIM en SPF. Maar dit zijn lang de
enige vormen van autheniticatiedata die je kan instellen om je
identiteit te verifiëren. Hieronder vind je een overzicht van de
verschillende soort authenticatiedata en hoe je ze kunt instellen.

### DKIM

DKIM is een methode om een domeinnaam aan een e-mail te koppelen. DKIM
helpt e-mailproviders te checken of een e-mail wel echt door jou is
verzonden. Je zou dus kunnen zeggen dat DKIM een soort digitale
handtekening is. De minimumlengte van DKIM-sleutels waar Gmail om vraagt
is [1024 bits](https://support.google.com/a/answer/174124) lang.

[Lees hoe je DKIM
instelt](./signing-your-emails-with-dkim.md "Lees hoe je DKIM instelt")

### SPF

Als een e-mail wordt verzonden, heeft deze twee afzenderadressen:

-   Het adres in het van-veld (meestal ook het antwoordadres)
-   Het envelope-adres (het adres waar foutmeldingen en bounces heen
    worden verzonden)

In sommige gevallen, bij het gebruik van ESP’s als Copernica
bijvoorbeeld, wijkt het envelope-domein af van het verzenddomein. In een
SPF-record staat welk envelope-domein gemachtigd is e-mails te verzenden
namen een ander domein.

Als je het standaard-envelope-domein van Copernica gebruikt (voor de
meeste gebruikers is dit het geval), is je SPF al juist ingesteld. Als
je een aangepast domein gebruikt, dien je dit nog te doen.

[Lees hoe je SPF
instelt](https://www.copernica.com/nl/ondersteuning/eigen-envelope-domein-gebruiken-en-instellen-spf-voor-dit-domein "Lees hoe je SPF instelt")

### Sender ID

Wanneer een e-mailprovider een e-mail ontvangt, checkt het [de
DNS-data](https://www.copernica.com/nl/blog/dns-gegevens-wat-zijn-dat "Wat zijn DNS-data?")
om te zien of het verzende ip-adres toestemming heeft om namens de
betreffende domeinnaam te versturen. In je Sender ID stel je in welke
ip-adressen namens jouw domeinnaam mogen verzenden.

[Lees hoe je Sender ID
instelt](./setup-sender-id.md "Lees hoe je Sender ID instelt")

### DMARC

DMARC is een redelijke nieuwe spampreventiemethode. Grof gezegd maak je
met DMARC duidelijk dat je SPF en DKIM hebt ingesteld. (Daarnaast kan je
het ook gebruiken om providers te laten weten wat te doen met berichten
die niet door de DKIM- en/of SPF-test komen).

[Lees hoe je een DMARC-record
aanmaakt](https://support.google.com/a/answer/2466563?hl=en)
(documentatie door Google)

Authenticatie is belangrijker dan ooit
--------------------------------------

Sinds 2004 is e-mailauthenticatie steeds belangrijker geworden, en er
zijn steeds meer bedrijven die hun authenticatiedata instellen.

En hoewel dit natuurlijk een goede ontwikkeling is, betekent het ook dat
de vijver voor phishers steeds kleiner wordt. Wie nog niet tot de 91,4
procent die zijn e-mail authentiseert behoort, loopt een grotere kans
dan ooit om gespooft te worden. Stel daarom nu je authenticatiedata in!

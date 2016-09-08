Bij het verzenden van e-mailings komt het voor dat deze niet aankomt bij
de ontvanger. Veel marketeers maken hierbij een onderscheid tussen hard
en soft bounces. Dit is echter een veel te eenvoudig onderscheid. Bij
het versturen van een e-mailing kan zo veel fout gaan, dat het
belachelijk is om de fouten in slechts twee categorieën onder te
verdelen. De krachtige marketing software van Copernica maakt dit
onderscheid voor de gebruiker gelukkig wel inzichtelijk, zonder gebruik
te maken van de veel te vage begrippen 'soft' en 'hard' bounce.

Hoe verloopt het verzenden van een e-mailing nou eigenlijk? In feite
bestaat het versturen van een e-mailing uit drie stappen: eerst wordt de
e-mailing samengesteld, vervolgens wordt de e-mailing © per bericht ©
van een verzendende (client) naar een ontvangende mailserver (server)
verstuurd. Maar, als de e-mailing is geaccepteerd, dan wil dat nog lang
niet altijd zeggen dat deze ook bij de ontvanger wordt afgeleverd: er
kan dan nog altijd een zogenaamde 'bounce' optreden waarbij een
foutmelding per e-mail wordt teruggestuurd. In dit document gaan we
dieper op deze drie stappen in.

Stap 1: het samenstellen van een e-mailing
------------------------------------------

Het samenstellen van een e-mailing bestaat op zich al uit verschillende
stappen.\
 Bijvoorbeeld:

-   Het genereren van de HTML code
-   Personaliseren met behulp van Smarty-code
-   Het inladen van XML-feeds
-   Afbeeldingen embedden
-   Eventuele PDF-bestanden genereren en personaliseren

Kortom, zelfs bij het samenstellen van de e-mailing kan al veel fout
gaan, nog voordat de berichten daadwerkelijk zijn verstuurd. Hoe zou
deze fout in de e-mailstatistieken moeten worden genoemd? Een hard
bounce? Een soft bounce? Copernica maakt dit onderscheid niet. Als de
e-mailing bij het samenstellen tegen een fout oploopt, wordt door de
software gewoon gemeld dat er een fout is opgetreden bij het
samenstellen van de e-mail. Wel zo duidelijk.

Stap 2: het verzenden van een e-mailing - communicatie met ontvangende mailserver
---------------------------------------------------------------------------------

Bij het verzenden van een e-mail wordt er met behulp van een A-record
gezocht naar de corresponderende domeinnaam die is opgegeven bij het
verzenden van de e-mail. Een fout treedt op omdat bijvoorbeeld de DNS
gegevens van de server niet kloppen.

-   Hierbij ontvangt de gebruiker mogelijk de melding "Domeinnaam
    omzetten naar IP-adres" van de software. Wat betekent dat het domein
    van de geadresseerde (@xxxx.xx) niet goed gekoppeld is aan een
    IP-adres, waardoor de e-mailing niet wordt verzonden.

In de volgende stap wordt via een
[MX-record](./a-record-en-mx-record-hoe-werkt-dat.md "A records en MX records")
nagegaan naar welke server de e-mail verzonden wordt. Er zou hier een
(tijdelijke) fout kunnen optreden omdat de server tijdelijk niet
beschikbaar is.

Wanneer eenmaal bekend is naar welke mailserver de e-mail moet gaan,
wordt met behulp van een
[A-record](./a-record-en-mx-record-hoe-werkt-dat.md "A records en MX records")
verbinding gemaakt met het ontvangende IP-adres.

Hierna wordt er een SMTP-verbinding gemaakt met de server. Bijvoorbeeld
op IP-adres 11.22.33.222 poort 25 (de standaard SMTP-serverpoort). Deze
connectie kan mislukken wat ook resulteert in een foutmelding.

-   Bijvoorbeeld wanneer een provider de serverpoort blokkeert.

Lukt de connectie wel, gaat de client communiceren met de server. De
server geeft een 'greeting'-reply met code 220. Hier kan een fout
optreden doordat een server een 554-code terugstuurt. Dat betekent dat
de server de verbinding niet accepteert.

Tijdens deze communicatie geeft de client eerst een HELO-commando. Dit
brengt de SMTP-mailtransactie op gang. De server geeft hierop antwoord:
'250 Hello'. Komt er geen antwoord, ontstaat er een time-out. In de
software stel je gemakkelijk in dat er een fout wordt geregistreerd
indien dit meerdere keren achter elkaar voorkomt met behulp van
selecties.

Hierbij registreert de software de foutmelding "Communicatie met
ontvangende mailserver" of indien de verzendende partij zijn SPF-record
niet heeft ingesteld. De server weigert in dit geval de e-mail wat
resulteert in een fout.

Wanneer de server antwoord biedt, stuurt de client een MAIL-commando. Zo
geeft hij te kennen van wie de mail afkomstig is.
MAILFROM:\<voorbeeld@domein.com\>. In dit geval zijn er 3 gebeurtenissen
mogelijk:

-   De server accepteert de mail afkomstig van dit adres.\
-   De server geeft een time-out. Er wordt op een later tijdstip nog
    eens geprobeerd.\
-   De server accepteert geen e-mails van dit adres omdat het voorkomt
    op zijn blacklist. In dit geval ontstaat er een fout.

Wanneer de servers verder communiceren wordt ook gekeken aan wie de
e-mail is geadresseerd met behulp van het RCPT-commando.
RCPTTO:\<pietje@bedrijf.nl\>. Ook hier komen er 3 gebeurtenissen voor:

-   De server accepteert het adres.\
-   De server geeft een time-out.\
-   De server geeft aan dit e-mailadres niet te kennen. Er ontstaat een
    fout.

Nadat zowel het MAIL- als het RCPT-commando zijn goedgekeurd, wordt de
verdere data van de e-mail bekeken. Dit verloopt via het DATA-commando.
Dit is de verdere inhoud van de e-mail zoals de verschillende headers:
From, To, Subject, List-unsubcribe-header,. en de eigenlijke content van
de e-mail (tekst en afbeeldingen). Wederom zijn 3 gebeurtenissen
mogelijk:

-   De server accepteert de data.\
-   De server geeft een time-out.\
-   De server accepteert de data niet. Omdat bijvoorbeeld de meegezonden
    data kenmerken van SPAM bevat.

Alle doorgestuurde data moet steeds eindigen met een '.' op een nieuwe
regel.

De client beëindigt de mailtransfer door een QUIT-commando te sturen.
Vervolgens geeft de server aan dat de e-mail goed ontvangen is. Of hij
vraagt om een time-out, of er wordt aangegeven dat het versturen van de
data niet is gelukt. Dit resulteert dan in een fout.

Stap 3: verwerken van bounces
-----------------------------

In het geval dat de e-mail uiteindelijk is geaccepteerd door de
ontvangende mailserver kan er alsnog een fout optreden. Dit heeft een
bounce als gevolg. De server stuurt de client een DSN-bericht (*Delivery
Status Notification*) met mogelijke uitleg over wat er fout liep. Of er
wordt geen uitleg gegeven door de server.

Copernica maakt hierbij ook geen onderscheid tussen een 'hard' of 'soft'
bounce. Indien er na acceptatie alsnog een fout optreedt en de server
geeft dit door aan de client, zal de software duidelijk aangeven dat de
ontvangende mailserver een bounce heeft gestuurd. In de statistieken
valt dan eventueel te zien om welke specifieke error code het gaat.
Indien de teruggekoppelde error code niet bekend is, geeft de software
aan dat het gaat om andere ontvangen foutmeldingen (e-mails). Dit kunnen
bijvoorbeeld out-of-office-replies zijn.

*Dit artikel is eerder verschenen op Karel Geenen; [Het verschil tussen
hard bounce en soft bounce...dat bestaat
niet](http://www.karelgeenen.nl/10/het-verschil-tussen-hard-en-soft-bounce%E2%80%A6dat-bestaat-niet/ "Het verschil tussen hard bounce en soft bounce...dat bestaat niet").*
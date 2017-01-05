# DMARC

DMARC (Domain-based Message Authentication, Reporting and Conformance) is een
technologie om misbruik van e-mail (zoals phishing en spam) tegen te gaan. Om 
goed te begrijpen waarom DMARC eigenlijk is ontwikkeld en hoe het werkt, kun je 
het best even de wereld bekijken alsof je een professionele ontvanger bent. Stel 
je voor dat je Gmail, Hotmail, Yahoo of een andere grote e-mailontvanger bent: 
hoe zou je dan met e-mail omgaan?

Voordat DMARC werd uitgevonden waren er twee belangrijke technologieën om e-mail
te beveiligen: [SPF](spf) en [DKIM](dkim). Met SPF kun je, als ontvanger, 
controleren of een e-mail wel afkomstig is vanaf een juist IP adres. Met DKIM kun
je, eenvoudig gezegd, zien of het bericht inderdaad door de afzender geschreven is. 
Elk binnenkomend bericht kun je dus op twee manieren checken: is het afkomstig 
van een IP adres dat inderdaad van deze verzender is (en niet van een IP adres van 
een malafide verzender), en is de mail inderdaad geschreven door de genoemde 
afzender (en niet stiekem door iemand anders)? Het mooiste is natuurlijk 
wanneer je als ontvanger berichten ontvangt waarvan beide checks in orde zijn.

Maar ook als maar aan één van beide eisen is voldaan is het goed. Bijvoorbeeld
als een bericht wel een geldig DKIM signature heeft, maar toch afkomstig is van
een onverwacht IP adres. Zoiets gebeurt als een mail wordt doorgestuurd. Het DKIM
signature blijft geldig, maar het afzender IP wordt anders. Omdat de ondertekening
echter geldig blijft, weet je als ontvanger nog steeds zeker dat het mailtje echt
afkomstig is van info@bedrijfsnaam.nl. Er is dus niks aan de hand.

Het wordt pas problematisch als het allebei verkeerd is. Het IP adres matcht
niet met SPF, en er is geen of geen valide DKIM signature. Wat is er aan de hand?
Probeert iemand stiekem uit naam van een ander te mailen, of is het
toch een geldig bericht maar heeft de verzender gewoon zijn instellingen verkeerd
staan? Moet je een dergelijk bericht weggooien (want misbruik) of moet je het
bericht toch netjes in de inbox plaatsen (want belangrijk bericht van oma die
gewoon niet zo goed snapt hoe SPF en DKIM werkt)? Voor een ontvanger is het
lastig om te beslissen of een ongeldig bericht echt misbruik is, of dat het gewoon
een vergissing is van de verzender. En berichten weigeren of weggooien, dat doe je 
als ontvanger liever niet, omdat je wilt voorkomen dat je mails die voor je klanten
belangrijk zijn achterhoudt.

Het liefst zou je als ontvanger daarom even contact willen opnemen met de verzender.
"Hé, ik ontvang hier een berichtje van een zogenaamde medewerker van je, maar ik 
zie dat SPF en DKIM niet goed zijn. Heb jij je zaakjes wel op orde? En wat wil 
je eigenlijk dat ik met dit bericht doe? Toch maar in de inbox plaatsen? Of 
juist weggooien?" Dat is precies wat DMARC doet. Met DMARC kan een ontvanger een 
DNS query uitvoeren om precies dit soort vragen te stellen. En met DMARC kan een
ontvanger verzenders op de hoogte brengen als hij berichten ontvangt die niet
matchen met SPF en/of DKIM.


## DMARC en DNS

DMARC is een technologie die gebruik maakt van DNS en van e-mail. Als domeinnaameigenaar
kun je in DNS bij je domeinnaam een DMARC record plaatsen, en in dat record kun 
je vertellen wat er zou moeten gebeuren met berichten die niet matchen met DKIM en SPF.
Wil je dat ontvangers zulke berichten toch in de inbox plaatsen? Of moeten ze worden
weggegooid? Of moeten dergelijke foutieve berichten in een aparte mailbox worden
geplaatst, zoals de spam folder? Je kunt zelfs een percentage opgeven: ik wil dat
van alle foutieve berichten 10% wordt weggegooid, maar de andere 90% moet wel
worden geaccepteerd. Overigens is een ontvanger natuurlijk niet verplicht om jouw 
instellingen op te volgen: als een ontvanger besluit om de mail anders
te verwerken dan je in het DMARC record opgeeft, dan kun je daar niks aan doen.

Ook kun je in je DMARC record een e-mailadres opnemen, zodat ontvangende partijen
weten dat je op de hoogte wilt worden gebracht als het er op lijkt dat je per 
ongeluk mails stuurt die niet of niet geheel matchen met SPF en DKIM. Dat kan 
immers een indicatie zijn dat iemand misbruikt maakt van jouw domeinnaam, of dat 
één van je medewerkers zijn instellingen niet goed heeft staan, of dat er een 
server verkeerd is geconfigureerd. Als je een e-mailadres in je DMARC record 
opneemt, dan zul je opeens e-mails gaan onvangen met daarin DMARC rapportages.

Als je gebruik maakt van een [sender domain](sender-domains) neemt Copernica al
deze DNS-perikelen van je over. Dit geldt ook voor de rapportages. Als je een 
sender domain configureert, dan maakt Copernica een DMARC record voor je aan en
wij verwerken de rapportages. Deze binnenkomende rapportages worden gelogd en 
via fancy grafieken kun je precies in de gaten houden hoe je verzendingen lopen. 
Dit alles is via het dashboard in de Marketing Suite in te stellen en in te zien.


## Hoofddomein vs subdomain

Als je een sender domain aanmaakt, moet je kiezen of je gaat versturen vanuit
je hoofddomein (@bedrijfsnaam.nl) of vanuit een subdomain (zoals 
@nieuwsbrief.bedrijfsnaam.nl). Het is makkelijker om vanuit een subdomein te 
versturen, omdat je je dan geen zorgen hoeft te maken over mogelijke conflicten 
met de DMARC instellingen van je reguliere mailstroom. Als je vanuit een subdomein 
gaat mailen, dan maakt Copernica namelijk een DMARC record aan dat enkel en alleen
betrekking heeft op de berichten die worden verstuurd vanuit het subdomein. Je 
kunt zorgeloos een CNAME alias naar het door Copernica aangemaakte DMARC record 
aanmaken, omdat het geen invloed heeft op de mail die niet met Copernica
wordt verstuurd.

Als je echter de software van Copernica wilt gebruiken om mailings te versturen 
vanuit je hoofddomein moet je wat beter opletten. Het DMARC record dat Copernica
dan aanmaakt bevat dan de instelling voor *alle* mail die je vanuit het hoofddomein
verstuurt. Daar vallen waarschijnlijk ook de gewone berichten onder je verstuurt
vanaf kantoor of vanaf je mobiele telefoon. Als je voor een strenge instelling
kiest, dan kan het zomaar gebeuren dat je problemen krijgt met het afleveren van
je reguliere mail.


## Versturen vanuit het hoofddomein

Als je vanuit je hoofddomein (@bedrijfsnaam.nl) wilt gaan mailen en hiervoor
een sender domain aanmaakt, dan maakt Copernica een DMARC record voor je aan.
In het lijstje van geadviseerde DNS instellingen dat je vindt in het dashboard
staat dan een CNAME record dat verwijst naar dit door Copernica aangemaakte DMARC 
record. Deze instelling kun je kopiëren naar jouw DNS settings. Maar let op! 
Misschien had je al een DMARC record voor je domeinnaam. In dat geval heeft het
geen zin om het CNAME record aan te maken, je bestaande DMARC record heeft dan 
sowieso prioriteit. Je kunt in dat geval twee dingen doen: je kunt je huidige 
DMARC record verwijderen, en alsnog de CNAME aanmaken, of je kunt het advies van 
Copernica in de wind slaan en je bestaande DMARC record handhaven.

Als je de CNAME alias aanmaakt (eventueel nadat je het bestaande DMARC record
hebt verwijderd), dan is vanaf dat moment het dashboard van Copernica de enige
tool om je DMARC policy in te stellen. Alle DMARC rapportages komen vanaf dat 
moment binnen bij Copernica en je kunt via het dashboard de DMARC analyzer
openen om deze rapportages te analyseren. In eerste instantie kun je het best
de policy zo vriendelijk mogelijk zetten: alle mail accepteren. Hiermee voorkom
je dat een foutje in je configuratie er toe leidt dat je berichten niet worden
geaccepteerd. Als je na een paar dagen met behulp van de DMARC analyzer ziet
dat alles goed gaat, kun je langzaamaan voor een strictere policy kiezen.

Als je voor de andere optie kiest, en dus je eigen DMARC record handhaaft, dan 
heeft de policy instelling die je vindt in het dashboard geen effect. Je moet 
dan zelf handmatig je eigen DMARC record beheren. Als je toch wilt dat de rapportages
(ook) bij Copernica binnenkomen, zodat je alsnog onze DMARC analyzer kunt
gebruiken, dan kun je het volgende statement toevoegen aan je DMARC record:

    rua=mailto:dmarc@smtpeter.com
    
Door dit aan je DMARC record toe te voegen vertel je aan ontvangers dat de DMARC
rapportages ook naar Copernica moeten worden gestuurd. De domeinnaam smtpeter.com
is een door Copernica beheerd domain.


## Wat is de juiste policy instelling?

Veel gebruikers vragen ons wat nou eigenlijk de beste instelling voor de DMARC
policy is. Dat is een lastige vraag, en het hangt nogal vanaf de aard van je 
organisatie. Zoek je de beste instelling om te voorkomen dat anderen uit jouw 
naam kunnen mailen? Of wil je weten wat de beste instelling is om je berichten 
bij zo veel mogelijk mensen te laten aankomen? Ben je idealistisch en wil je 
internet zo veilig mogelijk maken of ben je wat pragmatischer? 

Copernica is lid van de M3AAWG, een organisatie om misbruik van allerlei 
internettoepassingen tegen te gaan. Daar is de algemene consensus dat hoe sneller 
iedereen zijn DMARC instelling op zijn strengst heeft staan (p=reject), hoe beter 
het is. Sommige mensen lopen er zelfs rond met "p=reject" t-shirts. De praktijk
is echter weerbarstig. Natuurlijk is het voor financiële instellingen die erg 
vatbaar zijn voor phishing (banken, overheden) het best om zo snel mogelijk de 
strengst denkbare DMARC instelling te hebben, maar dit geldt lang niet voor alle 
bedrijven. Ook veel grote leden van de M3AAWG gebruiken nog steeds een heel 
soepele setting.

In het algemeen is daarom ons advies: doe het langzaam aan. Begin met de soepelste
DMARC instelling: alle mail moet worden geaccepteerd. Daarna kun je via de DMARC
analyzer op het dashboard van de Marketing Suite gaan kijken welke rapportages 
binnenkomen. Is alle mail die bij de ontvangers binnenkomt in orde, of worden er 
fouten gemeld? En waar liggen die fouten aan? Als het aan jouw instellingen ligt,
dan kun je die gaandeweg verbeteren. Als je ziet dat er misbruik wordt gemaakt 
van jouw domein, dan kun je voor een strengere instelling kiezen. En als je ziet
dat alles in orde is (en er dus geen acute aanleiding is om op een strengere 
setting over te gaan), dan blijft een bedrijfsmatige keuze over: is de soepele
instelling acceptabel voor je, of wil je toch uitrollen naar een strengere 
DMARC configuratie? Een strenge instelling verkleint de kans dat criminelen
met jouw domeinnaam phishing aanvallen kunnen doen, maar het vergroot de kans
dat sommige berichten (zoals berichten die lopen via mailinglists) niet goed bij
de ontvanger aankomen.


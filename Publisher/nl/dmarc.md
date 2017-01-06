# DMARC

Om goed te begrijpen waar DMARC eigenlijk voor bedoeld is, kun je het best
even de wereld bekijken alsof je een professionele ontvanger bent. Stel je 
voor dat je Gmail, Hotmail, Yahoo of een andere grote e-mailontvanger bent: 
hoe zou je dan met e-mail omgaan?

Voordat DMARC werd uitgevonden waren er twee belangrijke technologieën om e-mail
te beveiligen: [SPF](spf) en [DKIM](dkim). Met SPF kun je, als ontvanger, 
controleren of een e-mail wel afkomstig is van een geldig IP adres. Met DKIM kun 
je zien of het bericht inderdaad van de afzender afkomstig is. Het mooiste voor 
een ontvanger is natuurlijk wanneer je berichten ontvangt waarvan beide checks 
in orde zijn: een bericht van info@bedrijfsnaam.nl, afkomstig van een IP adres 
dat inderdaad gerechtigd is om te mailen uit naam van bedrijfsnaam.nl (SPF dus 
goed) plus een DKIM ondertekening. Dergelijke berichten zijn perfect.

Maar ook als maar aan één van beide eisen is voldaan is het nog goed. Bijvoorbeeld
als een bericht wel een geldig DKIM signature heeft, maar afkomstig is van een
ander IP adres. Zoiets gebeurt als een mail wordt doorgestuurd. Het signature
blijft dan geldig, maar het afzender IP wordt anders. Omdat de ondertekening
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
als ontvanger liever niet, het zou wel eens belangrijk kunnen zijn.

Het liefst zou je als ontvanger daarom even contact willen opnemen met bedrijfsnaam.nl.
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
je vertellen wat er moet gebeuren met berichten die niet matchen met DKIM en SPF.
Wil je dat ontvangers zulke berichten toch in de inbox plaatsen? Of moeten ze worden
weggegooid? Of moeten dergelijke foutieve berichten in een aparte mailbox worden
geplaatst, zoals de spam folder? Je kunt zelfs een percentage opgeven: ik wil dat
van alle foutieve berichten 10% wordt weggegooid, maar de andere 90% moet toch
in de inbox worden geplaatst.

Ook kun je in je DMARC record een e-mailadres opnemen, zodat ontvangende partijen
weten dat je op de hoogte wilt worden gebracht als er mails binnenkomen die niet
of niet geheel matchen met SPF en DKIM. Dat kan immers een indicatie zijn dat
iemand misbruikt maakt van jouw domeinnaam, of dat één van je medewerkers zijn
instellingen niet goed heeft staan, of dat er een server verkeerd is geconfigureerd. 
Als je een e-mailadres in je DNS record opneemt, dan zul je opeens e-mails gaan 
onvangen met daarin DMARC rapportages.

Als je gebruik maakt van een [sender domain](sender-domains) neemt Copernica al
deze DNS perikelen van je over. Dit geldt ook voor de rapportages. Als je een 
sender domain configureert, dan maakt Copernica een DMARC record voor je aan en
we verwerken de rapportages. Deze rapportages worden gelogd, en via fancy grafieken 
kun je precies in de gaten houden hoe je verzendingen lopen. Dit alles is via 
het dashboard in de Marketing Suite in te stellen en in te zien.


## Hoofddomein vs subdomain

Als je een sender domain aanmaakt, moet je kiezen of je gaat versturen vanuit
een hoofddomein (@bedrijfsnaam.nl) of vanuit een subdomain (@nieuwsbrief.bedrijfsnaam.nl).
Het is makkelijker om vanuit een subdomein te versturen, omdat je je dan geen
zorgen hoeft te maken over mogelijke conflicten met de instellingen van je
reguliere mailstroom. Het DMARC record dat door Copernica wordt gehost heeft
dan alleen betrekking op het subdomein, en geen gevolgen voor de mails die je
stuurt vanuit je hoofddomein.

Als je echter met Copernica wilt versturen vanuit het hoofddomein moet je wat 
beter opletten. Wellicht bestaat er al een DMARC record voor je hoofddomein? Dat 
kun je niet zomaar vervangen door de instelling van Copernica zonder dat je het 
risico loopt dat je berichten niet meer aankomen. Ook als je nog geen DMARC record 
had, dan is het wellicht niet wenselijk om opeens een door Copernica verzorgd DNS
record op te nemen.


## Wat is de juiste instelling?

Veel gebruikers vragen ons wat nou eigenlijk de beste instelling is. Dat is een
lastige vraag, en het hangt er nogal vanaf hoe je tegen de wereld aankijkt. Zoek
je de beste instelling om te voorkomen dat anderen uit jouw naam kunnen mailen? 
Of wil je weten wat de beste instelling is om je berichten bij zo veel mogelijk 
mensen te laten aankomen? Ben je idealistisch en wil je internet zo veilig mogelijk
maken of ben je wat pragmatischer? 

Copernica is lid van de M3AAWG, een organisatie om misbruik van allerlei 
internettoepassingen tegen te gaan. Daar is de algemene consensus dat hoe sneller 
iedereen zijn DMARC instelling op zijn strengst heeft staan (p=reject), hoe beter 
het is. Sommige mensen lopen er zelfs rond met "p=reject" t-shirts. De praktijk
is echter weerbarstig. Natuurlijk is het voor financiële instellingen die erg 
vatbaar zijn voor phishing (banken, overheden) het best om zo snel mogelijk de 
strengst denkbare DMARC instelling te hebben. Maar dit geldt lang niet voor alle 
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


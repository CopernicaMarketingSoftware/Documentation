# DKIM handtekeningen

Bijna elk e-mailbericht heeft een 'from' adres. Dit is het e-mailadres
waar de e-mail vandaan _schijnt_ te komen en welke ook bovenaan wordt
weergegeven in elke e-mail.
Dit is ook het adres waar je een antwoord naar terug kunt sturen als 
je op beantwoorden klikt. 

Hier is express het woord _schijnt_ gebruikt, omdat je, bij het versturen
van e-mail, elk mogelijk e-mailadres kunt gebruiken als het 'from' adres.
Zelfs e-mailadressen die helemaal niet van jezelf zijn. Deze wetenschap
kan worden gebruikt voor een 'leuk' geintje, maar kan natuurlijk net zo
goed worden misbruikt. Als een domein eigenaar wil je niet dat andere
personen e-mail kunnen versturen vanuit jouw domein.

DKIM kan worden gebruikt om dit te voorkomen. Het stelt ontvangende partijen 
in staat om te verifieren of een e-mail daadwerkelijk door jou is verstuurd.
DKIM kan daarnaast ook aantonen of de vertuurde e-mail (inclusief de bijlages)
niet bewerkt is tijdens het transporteren van de ene naar de andere e-mailclient.

De technologie aangaande het ondertekenen van e-mails is gebasseerd op een 
mechanisme van gerelateerde privé -en publieke sleutels. Als eigenaar van 
een domein ben je de enige met toegang tot de privésleutel en kun je 
dus e-mails ondertekenen.


De publieke sleutel wordt gepubliseerd in het 'DNS record' van je domein
zodat iederen kan _checken_ of de ondertekening van de e-mail wel echt 
van jou kwam. Deze technologie zorgt ervoor dat e-mails alleen door jou
ondertekend kunnen worden. Tegelijkertijd kan iedereen jouw e-mails 
verifieren omdat iedereen toegang heeft tot de publieke sleutel. 
Dit maakt het voor spammers, phishers en soortgelijke onmogelijk om jouw
domein te gebruiken als het 'from' adres. Ze kunnen in het algemeen geen 
e-mails versturen vanuit jouw naam, omdat ze simeplweg geen toegang hebben
tot jouw privésleutel.


## Ondertekenen van e-mails

SMTPeter kan je e-mails ondertekenen met DKIM. SMTPeter moet dan wel weten
welk 'from' adres je gebruikt. Je kunt het ['sender domain'](sender-domains)
configureren in het dashboard. SMTPeter maakt automatisch DKIM sleutels 
voor je aan en laat je weten hoe je de DNS records kunt updaten.
Je hoeft de instellingen maar een keer te configureren. Vanaf dat moment
stuurt SMTPeter alle e-mails vanaf hetzelfde adres als de 'sender domains'.

Het kan voorkomen dat je eigen publieke -en privésleutels hebt. In dit geval
kun je het dashboard gebruiken om je eigen privésleutels te gebruiken.
Het is ook mogelijk om SMTPeter te laten weten dat er altijd een ondertekening
moet worden gebruikt van een bepaalde sleutel, ook al is het 'from' adres
van de verstuurde e-mail anders dan het 'sender domain'. 

Dit alles neemt niet weg dat het sterk wordt aangeraden om het ondertekenen
van de e-mail te laten doen door SMTPeter. SMTPeter bewerkt normaal gesproken
altijd verstuurde e-mails. Bijvoorbeeld om [link kliks, opens](statistics) of
[CSS code inline te zetten](inline-css). Dit maakt de eerder toegevoegde 
ondertekening ongeldig.

Het is niet de bedoeling dat je e-mails gaat versturen met verschillende
'from' adressen anders dan je eigen 'sender domain'. Hoe dan ook, mocht het 
toch voorkomen dat je e-mails verstuurt met een ander 'from' adres, dan
kijkt SMTPeter of het een van je 'sender domain' sleutels kan gebruiken om 
alsnog aan de benodigdheden te voldoen.


## Automatische DKIM sleutel rotatie

De privésleutels worden opgeslagen op de SMTPeter servers. Deze zijn op
geen enkele manier in te zien door anderen. De technologie achter de 
publieke -en privésleutels is zeer veilig. Echter, de sleutels kunnen 
'breken' als iemand langdurig met je sleutels in de weer is. Daarom is
het handig om af en toe nieuwe sleutels genereren. De standaardinstellingen
van SMTPeter zorgen ervoor dat de sleutels automatisch roteren. Wil je toch 
nog steeds gebruik maken van je eigen gegenereerde sleutels? Dan is het updaten
daarvan je eigen verantwoordelijkheid. 


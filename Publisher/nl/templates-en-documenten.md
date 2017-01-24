# Templates en documenten

Om mailings te versturen maken we gebruik van templates en documenten. Maar
let op: de oude Copernica Publisher omgeving maakt gebruik van een heel
ander templatesysteem en mailingsysteem dan de nieuwe Copernica Marketing 
Suite. En in tegenstelling tot veel andere onderdelen van de software kun je 
ook niet zomaar wisselen tussen het ene systeem en het andere. Als je een 
mailing gaat opmaken, moet je dus van te voren bepalen welke van de twee 
systemen je wilt gebruiken. 

Het oude systeem van Copernica Publisher vereist dat je zelf HTML code invoert
om een template op te maken, terwijl de nieuwe Marketing Suite een eenvoudige
drag-and-drop editor heeft waarmee je snel en makkelijk met de muis een mailing 
in elkaar kunt zetten. Het nieuwe systeem is dus een stuk gebruiksvriendelijker,
maar ook wat minder krachtig. Als je een obscure nieuwe (of juist oude) HTML of CSS 
truc wilt toepassen, dan kan dat soms niet met de nieuwe editor, terwijl dit 
met de oude editor natuurlijk wel mogelijk is: daar kun je gewoon de pure HTML 
code invoeren die zonder dat Copernica dat controleert naar de ontvangers
wordt verstuurt.

Ook biedt het oude systeem van de Publisher (nu nog) wat meer mogelijkheden 
om opvolgacties in te stellen. Dit is nog niet goed mogelijk met de nieuwe 
Marketing Suite drag-and-drop editor.


## Copernica Marketing Suite

De drag-and-drop editor van de nieuwe Copernica Marketing suite is 
makkelijk in het gebruik. Sterker nog, eigenlijk werkt het zo eenvoudig
dat je zonder een blik op deze documentatie te werpen al een mailing in elkaar 
kunt zetten. De editor stelt je in staat om teksten, afbeeldingen en buttons 
op te pakken en naar de juiste plaats in de template te slepen. Omdat de 
nieuwe editor zo eenvoudig is te gebruiken, beperken we ons daarom
tot het documenteren van de moeilijke onderdelen zoals personalisatie en
het instellen van scripts. 

Onder de motorkap worden alle templates opgeslagen als JSON bestanden. In dit
JSON bestand staat precies welke content je hebt toegevoegd en hoe de mailing
er uit moet komen te zien. Normaal gesproken hoef je deze JSON code 
nooit aan te passen en maak je enkel gebruik van de drag-and-drop editor
voor het bewerken van de mail. Echter, als je dat echt wilt, dan kun je de
onderliggende JSON inzien en zelfs bewerken. Copernica heeft een aparte 
website ontwikkeld, [www.responsiveemail.com](https://www.responsiveemail.com)
waar je precies kunt lezen aan welke eisen de JSON moet voldoen.


## Copernica Publisher

Het templatesysteem van de oude Copernica Publisher is een stuk ingewikkelder
dan het nieuwe systeem van Marketing Suite. Je moet zelf de HTML code van een
template invoeren en je moet zelf aangeven op welke plaatsen binnen de 
template variabele teksten en afbeeldingen kunnen worden geplaatst.

Bovendien wordt er in de oude Publisher omgeving gebruik gemaakt van een 
gelaagd systeem: we maken onderscheid tussen *templates* en 
*documenten*. De template bepaalt de layout van de mail, zoals de plaats van 
de logo's en de lege plekken waar later, op documentniveau, teksten en 
afbeeldingen kunnen worden toegevoegd. Zo'n template wordt met HTML code 
opgemaakt, waarbij gebruik wordt gemaakt van speciale "text", "image" en 
"loop" blokken om aan te geven waar later content kan worden toegevoegd.

Nadat er een template is ontworpen, kun je op basis van die template 
*documenten* gaan maken. Voor het aanmaken van documenten heb je geen kennis 
van HTML meer nodig. Als je een document aanmaakt dan kun je de lege plekken 
die in de template waren gemarkeerd met de "text", "image" en "loop" blokken
worden voorzien van content.

Door dit template-en-documentsysteen worden hanteren veel Copernicagebruikers
een vaste taakverdeling: een template wordt eenmalig gemaakt door een
daarin gespecialiseerde vormgever of HTML'er (die soms extern wordt ingehuurd),
terwijl marketeers vervolgens keer op keer documenten op basis van die 
template kunnen aanmaken en gebruiken voor mailings en campagnes.


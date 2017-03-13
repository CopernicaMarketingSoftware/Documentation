De database inrichten
=====================

Copernica werkt met flexibele multidimensionale databases die je helemaal zelf
kunt ontwerpen. Je kunt dus zelf bepalen welke velden er in de database zitten,
en ook meerdere lagen aanbrengen in de database. Dit biedt enorme flexibiliteit, 
maar het betekent ook dat je eerst een database moet inrichten alvorens je die 
kunt gebruiken om adressen (en andere profielgegevens) op te slaan.

Er zijn bijna geen beperkingen aan de structuur van een database. Of je nu
een eenvoudige voornaam-achternaam-emailadres-structuur wilt hebben, of
dat je een geneste database wilt aanmaken waarin per profiel de bestelgeschiedenis
en *abandoned shopping carts* wordt opgeslagen: het kan allemaal. Maar om
snel aan de slag te kunnen raden we aan om je database in eerste instantie
eenvoudig te houden. Je kunt later altijd extra velden toevoegen.


Marketing Suite
---------------------------------------

De Marketing Suite maakt het mogelijk om gemakkelijk databases te beheren. 
Navigeer naar het *PROFILES* kopje in het menu.
Binnen die omgeving is het mogelijk om databases te creëeren, filters toe te voegen, 
selecties te bewerken en nog veel meer. De mogelijkheden zijn eindeloos.


Velden, interesses en collecties
--------------------------------

Binnen een database onderscheiden we velden, interesses en collecties. Velden
en interesses zijn eenvoudig: daarin sla je enkelvoudige data op, zoals een 
nummer of een stukje tekst. Een interesse is eigenlijk ook een veld, maar kan 
alleen de waarde "ja" of "nee" kan bevatten. Als je een online sportwinkel 
beheert, zou je database bijvoorbeeld kunnen bestaan uit de tekstvelden "voornaam" en
"achternaam", het emailveld "emailadres" en de interesses "voetbal", "tennis"
en "hockey".

Met collecties wordt het wat ingewikkelder. Met collecties kun je een extra laag 
toevoegen aan een database. Je kunt bijvoorbeeld in de database met klantgegevens
een collectie met bestellingen opnemen. Van elke klant sla je dan niet alleen
de velden "voornaam", "achternaam" en "emailadres" op, maar ook de in het verleden
bestelde producten in de collectie "bestellingen". In een collectie kun je, in
tegenstelling tot een gewoon veld, meerdere items opslaan.

De structuur van een collectie kun je, net als de structuur van een database, 
zelf configureren. Ook een collectie is flexibel en je kunt dus zelf
bepalen welke velden er in de collectie zitten. Als je een collectie met
bestellingen toevoegt aan de database dan kan je in die collectie
velden aanmaken met de datum van de bestelling, het bestelde product en
het bedrag. 

Zodra ja met collecties gaat werken, wordt Copernica een stuk krachtiger, maar
de extra dimensie die je aan de database toevoegt maakt het ook wat ingewikkelder.


Database intenties
------------------

Copernica heeft een ingebouwd beveiligingssysteem. We willen voorkomen dat iemand
per ongeluk een mailing naar een hele database stuurt, als het de bedoeling
is om alleen maar te mailen naar de abonnees van de nieuwsbrief. In de volledige
database staan immers vaak ook de gegevens van mensen die zich in het
verleden van de nieuwsbrief hebben afgemeld, en daar wil je juist *niet*
naar mailen.

Daarom is het standaard onmogelijk om naar nieuw aangemaakte databases (en
selecties, maar hierover later meer) mailings te versturen. Je moet
expliciet instellen dat een database geschikt is voor mailings. Dit gaat door
middel van database *intenties*. In de Marketing Suite vind je de mogelijkheden 
om de intenties van databases en selecties in te stellen. Tegelijkertijd kun je daar 
ook aangeven welke database gebruikt mag worden voor mailings.


Profielen aanmaken
------------------

Nadat je de database hebt aangemaakt en velden aan de database hebt toegevoegd,
is deze database natuurlijk nog leeg. Je kunt nu data gaan toevoegen aan de
database. Deze datasets noemen we profielen en kunnen worden aangemaak in de 'profielen'
sectie van de Marketing Suite. Om één en ander te testen kun je het beste eerst een 
profiel met je eigen gegevens aanmaken.

Als je Copernica gebruikt voor het ontwerpen of schrijven van mailings, dan
kun je tijdens dit proces continu testmails versturen. Deze tests worden 
verstuurd naar de *standaardbestemming*. Dit is een profiel uit de database
dat is gemarkeerd als het profiel voor testmails. Het ligt voor de hand om
jouw eigen profiel in te stellen als de standaardbestemming.


Volgende stap
-------------

Als je een database hebt aangemaakt, daar een aantal velden in hebt aangemaakt 
(waaronder natuurlijk een veld met een emailadres), en je eigen profiel aan
die database hebt toegevoegd, kun je beginnen met het 
[maken van een eerste mailing](quick-mailing-guide) om verder te ontdekken 
hoe Copernica werkt.


De database inrichten
=====================

Copernica werkt met flexibele multidimensionale databases die je helemaal zelf
kunt ontwerpen. Dit biedt enorme flexibiliteit, maar
het betekent ook dat je eerst een database moet inrichten alvorens je die kunt
gebruiken om adressen (en andere profielgegevens) in op te slaan.

Er zijn bijna geen beperkingen aan de structuur van een database. Of je nu
een eenvoudige voornaam-achternaam-emailadres-structuur wilt hebben, of
dat je een geneste database wilt aanmaken waarin per profiel de bestelgeschiedenis
en *abandoned shopping carts* wordt opgeslagen: het kan allemaal. Maar om
snel aan de slag te kunnen raden we aan om je database in eerste instantie
eenvoudig te houden. Je kunt later altijd extra velden toevoegen.


Marketing Suite of Copernica Publisher?
---------------------------------------

Op het moment van schrijven kun je alleen via de oude Copernica Publisher
omgeving databases beheren. Onze ontwikkelaars zijn hard bezig om het
databasebeheer ook in de nieuwe Marketing Suite in te bouwen, maar dit is nog 
in ontwikkeling. Voorlopig zul je het dus nog even moeten doen met de wat
ingewikkelder Publisher omgeving. We verwachten echter binnen enkele weken het
databasebeheer in Marketing Suite beschikbaar te hebben.

In Publisher kom je bij het databasebeheer via de optie "profiles". Hier
kun je al je databases en selecties beheren, en profieldata inkijken en
wijzigen. De eerste keer dat je de profielenmodule opent, is alles natuurlijk
nog leeg en moet je zelf een nieuwe database aanmaken.


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

Een structuur van een collectie moet je, net als de structuur van een database, 
zelf configureren. Ook een collectie is helemaal flexibel en je kunt dus zelf
bepalen welke velden er in de collectie zitten. Als je een collectie met
bestelling toevoegt aan de database dan zou je bijvoorbeeld in de collectie
velden kunnen aanmaken met de datum van de bestelling, het bestelde product en
het bedrag. 

Zodra ja met collecties gaat werken, wordt Copernica een stuk krachtiger, maar
de extra dimensie die je aan de database toevoegt maakt het ook wat ingewikkelder.


Database intenties
------------------

Copernica heeft een ingebouwd beveiligingssysteem. We willen voorkomen dat iemand
per ongeluk een mailing naar een hele database stuurt, terwijl het de bedoeling
was om alleen maar te mailen naar de abonnees van de nieuwsbrief. In de volledige
database staan bijvoorbeeld ook nog de gegevens van mensen die zich in het
verleden van de nieuwsbrief hebben afgemeld, en daar wil je dus juist *niet*
naar mailen.

Daarom is het standaard onmogelijk om naar nieuw aangemaakte databases (en
selecties, maar hierover later meer) mailings te versturen. Je moet daarom
expliciet instellen dat een database geschikt is voor mailings. Dit gaat door
middel van database *intenties*. In het profielenbeheer van Copernica Publisher
vind je menu items om de intenties van databases en selecties in te stellen,
en daar kun je aangeven dat een database gebruikt mag worden voor mailings. 



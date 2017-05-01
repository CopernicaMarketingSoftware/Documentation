# Databasebeheer

Copernica werkt op basis van volledig configureerbare databases. Je kunt 
zelf de structuur van databases bepalen, zodat jouw gegevens altijd in Copernica
passen. De databases ondersteunen bovendien meerdere dimensies. Dit 
stelt je in staat om een database met meerdere lagen te maken waarin per 
profiel bijvoorbeeld de volledige bestelgeschiedenis wordt opgeslagen.

De database vormt het hart van je marketingcampagnes. In de database staat
alle profieldata voor het maken van selecties en voor het personaliseren van 
mailings. De data wordt bovendien continu verrijkt naar aanleiding van 
acties van de geadresseerden, zodat je steeds nauwkeuriger campagnes kunt
versturen. Hoewel sommige gebruikers er de voorkeur aan geven regelmatig een 
nieuwe database aan te maken waarin opnieuw alle profielgegevens worden 
geïmporteerd, adviseren wij om steeds dezelfde database te gebruiken. Je 
database wordt dan steeds rijker door de feedback van eerdere campagnes. Door 
middel van selecties kan de database worden gesegmenteerd en gebruikt voor 
doelgerichte campagnes, zonder dat je adressen opnieuw hoeft te importeren.
Het databasebeheer is toegankelijk via de Marketing Suite. 

## Meerdere dimensies

Binnen het Copernica databasebeheer kom je regelmatig de begrippen *collectie*
en *subprofiel* tegen. Deze termen worden gebruikt bij multidimensionale 
databases. In een eenvoudige, ééndimensionale, database worden alleen 
enkelvoudige velden en interesses gebruikt: een winkelier zou bijvoorbeeld
een database kunnen aanmaken met velden voor de voor- en achternaam, woonplaats
en het emailadres van zijn klanten. Records die in deze database worden
geplaatst worden door Copernica *profielen* genoemd.

Echter, zo'n eenvoudige database kan worden voorzien van een tweede laag door
er een *collectie* aan toe te voegen. De winkelier kan bijvoorbeeld een 
collectie "bestellingen" toevoegen, en in deze collectie de velden "datum", 
"product" en "prijs" opnemen. Aan elk profiel in de database (elke klant dus)
kunnen dan de bestellingen die in de loop der tijd zijn gedaan worden
toegevoegd. Een record uit zo'n collectie (in dit geval een bestelling) wordt
een *subprofiel* genoemd.

Een database met klanten met een collectie voor bestellingen is slechts
een enkel voorbeeld hoe je multidimensionale databases kunt gebruiken. Maar
je zou bijvoorbeeld ook een database met bedrijven kunnen aanmaken, inclusief
een collectie met de medewerkers per bedrijf. Of een database met ouders, en
een collectie voor de kinderen.

## Overige opties

Als je databases inricht, zijn er verschillende zaken die je kunt instellen.
Voordat je kunt mailen moet je bijvoorbeeld aangeven dat een database geschikt
is om naar te mailen, en je kunt allerlei regels opstellen om te voorkomen
dat ongeldige data in een database wordt opgeslagen. Dit kun je regelen
door middel van *databaserestricties* en *gebruiksmogelijkheden* in te stellen.

## Meer informatie

* [Selecties](./selections-introduction)
* [Velden en collecties](database-fields-and-collections)
* [Database restricties en intenties](database-restrictions-and-capabilities)
* [Configureren van een database](./quick-database-guide)
* [Exporteren van een database](./database-export)
* [Databases beheren met de REST API](./rest-api)

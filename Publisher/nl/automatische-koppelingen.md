# Automatische koppelingen

Je kunt Copernica op verschillende manieren koppelen aan andere applicaties.
Copernica heeft verschillende API's om gegevens vanuit Copernica uit te
lezen of gegevens in Copernica bij te werken, en door middel van *feedback
loops* kan Copernica je *real time* notificaties sturen als er een event als
een *klik*, *open* of *bounce* plaatsvindt.


## REST vs SOAP

Copernica heeft twee verschillende API's: een REST API en een SOAP API. De 
REST API is de nieuwste van de twee. We raden je daarom aan om, als het even
kan, niet de SOAP API maar deze REST API te gebruiken: die is eenvoudiger 
in het gebruik, en ook een stuk sneller omdat er geen ingewikkelde SOAP laag 
tussen de aanroepen zit. 

De SOAP API is echter wel wat rijker dan de REST API. De REST API ondersteunt
alleen de veel voorkomende aanroepen - zoals het aanmaken of bewerken van
profielgegevens - terwijl de SOAP API ook allerlei weiniggebruikte calls 
aankan.


## Feedback loops

Naast de API's kent Copernica ook feedback loops. Een feedback loop is
eigenlijk het tegenovergestelde van een API: een API call wordt door een
externe applicatie gedaan. Copernica verwerkt zo'n API call en stuurt het 
juiste antwoord terug. Een API call wordt dus geïnitieerd door de aanroeper.

Feedback loops werken andersom. Als er een bepaalde gebeurtenis plaatsvindt,
zoals een klik of een open, dan initieert Copernica de aanroep. Copernica doet
een HTTP POST call naar een server van een gebruiker om de gebruiker van het
event op de hoogte te stellen. Het is aan jou, de gebruiker, om een script op 
je server te plaatsen en de call op te vangen en te verwerken.

Copernica begint pas met het aanroepen van jouw script nadat je dit via het
dashboard van Marketing Suite hebt geconfigureerd. Je moet precies aangeven
in welke events je bent geïnteresseerd, en via welk adres jouw script is
te benaderen.

Het nadeel van feedback loops is dat je geen contôle hebt over de snelheid 
van de calls. Met name als je een feedback loop instelt die wordt aangeroepen
telkens wanneer een mail wordt geopend, kan de stroom van calls vanuit 
Copernica gigantisch worden. Als jouw servers onvoldoende capaciteit hebben 
om al deze events op te vangen, kun je beter geen feedback loops gebruiken.


## Logfiles

Alle events die naar feedback loops worden gestuurd, worden ook weggeschreven
naar logfiles. Als je niet in staat bent om feedback loops in te stellen omdat
je het tempo van events niet altijd kunt bolwerken, of als het script dat 
de feedback loop verwerkt even offline was, dan kun je de logfiles uitlezen 
en de gemiste events op die wijze terugvinden.

De logfiles kunnen worden gedownload via het dashboard van Marketing Suite. 
Alle mailinggerelateerde events (zoals verzendingen, bounces, kliks en opens)
worden in logfiles bewaard en kun je via het dashboard uitlezen. Daarnaast
kun je met de REST API deze bestanden downloaden.

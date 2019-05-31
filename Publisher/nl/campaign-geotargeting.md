# Geotargeting

Geotargeting kan gebruikt worden om klanten uit een speciefieke regio aan te spreken of de inhoud van de mail kan erop aangepast worden. 
Het doel is om met geotargeting nog meer gericht te mailen. In onze [campagne uitgelicht blog](https://www.copernica.com/nl/blog/post/campagne-uitgelicht-editie-3-geotargetingcampagnes) bespreken we een aantal toepassingen van geotargeting.
In onderstaand artikel wordt uitgelegd hoe geotargeting mogelijk is in Copernica. 

## Postcodes

Een van de beste manieren om de locatie van een klant te bepalen is van de postcodes. 
Deze hebben namelijk een logische structuur om plaatsen te herkennen, via de nummers van een postcode kan je eenvoudig
de plaats erbij vinden. Postcodes 1000-1100 zijn bijvoorbeeld regio Amsterdam. 

  - Voor geotargeting kunnen we een lijst gebruiken waarbij alle postcodes aan plaatsen en provincies gekoppeld zijn, download deze lijst [hier](../downloads/geotargeting.csv).
 - Vervolgens importeren we deze lijst in een nieuwe database. Deze database noemen we **PlaastenDB**.
 - Gebruik voor de veld namen de namen uit de import. 
 - Na de import zou de database er als onderstaande moeten uitzien:
 
 ![](../images/PlaatsenDB.png)
 
Deze database gaan we straks gebruiken om meer informatie uit de postcodes te halen.

### Selectie op basis van locatie

De meest eenvoudige manier van geotargeting kan dus gedaan worden op postcode. We kunnen met een selectie alle klanten uit een bepaalde regio selecteren door een postcode range op te geven. Dit doen met een zogenoemde [reguliere expressie](https://regex101.com/), hiermee kunnen we een range aangeven waar alle postcode in moeten vallen. Er wordt alleen gekeken naar de cijfers want de letters geven enkel straten aan en geen steden. De reguliere expressie voor amsterdam ziet er als volgt uit:

```

/[1][0][0-9][0-9].*/

```

Er zitten 4 cijfers in een postcode daarom staan er 4 sets aan blokhaken, elke set van blokhaken staat voor een nummer van de postcode. De postcodes van Amsterdam liggen tussen 1000-1099, kortom de eerste 2 cijfers staan vast. Het eerste cijfer is altijd een 1 oftewel [1] en het tweede cijfer is altijd een 0 oftewel [0]. De volgende cijfers liggen ergens tussen 0 en 9 oftewel [0-9]. De punt en de astriks zorgen ervoor dat letters van de postcode genegeerd worden. 

 - Om hiermee een selectie te maken, maken we vervolgens een conditie aan die checkt op veldwaarde.
 - Kies het postcode veld en geef als vergelijking **voldoet aan reguliere expressie**.
 - Vul bij waarde de bovenstaande reguliere expressie in en je hebt nu een selectie die iedereen uit regio Amsterdam selecteert. 
 
 ## Winkels
 
 Naast dat je wil bepalen wil je natuurlijk ook weten welke winkel de dichtstbijzijnde is per klant. We kunnen dit handmatig doen of doormiddel van smarty. Eerst zal de handmatige uitgelegd worden om het concept te snappen en zal daarna dieper op de automatische variant ingegaan worden. 
 
### Winkel Database

De eerste stap is een database aanmaken waar al onze winkels in staan. Hierin zet je alle informatie die je wilt tonen in je email, denk hierbij aan adres, url naar een foto en een beschrijving. Het is aan te raden om postcode te splitsen in cijfers en letters, dit is voor een check bij de mailing straks handig. De onderstaande afbeelding geeft een voorbeeld van een Winkel datase:

![](../images/winkel_database.png)
 
 Maak een veld **StoreID** aan, dit veld bevat de waarde die uniek is per winkel. Dit kan prima een simpel cijfer zijn maar kan ook een winkel id zijn. We willen dat deze waarde ook bij het profiel komt te staan, zodat bekend is welke winkel het dichtstbij is. Dit doen we als volgt
 
 - Maak een veld **Winkel** aan in je klantendatabase.
 - Zorg dat je een selectie hebt waarin alle profielen uit een bepaalde regio van de winkel vallen.
 - Ga naar Huidige weergave > Meerdere profielen wijzigen/verwijderen en geef alle profielen uit deze selectie de juiste StoreID in het veld Winkel
 -  Hierdoor kunnen we altijd in het profiel terugvinden wat de dichtsbijzijnde winkel is. 
 
 ### Winkel informatie in mailings
 
 
 
 

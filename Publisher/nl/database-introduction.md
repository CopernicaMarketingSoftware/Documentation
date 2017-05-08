# Databasebeheer

Copernica werkt op basis van databases die je zelf kunt figureren. Je kunt 
de database makkelijk naar wens structuren en data [importeren](./database-import) 
en [exporteren](./database-export).

Je kunt ook verschillende lagen aanmaken in je database, bijvoorbeeld om 
de aankoopgeschiedenis van een klant op te slaan in zijn profiel. Je kunt 
ook [selecties](./selections-introductions) aanmaken om de database makkelijk 
op te delen en om te personalizeren. Copernica linkt ook veel informatie 
aan de profielen in je database, waaronder kliks, opens en errors. Om deze 
reden is het ook belangrijk dat je een database netjes houdt en update, in plaats 
van periodiek een geheel nieuwe database aan te maken. Deze data, waarmee 
je vorige campagnes kan evalueren en toekomstige campagnes kan verbeteren, 
raakt anders verloren.

## Meerdere dimensies

Binnen het Copernica databasebeheer kom je regelmatig de begrippen *collectie*
en *subprofiel* tegen. Deze termen worden gebruikt bij multidimensionale 
databases. In het voorbeeld met de aankoopgeschiedenis zou je bijvoorbeeld 
een collectie van orders aanmaken. De klant is in dit geval het *profiel* 
en het product het *subprofiel*. Je kunt hetzelfde principe toepassen op 
bijvoorbeeld de werknemers van een bedrijf, of de kinderen van een ouder.

## Overige opties

Als je databases inricht, zijn er verschillende zaken die je kunt instellen. 
Het belangrijkst is dat de structuur van je database efficient en logisch is. 
Voordat je kunt mailen moet je bijvoorbeeld aangeven dat een database geschikt
is om naar te mailen, en je kunt allerlei regels opstellen om te voorkomen
dat ongeldige data in een database wordt opgeslagen. Dit kun je regelen
door middel van *databaserestricties* en *gebruiksmogelijkheden* in te stellen.

## Meer informatie

De volgende artikelen zullen je op weg helpen bij het opzetten van een 
database en het onderhouden hiervan.

* [Selecties](./selections-introduction)
* [Velden en collecties](database-fields-and-collections)
* [Database restricties en intenties](database-restrictions-and-capabilities)
* [Configureren van een database](./quick-database-guide)
* [Exporteren van een database](./database-export)
* [Databases beheren met de REST API](./rest-api)

We hebben gemerkt dat veel van onze klanten geen gebruik maken van de
Copernica Rest API omdat ze het niet nodig achten of omdat ze denken dat
het te ingewikkeld voor ze is, hoewel dat nergens voor nodig is. Om je
angst voor de API weg te nemen zullen we daarom een aantal artikelen
posten met uitleg over de API, hoe je hem kunt gebruiken en waarom je
hem zou moeten gebruiken. Het doel van deze serie is om je ervan te
overtuigen dat de API toch niet zo eng is en eigenlijk best wel handig.
In dit eerste artikel bespreken we de basics van REST: wat het precies
is, waar het voor gebruikt wordt en, het allerbelangrijkste, hoe jij er
toegang tot krijgt.

AP-Wat? {#ap-wat?}
-------

Een Application Programming Interface is een set standaarden en
protocollen om toegang te krijgen tot de data van een applicatie. Deze
standaarden zijn gespecificeerd door de makers van de applicatie en
geven developers de mogelijkheid om externe applicaties te ontwerpen die
draaien op data van de applicatie waarvoor de API is gemaakt. In andere
woorden: een API is een soort tussenpersoon die ervoor zorgt dat de
applicatie en de developer met elkaar kunnen communiceren zonder dat de
applicatie zich helemaal bloot hoeft te geven. Een voorbeeld hiervan is
de API van Twitter, die uit verschillende kleinere APIs bestaat zodat er
third party apps en website integraties gemaakt kunnen worden.

Wat is REST? {#wat-is-rest?}
------------

Er zijn verschillende soorten APIs, maar in dit artikel zullen we alleen
Copernica's REST API bespreken. REST staat voor Representational State
Transfer en het belangrijkste kenmerk ervan is dat het simpelweg HTTP
requests gebruikt als communicatiemiddel tussen de API en jouw device.
Dit zorgt ervoor dat zo ongeveer iedereen ervan gebruik kan maken, of je
nou een browser, een iOS app of zelfs een Windows Phone gebruikt: overal
waar je HTTP kunt gebruiken, kun je REST ook gebruiken. Copernica's API
maakt alleen gebruik van HTTPS. Dit houdt in dat er gebruik wordt
gemaakt van een vergrendelde HTTP-connectie zodat je zeker weet dat er
niet met je data geknoeid wordt tijdens de overdracht.

Wat zijn HTTP requests? {#wat-zijn-http-requests?}
-----------------------

In essentie zijn HTTP requests niets meer dan instructies die een client
aan een server geeft om hem te vertellen waar hij informatie vandaan
moet halen of waar hij het moet stoppen. Copernica, en de meeste andere
REST APIs, gebruiken vier verschillende requests: GET, POST, PUT en
DELETE.

GET is de meestvoorkomende request. Het geeft de server de opdracht om
de data die jij opvraagt door middel van een URL door te sturen. Met
POST kun je data toevoegen, zoals bijvoorbeeld profielen of databases.
PUT is het commando om bestaande data te updaten. DELETE wordt, zoals je
misschien al geraden hebt, gebruikt om data te verwijderen.

Calls doen
----------

Voordat je kunt beginnen met API calls doen, moet je eerst toegang
krijgen tot de API met je access token. Om die te verkrijgen, is het
nodig dat je je applicatie registreert. Dit kun je doen door onder
['applicaties'](https://www.copernica.com/nl/applications) jouw
applicatie toe te voegen. Daarna klik je op je applicatie in de lijst
onderaan de pagina en voeg je jouw account toe door op 'account
toevoegen' te klikken en je account te selecteren uit de lijst, waarna
je jouw accountnaam en access key onderaan de pagina zult zien staan.

Wanneer je je access key hebt, kun je beginnen met het doen van calls.
Dit doe je in het volgende format, waarin 'youraccesstoken' vervangen
moet worden door jouw access token.

[https://api.copernica.com/v1/database/\$databaseID/fields?access\_token=youraccesstoken](https://api.copernica.com/v1/database/$databaseID/fields?access_token=youraccesstoken)

Deze call geeft je toegang tot de velden in de database die bij
\$databaseID horen. Je kunt 'database' vervangen door 'collection',
'profile', 'subprofile', 'callback', 'emailing', 'emailing destination'
en andere dingen,die allemaal hun [eigen
functies](https://www.copernica.com/nl/support/rest/the-copernica-rest-api)
hebben. In dit voorbeeld is gebruik gemaakt van de 'fields'-functie,
maar die kan vervangen worden door iedere beschikbare functie.

Je kunt GET requests makkelijk doen in je browser door ze simpelweg als
URL in te tikken. POST, PUT en DELETE calls zijn wat ingewikkelder. Je
kunt ze namelijk niet uitvoeren in je browser omdat je daarbij input
moet geven die je browser niet kan verwerken. In het volgende artikel
zullen we dieper ingaan op het doen van dat soort calls. Probeer voor nu
eens te experimenteren met GET requests in je browser.

“Maar dit kan toch allemaal in de interface...”
-----------------------------------------------

...Is wat we ons voorstellen dat velen van jullie denken, en geheel
ongegrond is het niet. De Copernica Publisher heeft al een groot aantal
opties. We krijgen echter vaak vragen van klanten die bijvoorbeeld een
wekelijks overzicht van hun statistieken willen hebben of hun
statistieken in de vorm van spreadsheets willen. Veel van deze taken
kunnen makkelijk uitgevoerd worden met de API. De API kan namelijk data
leveren voor alles dat met je databases te maken heeft, waar de
Publisher je alleen een reeds verwerkt overzicht geeft van je
statistieken en data en je geen mogelijkheid geeft ze te downloaden.

Hopelijk ben je er door dit artikel achter gekomen dat de API minder
ingewikkeld is dan je dacht en overweeg je nu toch om hem te gebruiken.
In het volgende artikel zullen we dieper ingaan op het gebruik van GET,
POST, PUT en DELETE calls en hoe je ze zelfs kunt uitvoeren als je
helemaal geen programmeerkennis hebt.

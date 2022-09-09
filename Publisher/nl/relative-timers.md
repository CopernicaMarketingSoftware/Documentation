# Instellen van een variabele timer

Binnen de drag-and-drop-template bestaat de mogelijkheid om een variabele starttijd aan de blok-optie van een timer toe te voegen. Dit kan je doen door **speciale parameters** aan de URL van een HTML-broncode toe te voegen binnen de code van je template. Met het exporteren van een HTML-broncode bedoelen we de broncode van een template in een reeds verzonden mail. Verderop in de documentatie leg ik uit hoe je dit doet. 

Er zijn  meerdere parameters die je aan de code kan toevoegen om de variabele waarden in de de timer toe te voegen.


## Een variabele timer toevoegen aan je timerblok binnen een template


**Wat is een HTML-broncode? En waarom heb je deze nodig?**


Een HTML-broncode is een deel van een tekst waarin de statische elementen (code) van een website te zien zijn. In deze code staan de teksten die je ook zal zien als je deze via de website bekijkt. Omdat je wilt zien hoe je timer in je template eruit komt te zien is het van belang dat je de link die je  in het template gebruikt uit deze broncode komt. 

**Hoe kun je de HTML-broncode ophalen?** 

1. Ga naar je template binnen de Marketing Suite en voeg de timerblok aan het template toe. Style jouw template zoals gewenst.
2. Sla het template op. De code van de timer in het template ziet er als volgt uit: "https://stripo.copernica.net/countdowntimer/api/v1/images/i0uVKKl25tQcWj0MhvcsUZyphaJL8mT6H3vKRs5YkG0".
3. Verstuur een testmail naar de gewenste e-mailadres.
4. Ga naar de verstuurde e-mail en open deze.
5. Afhankelijk van de e-mailclient ga je op zoek naar de optie 'view source' of 'bekijk broncode' binnen het e-mail.  
6. In de broncode ga je opzoek naar de code van de timer. Dit kan het makkelijkst door met  CTRL+F binnen de zoekbalk te zoeken naar 'timer'. Hier vind je als het goed is een broncode dat start met "https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674". Dit is de HTML-broncode van je template die we zullen gaan gebruiken. Zoals je ziet is de code van van de timer gewijzigd. Aan het einde van de code is een cijfercombinatie. Deze cijfercombinatie zorgt ervoor dat je timer zichtbaar is in de browser.
7. Kopieer de Html-broncode uit de e-mail. Als je deze link nu in je browser plaatst, wordt de timer weergegeven: 

![image timer 2](https://raw.githubusercontent.com/CopernicaMarketingSoftware/Documentation/master/Publisher/images/nl/Timer2.png)

8. Deze link zal nu de code vervangen die nu in het template is. Pas de code in het template aan. In onderstaande afbeelding kan je zien hoe de code in het template eruit komt te zien nadat je de oude code hebt vervangen met de nieuwe HTML-broncode.

![image timer 1](https://github.com/CopernicaMarketingSoftware/Documentation/blob/e7bad1743972185875de2eab4ff106f17f05a2c8/Publisher/images/Timer1.png)





## Diverse methoden van instellen variabele timer

Als je bovenstaande stappen hebt uitgevoerd kan je een deadline toevoegen aan je timer door een variabele datum en tijd in te stellen. Dit gaat als volgt. 

**Toevoegen van een deadline**

Wanneer je wilt dat je timer loopt tot 2023-0101 om 3:15:58, kun je dit door middel van de **deadline** parameter als volgt aangeven: https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674&deadline=2023-01-01T03:15:58

**Toevoegen van deadline tijd en seconden**

Wanneer je wilt dat de timer loopt tot in de **seconden** in wilt stellen. Dan kan je dat door middel van de **start_time** parameter welke je tot in de seconden aangeeft:https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674&start_time=2023-01-01T03:12:58+19000 

**Aftellen vanaf een aantalen**

Wanneer je wilt dat de timer vanaf een aantal dagen af gaat tellen, bijvoorbeeld **14 dagen**, kun je dit doen door middel van de *deadline* parameter met de waarde {'+14 days'|date_format:'%Y-%m-%d'}T00:00:00.

Als je in de bovenstaande URL de parameter **deadline** en de volgende parameter toevoegt, bijvoorbeeld {'+14 days'|date_format:'%Y-%m-%d'}T00:00:00. Dan zal de server de gif genereren en de dynamische einddatum in de waarden verwerken. De timer telt dan af vanaf 14 dagen: https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674&deadline={%27+14%20days%27|date_format:%27%Y-%m-%d%27}T00:00:00.

Bijvoorbeeld:

![image timer 3](https://raw.githubusercontent.com/CopernicaMarketingSoftware/Documentation/master/Publisher/images/nl/Timer3.png)

**Let op:** De timer is nu niet meer zichtbaar in het template. Je kunt deze nog wel inzien in de voorvertoning van je e-mail.




# Instellen van een variabele timer

Binnen de drag-and-drop-template bestaat de mogelijkheid om een variabele starttijd aan de blok-optie van een timer toe te voegen. Dit kan je doen door **speciale parameters** aan de URL van een geexporteerde HTML toe te voegen binnen de code van het template. 

Er zijn  meerdere mogelijkheden van variabele waarden die je aan de timer kan toevoegen.

## Gegenereerde timer toevoegen aan de timer-block

Onderstaand zie je een URL van een gegenereerde timer uit de HTML broncode van een geëxporteerde mail:

https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674

Deze vervangt de huidigecode van het timer-block:


![image timer 1](https://github.com/CopernicaMarketingSoftware/Documentation/blob/e7bad1743972185875de2eab4ff106f17f05a2c8/Publisher/images/Timer1.png)

Als je de link nu in een HTML zoekbalk plaatst, dan brengt deze je naar de pagina van de timer: 


![image timer 2](https://raw.githubusercontent.com/CopernicaMarketingSoftware/Documentation/master/Publisher/images/nl/Timer2.png)


### 1. Deadline toevoegen aan de timer

Als je in bovenstaande URL de parameters **deadline** en de **datum**  in de **date-time** format specificer, bijvoorbeeld 2023-01-01T03:15:58. Dan zal de server de gif genereren en de waarden met een dynamische einddatum verwerken. 

De URL die je in de code van het template aanpast ziet er als volgt uit:

https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674&deadline=2023-01-01T03:15:58


### 2. Het toevoegen van een dynamische starttijd

Als je in de bovenstaande URL de parameters  **start_time** en de datum **date-time** format + aantal **seconden** tot het einddatum specificeer, bijvoorbeeld 2023-01-01T03:15:58+19000. Dan zal de server de gif genereren en de dynamische einddatum in de waarden verwerken. 

De URL die je in de code van het template aanpast ziet er als volgt uit:  
https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674&start_time=2023-01-01T03:12:58+19000


### 3. Aftellen tot een specifieke dag

Als je in de bovenstaande URL de parameter **deadline** en de volgende parameter toevoegt, bijvoorbeeld {'+14 days'|date_format:'%Y-%m-%d'}T00:00:00. Dan zal de server de gif genereren en de dynamische einddatum in de waarden verwerken. De timer telt dan af vanaf 14 dagen. 

Bovenstaande parameter voeg je toe aan de URL van het template:

![image timer 3](https://raw.githubusercontent.com/CopernicaMarketingSoftware/Documentation/master/Publisher/images/nl/Timer3.png)


De URL die je in de code van het template aanpast ziet er als volgt uit:  
https://stripo.copernica.net/countdowntimer/api/v1/images/Il92D00u8mWcpq3J4qVTKv2GmqU9MaDVZM9W1JXF4yE?l=3D1661264410674&start_time=2023-01-01T03:12:58+19000

![image timer 4](https://raw.githubusercontent.com/CopernicaMarketingSoftware/Documentation/master/Publisher/images/nl/Timer4.png)

**Let op:** De timer is nu niet meer te zien in het template, maar wel te zien in de voorvertoning.




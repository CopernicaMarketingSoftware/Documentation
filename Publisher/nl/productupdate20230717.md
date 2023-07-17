# Productupdate - Vertaalmodule in bèta en twee-factor-authenticatie wordt verplicht

## Nieuwe bètamodule: Templates vertalen
Sinds deze week staat de bètaversie van de vertaalmodule live. Met deze module verstuur je meertalige mailings, zodat elke geadresseerde een mailing ontvangt die overeenkomt met de taalinstelling van het profiel. De vertaalmodule werkt alleen voor drag-and-drop-templates.

Je activeert de module via het menu-item [Configuratie](https://ms.copernica.com/#/admin), onder [Bètamodules](https://ms.copernica.com/#/admin/user/betamodules). De vertaalmodule gebruik je via de optie 'Vertalen' in jouw templates.

In [dit artikel](./multi-language) vind je meer uitleg over de werking van de module.

## Twee-factor-authenticatie wordt verplicht
Tussen 1 augustus en 1 september beginnen wij met het verplichten van twee-factor-authenticatie (2FA). Alle gebruikers moeten vanaf 1 september inloggen met een wachtwoord, en een wisselende code die met een smartphone wordt gegenereerd.

Meer informatie over het instellen van 2FA lees je in [dit artikel](https://www.copernica.com/nl/blog/post/twee-factor-authenticatie-verplicht-vanaf-1-september).

## Instellen tijdzone bij inroosteren mailing
Bij het inroosteren van een mailing kan je nu een tijdzone opgeven. Hiermee voorkom je dat een mailing op een verkeerd tijdstip wordt verzonden als jij of je collega vanuit het buitenland werkt. Standaard wordt de tijdzone van de browser gebruikt.

## Aanpassing IP-ranges
Copernica gebruikt diverse IP-adressen voor uitgaande HTTP-requests die nodig zijn voor (onder meer) webhooks en het downloaden van content en feeds voor mailings. Een aantal van onze klanten heeft onze IP-adressen gewhitelist om ervoor te zorgen dat enkel calls vanuit onze IP-adressen worden geaccepteerd. 

Wij hebben extra IP-ranges toegevoegd. Meer informatie over onze huidige ranges en waarom wij het gebruik van whitelisting afraden lees je [hier](./policy-outgoing-ip-addresses).

## Simpel maar effectief: Verjaardagscampagnes
Een verjaardagscampagne wordt gebruikt om iemand te feliciteren met zijn of haar verjaardag. Bij een verjaardagscampagne liggen de open- en klikratio's een stuk hoger dan bij standaard nieuwsbrieven. Op ons blog hebben wij een nieuwe trainingsvideo waarin stap voor stap wordt uitgelegd hoe je dit kunt doen. 

De verjaardagscampagne is eenvoudig op te zetten met alleen een geboortedatum. Het is een goede eerste campagne voor iedereen die nog niet bekend is met het opzetten van automations in Copernica.

In de video in ons [blog-artikel](https://www.copernica.com/nl/blog/post/simpel-maar-effectief-verjaardagscampagnes) wordt uitgelegd hoe je dit kunt instellen.

## REST API
Aan de methodes om [impressies](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-impressions), [kliks](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-clicks), [fouten](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-errors), [uitschrijvingen](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-unsubscribes) en [klachten](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-abuses) van Marketing Suite mailings op te halen is het (sub)profiel ID van de bestemming toegevoegd. Hierdoor hoef je geen extra call meer uit te voeren om dit op te halen.

Aan de methode om [meerdere profielen](https://www.copernica.com/nl/documentation/restv3/rest-put-database-profiles) aan te passen is het mogelijk gemaakt om te zoeken op basis van het ID en de verborgen code van het profiel.

Aan de methode om [Marketing Suite templates](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-templates) op te halen wordt nu meegegeven of de template gearchiveerd is.

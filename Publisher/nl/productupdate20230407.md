# Productupdate - Coupons versturen, interactie inzien met een klikmap en verbeterde beveiligingsmogelijkheden

## Nieuwe module: Unieke coupons versturen
In Marketing Suite hebben we de [couponsmodule](https://ms.copernica.com/#/coupons) geïntroduceerd. Hiermee is het makkelijker gemaakt om mailings te versturen voorzien van unieke actiecodes (coupons). Zo kun je, bijvoorbeeld bij een verjaardagscampagne, alle jarigen een bepaalde korting of extra's aanbieden. De couponsmodule zorgt ervoor dat elke ontvanger een unieke code krijgt waardoor je achteraf precies kunt zien welke ontvanger van je aanbieding gebruik heeft gemaakt. Om gebruik te maken van de couponsmodule, zal je e-commerceplatform de mogelijkheid voor het uitgeven en inwisselen van coupons moeten ondersteunen. 

Meer informatie over de werking vind je in ons [documentatie-artikel](https://www.copernica.com/nl/documentation/coupons) over deze module.

## Interactie van je links inzien met een klikmap
In de statistieken van je verzonden mailing is de optie toegevoegd om een klikmap in te zien. Hiermee kun je eenvoudig zien op welke links in je template de meeste interactie is geweest. Je vindt de klikmap onder 'Verzonden template -> Klikmap'.

Wanneer je gebruik maakt van dezelfde URL's op verschillende plekken in je template, is ons advies om deze uniek te maken door een hash en een waarde aan de URL toe te voegen. Bijvoorbeeld: https://www.copernica.com/pagina#link1 en https://www.copernica.com/pagina#link2. Hierdoor worden de beide links uniek in de klikmap en is het mogelijk om het verschil tussen beide te meten.

## Verbeterde beveiligingsmogelijkheden voor je data
In je Copernica-account staat veel data. In de afgelopen periode hebben wij functionaliteiten toegevoegd om je data optimaal te beveiligen. 

Als je gebruik maakt van webhooks of het inladen van externe content (loadfeed- en fetch-tag) kun je nu controleren of de HTTP-calls die wij naar jouw server sturen wel echt van ons afkomstig zijn. Al onze calls zijn namelijk voorzien van een digitale handtekening in de HTTP-headers. Daarnaast is het mogelijk gemaakt om SFTP-imports en -exports op te starten met een eigen geheime sleutel (private key). 

In ons artikel over [dataveiligheid](https://www.copernica.com/nl/documentation/datasecurity) leggen we per onderdeel uit wat je kunt doen om je data zo veilig mogelijk te houden.

## Marketing Suite
- De naam van een nieuwe databases mag vanaf nu de volgende karakters bevatten: letters, cijfers en een underscore. Dit is aangepast omdat andere karakters voor problemen kunnen zorgen bij het ophalen van de databasenaam via Smarty personalisatie. 
- Naast de 'expire header' is het nu ook mogelijk om feeds te cachen op basis van de [ETag-header](https://en.wikipedia.org/wiki/HTTP_ETag). Hiermee kun je voorkomen dat er een enorme druk op je servers ontstaat wanneer je content ophaalt in je template via een feed.
- Het is mogelijk gemaakt om gepersonaliseerde [X-headers](https://www.copernica.com/nl/documentation/email-editor-headers) in je drag-and-drop-template te gebruiken. 
- Als je gebruik maakt van de optie 'resultaten exporteren' in de [resultaten-module](https://ms.copernica.com/#/results/sentmailings) ontvang je nu ook de CTR en het aantal afleveringen in je bestand.
- Het is mogelijk gemaakt om variabelen vanuit een template te gebruiken in je XSLT-bestand voor het stylen van je feed.
- Voor nieuwe gebruikers is het vanaf nu verplicht om gebruik te maken van twee-factor-authenticatie. Dit is gedaan in verband met de veiligheid van je data. Meer informatie hierover vind je in ons artikel over [dataveiligheid](https://www.copernica.com/nl/documentation/datasecurity#marketingsuite).
- Bugfix: je kunt het 'doel' van een Marketing Suite opvolgactie weer opslaan. 
- Bugfix: het is weer mogelijk om [collectie-restricties](https://www.copernica.com/nl/documentation/database-restrictions) te bewerken.
- Bugfix: bij de [ingeroosterde mailings](https://ms.copernica.com/#/results/upcomingmailings) is de eerst volgende mailing nu bovenaan zichtbaar.
- Bugfix: kliks op URL's die [msRefererEmailing](copernica.com/nl/documentation/emailings-ms-unsubscribe) of [publisherRefererEmailing](https://www.copernica.com/nl/documentation/emailings-publisher-unsubscribe) bevatten worden nu in de statistieken als uitschrijving geregistreerd.
- Bugfix: er is een probleem verholpen waarbij de JavaScript-editor verdween bij het gebruik van veel JavaScript-code.

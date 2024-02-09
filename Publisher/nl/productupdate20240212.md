# Productupdate - Vernieuwde opvolgactie-editor en Publisher wordt doorverwezen naar Marketing Suite

## Vernieuwde opvolgactie-editor
Sinds deze week staat de vernieuwde opvolgactie-editor live. Deze editor biedt niet alleen een snellere ervaring, maar ook een verbeterde gebruikersinterface. Hierdoor wordt het opzetten en beheren van opvolgactie-flows nog eenvoudiger. Bovendien hebben we een aantal veelgevraagde features toegevoegd.

De nieuwe editor werkt, net als de vorige editor, met blokken die je aan elkaar kunt koppelen en waarmee je een stroomdiagram maakt. Een blok vertegenwoordigt een trigger (zoals een klik), een vergelijking (zoals woonplaats moet gelijk zijn aan Nederland) of een actie (zoals verstuur een nieuwe e-mail). De editor heeft een aantal blokken die nog niet beschikbaar of wat beperkter waren in de oude editor:

- Het blok "E-mailing checken"
- Het blok "verzend e-mail"
- Het blok "verzend SMS"

Met het blok "e-mailing checken" kun je nu de eigenschappen van een verzonden mailing controleren. Dit betekent dat je kunt kijken of de mailing die de opvolgactie heeft gestart, bepaalde kenmerken zoals afzenderadres, verzenderdomein, onderwerp of tag bevat. Met deze toegevoegde functionaliteit kun je bijvoorbeeld specifieke aanpassingen maken aan profielen waarbij de opvolgactie wordt getriggerd door een uitschrijving. Dit kan van pas komen bij het voldoen aan de nieuwe richtlijnen voor afmeldverzoeken van Google, zoals beschreven in onze [vorige productupdate](https://www.copernica.com/nl/documentation/productupdate20240120).

Daarnaast kun je nu in het blok "verzend e-mail" aangeven dat je alleen de tekstversie wilt verzenden, en je kunt ook een SMS-document verzenden met het verzend SMS-blok.

### Publisher wordt doorverwezen naar Marketing Suite
Om de marketing software beschikbaar te maken binnen één omgeving gaan we Publisher in de eerste week van maart doorverwijzen naar Marketing Suite. Dit betekent dat wanneer je Copernica bezoekt via [publisher.copernica.com](https://publisher.copernica.com) of [publisher.copernica.nl](https://publisher.copernica.com), je nu wordt doorverwezen naar [ms.copernica.com](https://ms.copernica.com).

#### Wat houdt dit in voor mij als Publisher-gebruiker?
Het goede nieuws is dat we Publisher niet gaan uitfaseren. De modules van Publisher blijven gewoon beschikbaar via het Publisher-submenu in Marketing Suite. Binnen de Marketing Suite-omgeving heb je toegang tot alle Publisher- en Marketing Suite-modules. Aangezien de gegevens die je in Publisher hebt ook beschikbaar zijn binnen de Marketing Suite-modules, kun je eenvoudig wisselen tussen beide systemen.

#### Voordelen Marketing Suite
De modules binnen Marketing Suite zijn ontwikkeld om minstens zo krachtig te zijn als Publisher, maar met het gemak en de snelheid van Marketing Suite. Naast deze optimalisaties zijn er ook functionaliteiten die enkel beschikbaar zijn in Marketing Suite, zoals de [drag-and-drop-editor](https://ms.copernica.com/#/design), de [vertaalmodule](https://www.copernica.com/nl/blog/post/nieuwe-feature-meertalige-mailings-in-een-handomdraai), de [coupons-module](https://www.copernica.com/nl/blog/post/nu-nog-makkelijker-kortingscodes-versturen-met-copernica) en het inzien van [logbestanden](https://ms.copernica.com/#/logs/).

Wil je meer informatie over de voordelen van Marketing Suite? Neem dan contact op met je accountmanager of met [support@copernica.com](mailto:support@copernica.com).

## Cachen van externe afbeeldingen in drag-and-drop-templates
Het is nu mogelijk om externe afbeeldingen in drag-and-drop-templates door Copernica te laten cachen tijdens het verzenden. Dit vermindert de belasting op de servers waar de afbeeldingen worden gehost, omdat de afbeeldingen slecht eenmalig door ons worden opgehaald. Om deze optie in te schakelen, kun je bij het inplannen van een bulkmailing onder 'Opties' kiezen voor 'Externe afbeeldingen opslaan op onze servers'.

## Het gebruik van de &lt;unchanged&gt; tag in de drag-and-drop-editor
De drag-and-drop-editor ondersteunt een speciale &lt;unchanged&gt; tag die je kunt gebruiken om te voorkomen dat de editor HTML-code herschrijft. Normaal gesproken verbetert de editor fouten en inconsistenties in de HTML-code die je handmatig invoert. Echter, als je de oorspronkelijke code wilt behouden, kun je dat doen door gebruik te maken van de &lt;unchanged&gt; tag.

De &lt;unchanged&gt; tag is vooral handig bij het combineren van Smarty personalisatiecode met meer complexe HTML-structuren zoals tabellen. Als je Smarty en HTML combineert, dan voer je eigenlijk "ongeldige" HTML-code in, die na de personalisatie pas geldig wordt. De editor heeft dit niet altijd in de gaten en kan soms de door jou ingevoerde HTML-code verbeteren, wat mogelijk niet overeenkomt met je bedoelingen. Dit gebeurt bijvoorbeeld wanneer een Smarty-instructie (zoals {foreach} of {if}) wordt opgenomen binnen een HTML-tabel.

In [dit artikel](https://www.copernica.com/nl/documentation/email-editor-personalization-variables#de-foreach-functie) leggen we aan de hand van een voorbeeld uit hoe dit werkt.

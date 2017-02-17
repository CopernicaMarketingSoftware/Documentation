# Lay-out van Copernica aanpassen

Partners en franchisers van Copernica kunnen de applicatie tonen in een
aangepaste lay-out. Nieuwe en bestaande lay-outs beheer je in het
onderdeel **Beheer**.\
 \
 Let op: deze functionaliteit is alleen beschikbaar voor gebruikers die
bij een bedrijf werken die franchiser is of geregistreerd partner van de
software.

Nieuwe lay out maken
--------------------

Om een nieuwe lay-out te maken, kies je de zogenoemde functie in het
menu Lay-out bij **Beheer**.

Nadat je een nieuwe lay-out hebt aangemaakt, kan je vanuit de hieronder
toegelichte tabbladen de nieuwe lay-out vormgeven.

### **Bovenkant applicatie**

Stel HTML-code in om de bovenkant van de applicatie vorm te geven.
Hieronder vallen het logo/weergave van de bovenste centimeters en de
stijl van het menu met applicatie onderdelen. 

Zorg er voor dat je onderstaande tags opneemt:

**[links] **Dit zijn de knoppen in de navigatie

**[languages]** Dit is het taalkeuze menu

**[timezone]** Dit is het timezone menu

Alle drie de tags moeten worden opgenomen in de header. Anders kan deze
niet worden opgeslagen. Desgewenst kan je bovenstaande zaken met CSS
verbergen (div style display: none).  

#### **E-mail afsluiter**

Stel HTML code in waarmee elke uitgaande mailing wordt afgesloten.
Bijvoorbeeld jouw logo en contactinformatie of een 'powered by' als je
partner bent zodat je zichtbaar bent op mailings van klanten.

#### **Web afsluiter**

Stel HTML code in die onder elke webpagina en elk webformulier wordt
getoond.

#### **Domeinen**

Stel domeinen in waarop de layout standaard wordt toegepast. Denk
bijvoorbeeld aan de loginpagina, die anders geen gebruik kan maken van
de Bovenkant applicatie omdat nog niet bekend is met welk account er
wordt aangemeld.

#### **Logo**

Stel een logo in dat wordt meegezonden met product updates. De product
updates worden automatisch aan alle gebruikers verzonden om hen te
informeren voor onderhoud en software updates.

### Lay-out gegevens bewerken

Van een bestaande lay-out voor de applicatie (Beheer) kan je wijzigen
van naam en omschrijving via 'Gegevens wijzigen' in het menu Lay-out.

Ook kan je hier instellen welke pagina wordt getoond op de inlogpagina
van Copernica.

### Lay-out domeinnaam toevoegen 

Je vindt de functie om een domeinnaam aan een layout te koppelen onder
Beheer \> Layout \> Domeinnaam toevoegen.

Voordat een gebruiker is ingelogd, is niet bekend bij welk account een
gebruiker hoort, en kan dus ook niet worden bepaald welke layout moet
worden gebruikt voor de bovenkant van de applicatie. Door een domeinnaam
aan een layout te koppelen, kan de juiste lay-out direct worden getoond
wanneer iemand naar de applicatie gaat.

In de domeinnaam kunnen de tekens \* en ? worden gebruikt om de layout
met meerdere domeinen overeen te laten komen.

Let op, deze functie is alleen beschikbaar voor resellers en partners
van de software.

### Lay-out verwijderen

Een layout die niet langer in gebruik is kun je verwijderen uit de
applicatie. De functie vind je onder het *Layout*menu. Let op, accounts
die gebruik maken van deze layout zullen automatisch terugvallen op de
standaard layout.

### Layout favicon

De favicon is het icoon dat wordt getoond in de adresbalk van de
browser. Je kan voor Copernica een eigen favicon gebruiken. Een favicon
wordt het beste weergegeven als deze 16x16 pixels is, en een
transparante PNG is.

### Layout bestanden en afbeeldingen

Bestanden en afbeeldingen die je gebruikt voor je eigen lay-out kun je
uploaden naar deze map.

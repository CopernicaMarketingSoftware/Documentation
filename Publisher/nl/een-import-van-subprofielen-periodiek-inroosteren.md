Bij het importeren van een bestand vanaf een externe locatie kan je
instellen dat deze periodiek herhaald moet worden. Hiervoor zie je na
het aangeven van de bestandslocatie een tabblad *Interval*in het
dialoogvenster.

Selecteer de keuze *Periodieke import*. Daarna kan je aangeven om de
hoeveel dagen/weken/maanden/jaren de applicatie opnieuw naar de
opgegeven locatie moet kijken om een nieuw gegevensbestand te
importeren.

In de eerste stap voer je de locatie in waar het importbestand gevonden
kan worden. Enkele voorbeelden van online locaties:

-   http://www.yourdomain.com/directory/file.txt
-   ftps://username:password@hostname/directory/file.txt

Kies het scheidingsteken en ga door naar de volgende stap.

![](Documentation/import-from-online-location.png)

### Import instellen

Het instellen van de periodieke import wijkt verder niet af van normale
imports.

Wel is er een extra tab **'Interval'** bijgekomen. Vanhieruit kan je
instellen wanneer de import moet starten, en met welke interval je deze
wilt uitvoeren.

![The interval tab enables you to set an interval for a scheduled
import](scheduledimport.png)

### Een lopende periodieke import afbreken

Wanneer je wilt dat een periodieke import niet langer wordt uitgevoerd,
kan je deze annuleren.

-   Selecteer de database waarop de periodieke import is ingesteld.
-   Ga naar via het menu *Huidige weergave*naar *Importeren /
    Exporteren*
-   Klik op de import in het overzicht en vervolgens op *Import tonen*
-   Klik op *import annuleren*. De import zal niet meer worden
    uitgevoerd.

### Periodieke import bewerken

Het is helaas niet mogelijk om een ingeroosterde import te bewerken
nadat deze al een keer heeft gelopen. Je zal de import moeten annuleren,
en opnieuw inroosteren met de gewenste instellingen.

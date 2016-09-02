Je wilt in een email alleen het laatst aangekochte product tonen. Je
gebruikt hiervoor een miniselectie en de functie loadsubprofile.

Producten worden bij het profiel opgelagen in de collectie Products. De
mailing verstuur je aan het profiel.

Voeg een aantal subprofielen (producten) toe aan de collectie Products
in je testprofiel.

Stap 1: Sorteer de subprofielen met een miniselectie
----------------------------------------------------

Maak in de collectie Products een nieuwe miniselectie aan. Noem deze
SortNewest. Maak een nieuwe regel aan van het conditietype Selecteer en
sorteer subprofielen.

![](Documentation/kiesconditie.png)

Gebruik de volgende instellingen:

![](Documentation/miniselectieconditie.png)

**Context**: Je selecteert alleen subprofielen binnen het profiel

**Subprofielen sorteren en sorteertveld toevoegen**: Dit deel laat je
ongemoeid. Er wordt nu automatisch op het ID gesorteerd. Profielen en
subprofielen krijgen altijd een uniek oplopend ID. Het laatst gekochte
product is dus altijd het subprofiel met het hoogste ID.

**Selecteer vanaf positie -1:** zo selecteer je het hoogste ID

**Selecteer aantal: 1**. Je wilt 1 product tonen, dus selecteer je ook 1
subprofiel. Als je meer producten wilt tonen, kan dit natuurlijk ook
door hier een hoger getal in te voeren.

Je miniselectie is nu klaar. Sla de miniselectie op en sluit het
venster. Toon nu de subprofielen uit de miniselectie, door deze in de
collectie bij het profiel te selecteren. Je ziet nu alleen het laatst
toegevoegde subprofiel. Mocht dit niet het geval zijn, controleer dan of
de miniselectie al is opgebouwd.

![](Documentation/showsubprofiles.png)

### Stap 2. Email document personaliseren

Je wilt nu je email personaliseren met gegevens uit het subprofiel uit
de miniselectie *SortNewest*. Hiervoor gebruik je de functie
**loadsubprofile**. Met deze functie kan je in je e-maildocument
gegevens van subprofielen ophalen. Bij source verwijs je uiteindelijk
naar de miniselectie waarin je de subprofielen hebt gesorteerd: \

*databasenaam:collectienaam:miniselectienaam*

Met assign ken je de opgehaalde waardes toe aan een nieuwe variabel. Met
profile=\$profile.id doorzoek je alleen het huidige profiel. Met limit=1
zorg je dat maar 1 subprofiel wordt geladen. In principe is dit nu niet
nodig, omdat je altijd hooguit 1 subprofiel in de miniselectie hebt
zitten.

`{loadsubprofile source="Mailinglist:Products.SortNewest" assign="product" profile=$profile.id limit=1}   Product: {$product.Productname} Purchase date: {$product.PurchaseDate}`
Je kan nu de gegevens over het product ophalen op bovenstaande wijze. \


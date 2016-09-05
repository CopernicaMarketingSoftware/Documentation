Een feed is een bundeling van artikelen. Welke artikelen in de feed
worden opgenomen stel je in met behulp van filters. Zo kan je
bijvoorbeeld alleen artikelen uit een bepaalde rubriek, of van een
specifieke auteur in je feed opnemen.  Ook kan je instellen hoeveel
artikelen er maximaal in de feed worden opgenomen, in welke volgorde de
artikelen worden geplaatst en welke artikelen moeten worden opgenomen op
basis van de aanmaakdatum van het artikel.

Nieuwe feed maken
-----------------

Kies de optie **Nieuwe feed**in het menu **Feed**

-   Kies een **naam** voor de feed.
-   Kies een **titel** voor de feed. Deze titel kan eventueel later
    worden gebruikt voor publicatie.
-   Kies een **ondertitel** voor de feed. Deze ondertitel kan eventueel
    later worden gebruikt voor publicatie.
-   Geef een **omschrijving** voor de feed. De omschrijving is optioneel
    en wordt niet gebruikt voor publicatie.
-   Klik op **opslaan**om de feed op te slaan.

Artikelen aan feed toevoegen (filter-opties)
--------------------------------------------

Na het aanmaken van een nieuwe feed, is deze nog helemaal leeg. Je kan
artikelen toevoegen met behulp van de filter-opties.

![Use filters to determine the articles to be shown in your
feed](../images/feed-filters.png)

-   Selecteer in het linkeroverzicht onder **Feeds**de feed waaraan je
    artikelen wilt toevoegen.
-   Ga naar het tabblad **Filter-opties**om de uiteindelijke feed samen
    te stellen. Je ziet hier een 6-tal filtercriteria, waarmee je
    artikelen kan opnemen of uitsluiten in de feed.

Alleen gerubriceerde artikelen kunnen worden opgenomen in een feed.

1.  Kies daarom eerst de
    [rubriek(en)](./het-maken-van-artikel-rubrieken.md)
    met de artikelen die je wilt opnemen.
2.  Kies van welke auteurs je de
    [atikelen](./het-maken-van-artikelen-voor-in-een-feed.md)
    wil toevoegen
3.  Kies de taal van de artikelen
4.  Kies het aantal artikelen dat maximaal in de feed wordt getoond.
5.  Kies hoe je de artikelen wilt sorteren
6.  Kies tot slot of je alleen artikelen wil opnemen die geschreven zijn
    voor of na een bepaalde datum.

Klik op **opslaan** om de filtercriteria te bewaren.

In het tabblad **Voorvertoning** zie je nu de feed volgens de nieuwe
filtercritera.

Feed adressen (RSS en Atom)
---------------------------

De feed kan je uiteindelijk publiceren in twee verschillende formaten:

-   **RSS** – Dit is wereldwijd de meest gebruikte standaard voor web
    feeds, en wordt vooral gebruikt voor weblogs. Veel kranten,
    nieuwsites (zoals Nu.nl) publiceren hun content via RSS.
-   **Atom** – Dit is feitelijk het volwassen broertje van RSS. Het is
    krachtiger en beter configurabel dan RSS, maar ook lastiger om
    bijvoorbeeld er een XSLT voor te schrijven.

Dit zijn gestandaardiseerde formaten die door vrijwel iedere feedreader
worden ondersteund.

Vanzelfsprekend kan je de feeds ook in je e-mailings en webpagina's
opnemen. Gebruik hiervoor de [loadfeed](./de-loadfeed-functie.md) tag.

`{loadfeed feed="http://vicinity.picsrv.net/feed/rss/000/"}`

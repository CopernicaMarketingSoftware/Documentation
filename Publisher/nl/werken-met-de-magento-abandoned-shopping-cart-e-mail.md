In dit artikel gaan we in op de Abandoned Shopping Cart e-mail. Hoe
werkt het template en hoe kan je deze aanpassen naar je eigen smaak? De
benodigde gegevens (demo Magento template en demo database) kan je
middels een druk op de knop in de software inladen. Je hebt hiervoor
geen gekoppelde webwinkel nodig.

Als je al een koppeling hebt met je Magento webwinkel, dan is het
belangrijk dat je de personalisatievelden in de template overeenkomen
met de namen van de velden in je database en de naam van de collectie.
De gebruikte velden en selecties worden verderop in dit artikel
uitgebreid toegelicht.

![abandoned\_email.png](../images/abandoned_email.png)

Het inladen van de demo data
----------------------------

**Als je nog niet over een Magentodatabase beschikt, kan je een
voorbeelddatabase inladen. Als je al wel over een database beschikt, is
het belangrijk dat je straks de verwijzingen vanuit de template aanpast
naar de collectienaam en veldnamen in je database.**

-   Ga naar beheer en selecteer het account waarnaartoe je de data wilt
    laden
-   Kies in het accountmenu voor *Voorbeelddata importeren*
-   Kies Magento database en druk op ‘*Voorbeelddata importeren*’. Het
    inladen van de gegevens zal direct starten. Wanneer het inladen van
    de gegevens is afgerond, vind je de database ‘Magento’ in de lijst
    van databases en selecties onder *Profielen*.

### **Inladen van de template en het document**

Ga opnieuw naar *Voorbeelddata importeren*, maar kies nu *Magento
template (Engels)* uit de lijst.

De volgende data zal worden ingeladen

-   De template (*Magento*)
-   Een document (*Abandoned cart e-mail*)

Een XSLT-bestand (*MagentoProduct*). Dit bestand kan je terugvinden in
het onderdeel *Stijl*. De XSLT zet XML-feed uit de Magento product feed
om naar HTML zodat het voor de browser leesbaar is.

### **De abandoned cart mailing gepersonaliseerd testen**

Om de mail met personalisatie in werking te zien dien je een profiel uit
de database *Magento* in te stellen als standaardbestemming.
Het profiel dient een aantal producten te hebben in
decollectie *BasketProducts*. Je kan een profiel dat aan deze eisen
voldoet vinden door op de selectie *RecentAbandonedCart* te klikken.
Klik op een van de profielen en klik onderin het scherm
op Standaardbestemming. Ga naar E-mailings en bekijk het document door
onderin op*Voorbeeldweergave gepersonaliseerd* te drukken. Je ziet nu
het document met hierin de producten uit het winkelwagentje van
de standaardbestemming.

### **Benodigde velden en selecties**

De *Magento abandoned cart *template werkt met zowel een selectie als
met een miniselectie.

Als een klant een product aan het winkelwagentje toevoegt, wordt dit
automatisch aan Copernica doorgegeven. Er wordt dan in de collectie
*BasketProducts* een subprofiel aangemaakt met hierin gegevens over het
product.

-   Een klant wordt opgeslagen als een profiel in de database *Magento*
-   Een winkelwagenproduct wordt opgeslagen als een subprofiel in
    de collectie *BasketProducts*

### **De volgende gegevens moeten in ieder geval aanwezig zijn**

-   De collectie met de naam** BasketProducts\
    **Hierin bevinden zich de winkelwagen producten. Deze producten zijn
    opgeslagen als losse subprofielen.
-   Het veld** quantity **in de collectie** BasketProducts\
    **Als iemand van 1 product meerdere exemplaren heeft toegevoegd, dan
    wordt het aantal in dit veld opgeslagen.
-   Het subprofielveld** product\_id\
    **Dit is het product id en wordt in de template gebruikt om de
    juiste product feed in te laden vanuit de Magento webshop.
-   Het subprofiel veld** price\
    **Dit veld bevat de prijs van een enkel product.
-   Het subprofielveld** total\_price\
    **Hierin bevindt zich het totaalbedrag van een product. Zodra iemand
    twee exemplaren van een product ter waarde van 5 euro heeft
    toegevoegd aan het winkelmandje, komt in dit veld de waarde (2\*5=)
    10 te staan. Dus de vermenigvuldiging van het veld price en
    quantity. Let op, deze berekening vindt in Magento plaats, en dus
    voor synchronisatie met Copernica.

### **De selecties**

Voor de *Abandoned shopping cart* mail worden een selectie en
een miniselectie gebruikt.

De miniselectie *RecentAbandonedProducts* in
de collectie *BasketProduct* selecteert producten die in de afgelopen 7
dagen zijn toegevoegd aan het winkelmandje. Hiertoe kijkt
de miniselectie in het veld *timestamp*.

De selectie *RecentAbandonedCarts* selecteert klanten die 1 of meer
producten in hun mandje hebben zitten. Er worden dus profielen
geselecteerd die 1 of meerdere subprofielen hebben in
de miniselectie *ReventAbandonedProducts*.

### **De werking van de template**

De template werkt betrekkelijk eenvoudig. Met behulp van een smarty
foreach loop wordt decollectie *BasketProduct* doorlopen. Elk gevonden
product wordt getoond in het gepersonaliseerde document. Gebaseerd op
het product ID (uit het veld *product\_id*) wordt de XML-feed met hierin
productinformatie geladen in het document.

In de template worden verder nog het totaal aantal producten (opgeslagen
in de variabele *\$productCount*) en de totale kosten getoond
(variabele *\$productSum*).

### **Het aantal getoonde producten beperken**

In het standaardtemplate is geen limiet gebonden aan het aantal getoonde
producten. Dus als de klant 100 producten in het winkelmandje heeft,
worden ook 100 producten getoond.

Je kan het aantal getoonde producten beperken door een klein beetje
smarty code toe te voegen aan de template.

Voeg aan de bestaande foreach loop de volgende parameter toe:

`{foreach from=$profile.BasketProducts item=subprofile name=BasketLoop} `

Ontsluit vervolgens de content van de foreach met het volgende if
statement.

`{if $smarty.foreach.BasketLoop.index < 2}HTML Code  goes here{/if}`

De smarty functie index geeft de huidige iteratie terug. Dus de inhoud
tussen de open- en sluittags wordt alleen getoond wanneer de
huidige iteratie lager is dan 2. Zoals je weet beginnen computers met
tellen bij 0, dus er worden met de bovenstaande voorbeeld 3 producten in
het document getoond.

### **Toon het totaal aantal producten in het winkelmandje**

Als je het totaal aantal getoonde producten hebt beperkt (zoals
hierboven beschreven), wil je misschien toch in de e-mail vertellen
hoeveel producten er totaal in het winkelmandje aanwezig zijn.

Gebruik hiervoor de volgende code:

`In totaal heeft u {$BasketProducts|@count} producten in uw winkelmandje. Klik hier om ze allemaal te bekijken.`

Deze code telt het aantal subprofielen in
de collectie **BasketProducts**. Eventueel kan je de smarty [math
equation](http://www.smarty.net/docsv2/en/language.function.math.tpl)
functie gebruiken om het resterend aantal weer te geven.

### **De XML en de XSLT**

The XML wordt aangeleverd door Copernica en bevat informatie op
productniveau, zoals de productnaam, productbeschrijving en de
productafbeelding. DeXML wordt ingeladen met de loadfeed functie. De URL
parameter id wordt gepersonaliseerd waardoor elk product een eigen feed
krijgt.

`{loadfeed feed=$xmlurl xslt="MagentoProduct"}`

Het volledige adres is opgeslagen in de templatevariabele **{\$xmlurl}**

In de broncode van het template vind je de volledige feed url. Als je
straks met je eigen producten aan de gang gaat, dien je het eerste
(dikgedrukte) deel uit de URL aan te passen naar de gegevens van je
eigen webshop.

> **http://magentodefault.copernica.com**/index.php/copernica/product/xml/?id=

De XSLT wordt gebruikt om de (platte) informatie uit de XML om te zetten
naar opgemaakte HTML code. De gebruikte XSLT **MagentoProduct** kan je
terugvinden in het onderdeel Stijl van de software. Deze XSLT is
automatisch meegeleverd bij de voorbeeld data.

De standaard XSLT gebruikt niet alle beschikbare informatie. Je bent er
uiteraard vrij in om meer of minder productinformatie in de e-mail te
tonen. Zo kan je bijvoorbeeld de productbeschrijving toevoegen en de
afbeelding weglaten in de e-mail.

Ook is het mogelijk om van de eerste 5 producten de foto te laten zien
en alle producten die hierna volgen, slechts de productnaam, het aantal
en de prijs. Hiervoor dien je dan wel een tweede XSLT aan te maken. Met
behulp van een smarty if statement kan je aan de hand van de positie van
de huidige smarty foreach loop bepalen welke XSLT moet worden ingeladen,
en dus een andere opmaak moet krijgen.

`{if $smarty.foreach.BasketLoop.index < 4}{loadfeed feed=$xmlurlxslt="MagentoProduct"}{else}{loadfeed feed=$xmlurlxslt="MagentoProductResterend"}{/if}`

Meer informatie over XSLT en XML kan je vinden op de
website [http://www.w3schools.com/xsl/](http://www.w3schools.com/xsl/)

### **De selecties aanpassen**

Zoals je al eerder hebt kunnen lezen, wordt aan de hand van een selectie
en een miniselectie bepaald of een klant een e-mail zal ontvangen of
niet.

![selecites.png](../images/selecites.png)

De miniselectie (*RecentAbandonedProducts*) checkt of er in
de collectie producten aanwezig zijn die in de afgelopen zeven dagen  in
het winkelmandje zijn toegevoegd, maar nog niet zijn afgerekend.

De selectie (*RecentAbandonedCarts*) selecteert vervolgens profielen
(klanten) die 1 of meerdere producten in de miniselectie hebben.

Je bent volledig vrij om de huidige selectieregels aan te passen of om
regels toe te voegen om de resultaten nog verder te filteren. Het is
bijvoorbeeld mogelijk om op basis van de waarde uit het veld Storeview
een e-mail met een volledig andere lay-out te sturen, of de mail alleen
te sturen aan mensen die meer dan 5 producten in hun mandje hebben.

Je kan de huidige selecties bewerken en nieuwe toevoegen in het
dialoogvenster Selecties bewerken, welke je vindt in het *Database
management* menu in het onderdeel *Profielen*.

[Meer over selecties in
Copernica](https://beta.copernica.com/index.php?pxc=113251&current=help&pxd=.p.help.article&article=examples.abandonedcarttemplate&language=nl_NL&article=profiles.dialogs.editviews)

### **De abandoned cart e-mail versturen**

De mailing rooster je in als een wekelijkse
periodieke [bulkmailing](https://beta.copernica.com/index.php?pxc=113251&current=help&pxd=.p.help.article&article=examples.abandonedcarttemplate&language=nl_NL&article=emailings.dialogs.mailing) (interval
is 7 dagen) en richt je aan de selectie *RecentAbandonedCarts*. Er
zitten dan elke week klanten in die in de afgelopen 7 dagen een product
in het mandje hebben gegooid, maar nog niet hebben afgerekend.

Het is uiteraard ook mogelijk een heel andere interval te gebruiken. Let
dan wel goed op dat je de miniselectie *RecentAbandonedProducts* hierop
aanpast, zodat klanten niet 2 keer dezelfde mail ontvangen.

**Het is belangrijk om de mailing uitgebreid te testen, voordat deze
definitief naar de klanten gaat!**

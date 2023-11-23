# Verlaten Winkelwagen #
De verlaten winkelwagencampagne is een e-mail of een reeks e-mails die je stuurt naar klanten die hun winkelmandje achtergelaten hebben. Het doel van deze campagne is om de klant te stimuleren om alsnog over te gaan tot een aankoop.
Uit een onderzoek blijkt dat het meerendeel van de winkelwagentjes verlaten achterblijft. Hierdoor wordt er jaarlijks veel omzet misgelopen. Het goede nieuws is dat er een manier is om een deel van deze gemiste omzet toch binnen te halen.

In dit artikel wordt een een campagne opgesteld die ingezet wordt bij een verlaten winkelmandje. We gaan hierbij uit van een werkende integratie tussen de webshop en Copernica, waarbij de lege winkelmandjes dus reeds in een database in Copernica te vinden zijn. Hieronder zie je enkele afbeeldingen van onze demo-webshop.

Hier is een profiel met zijn subprofielen in collectie 'Orders' zichtbaar. In deze collectie staan alle orders, de bijbehorende producten staan in collectie 'OrderItems'. Deze scheiding wordt gemaakt om de losse producten te kunnen groeperen op basis van het ID van de order.

![](../images/shopping-cart-order.png) 
Dit is collectie 'OrderItems', waarin de losse producten staan. In veld 'OrderID' staat het ID van de order zoals we die in 'Orders' vinden. Verder staat de prijs en een locatie van een afbeelding van het product in het subprofiel.

![](../images/shopping-cart-orderitems.png)

## De template ##

Nu we de basis van de e-mailcampagne hebben gebouwd, is het tijd om de template op te gaan bouwen. De motor achter de template is de [loadsubprofile](./loadprofile-and-loadsubprofile.md)-functie, waarmee subprofielen uit de database opgehaald kunnen worden (en ook uit andere databases dan die waar het geadresseerde profiel in zit).

### Subprofielen laden met loadsubprofile ###
Allereerst halen we de meest recente orders met status Basket uit collectie 'Orders'. Hiervoor vragen we met behulp van <em>loadsubprofile</em> de subprofielen uit de collectie op, waarbij we de <em>limit</em> op 1 zetten en we (omgekeerd) sorteren op het veld 'Timestamp'. Vervolgens zeggen we dat het veld 'Status' gelijk moet zijn aan Basket, we willen namelijk geen complete orders tonen. 
De code:

```

{loadsubprofile source="Webshop:Orders" profile=$profile.id Status="Basket" assign=Order multiple=false limit=1 orderby='Timestamp desc'}

```

Vervolgens halen we alle door dit profiel achtergelaten producten op uit de collectie 'OrderItems'. Om ervoor te zorgen dat we alleen de juiste orders ophalen gebruiken het bijbehorende OrderID. Daarnaast gebruiken we nu de parameter <em>multiple</em> om aan te geven dat we meerdere (alle!) subprofielen willen.:

```

{loadsubprofile source="Webshop:OrderItems" profile=$profile.id OrderID=$Order.OrderID assign=loadedProducts multiple=true}

```

### Een loop met foreach ###
Nu begint het echte werk. We gaan iteractief door alle opgehaalde subprofielen lopen, waarbij we ze netjes laten zien in een tabel en we de totale prijs van het mandje telkens optellen. Het doorlopen van alle subprofielen gebeurt met <em>foreach</em>. De code om dit te controleren en om alleen bij de juiste subprofielen de naam van het product te laten zien is als volgt:

```

{foreach from=$loadedProducts item=loadedProduct} 
    {$loadedProduct.Product} 
{/foreach}

```

### Prijs per product ###

Het is voor de klant natuurlijk prettig om een zo compleet mogelijke weergave van z'n winkelmandje te krijgen. In de database staat voor elk product welk aantal ervan in het winkelmandje zijn achtergelaten. Ook staat de prijs per stuk in de database. We bereken de totaalprijs door met [math equation](./publisher-personalization-functions#math) de hoeveelheid met de prijs te vermenigvuldigen. We willen dat graag in de template laten zien:

```

{foreach from=$loadedProducts item=loadedProduct} 
     {$loadedProduct.ProductNaam} 
     {$loadedProduct.Hoeveelheid} 
     {$loadedProduct.Prijs} 
     {capture assign="ProductTotaal"}{math equation="x*y" x=$loadedProduct.Hoeveelheid y=$loadedProduct.Prijs}{/capture}
{/foreach}

```
### Totaalprijs ###

Om onderaan een totaalprijs van het gehele winkelmandje te kunnen plaatsen, maken we bovenaan in de template een variabele <em>basketTotal</em> aan welke we in de <em>foreach-loop</em> verhogen met de totale prijs van het product.


Buiten de <em>foreach-loop</em>:
```

{capture assign="basketTotaal"}0{/capture}

```

In de <em>foreach-loop</em> en het <em>if-statement</em>:

```

{assign var="basketTotaal" value=$basketTotaal+$productTotaal} 

```


### De complete template ###


Voor de overzichtelijkheid is het verstandig om het mandje door middel van losse blokken en structuren vorm te geven. Door al het bovenstaande samen te voegen en in de template te zetten ontstaat de code die je [hier](../downloads/HTML_Shoppingcart.txt) kunt downloaden.



### Het resultaat ###

![](../images/shopping-cart-result.png)

## De opvolgactie ##
Naast dat je template automatisch gevuld wordt, willen we ook dat de mailing automatisch verstuurd wordt. Dit doen we aan de hand van een opvolgactie. De opvolgactie wordt ingesteld op een collectie, waarin we controleren of de status naar Basket is veranderd, vervolgens wacht de opvolgactie de aangegeven tijd. Na deze tijd controleren we nog eenmaal of de order nog steeds status Basket heeft (om te zorgen dat de order niet tussendoor voltooid of gecanceled is) en dan versturen we de mailing. Hieronder wordt stapsgewijs uitgelegd hoe je deze aanmaakt. 

### Instellen

 - Ga naar Profielen
 - Selecteer de database en klik op de opvolgactie tab
 - Klik op de collectie Orders en maak een nieuwe opvolgactie aan
 - Kies de aanleiding dat een subprofiel is aangemaakt
 - Voeg als eerste tussenblok 'Bestemming checken' toe en geef aan dat het veld Status gelijk is aan de waarde 'Basket'
 - Het 'Bestemming Checken' blok verbind je vervolgens met een match link naar het volgende blok. Dit doe je door het blok aan te klikken en te kiezen voor "Een "Match" link aanmaken". Vervolgens sleep je het nieuw verschenen bolletje over het volgende blok. 
 - Je kunt nu een wachttijd instellen, dit doe je met het wachttijd blok
 - Na de wachttijd stel je nogmaals een 'Bestemming checken' blok in die kijkt of het veld 'Status' de waarde 'Basket' bevat
 - Vervolgens kies je het actie blok 'Verzend e-mail'
 - Als laatst kun je dit blok aanpassen en kies je de verlaten winkelwagen template met als bestemming het profiel zelf

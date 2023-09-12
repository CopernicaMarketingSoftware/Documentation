# Verlaten Winkelwagen
De verlaten winkelwagencampagne is een e-mail of een reeks e-mails die je stuurt naar klanten die artikelen in hun winkelwagen niet hebben afgerekend. Het doel van deze campagne is om de klant te stimuleren om alsnog over te gaan tot een aankoop. In dit artikel wordt een een campagne opgesteld die ingezet wordt bij een verlaten winkelmandje. We gaan hierbij uit van een werkende integratie tussen de webshop en Copernica, waarbij de artikelen reeds in een database in Copernica te vinden zijn.

## Aanbevolen databasestructuur
In onderstaande screenshots is een profiel zichtbaar met subprofielen in de collectie 'Orders' en 'OrderItems'. In de 'Orders' collectie staat de algemene informatie van de bestellingen en in de collectie 'OrderItems' de daadwerkelijk producten. Door deze opzet is het mogelijk om door middel van het 'OrderID' de producten in te laden in je template.

![](../images/shopping-cart-order.png)

![](../images/shopping-cart-orderitems.png)

## Gegevens inladen in je e-mail
Om de gegevens vanuit de subprofielen te tonen in de e-mail gebruik je de [loadsubprofile](./loadprofile-and-loadsubprofile.md)-functie. Hiervoor vragen we met behulp van <em>loadsubprofile</em> de subprofielen uit de collectie op, waarbij we de <em>limit</em> op 1 zetten en we (omgekeerd) sorteren op de veld 'Timestamp'. Vervolgens zeggen we dat het veld 'Status' gelijk moet zijn aan 'basket'. We willen namelijk geen complete orders tonen. Het resultaat slaan we op in de variabele $Order.

```
{loadsubprofile source="Webshop:Orders" profile=$profile.id assign=Order multiple=false Status="Basket" limit=1 orderby='Timestamp desc'}
```

Vervolgens willen we alle subprofielen uit de collectie 'OrdersItems' ophalen die horen bij de order die uit bovenstaande code is gekomen. Hiervoor gebruiken we `OrderID=$Order.OrderID`. Daarnaast gebruiken we nu de optie `multiple=true` alle subprofielen die overeenkomen met het OrderID op te halen. Het resultaat slaan we op in de variabele $loadedProducts.

```
{loadsubprofile source="Webshop:OrderItems" profile=$profile.id OrderID=$Order.OrderID assign=loadedProducts multiple=true}
```

Bij het gebruik van `multiple=true` wordt het resultaat in een array (lijst van elementen) opgeslagen. Om deze gegevens in je template zichtbaar te krijgen, gebruik je [foreach](https://www.smarty.net/docs/en/language.function.foreach.tpl) om door elk element te lopen. De code om bijvoorbeeld de naam van ieder product te tonen is als volgt:

```
{foreach from=$loadedProducts item=loadedProduct} 
    {$loadedProduct.Product} 
{/foreach}
```

### Extra informatie tonen
Het is voor de klant fijn om een zo compleet mogelijke weergave van z'n winkelmandje te krijgen. In de collectie 'OrderItems' staat bij ieder product de prijs (per product) en welk aantal ervan in het winkelmandje zijn achtergelaten. Met deze gegevens is het mogelijk om de totaalprijs per product te tonen. We bereken de totaalprijs door met [math equation](https://www.smarty.net/docs/en/language.function.math.tpl) de hoeveelheid met de prijs te vermenigvuldigen. De code is als volgt:

```
{foreach from=$loadedProducts item=loadedProduct} 
     Productnaam: {$loadedProduct.ProductNaam} 
     Aantal: {$loadedProduct.Hoeveelheid} 
     Prijs per product: {$loadedProduct.Prijs} 
     {capture assign="ProductTotaal"}{math equation="x*y" x=$loadedProduct.Hoeveelheid y=$loadedProduct.Prijs}{/capture}
     Totaalprijs: {$productTotaal}
{/foreach}
```
===Tot hier===
### Totaalprijs
Om onderaan een totaalprijs van het gehele winkelmandje te kunnen plaatsen, maken we bovenaan in het document een variabele <em>basketTotal</em> aan welke we in de <em>foreach-loop</em> verhogen met de totale prijs van het product.


Buiten de <em>foreach-loop</em>:
```
{capture assign="basketTotaal"}0{/capture}
```

In de <em>foreach-loop</em> en het <em>if-statement</em>:

```
{assign var="basketTotaal" value=$basketTotaal+$productTotaal} 
```

### Het complete document
Voor de overzichtelijkheid is het verstandig om het mandje in een tabel weer te geven. Door al het bovenstaande samen te voegen en in een tabel te zetten ontstaat de volgende code:

```
<table  align="center" width="600px">
    <tr align="left"><th></th><th>Product</th><th >Hoeveelheid</th><th >Prijs (1 st.)</th><th>Totaal prijs</th></tr>

    {capture assign="basketTotaal"}0{/capture}  
    
	{loadsubprofile source="Webshop:Orders" profile=$profile.id assign=Order multiple=false Status="Basket" limit=1 orderby='Timestamp desc'}

	{loadsubprofile source="Webshop:OrderItems" profile=$profile.id OrderId=$Order.OrderID assign=loadedProducts multiple=true}
  	{foreach from=$loadedProducts item=loadedProduct}    
    		<tr>
       			<td>
            		<a href="{$loadedProduct.Url}" ><img src="{$loadedProduct.AfbeeldingUrl}" width="80px"> </a>
          		</td>
          		<td>
      				{$loadedProduct.ProductNaam}
          		</td>
          		<td>
            		{$loadedProduct.Hoeveelheid}
          		</td>
          		<td>
          		  €{$loadedProduct.Prijs}
         		</td>
         		<td>
         		   	{capture assign="productTotaal"}{math equation="x*y" x=$loadedProduct.Prijs y=$loadedProduct.Hoeveelheid}{/capture}
            		€{$productTotaal}
          		</td>
        	</tr> 
	{assign var="basketTotaal" value=$basketTotaal+$productTotaal}
   	{/foreach} 
    	<tr>
		<td></td>
		<td></td>
		<td></td>
    		<td><b>Totaal prijs:</b></td>
		<td><b>€{$basketTotaal}</b></td>
	</tr>
</table>
```

### Het resultaat

![](../images/shopping-cart-result.png)

## De opvolgactie
Naast dat je document automatisch gevuld wordt, willen we ook dat de mailing automatisch verstuurd wordt. Dit doen we aan de hand van een opvolgactie. De opvolgactie wordt ingesteld op een collectie, waarin we controleren of de status naar Basket is veranderd, vervolgens wacht de opvolgactie de aangegeven tijd. Na deze tijd controleren we nog eenmaal of de order nog steeds status Basket heeft (om te zorgen dat de order niet tussendoor voltooid of gecanceled is) en dan versturen we de mailing. Hieronder wordt stapsgewijs uitgelegd hoe je deze aanmaakt. 

### Instellen
 - Ga naar Profielen
 - Selecteer de database en klik op de opvolgactie tab
 - Klik op de collectie Orders en maak een nieuwe opvolgactie aan
 - Kies als aanleiding dat een subprofiel is aangemaakt of gewijzigd en kies het veld Status en de waarde Basket
 - Als Actie kies je verstuur een opgemaakt document per e-mail en stel de wachtijd in
 - Kies vervolgens het verlaten winkelwagen document en als bestemming het profiel zelf
 - Stel als laatst op de actie een conditie in die checkt of het veld Status gelijk is aan Basket

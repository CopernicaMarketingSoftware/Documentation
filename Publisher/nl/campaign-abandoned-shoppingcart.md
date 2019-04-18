# Verlaten Winkelwagen #
Een van de meest gevraagde functies voor gebruik met onze <a href="https://www.copernica.com/nl/ondersteuning/integraties/magento-webshop-integratie-voor-email-marketing" title="Magento webshop integratie voor email marketing">Magento integratie</a> is de abandoned shopping cart, het <a title="Verlaten winkelwagens" href="https://www.copernica.com/nl/blog/verloren-winkelwagens">verlaten winkelmandje</a>. Een klant die in jouw webshop artikelen in zijn winkelmandje plaatst, maar toch weggaat zonder de order af te ronden, is een gemiste sale. Aangezien 66% van alle mandjes wordt achtergelaten zonder de order te plaatsen, loont het om <a href="https://www.copernica.com/nl/blog/3-ways-that-web-shops-are-missing-out-on-business">verlaten winkelmandjes</a>&nbsp;beter onder de aandacht te brengen. Een email campagne die hierbij past is een campagne voor verlaten winkelmandjes. Daarmee stuur je een email zodra een klant een winkelmandje in je webshop achterlaat.

In dit artikel wordt een een document opgebouwd dat kan worden ingezet bij een verlaten winkelmandjes email campagne. We gaan hierbij uit van een werkende integratie tussen de webshop van het voor dit artikel bedachte Tandenborstel BV en Copernica, waarbij de lege winkelmandjes dus reeds in een database in Copernica te vinden zijn. Hieronder zie je enkele afbeeldingen van de database van Tandenborstel BV.

Hier is een profiel met zijn subprofielen in collectie 'Baskets' zichtbaar. In deze collectie staan de (niet afgerekende) winkelmandjes, de losse producten staan in collectie 'BasketProducts'. Deze scheiding wordt gemaakt om de losse producten te kunnen groeperen op basis van het ID van de mand in 'BasketProducts'.

<img src="https://pic.vicinity.nl/image/127/0/127578/951ef5bfddf81d8cf98e08b2673a6cf5/database-tandenborstel.png" alt="" width="580" />

Dit is collectie 'BasketProducts', waarin de losse producten staan. In veld 'BasketID' staat het ID van de mand zoals we die in 'Baskets' vinden. Verder staat de prijs en een locatie van een afbeelding van het product in het subprofiel.


<img src="https://pic.vicinity.nl/image/127/0/127579/9cf1c46374d8171bc4eb20223a4df44b/database-tandenborstel-2.png" alt="" width="580" />

## Het document ##

Nu we de basis van de email campagne hebben gebouwd, is het tijd om het document op te gaan bouwen. De motor achter het document is de <a title="loadsubprofile" href="https://www.copernica.com/nl/blog/de-loadprofile-en-loadsubprofile-functies">loadsubprofile</a>-functie, waarmee subprofielen uit de database opgehaald kunnen worden (en ook uit andere databases dan die waar het geadresseerde profiel in zit).

### Subprofielen laden met loadsubprofile ###
Allereerst halen we het meest recente mandje uit collectie 'Baskets'. Hiervoor vragen we met behulp van <em>loadsubprofile</em> de subprofielen uit de collectie op, waarbij we de <em>limit</em> op 1 zetten en we (omgekeerd) sorteren op de veld 'Timestamp'. 
De code:

```
{loadsubprofile source="Toothbrush inc:Baskets" profile=$profile.id assign=loadedBasket multiple=false limit=1 orderby='Timestamp desc'}
```

Vervolgens halen we alle door dit profiel achtergelaten producten uit de collectie 'BasketProducts'. Nu gebruiken we parameter <em>multiple</em> om aan te geven dat we meerdere (alle!) subprofielen willen:

```
{loadsubprofile source="Toothbrush inc:BasketProducts" profile=$profile.id assign=loadedProducts multiple=true}
```

### Een loop met foreach ###
Nu begint het echte werk. We gaan iteratief door alle opgehaalde subprofielen lopen, waarbij we ze netjes laten zien in een tabel en we de totale prijs van het mandje telkens optellen. Het doorlopen van alle subprofielen gebeurt met <em>foreach</em>. Omdat we alleen de producten uit het meest recente winkelmandje willen laten zien (welke we hebben opgehaald met het eerste gebruik van <em>loadsubprofile</em>), gebruiken we een <em>if-statement</em> om te bepalen of 'BasketID' van het product overeen komt met de ID van het opgehaalde mandje. De code om dit te controleren en om alleen bij de juiste subprofielen de naam van het product te laten zien is als volgt:

```

{foreach from=$loadedProducts item=loadedProduct} 
  {if $loadedProduct.BasketID == $loadedBasket.id}
    {$loadedProduct.Product} 
  {/if} 
{/foreach}

```

*N.B. Als je een link naar de pagina van het product wilt opnemen in je document, dan zul je die ook in de for-each moeten laten zien. Het is dan vereist om &lt;code&gt;-tags te gebruiken. Bijvoorbeeld: &lt;code&gt;{$loadedProduct.Link}&lt;/code&gt;. *

### Prijs per product ###

Het is voor de klant natuurlijk prettig om een zo compleet mogelijke weergave van z'n winkelmandje te krijgen. In de database staat voor elk product welk aantal ervan in het winkelmandje zijn achtergelaten. Ook staat de prijs per stuk in de database. We willen dat graag in het document laten zien, samen met de totaalprijs van het artikel:

```

{foreach from=$loadedProducts item=loadedProduct} 
  {if $loadedProduct.BasketID == $loadedBasket.id} 
     {$loadedProduct.Product} 
     {$loadedProduct.Amount} 
     {$loadedProduct.Price} 
     {capture assign="productTotal"} {math equation="x*y" x=$loadedProduct.Amount y=$loadedProduct.Price} {/capture}     
     {$productTotal} 
   {/if} 
{/foreach}

```
### Totaalprijs ###

Om onderaan een totaalprijs van het gehele winkelmandje te kunnen plaatsen, maken we bovenaan in het document een variabele <em>basketTotal</em> aan welke we in de <em>foreach-loop</em> en het <em>if-statement</em> verhogen met de totale prijs van het product.


Buiten de <em>foreach-loop</em>:
```
{capture assign="basketTotal"}0{/capture}
```

In de <em>foreach-loop</em> en het <em>if-statement</em>:

```
{assign var="basketTotal" value=$basketTotal+$productTotal} 
```


### Het complete document ###


Voor de overzichtelijkheid is het verstandig om het mandje in een tabel weer te geven. Door al het bovenstaande samen te voegen en in een tabel te zetten ontstaat de volgende code:

```

&lt;table align="center" width="400px"&gt; &lt;tr&gt;&lt;th&gt;&lt;/th&gt;&lt;th&gt;Product&lt;/th&gt;&lt;th&gt;Amount&lt;/th&gt;&lt;th&gt;Price (1 pc.)&lt;/th&gt;&lt;th&gt;Total price&lt;/th&gt;&lt;/tr&gt; {capture assign="basketTotal"}0{/capture} {loadsubprofile source="Toothbrush inc:Baskets" profile=$profile.id assign=loadedBasket multiple=false limit=1 orderby='Timestamp desc'} {loadsubprofile source="Toothbrush inc:BasketProducts" profile=$profile.id assign=loadedProducts multiple=true} {foreach from=$loadedProducts item=loadedProduct} {if $loadedProduct.BasketID == $loadedBasket.id} &lt;tr&gt; &lt;td&gt; &lt;img src="{$loadedProduct.imageurl}" width="80px"&gt; &lt;/td&gt; &lt;td&gt; {$loadedProduct.Product} &lt;/td&gt; &lt;td&gt; {$loadedProduct.Amount} &lt;/td&gt; &lt;td&gt; {$loadedProduct.Price} &lt;/td&gt; &lt;td&gt; {capture assign="productTotal"} {math equation="x*y" x=$loadedProduct.Amount y=$loadedProduct.Price} {/capture} {$productTotal} &lt;/td&gt; &lt;/tr&gt; {assign var="basketTotal" value=$basketTotal+$productTotal} {/if} {/foreach} &lt;tr&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt; &lt;td&gt;&lt;b&gt;Total price:&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;{$basketTotal}&lt;/b&gt; &lt;/td&gt;&lt;/tr&gt; &lt;/table&gt; 

```

### Het resultaat ###

<img src="https://pic.vicinity.nl/image/127/0/127581/3106c9d6ecee640fe0f223659a41707a/abandoned-shopping-cart-tandenborstel.png" alt="" width="580" />

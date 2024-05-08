# Magento

De Copernica-integratie met Magento is specifiek ontwikkeld voor Magento 2.0 en hoger. Na het koppelen van een Magento webshop in
de [web-module](https://ms.copernica.com/#/web/), zijn direct de volgende variabelen beschikbaar in je drag-and-drop-templates:

- **{$identifier.customer.$customerID}**: haal klantgegevens op aan de hand van het ID
- **{$identifier.order.$orderID}**: haal een bestelling op aan de hand van het ID
- **{$identifier.order.$orderID.customer}**: haal klantgegevens op voor deze bestelling
- **{$identifier.order.$orderID.items[]}**: haal alle items op uit deze bestelling
- **{$identifier.order.$orderID.items[].product}**: haal het product op uit deze bestelling
- **{$identifier.product.$sku}**: haal een product op aan de hand van de SKU (Stock Keeping Unit)
- **{$identifier.cart.$cartID}**: haal een winkelwagen op aan de hand van het ID
- **{$identifier.cart.$cartID.customer}**: haal klantgegevens op voor deze winkelwagen
- **{$identifier.cart.$cartID.items[]}**: haal alle items op uit het winkelwagenitem
- **{$identifier.cart.$cartID.items[].product}**: haal productgegevens op uit het winkelwagenitem

In bovenstaande voorbeelden moet je de variabelen die beginnen met een dollarteken (zoals $identifier, $orderID, $sku, enzovoort) vervangen
door de identifier van de integratie, het order-ID, de stock-keeping-unit, enzovoort. 

De integratie-identifier verwijst naar de naam die de webshop heeft binnen de lijst van integraties, en stelt je in staat om
gegevens uit meerdere webshops te halen door ze allemaal een andere identifier te geven. Bij het invoeren van de integratie in
de [web-module](https://ms.copernica.com/#/web/) heb je deze identifier moeten invoeren. Veel gebruikers kiezen als identifier de
naam van de webshop ("mijnwebshop") of gewoon "magento". Als je "magento" als identifier hebt ingevoerd, gebruik je dus: {magento.customer.$customerID}.

## Welke velden zijn er precies beschikbaar?

De gegevens die je ophaalt worden vanuit de API van Magento ingeladen in je mailing. De velden die de API teruggeeft zijn allemaal
rechtstreeks beschikbaar als Smarty variabele, dus bijvoorbeeld {$identifier.product.$sku.name} en {$identifier.product.$sku.price}.
De precies beschikbare velden zijn er te veel om op te noemen, en zijn ook niet voor elke webshop hetzelfde omdat ze afhankelijk kunnen
zijn van de Magento-versie. Voor een actueel overzicht kun je daarom het best de documentatie van de Magento-API raadplegen. 
Alle velden die worden teruggegeven door de API kun je gebruiken bij het personalizeren:

- [order](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/ordersid#operation/GetV1OrdersId)
- [cart](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/cartscartId#operation/GetV1CartsCartId)
- [product](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/productssku#operation/GetV1ProductsSku)
- [customer](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/customerscustomerId#operation/GetV1CustomersCustomerId)

Onderaan dit artikel geven we enkele voorbeelden van veelgebruikte functionaliteiten.

## Variabelen met meerdere elementen

Er zijn verschillende variabelen waarin meerdere rijen met gegevens kunnen zitten, bijvoorbeeld als je alle producten uit je webshop wilt ophalen. 
Hieronder vind je een lijst met variabelen die binnen een foreach-statement kunnen worden gebruikt:

* **{$identifier.products}**: kan worden gebruikt om over alle producten in de webshop te itereren
* **{$identifier.orders}**: kan worden gebruikt om over alle bestellingen in de webshop te itereren
* **{$identifier.carts}**: kan worden gebruikt om over alle winkelwagens in de webshop te itereren

En, zoals je hierboven al zag, zijn er ook variabelen om alle items van een order of alle items van een winkelwagen op te halen.

**Voorbeeld om alle beschikbare producten te tonen:**
```text
{foreach from=$identifier.products item="product"}
    {$product.name}
{/foreach}
```

Overiges, dit zijn voor de meeste webshops nogal veel producten, dus erg zinvol is bovenstaande code vaak niet. Het wordt
al een stuk handiger als je wat *modifiers* gebruikt om te zoeken naar specifieke producten or bestellingen.

## Modifiers

Normaal gesproken gebruik je modifiers om teksten te filteren, bijvoorbeeld om hoofdletters om te zetten naar kleine letters, of om
HTML code te escapen. Modifiers kunnen echter ook worden ingezet om lijsten te filteren en te sorteren. Hiervoor hebben we de 
volgende modifiers:

* **filter**: hiermee haal je enkel elementen ophalen die voldoen aan een specifieke waarde
* **orderby**: hiermee geef je aan in welke volgorde je de elementen wilt ophalen
* **limit**: hiermee geef je aan hoeveel elementen opgehaald moeten worden

### Filters
Je kunt voor Magento filters toepassen om alleen elementen op te halen die voldoen aan specifieke voorwaarden. 
Beschikbare filters zijn:
* **price**: filter op prijs
* **sku**: filter op SKU

Je kunt de volgende variaties van filters gebruiken:
* `filter:"price":">":15` - haalt alleen producten op waarvan de prijs groter is dan 15
* `filter:"sku":"test"` - als de operator wordt weggelaten, gaan we uit van een 'is gelijk aan'-vergelijking
* `filter:"sku"` - als ook de waarde is weggelaten, kijken we of er in ieder geval een waarde aanwezig is

**Voorbeeld:**
```text
{foreach from=$identifier.products|filter:"price":"<":15 item="product"}
    {$product.name}
{/foreach}
```
Dit toont alle producten uit de webshop waarvan de prijs lager is dan 15.

### Orderby
Met de orderby modifier kun je de volgorde bepalen waarin de elementen worden opgehaald. 
Je kunt zowel oplopend als aflopend sorteren op een specifiek veld, bijvoorbeeld prijs.

* `orderby:"price"` - sorteert op prijs, standaard in oplopende richting    
* `orderby:"price":"desc"` - sorteert aflopend op prijs

**Voorbeeld:**
```text
{foreach from=$identifier.products|orderby:"price":"desc" item="product"}
    {$product.name}
{/foreach}
```

### Limit 
Met de limit modifier kun je aangeven hoeveel elementen moeten worden opgehaald.

**Voorbeeld:**
```text
{foreach from=$identifier.products|limit:5 item="product"}
    {$product.name}
{/foreach}
```

### Combinatie van modifiers
Je kunt verschillende modifiers combineren om specifieke resultaten te krijgen, bijvoorbeeld:

```text
{foreach from=$identifier.products|filter:"price":"<":15|orderby:"price"|limit:5 item="product"}
    {$product.name}
{/foreach}
```

Met deze Smarty-code worden de eerste 5 producten opgehaald waarvan de prijs lager is dan 15, gesorteerd op prijs.

## Voorbeelden van veelgebruikte mogelijkheden

### Informatie van laatste order binnen een profiel ophalen

Als je binnen je template gebruik wilt maken van gegevens van de laatste order van een profiel,

```text
{foreach from=$identifier.order.$ORDERID.items item=product}
    Naam: {$product.name}
    SKU: {$product.sku}
    Aantal: {$product.qty_ordered}
    Prijs: € {$product.price_incl_tax}
    Totaal: € {$product.row_total_incl_tax}
{/foreach}

Verzendkosten: € {$identifier.order.$ORDERID.base_shipping_incl_tax}
Totaal bedrag order: € {$identifier.order.$ORDERID.base_grand_total}
```

### Alle producten tonen
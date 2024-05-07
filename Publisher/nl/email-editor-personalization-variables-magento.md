# Magento

De Copernica-integratie met Magento is specifiek ontwikkeld voor Magento 2.0. Na het toevoegen van de integratie in de [Web-module](https://ms.copernica.com/#/web/), zijn direct de volgende variabelen beschikbaar in je drag-and-drop-templates:

- **{$identifier.customer.$customerID}**: haal een klant op aan de hand van zijn ID
- **{$identifier.order.$orderID}**: haal een bestelling op aan de hand van zijn ID
- **{$identifier.order.$orderID.customer}**: haal de klant op voor deze bestelling
- **{$identifier.order.$orderID.items[]}**: haal alle items op uit deze bestelling
- **{$identifier.order.$orderID.items[].product}**: haal het product op uit deze bestelling
- **{$identifier.product.sku}**: haal een product op aan de hand van zijn SKU
- **{$identifier.cart.$cartID}**: haal een winkelwagen op aan de hand van zijn ID
- **{$identifier.cart.$cartID.customer}**: haal de klant op voor deze winkelwagen
- **{$identifier.cart.$cartID.items[]}**: haal alle items op uit het winkelwagenitem
- **{$identifier.cart.$cartID.items[].product}**: haal het product op uit het winkelwagenitem

Bij het koppelen van de integratie moest je een identifier invoeren. Deze identifier is tevens de naam van de variabele waarmee je de gegevens vanuit de webshop kunt inladen. Als je bijvoorbeeld "magento" als identifier hebt ingevoerd, gebruik je dus: {$magento.customer.$customerID}.

Om te achterhalen welke waarden de verschillende elementen teruggeven, kun je de Magento-documentatie raadplegen:
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

**Voorbeeld:**
```text
{foreach from=$identifier.products item="product"}
    {$product.name}
{/foreach}
```

## Modifiers
Binnen variabelen met meerdere elementen zijn verschillende modifiers beschikbaar:

* **filters**: hiermee haal je enkel elementen ophalen die voldoen aan een specifieke waarde
* **orderby**: hiermee geef je aan in welke volgorde je de elementen wilt ophalen
* **limit**: hiermee geef je aan hoeveel elementen opgehaald moeten worden

### Filters
Je kunt filters toepassen om alleen elementen op te halen die voldoen aan specifieke voorwaarden. 
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
Dit toont alleen producten waarvan de prijs lager is dan 15.

### Orderby
Met de orderby modifier kun je de volgorde bepalen waarin de elementen worden opgehaald. 
Je kunt zowel oplopend als aflopend sorteren op een specifiek veld, bijvoorbeeld prijs.

- * `orderby:"price"` - sorteert op prijs, standaard in oplopende richting    
- * `orderby:"price":"desc"` - sorteert aflopend op prijs

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

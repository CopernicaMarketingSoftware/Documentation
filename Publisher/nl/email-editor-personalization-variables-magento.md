# Magento

Onze integratie is ontwikkeld voor Magento 2.0. De volgende variabelen zijn beschikbaar:
- [{$identifier.order.ORDER_ID.VELD}](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/ordersid#operation/GetV1OrdersId)
    - Voorbeeld 1: `{$magento.order.1234.grand_total}`
    - Voorbeeld 2: `
- [{$identifier.cart.CART_ID.VELD}](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/cartscartId#operation/GetV1CartsCartId)
- [{$identifier.product.SKU.VELD}](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/productssku#operation/GetV1ProductsSku)
- [{$identifier.customer.CUSTOMER_ID.VELD}](https://adobe-commerce.redoc.ly/2.4.7-admin/tag/customerscustomerId#operation/GetV1CustomersCustomerId)

Klik op de link van een specifieke variabele om de mogelijke opties te bekijken.

@todo
* **{$identifier.order.$orderID}**: fetch an order by its ID
* **{$identifier.order.$orderID.customer}**: fetch the customer for this order
* **{$identifier.order.$orderID.items[].product}**: fetch the product from the order item
* **{$identifier.product.sku}**: fetch a product by its SKU
* **{$identifier.cart.$cartID}**: fetch a cart by its ID
* **{$identifier.cart.$cartID.customer}**: fetch the customer for this cart
* **{$identifier.cart.$cartID.items[].product}**: fetch the product from the cart item

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

## Voorbeelden

### Alle producten tonen


### Totaal bedrag ophalen van een order


### Product informatie ophalen van laatste order

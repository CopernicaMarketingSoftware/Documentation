# Personaliseren met gegevens vanuit een Magento-webshop

Als je een Magento-webshop hebt gekoppeld aan je Copernica-account, kun je de data vanuit die webshop benaderen met Smarty-variabelen. 
Hierdoor kun je eenvoudig mailings voorzien van gegevens over producten, bestellingen, klanten en winkelwagens. De gegevens worden in 
real-time uitgelezen vanuit de webshop, zodat je altijd actuele prijs- en productinformatie in je mailings hebt.

### Hoe koppel je een webshop?

Je kunt een webshop koppelen in de [web-module](https://ms.copernica.com/#/web/). Dit werkt voor alle Magento webshops vanaf versie 2.0. 
Lagere versies worden niet ondersteund.

## De "webshop identifier"

Als je in de [web-module](https://ms.copernica.com/#/web/) een webshop-koppeling maakt, word je gevraagd om een "webshop identifier" 
in te voeren. Dit is belangrijk, want dit is tevens de naam van de Smarty-variabele waarmee alle gegevens vanuit de webshop kunnen worden ingeladen. 
Als je meerdere webshops koppelt, en ze allemaal een andere identifier geeft, dan kun je dus ook de gegevens uit verschillende webshops in je 
mailings combineren.

Voor het gemak gaan we er nu even van uit dat jouw webshop is gekoppeld met de naam "mywebshop". Hierdoor kun je in je mailings de variabele 
{$mywebshop} gebruiken om data vanuit de webshop in te laden. Als er in de webshop een product met ID "123456" bestaat, kun je in je mailings 
hierdoor verwijzen naar productinformatie:

```
Product {$mywebshop.product.123456.title|escape} kost {$mywebshop.product.123456.price|escape}.
```

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

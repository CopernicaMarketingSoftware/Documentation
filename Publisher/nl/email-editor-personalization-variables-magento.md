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

## Veelgebruikte personalisatie variabelen
| **Variabele**                                            | **Toepassing**                                                                                                                  |
|----------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------|
| {$product.name}                                          | Naam van het product                                                                                                            |
| {$product.price}                                         | Prijs van het product                                                                                                           |
| {$product.price.currency}                                | Toon enkel de currency van het product                                                                                          |
| {$product.price.value}                                   | Toon enkel de waarde van het product                                                                                            |
| {$product.created_at}                                    | Aanmaakdatum van het product                                                                                                    |
| {$product.created_at.timestamp}                          | UNIX-tijdstempel van de aanmaakdatum van het product                                                                            |
| {$product.custom_attributes.short_description}           | Korte bedrijving van het product                                                                                                |
| {$product.custom_attributes.short_description\|unescape} | Korte beschrijving van het product zonder HTML-code                                                                             |
| {$product.custom_attributes.description}                 | Uitgebreide beschrijving van het product                                                                                        |
| {$product.custom_attributes.description\|unescape}       | Uitgebreide beschrijving van het product zonder HTML-code                                                                       |
| {$product.custom_attributes.image}                       | Afbeeldingsnaam van het product.  Voorbeeld: https://webshop.domein.nl/media/catalog/prodcut/{$product.custom_attributes.image} |
| {$product.custom_attributes.url_key}                     | URL van het product.  Voorbeeld: https://webshop.domein.nl/{$product.custom_attributes.url_key}.html                            |

## Voorbeeld 1 - Tonen van de 5 meest recent toegevoegde producten

In dit voorbeeld leer je hoe je de vijf nieuwste producten uit je webshop kunt laden in je e-mailtemplate.

### Stap 1 - Structuurelementen toevoegen
Begin met het toevoegen van drie structuren aan je e-mailtemplate. Gebruik hiervoor de volgende container-opties:
- Bovenste structuur: 1 container
- Middelste structuur: 2 containers, waarbij de linker container een breedte heeft van 120
- Onderste structuur: 1 container

### Stap 2 - Foreach-statement toevoegen
Voeg in de bovenste structuur een tekstblok toe met het volgende Smarty foreach-statement:
```
{foreach from=$identifier.products|orderby:"id":"desc"|limit:5 item="product"}
```
Dit statement zorgt ervoor dat de vijf meest recent toegevoegde producten worden opgehaald, gesorteerd op ID. Vervang 'identifier' door de integratie-identifier die je hebt opgegeven bij het aanmaken van je integratie.

In de onderste structuur voeg je een tekstblok toe om het foreach-statement af te sluiten:
```
{/foreach}
```

### Stap 3 - Blokken en Smarty-code toevoegen
In de middelste structuur heb je nu twee containers, waarbij de linker container een breedte heeft van 120.

#### Linker container
Voeg een afbeeldingsblok toe in de linker container. Voor het afbeeldingspad in je afbeeldingsblok gebruik je:
```
https://webshop.domein.nl/media/catalog/product/{$product.custom_attributes.image}
```

Voor de link in je afbeeldingsblok gebruik je:
```
https://webshop.domein.nl/{$product.custom_attributes.url_key}.html
```

*Let op: vervang 'webshop.domein.nl' door de URL van je eigen webshop.*

#### Rechter container
Voeg drie elementen toe in de rechter container, onder elkaar:
- tekstblok
- tekstblok
- knop

In het eerste tekstblok plaats je:
```
{$product.name}
```

In het tweede tekstblok plaats je:
```
{$product.custom_attributes.short_description|unescape}
```
De Smarty modifier `|unescape` zorgt ervoor dat HTML in de tekst wordt omgezet naar leesbare code in je template.

Voor de knop gebruik je als link:
```
https://webshop.domein.nl/{$product.custom_attributes.url_key}.html
```

en als knoplabel:
```
€ {$product.price.value}
```

### Stap 4 - Controle
Je blok ziet er nu als volgt uit:

![Magento voorbeeld 1](../images/nl/magento_vb1.png)

In de voorvertoning kun je nu de weergave van de e-mail zien. Je kunt de opmaak van de blokken naar wens aanpassen.

## Voorbeeld 2 - Tonen van informatie van bestelling 

In dit voorbeeld leer je hoe je de informatie van een bestelling uit je webshop kunt inladen in je e-mailtemplate.

### Stap 1 - Structuurelementen toevoegen
Begin met het toevoegen van vijf structuren aan je e-mailtemplate. Gebruik hiervoor de volgende container-opties:
- Eerste structuur: 1 container
- Tweede structuur: 2 containers, waarbij de linker container een breedte heeft van 120
- Derde structuur: 1 container
- Vierde structuur: 1 container
- Vijfde structuur: 1 container

### Stap 2 - Foreach-statement toevoegen
Voeg in het eerste structuurelement een tekstblok toe met het volgende Smarty foreach-statement:
```
{foreach from=$identifier.order.$orderID.items item=order}
```
Vervang 'identifier' door de integratie-identifier die je hebt opgegeven bij het aanmaken van je integratie. 
De variabele $orderID vervang je met de order ID van de bestelling.

In het vierde structuurelement voeg je een tekstblok toe om het foreach-statement af te sluiten:
```
{/foreach}
```

### Stap 3 - Tonen van informatie per product
In het tweede structuurelement heb je nu twee containers, waarbij de linker container een breedte heeft van 120.

#### Linker container
Voeg een afbeeldingsblok toe in de linker container. Voor het afbeeldingspad in je afbeeldingsblok gebruik je:
```
https://webshop.domein.nl/media/catalog/product/{$product.custom_attributes.image}
```

Voor de link in je afbeeldingsblok gebruik je:
```
https://webshop.domein.nl/{$product.custom_attributes.url_key}.html
```

*Let op: vervang 'webshop.domein.nl' door de URL van je eigen webshop.*

#### Rechter container
Voeg een tekstblok toe aan de rechter container. Hierin plaats je:

```
{$order.product.name}
​SKU: {$order.product.sku}
Aantal: {$order.qty_ordered}
Prijs: € {$order.price_incl_tax|number_format:2}
```

De waarde {$order.product.name} maak je dikgedrukt.

### Stap 4 - Tonen van totaal prijs per product 
Voeg in het vierde structuurelement een tekstblok toe met de volgende tekst:
```
Totaal: € {$order.row_total_incl_tax|number_format:2}
```

Deze tekst lijn je rechts uit.

### Stap 5 - Tonen van informatie gehele bestelling
In het laatste structuurelement voeg je een tekstblok toe.
Hierin plaats je:
```
Verzendkosten: € {$identifier.order.$orderID.base_shipping_incl_tax|number_format:2}
Totaal bedrag order: € {$identifier.order.orderID.base_grand_total|number_format:2}
```

Vervang 'identifier' door de integratie-identifier die je hebt opgegeven bij het aanmaken van je integratie. 
De variabele $orderID vervang je met de order ID van de bestelling.

Lijn deze tekst rechts uit.

### Stap 6 - Controle
Je blok ziet er nu als volgt uit:

![Magento voorbeeld 2](../images/nl/magento_vb2.png)

In de voorvertoning kun je nu de weergave van de e-mail zien. Je kunt de opmaak van de blokken naar wens aanpassen.

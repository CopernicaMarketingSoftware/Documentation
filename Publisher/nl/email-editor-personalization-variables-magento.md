# Personaliseren met gegevens vanuit een Magento-webshop

Als je een Magento-webshop hebt gekoppeld aan je Copernica-account, kun je de data vanuit die webshop benaderen met Smarty-variabelen. Hierdoor kun je eenvoudig mailings voorzien van gegevens over producten, bestellingen, klanten en winkelwagens. De gegevens worden in real-time uitgelezen vanuit de webshop, zodat je altijd actuele prijs- en productinformatie in je mailings hebt.

### Hoe koppel je een webshop?

Je kunt een webshop koppelen in de [web-module](https://ms.copernica.com/#/web/). Dit werkt voor alle Magento webshops vanaf versie 2.0. Lagere versies worden niet ondersteund.

## De "webshop identifier"

Als je in de [web-module](https://ms.copernica.com/#/web/) een webshop-koppeling maakt, word je gevraagd om een "webshop identifier" in te voeren. Dit is belangrijk, want dit is tevens de naam van de Smarty-variabele waarmee alle gegevens vanuit de webshop kunnen worden ingeladen. Als je meerdere webshops koppelt, en ze allemaal een andere identifier geeft, dan kun je dus ook de gegevens uit verschillende webshops in je mailings combineren.

Voor het gemak gaan we er nu even van uit dat jouw webshop is gekoppeld met de naam "mywebshop". Hierdoor kun je in je mailings de variabele {$mywebshop} gebruiken om data vanuit de webshop in te laden. Als er in de webshop een product met ID "123456" bestaat, kun je in je mailings hierdoor verwijzen naar productinformatie:

```
Product {$mywebshop.product.123456.title|escape} kost {$mywebshop.product.123456.price|escape}.
```

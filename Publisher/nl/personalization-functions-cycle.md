# Personalizatie functies: cycle

De *cycle* functie kan gebruikt worden om te wisselen tussen een set waarden. 
Je kunt deze bijvoorbeeld gebruiken om twee kleuren af te wisselen in de 
regels van een tabel, om door een array met kleuren te loopen of door 
een andere array van waarden.

## Parameters

| Parameter naam | Omschrijving                                    |
|----------------|-------------------------------------------------|
| name           | Naam van de cycle                               |
| values         | Waarden in de cycle (in array of met delimiter) |
| print          | Wel/niet de waarde printen                      |
| advance        | Wel/niet doorgaan naar de volgnde waarde        |
| delimiter      | Delimiter voor cycle                            |
| assign         | Variabele om output in op te slaan              |
| reset          | Reset naar eerste waarde                        |

De enige vereiste waarde zijn de *values*. Als er geen informatie verder 
wordt meegegeven is de naam "default" en wordt automatisch doorgewisseld 
en geprint. De standaard delimiter die de waardes scheidt is de komma.

## Voorbeelden

Het volgende voorbeeld laat zien hoe je kleuren van de regenboog toe 
kunt wijzen als product kleuren.

    {foreach from $products item=product}
        {cycle values="red;orange;yellow;green;blue;indigo;purple, name=$product.color, delimiter=";"}
    {\foreach}
    
Natuurlijk vereist dit voorbeeld een array met producten. Nadat deze code 
is gerund hebben alle producten een kleur die later weer opgevraagd kan worden.
Dit voorbeeld gebruikt ook de [foreach functie](./personalization-functions-foreach.md).
    
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [foreach functie](./personalization-functions-foreach.md)

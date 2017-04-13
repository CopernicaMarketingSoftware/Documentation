# Personalizatie modifier: *cat*

De *cat* modifier accepteert een string en plakt deze aan de variabele die 
gemodificeerd wordt. In plaats van een string kun je ook een variabele meegeven
als deze een string bevat. Je kunt zo twee variabelen aan elkaar plakken.

## Voorbeeld

Laten we zeggen dat we willen kijken naar de uniekheid van de volledige naam 
van onze gebruikers. We kunnen dan hun voornaamd en achternaam aan elkaar 
plakken. Laten we ook zeggen dat de `$firstname` gedefinieerd is als "John" 
en de `$lastname` als "Doe". We kunnen dan als volgt de *cat* modifier gebruiken 
om ze aan elkaar te plakken.

    {$firstname}
    {$lastname}
    {$firstname|cat:$lastname}
    
De output ziet eruit als volgt:

    John
    Doe
    JohnDoe

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier kun je ook vinden in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.cat.tpl).

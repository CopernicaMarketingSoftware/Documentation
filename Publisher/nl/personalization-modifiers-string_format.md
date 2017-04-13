# Personalizatie modifier: *string_format*

De *string_format* modifier formatteert strings zoals decimale getallen. 
De enige parameter is het formaat waarnaar de variabele omgezet moet worden. 
Het formaat moet geschreven worden in de syntax van de PHP functie [sprintf](http://php.net/sprintf).

## Voorbeeld

Laten we zeggen dat we het `$percentage` "45.4930" hebben berekend en 
dit netjes weer willen geven aan de gebruiker. Je kunt de volgende code 
gebruiken om de string te formatteren:

    {$percentage}
    {$percentage|string_format:"%.2f"}
    {$percentage|string_format:"%d"}

De output ziet eruit als volgt:

    45.4930
    45.50
    45

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [date_format modifier](./personalization-modifiers-date_format)

Je vindt deze modifier ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.string.format.tpl).

# Personalizatie modifier: *default*

De *default* modifier kan gebruikt worden om een standaardwaarde voor 
een variabele in te stellen. Tegenwoordig zie je veel gepersonalizeerde 
begroetingen, maar wat nou als je niet van al je klanten een naam in de 
database hebt? Dit is een van de gevallen waar *default* heel geschikt 
voor is.

De modifier heeft alleen de string voor de standaardwaarde nodig. De 
standaardwaarde van deze parameter is een enkele spatie.

## Voorbeeld

Laten we een gepersonalizeerde begroeting maken met deze modifier. We 
gebruiken de variabele `$name` hier, die geen waarde bevat.

    Beste {$name},
    Beste {$name|default},
    Beste {$name|default:"klant"},

De output ziet eruit als volgt:

    Beste  ,
    Beste  ,
    Beste klant,
    
In het eerste geval printen we de inhoud van de naam uit, die niet 
bestaat. In het tweede geval printen we een standaardwaarde, maar deze 
is ook leeg. Bij het gebrek aan een naam gebruiken we in het derde voorbeeld 
alleen "klant".

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.default.tpl).

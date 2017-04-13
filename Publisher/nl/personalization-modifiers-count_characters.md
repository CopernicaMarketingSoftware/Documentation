# Personalizatie modifier: *count_characters*

De *count_characters* modifier kan gebruikt worden om het aantal karakters 
in een string weer te geven (dus niet de string zelf). Deze modifier heeft een 
parameter die aangeeft of spaties e.d. meegeteld moeten worden als karakters. 
Standaard staat deze op "false".

## Voorbeeld

Laten we zeggen dat we een `$name` hebben, "John Doe", dan kunnen we 
van deze naam het aantal karakters opvragen met de *count_characters* 
modifier. 

    {$name}
    {$name|count_characters}
    {$name|count_characters:true}

De output ziet eruit als volgt:

    John Doe
    7
    8
    
In het laatste geval wordt de spatie meegeteld, terwijl dat in het tweede 
geval niet gebeurt.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [count_words modifiers](./personalization-modifiers-count_words)
* [count_sentences modifiers](./personalization-modifiers-count_sentences)
* [count_paragraphs modifiers](./personalization-modifiers-count_paragraphs)

Deze modifier kun je ook vinden in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.count.characters.tpl).

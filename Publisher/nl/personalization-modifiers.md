# Modifiers voor variabelen

Je kunt met behulp van *modifiers* personalisatievariabelen finetunen. Een 
modifier is een soort filter waarmee je de inhoud van een variabele aanpast. 
Je kunt met een modifier bijvoorbeeld zorgen dat namen altijd met een hoofdletter
beginnen, of dat alleen de eerste 50 letters van de woonplaats in een mailing
wordt getoond (om te voorkomen dat de layout van de mail wordt opgerekt als
iemand een heel erg lange woonplaats heeft ingevoerd).

    {$naam|ucfirst}
    {$woonplaats|truncate:50}

Je kunt modifiers zelfs combineren. Als je bijvoorbeeld eerst wilt zorgen dat
de woonplaats met een hoofdletter begint, en daarna ook nog wilt zorgen dat
hij niet langer dan 50 tekens is, doe je dit als volgt:

    {$woonplaats|ucfirst|truncate:50}

De belangrijkste modifier is de |escape modifier. Met deze modifier zorg je
dat HTML code en scripts in een variabele worden omgezet naar veilige tekens. 
Als je personaliseert dan maak je vaak gebruik van gegevens die door mensen
zelf zijn ingevoerd. Meestal zijn deze gegevens correct, maar dit weet je 
nooit zeker. Om te voorkomen dat er per ongeluk ongeldig HTML code of javascripts
in je mailing verschijnen, moet je deze |escape modifier altijd gebruiken in
HTML code:

    Beste {$naam|ucfirst|escape}

In bovenstaand voorbeeld wordt de eerste letter van de naam omgezet naar een 
hoofdletter, en daarna door de escape-modifier gehaald om te voorkomen dat er
per ongeluk scripts in de mailing verschijnen als iemand een ongeldige naam
heeft ingevoerd.

## Beschikbare modifiers

Het personalisatiesysteem van Copernica maakt gebruik van Smarty. Een uitgebreide
uitleg van wat er allemaal mogelijk is, en welke modifiers er allemaal zijn 
kun je vinden [op de Smarty website](http://www.smarty.net/docs/en/).
De volgende modifiers worden door Copernica ondersteund:

| Modifier                                                                                           | Omschrijving                                                           |
|----------------------------------------------------------------------------------------------------|------------------------------------------------------------------------|
| **{$variable\|[base64_encode](./personalization-modifiers-base64_encode.md)}**                     | variable naar base64 encoden                                           |
| **{$variable\|[capitalize](./personalization-modifiers-capitalize.md)}**                           | eerste letter van elk woord omzetten naar een hoofdletter              |
| **{$variable\|[cat](./personalization-modifiers-cat.md)}**                                         | tekst achter een variabele plakken                                     |
| **{$variable\|[ceil](./personalization-modifiers-ceil.md)}**                                       | getal naar boven afronden                                              |
| **{$variable\|[count](./personalization-modifiers-count.md)}**                                     | aantal elementen in variabele (handig als $variabele een array is)     |
| **{$variable\|[count_characters](./personalization-modifiers-count_characters.md)}**               | aantal karakters in een string                                         |
| **{$variable\|[count_paragraphs](./personalization-modifiers-paragraphs.md)}**                     | aantal paragrafen in een string                                        |
| **{$variable\|[count_sentences](./personalization-modifiers-sentences.md)}**                       | aantal zinnen in een string                                            |
| **{$variable\|[count_words](./personalization-modifiers-count_words.md)}**                         | aantal woorden in een string                                           |
| **{$variable\|[date_format](./personalization-modifiers-date_format.md)}**                         | opmaken van een datum                                                  |
| **{$variable\|[default](./personalization-modifiers-default.md)}**                                 | standaardwaarde indien een variabele niet bestaat                      |
| **{$variable\|[escape](./personalization-modifiers-escape.md)}**                                   | scripts en html code filteren                                          |
| **{$variable\|[explode](./personalization-modifiers-explode.md)}**                                 | string opsplitsen en converteren naar een array                        |
| **{$variable\|[htmlspecialchars_decode](./personalization-modifiers-htmlspecialchars_decode.md)}** | tegenovergestelde van escape: tekst weer terugbrengen naar html        |
| **{$variable\|[html_entity_decode](./personalization-modifiers-html_entity_decode.md)}**           | html entities weer terugbrengen oorspronkelijke tekens                 |
| **{$variable\|[http_build_query](./personalization-modifiers-http_build_query.md)}**               | variabele omzetten naar een query string                               |
| **{$variable\|[indent](./personalization-modifiers-indent.md)}**                                   | tekst inspringen met spaties                                           |
| **{$variable\|[json_decode](./personalization-modifiers-json_decode.md)}**                         | json code omzetten naar gewone variabele                               |
| **{$variable\|[json_encode](./personalization-modifiers-json_encode.md)}**                         | variabele omzetten naar json (zodat het in javascript is te gebruiken) |
| **{$variable\|[lower](./personalization-modifiers-lower.md)}**                                     | tekst omzetten naar kleine letters                                     |
| **{$variable\|[md5](./personalization-modifiers-md5.md)}**                                         | tekst omzetten naar een md5 hash                                       |
| **{$variable\|[nl2br](./personalization-modifiers-nl2br.md)}**                                     | newlines in de tekst omzetten naar &lt;bt/&gt; tags                    |
| **{$variable\|[number_format](./personalization-modifiers-number_format.md)}**                     | getal opmaken                                                          |
| **{$variable\|[rand](./personalization-modifiers-rand.md)}**                                       | random nummer maken                                                    |
| **{$variable\|[regex_replace](./personalization-modifiers-regex_replace.md)}**                     | tekst filteren aan de hand van een reguliere expressie                 |
| **{$variable\|[replace](./personalization-modifiers-replace.md)}**                                 | tekst vervangen                                                        |
| **{$variable\|[sha1](./personalization-modifiers-sha1.md)}**                                       | bereken de sha1 hash van een variable                                  |
| **{$variable\|[spacify](./personalization-modifiers-spacify.md)}**                                 | tekst oprekken door spaties toe te voegen                              |
| **{$variable\|[string_format](./personalization-modifiers-string_format.md)}**                     | tekst opmaken op printf-achtige wijze                                  |
| **{$variable\|[strip](./personalization-modifiers-strip.md)}**                                     | witruimte automatische vervangen                                       |
| **{$variable\|[strip_tags](./personalization-modifiers-strip_tags.md)}**                           | html tags uit input filteren                                           |
| **{$variable\|[strstr](./personalization-modifiers-strstr.md)}**                                   | substring zoeken en retourneren                                        |
| **{$variable\|[strtotime](./personalization-modifiers-strtotime.md)}**                             | text converteren naar een tijd                                         |
| **{$variable\|[strval](./personalization-modifiers-strval.md)}**                                   | variabele omzetten naar een string                                     |
| **{$variable\|[substr](./personalization-modifiers-substr.md)}**                                   | substring selecteren                                                   |
| **{$variable\|[trim](./personalization-modifiers-trim.md)}**                                       | witruimte aan het begin en einde van een tekst verwijderen             |
| **{$variable\|[truncate](./personalization-modifiers-truncate.md)}**                               | maximum lengte voor tekst instellen                                    |
| **{$variable\|[ucfirst](./personalization-modifiers-ucfirst.md)}**                                 | eerste letter omzetten naar een hoofdletter                            |
| **{$variable\|[ucwords](./personalization-modifiers-ucwords.md)}**                                 | eerste letter van elk woord omzetten naar een hoofdletter              |
| **{$variable\|[upper](./personalization-modifiers-upper.md)}**                                     | tekst omzetten naar hoofdletters                                       |
| **{$variable\|[unserialize](./personalization-modifiers-unserialize.md)}**                         | php unserialize algoritme                                              |
| **{$variable\|[urlencode](./personalization-modifiers-urlencode.md)}**                             | variabele omzetten zodat die in een url kan worden gebruikt            |
| **{$variable\|[wordwrap](./personalization-modifiers-wordwrap.md)}**                               | automatisch newlines toevoegen aan tekst                               |
                                                                                                                                                                        
[Terug naar personalizatie](./personalization)                                                                                                                               
                                                                                                                                                                            

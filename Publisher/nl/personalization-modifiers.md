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
kun je vinden [op de Smarty website](http://www.smarty.net/docsv2/en/language.modifiers.tpl).
De volgende modifiers worden door Copernica ondersteund:

* **{$variable|base64_encode}**: variable naar base64 encoden
* **{$variable|capitalize}**: eerste letter van elk woord omzetten naar een hoofdletter
* **{$variable|cat}**: tekst achter een variabele plakken
* **{$variable|ceil}**: getal naar boven afronden
* **{$variable|count}**: aantal elementen in variabele (handig als $variabele een array is)
* **{$variable|count_characters}**: aantal karakters in een string
* **{$variable|count_paragraphs}**: aantal paragrafen in een string
* **{$variable|count_sentences}**: aantal zinnen in een string
* **{$variable|count_words}**: aantal woorden in een string
* **{$variable|date_format}**: opmaken van een datum
* **{$variable|default}**: standaardwaarde indien een variabele niet bestaat
* **{$variable|escape}**: scripts en html code filteren
* **{$variable|explode}**: string opsplitsen en converteren naar een array
* **{$variable|htmlspecialchars_decode}**: tegenovergestelde van |escape: tekst weer terugbrengen naar html
* **{$variable|html_entity_decode}**: html entities weer terugbrengen oorspronkelijke tekens
* **{$variable|http_build_query}**: variabele omzetten naar een query string
* **{$variable|indent}**: tekst inspringen met spaties
* **{$variable|json_decode}**: json code omzetten naar gewone variabele
* **{$variable|json_encode}**: variabele omzetten naar json (zodat het in javascript is te gebruiken)
* **{$variable|lower}**: tekst omzetten naar kleine letters
* **{$variable|md5}**: tekst omzetten naar een md5 hash
* **{$variable|nl2br}**: newlines in de tekst omzetten naar &lt;bt/&gt; tags
* **{$variable|number_format}**: getal opmaken
* **{$variable|rand}**: random nummer maken
* **{$variable|regex_replace}**: tekst filteren aan de hand van een reguliere expressie
* **{$variable|replace}**: tekst vervangen
* **{$variable|sha1}**: bereken de sha1 hash van een variable
* **{$variable|spacify}**: tekst oprekken door spaties toe te voegen
* **{$variable|string_format}**: tekst opmaken op printf-achtige wijze
* **{$variable|strip}**: witruimte automatische vervangen
* **{$variable|strip_tags}**: html tags uit input filteren
* **{$variable|strstr}**: substring zoeken en retourneren
* **{$variable|strtotime}**: text converteren naar een tijd
* **{$variable|strval}**: variabele omzetten naar een string
* **{$variable|substr}**: substring selecteren
* **{$variable|trim}**: witruimte aan het begin en einde van een tekst verwijderen
* **{$variable|truncate}**: maximum lengte voor tekst instellen
* **{$variable|ucfirst}**: eerste letter omzetten naar een hoofdletter
* **{$variable|ucwords}**: eerste letter van elk woord omzetten naar een hoofdletter
* **{$variable|upper}**: tekst omzetten naar hoofdletters
* **{$variable|unserialize}**: php unserialize algoritme
* **{$variable|urlencode}**: variabele omzetten zodat die in een url kan worden gebruikt
* **{$variable|wordwrap}**: automatisch newlines toevoegen aan tekst


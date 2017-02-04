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
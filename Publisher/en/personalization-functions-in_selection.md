# Personalizatie functies: in_selection

De *in_selection* functie kan gebruikt worden om te checken of een profiel 
in een gegeven selectie voorkomt. Deze functie is ontwikkeld door Copernica 
en je kunt hiermee specifieke content plaatsen voor de selecties in je 
database. Als je bijvoorbeeld een webshop hebt en genoeg data in je database 
om een selectie van moeders te maken dan kun je specifiek kinderkleren 
adverteren in mails naar deze moeders, maar deze bijvoorbeeld niet meesturen 
in de mails naar alleenstaande mannen.

Om de functie uit te voeren moet er tenminste een selectie meegegeven worden. 
Als het profiel niet gegeven wordt probeert de functie zelf het profiel 
op te vragen waarvoor gepersonalizeerd wordt.

## Voorbeeld

    {if {in_selection selection="womenwithkids"}}
        { Display your content here! }
    {/if}
    
In dit voorbeeld wordt de [if functie](./personalization-functions-if) 
gebruikt, die erg nuttig is in combinatie met deze functie. Als je jezelf 
met deze wijze van personalizatie bekend maakt en genoeg data hebt voor nuttige 
selecties kun je erg relevante mails sturen naar je klanten.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [in_miniselection functie](./personalization-functions-in_miniselection)

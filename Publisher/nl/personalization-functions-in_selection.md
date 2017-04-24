# Personalizatie functies: in_selection

De *in_selection* functie kan gebruikt worden om te checken of een 
gespecifeerd profiel in een specifieke view/selectie zit. Deze functie is 
ontwikkeld door Copernica en kan gebruikt worden om content te specialiseren 
met behulp van selecties in je database. Je kunt bijvoorbeeld een 
selectie maken van vrouwen waarvan je weet dat ze kinderen hebben en in 
je mails naar hen specifiek kinderkleren adverteren.

Om de functie uit te voeren is een selectie verplicht. Als het profiel 
niet meegegeven wordt probeert de functie zelf het profiel op te halen 
waarvoor je personalizeert.

## Voorbeeld

    {in_selection selection="womenwithkids"}}
        { Display your content here! }
    {/in_selection}
    
Door je te specializeren in 
personalizatie en goede data bij te houden kun je voor iedereen hele 
relevante mails versturen!

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [in_selection functie](./personalization-functions-in_selection)

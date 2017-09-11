# Personalisatie functies: in_selection

De *in_selection* functie kan gebruikt worden om te checken of een 
gespecificeerd profiel in een specifieke view/selectie zit. Deze functie is 
ontwikkeld door Copernica en kan gebruikt worden om content te specialiseren 
met behulp van selecties in je database. Je kunt bijvoorbeeld een 
selectie maken van vrouwen waarvan je weet dat ze kinderen hebben en in 
je mails naar hen specifiek kinderkleren adverteren.

Om de functie uit te voeren is een selectie verplicht. Als het profiel 
niet meegegeven wordt probeert de functie zelf het profiel op te halen 
waarvoor je personaliseert.

## Voorbeeld

    {in_selection selection=145}
        { Display your content here! }
    {/in_selection}

    {in_selection miniselection=54}
        { Display your content here! }
    {/in_selection}
    
Door je te specializeren in 
personalisatie en goede data bij te houden, kun je voor iedereen hele 
relevante mails versturen!

## Meer informatie

* [Personalisatie](./personalization)
* [Personalisatie functies](./personalization-functions)
* [in_selection functie](./personalization-functions-in_selection)

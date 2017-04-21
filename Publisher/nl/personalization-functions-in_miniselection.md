# Personalizatie functies: in_miniselection

De *in_miniselection* functie kan gebruikt worden om te checken of een 
gespecifeerd subprofiel in een specifieke miniview zit. Deze functie is 
ontwikkeld door Copernica en kan gebruikt worden om content te specialiseren 
met behulp van miniselecties in je database. Je kunt bijvoorbeeld een 
selectie maken van vrouwen waarvan je weet dat ze kinderen hebben en in 
je mails naar hen specifiek kinderkleren adverteren.

Om de functie uit te voeren is een miniview verplicht. Als het subprofiel 
niet meegegeven wordt probeert de functie zelf het subprofiel op te halen 
waarvoor je personalizeert.

## Voorbeeld

    {if {in_miniselection miniselection="womenwithkids"}}
        { Display your content here! }
    {/if}
    
In dit voorbeeld gebruiken we *in_miniselection* samen met de  [if function](./personalization-functions-if),
wat een erg krachtige combinatie kan zijn. Door je te specializeren in 
personalizatie en goede data bij te houden kun je voor iedereen hele 
relevante mails versturen!

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [in_selection functie](./personalization-functions-in_selection)

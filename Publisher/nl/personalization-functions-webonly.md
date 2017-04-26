# Personalizatie functies: webonly

Het {webonly} blok kan gebruikt worden om een stuk content alleen zichtbaar 
te maken in de webversie van een bericht. Als deze template gebruikt zou 
worden in een mail wordt het deel tussen de *webonly* tags genegeerd.

## Voorbeeld

    {webonly}
        Click <a href="{somepage}">here</a> to go to the homepage
    {/webonly}
    
In het voorbeeld gebruiken we het {webonly} blok om de link naar de homepage 
te verstoppen als de gebruiker in zijn mail kijkt. Deze content is alleen 
zichtbaar in de browser.
    
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Mailonly functie](./personalization-functions-mailonly)


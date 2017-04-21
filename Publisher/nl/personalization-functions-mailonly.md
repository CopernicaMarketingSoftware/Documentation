# Personalizatie functies: mailonly

Het {mailonly} blok kan gebruikt worden om een stuk code alleen zichtbaar 
te maken in de mail versie van het bericht. Als het vervolgens in de 
browser geopend wordt is de content binnen dit blok niet meer zichtbaar.

## Voorbeeld

    {mailonly}
        Click <a href="{webversion}">here</a> to view this mail in your browser
    {/mailonly}
    
In dit voorbeeld maken we gebruik van het {mailonly} block om de link 
naar de webversie te verbergen uit de webversie.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Webonly functie](./personalization-functions-webonly)

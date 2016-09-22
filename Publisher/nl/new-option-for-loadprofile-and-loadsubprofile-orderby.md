We hebben een nieuwe optie toegevoegd aan de functies loadprofile en
loadsubprofile: **orderby**

Hiermee kan je profielen of subprofielen in een oplopende of aflopende
volgorde ophalen, aan de hand van de waarde in een specifiek database of
collectieveld.

Je doet dit door de optie als parameter toe te voegen aan de
[loadprofile](https://www.copernica.com/nl/ondersteuning/de-loadprofile-en-loadsubprofile-functies)
of loadsubprofile tag

**{loadprofile orderby='\<veldnaam\> asc/desc'}**

-   Kies bij veldnaam het veld waarop moet worden gesorteerd
-   Kies vervolgens de volgorde 'asc' voor oplopend en 'desc' voor
    aflopend.

### Voorbeeld

Je hebt een collectieveld *'fruit'* en een aantal subprofielen, die
respectievelijk de waardes *Appel, Banaan, Citroen, Nectarine,
Watermeloen* hebben in het veld '*fruit*'

~~~~ {.language-php}
{loadsubprofile assign=loadedfruits multiple=true limit=2 orderby='fruit asc'}
<ul>
  Ik heb in mijn fruitschaal een:
    {foreach $loadedfruits as $loadedfruit}
      <li>{$loadedfruit.fruit}</li>
    {/foreach}
</ul>
~~~~

**Resultaat (asc):**

> *Ik heb in mijn fruitschaal een: Appel, Banaan*

**Resultaat (desc):**

> *Ik heb in mijn fruitschaal een: Watermeloen, Nectarine*

Als je geen order parameter meegeeft in je load(sub)profile, dan wordt
automatisch oplopend gesorteerd op het veld ID.

### Meer lezen

-   Meer lezen over de functies [loadprofile en
    loadsubprofile](https://www.copernica.com/nl/ondersteuning/de-loadprofile-en-loadsubprofile-functies)
-   Meer informatie over fruit:
    [http://nl.wikipedia.org/wiki/Fruit](http://nl.wikipedia.org/wiki/Fruit)


Om webformuilieren te plaatsen op een webpagina, gebruik je een speciale
code. De code kan je zowel in de template broncode, als in het document
kwijt.

### Webformulieren kunnen niet worden toegevoegd aan e-maildocumenten!

Om het webformulier aan de webpagina toe te voegen, gebruik je de
volgende tag:

`{webform name='naamwebformulier'}`

Extra opties
------------

Deze functionaliteit heeft één extra optie: **xslt=**

Hiermee kan je jouw webformulier inladen via een aangepaste of
eigen *XSLT*-bestand. Indien je geen eigen *XSLT* specificeert, wordt
automatisch teruggevallen op de standaard *XSLT*van de software.

`{webform name='naamwebformulier' xslt='naamvanxslt'}`

...waar je *naamvanxslt* vervangt met de naam van de *XSLT* die u in het
onderdeel *Stijl* hebt gemaakt.

`{survey name='naamwebformulier' xslt='adresxslt'}`

...waar je *adresxslt *vervangt met het internetadres van de *XSLT* die
elders is gehost.

Bijvoorbeeld: *http://www.uwbedrijf.nl/files/mijnxslt.xsl*

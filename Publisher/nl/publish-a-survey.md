De enquêtes die je maakt in Copernica, kan je eenvoudig in op een
webpagina publiceren met de speciale invoegtag.

De invoegtag ziet er alsvolgt uit:

`{survey name='naamvanenquête'}`

De tag kan je zowel gebruiken in de template HTML code, als in een
tekstblok in het document.

Extra opties
------------

Deze functionaliteit heeft één extra optie: **xslt=**

Hiermee kan je jouw enquête inladen via een aangepaste of eigen
*XSLT*-bestand. Indien je geen eigen *XSLT* specificeert, wordt
automatisch teruggevallen op de standaard *XSLT** *van de software.

`{survey name='naamvanenquête' xslt='naamvanxslt'}`

...waar je *naamvanxslt* vervangt met de naam van de *XSLT* die je in
het onderdeel *Stijl* hebt gemaakt.

`{survey name='naamvandenquête' xslt='http://adresxslt.com/blabla/bestand.xls'}`

...waar je *adresxslt*vervangt met het internetadres van de *XSLT* die
elders is gehost.

Bijvoorbeeld *http://www.mijnbedrijf.nl/files/mijnxslt.xsl*

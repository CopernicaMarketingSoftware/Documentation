Met de loadfeed functie kan je eenvoudig feeds in je e-mail of
webdocument laden. Je kan met deze functie een feed inladen die je in
het onderdeel Content hebt gemaakt of een feed welke elders is
samengesteld en gehost.

Syntax en gebruik
-----------------

Een feed vanuit Content inladen:

`{loadfeed feed='adres van de feed'}`

Vervang *naam* met het adres van de feed uit het het onderdeel
**Content** in Copernica. 

Dit adres achterhaal je door in Content de feed aan te klikken die je
wilt gebruiken. Je vindt hier zowel het adres van de Atom en de RSS
versie. Beide kunnen worden gebruikt binnen Copernica publicaties.

Externe feed inladen
--------------------

Met de loadfeed functie kan je ook externe RSS en Atom feeds in je
documenten publiceren:

`{loadfeed feed='http://www.eendomein.nl/feed/feed.xml'}`

Vervang *http://www.eendomein.nl/feed/feed.xml*  met het adres (url) van
de feed die elders is gepubliceerd.

![](../images/loadfeed1.png)

*Afbeelding: Load feed tag in the text block rich text editor*

Extra opties
------------

De loadfeed functie heeft een optionele extra parameter: xlst=

Gebruik *xslt=* om een eigen XSLT te gebruiken voor de feed. Wanneer je
deze parameter achterwege laat, zal worden teruggevallen op de
standaard XSLT die is geleverd in de software.

`{loadfeed feed='naam' xslt='naamvanxslt'}`

Vervang *naamvanxslt* door de naam van de XSLT uit het onderdeel Stijl
van de marketing software.

`{loadfeed feed='adres' xslt='adresvanxslt'}`

Vervang *adresvanxslt* door de internetlocatie van de XSLT, bijvoorbeeld
http://uwdomein.com/feed.xsl

Een feed selecteren in een tekstblok
------------------------------------

Het is tevens mogelijk om een feed te publiceren zonder hiervoor de tag
en naam van de feed te hoeven onthouden. In elk tekstblok vind je een
optie om speciale content in te voegen, zoals webformulieren en dus RSS
of Atom feeds. Klik vanuit het tekstblok op het type publicatie en
selecteer in de lijst het gewenste item en eventueel een XLST. Let op,
de publicatie vervangt de reeds aanwezige content in het tekstblok.

![](../images/loadfeedfunction.png)

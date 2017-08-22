# De loadfeed functionaliteit

Met de loadfeed functie kun je eenvoudig feeds in je e-mail of
webdocument laden. Je kunt met deze functie een feed inladen die 
je in het onderdeel Content hebt gemaakt of een feed welke elders is
samengesteld en gehost.


## Syntax en gebruik

Een feed vanuit Content inladen:

`{loadfeed feed='adres van de feed'}`

Vervang *naam* met het adres van de feed uit het het onderdeel
Content in Copernica. 

Dit adres achterhaal je door in Content de feed aan te klikken die je
wilt gebruiken. Je vindt hier zowel het adres van de Atom en de RSS
versie. Beide kunnen worden gebruikt binnen Copernica publicaties.


## Externe feed inladen

Met de loadfeed functie kun je ook externe RSS en Atom feeds in je
documenten publiceren:

`{loadfeed feed='http://www.eendomein.nl/feed/feed.xml'}`

Vervang *http://www.eendomein.nl/feed/feed.xml*  met het adres (URL) van
de feed die elders is gepubliceerd.

![](../images/loadfeed1.png)

*Afbeelding: Load feed tag in the text block rich text editor*


## Extra opties

De loadfeed functie heeft een optionele extra parameter: xlst=

Gebruik *xslt=* om een eigen XSLT te gebruiken voor de feed. Wanneer je
deze parameter achterwege laat, wordt teruggevallen op de
standaard XSLT die is geleverd in de software.

**{loadfeed feed='naam' xslt='naamvanxslt'}**

Vervang *naamvanxslt* door de naam van de XSLT uit het onderdeel Stijl
van de marketing software.

**{loadfeed feed='adres' xslt='adresvanxslt'}**

Vervang *adresvanxslt* door de internetlocatie van de XSLT, bijvoorbeeld
http://uwdomein.com/feed.xsl


## Een feed selecteren in een tekstblok

Het is tevens mogelijk om een feed te publiceren zonder hiervoor de tag
en naam van de feed te hoeven onthouden. In elk tekstblok vind je een
optie om speciale content in te voegen, zoals webformulieren en dus RSS
of Atom feeds. Klik vanuit het tekstblok op het type publicatie en
selecteer in de lijst het gewenste item en eventueel een XLST. Let op,
de publicatie vervangt de reeds aanwezige content in het tekstblok.

![](../images/loadfeedfunction.png)


## Personalisatie in feeds

Feeds kunnen ook gepersonaliseerd worden voor de ontvanger met behulp 
van speciale personalisatietags. Deze tags worden niet automatisch 
meegenomen in je XSLT of in de feed. Hieronder staan twee soorten 
personalisatiemogelijkheden beschreven: enkel in anchor tags of in 
alle toepassingen.


## Personalisatie in hyperlinks

Voor personalisatie in het 'href'-gedeelte van je link `<a href='dit gedeelte'>...</a>` 
van je anchor tag, hoef je alleen de parameter 'personalizable' op 'true' te zetten:

`{loadfeed feed=".." xslt=".." personalizable=true}`


## Personalisatie in andere delen

Je kunt volledige gebruik maken van de kracht van het personaliseren 
door gebruik te maken van een ander stukje code.

```text
{capture assign="my_feed_content"}
    {loadfeed feed=".." xslt=".."}
{/capture}
{eval var=$my_feed_content}
```

Na het opzetten van de correcte XSLT en een correcte feed, hoef je verder 
niets te doen om je personalisatiecode te laten werken. Bij personalisatie 
in feeds is het wel belangrijk om te onthouden in welke volgorde taken worden
uitgevoerd. De XSLT wordt eerst geparset en daarna wordt de personalisatie pas 
toegepast. De **eval** functie in het stukje code hierboven zorgt ervoor dat alle 
personalisatie wordt uitgevoerd. Dit betekent dus dat je niet een conditie aan
kunt maken met <xsl:if> in combinatie met een van je databasevelden. Op dat punt
weet de XSLT namelijk nog niet wat de waarde van dat veld gaat worden.

Naast deze stappen, kun je in principe alles doen qua personalisatie. Je moet alleen
wel rekening houden met het feit dat je XSLT moet kloppen alvorens je begint met het 
parsen van personalisatievariabelen.

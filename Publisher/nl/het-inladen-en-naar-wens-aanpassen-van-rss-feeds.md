-   [Automatisch inladen van een feed](#automatisch-inladen-van-een-feed)
-   [Handmatig inladen van een feed](#handmatig-instellen-van-rss)
-   [De feed afstemmen op de doelgroep (conditioneel tonen)](#conditioneel-inladen-van-een-feed)
-   [De opmaak van de feed bewerken in XSLT](#xslt)
-   [Een call-to-action button toevoegen](#call-to-action)
-   [Afbeeldingen inladen](#afbeelding-uit-de-feed-inladen)
-   [Het aantal getoonde items limiteren](#aantal-items-limiteren)
-   [De lengte van items automatisch limiteren](#lengte-van-item-limiteren)
-   [Links uit de feed uitbreiden met Google Analytics UTM-tags](#google-analytics-utm-codes-meesturen)

Het gebruik van RSS-feeds kan het leven van een marketeer
vergemakkelijken doordat er minder tekst en afbeeldingen handmatig
ingevoerd hoeven worden. Ook stelt het de marketeer in staat om het
allerlaatste nieuws in een nieuwsbrief mee te sturen, waardoor deze
relevanter wordt.

Er zijn twee manieren om een RSS feed in Copernica te laden:

-   Automatisch, middels het 'blokken bewerken' menu.
-   Met de hand, door middel van smarty-tags

Automatisch inladen van een feed
--------------------------------

Wanneer de inhoud van de RSS al naar wens is en eenvoudigweg de gehele
feed moet worden ingelaten, dan kun je de feed inladen in het menu
'blokken bewerken' (onder 'Document...'). Daar kun je in een tekstveld
onderaan op de knop 'Feed' drukken. In het verschijnende venster kan de
link naar de feed worden geplaatst en kan een XSLT worden geselecteerd.
XSLT is een taal om XML weer te geven, XML is de taal waarin de feed
wordt gecodeerd. Wanneer de standaard XSLT wordt geselecteerd, zal de
RSS op een basale manier worden getoond. Een eigen XSLT maken gebeurt in
het 'Stijl'-onderdeel van Copernica. Dit vergt meer technische kennis,
waarover later in dit artikel meer wordt beschreven.

Handmatig instellen van een RSS
-------------------------------

Het handmatig inladen van een RSS-feed gebeurt met de
[{loadfeed}-functie](./de-loadfeed-functie.md).
Deze kan in de broncode van een template geplaatst worden of in een
tekstblok. Je kunt hierbij de XSLT meegeven, welke je in Copernica onder
'Stijl' kunt aanmaken. Doe je dat niet, dan wordt de standaard XSLT
gebruikt. Een voorbeeld om de feed van de 'Algemeen Nieuws' rubriek van
de NOS website in te laden met de XSLT genaamd 'Test':

~~~~ {.language-javascript}
{loadfeed feed="http://feeds.nos.nl/nosnieuwsalgemeen?format=xml" xslt="Test"}
~~~~

### Conditioneel inladen van een feed

Stel dat je verschillende feeds hebt die, zoals bij de NOS, allemaal een
andere categorie producten of nieuwsartikelen bevatten. Je kunt dan met
behulp van smarty-personalisatie verschillende feeds conditioneel laten
tonen. Een voorbeeld:

~~~~ {.language-javascript}
{if $interest=="Sport"}
{loadfeed feed="http://feeds.feedburner.com/nossportalgemeen?format=xml" xslt="Test"}
{else if $interest=="Economie"}
{loadfeed feed="http://feeds.nos.nl/nosnieuwseconomie?format=xml" xslt="Test" }
{else}
{loadfeed feed="http://feeds.nos.nl/nosnieuwsalgemeen?format=xml" xslt="Test"}
{/if}
~~~~

XSLT
----

De manier waarop de feed wordt weergegeven wordt bepaald door het
XSLT-bestand wat er aan gekoppeld is. XSLT leest de XML en schrijft het
om naar HTML, wat weer door de webbrowser of een mailclient kan worden
geïnterpreteerd. Om XSLT te schrijven is het dus handig om zowel kennis
van XML als van HTML te hebben. Een goede tutorial over XSLT kun je
vinden op de website van [w3schools](http://www.w3schools.com/xsl/).

Als we de XML bekijken van een nieuwsbericht uit de NOS feed, dan zien
we het volgende:

~~~~ {.language-javascript}
<item>
    <title><![CDATA[FIFA onderzoekt racisme Mexicanen]]></title>
    <link>http://nos.nl/wk2014/artikel/663371-fifa-onderzoekt-racisme-mexicanen.html</link>
    <enclosure type="image/jpeg" url="http://content.nos.nl/data/image/l/2014/06/19/663375.jpg" length="20478" />
    <description><![CDATA[<p>De FIFA doet onderzoek naar Mexicaanse voetbalfans. Die zouden vrijdag zich tijdens de wedstrijd tegen Kameroen racistisch hebben uitgelaten. </p><p>Volgens de BBC schrijft de wereldvoetbalbond in een verklaring dat de fans zich onbehoorlijk hebben gedragen tijdens de wedstrijd die Mexico <a href="http://nos.nl/wk2014/artikel/660681-mexico-start-met-zege-op-kameroen.html">met 1-0 won</a>. Wat er precies is gebeurd, beschrijft de FIFA niet. </p><p>De FIFA heeft vorig jaar <a href="http://nos.nl/artikel/512781-fifa-racisme-strenger-bestraffen.html">strenge regels ingevoerd</a> tegen racisme. Als de supporters in de fout gaan, kan de voetbalbond boetes geven, duels zonder publiek laten spelen of punten aftrekken.</p><h2>Homofobie</h2><p>De <a href="http://www.bbc.com/news/world-latin-america-27916900">BBC</a> heeft van bronnen bij de voetbalbond vernomen dat er ook onderzoek wordt gedaan naar het gedrag van Braziliaanse, Russische en Kroatische fans. </p><p>De Brazilianen zouden homofobische leuzen hebben geroepen. De Kroaten en Russen hadden spandoeken met racistische en antisemitische teksten bij zich. </p>]]></description>
    <pubDate>Thu, 19 Jun 2014 11:00:46 +0200</pubDate>
    <guid isPermaLink="false">http://nos.nl/wk2014/artikel/663371-fifa-onderzoekt-racisme-mexicanen.html</guid>
</item>
~~~~

Om de nieuwsberichten geordend in de mailing te plaatsen, zetten we
alles in een html tabel. Gezien de feed uit meerdere nieuwsartikelen
(../images/items) bestaat en we natuurlijk niet voor elk artikel aparte XSLT
willen schrijven, gebruiken we een *for-each*-loop. Voor elk artikel
vullen we een deel van de tabel. Na de loop sluiten we de tabel weer
netjes af. Een eenvoudig voorbeeld:

~~~~ {.language-javascript}
<xsl:template name="item">
    <table>
        <xsl:for-each select="item">
            <tr>
                <td>
                    <div><span class="title"><a href="{link}"><xsl:value-of select="title" disable-output-escaping="yes"/></a></span></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="description"><xsl:value-of select="description" disable-output-escaping="yes" /></div>
                </td>
            </tr>  
        </xsl:for-each>
    </table>
</xsl:template>
~~~~

Met behulp van CSS kan de feed in de mailing worden opgemaakt. Je kunt
inline CSS gebruiken, welke je in het XSLT-bestand plaatst, je kunt
verwijzen naar het interne style-sheet van het document of je plaatst
verwijzingen naar het stylesheet dat aan het document is gekoppeld. Bij
de laatste twee opties gebruik je in het XSLT-bestand gewone html-tags
om de CSS aan toe roepen.

### Call-to-Action

Vaak geeft een feed slechts een samenvatting van een artikel weer. Of
wanneer de feed webshopproducten bevat, dan wordt vaak alleen de meest
interessante informatie weergegeven. Het is voor een klant dan fijn om
direct door te kunnen klikken naar de pagina waarop het artikel of het
product volledig te bekijken valt. Hiervoor kun je een mooie knop bij
elk item van de feed plaatsen: een call-to-action button! Een
voorbeeldcode om ook in de *foreach*-loop te plaatsen:

~~~~ {.language-javascript}
<tr>
    <td>
        <a class="calltoaction" href="{link}">Lees meer!</a>
    </td>
</tr>
~~~~

### Afbeelding uit de feed inladen

Veel feeds bevatten afbeeldingen, bijvoorbeeld van producten uit een
webshop. Het kan zijn dat er een XML-tag is gemaakt die alleen de url
van de afbeelding bevat. Echter, er wordt ook vaak gebruikt gemaakt van
de volgende constructie: \<enclosure type="image/jpeg"
url="http://content.nos.nl/data/image/l/2014/06/19/663433.jpg"
length="16566" /\> De manieren om beide manieren in te laden is als
volgt (respectievelijk):

~~~~ {.language-javascript}
<img src="{imageurl}"/>

<img src="{enclosure/@url}"/> 
~~~~

### Aantal items limiteren

Het is mogelijk om het aantal iteraties te beperken. Hieronder zie je
een voorbeeld van een limitatie waarbij alleen de eerste 2 items getoond
worden. De variabele *test* kan alles zijn, gezien het niet elders terug
hoeft te komen in de XSLT. Onderstaande code moet als eerste in de
*for-each* staan.

~~~~ {.language-javascript}
<xsl:if test="position() < 3">
~~~~

### Lengte van item limiteren

Het is niet prettig om erg lange stukken tekst in je mailing te
plaatsen. Het is dus fijn om een bericht automatisch af te kunnen
breken. In onderstaande code zie je dat er eerst wordt gekeken of de
tekst ('description') van het item langer dan 200 karakters is. Als dat
het geval is, dan worden de eerste 200 geplaatst, gevolgd door drie
punten ('...') en 'Lees meer', wat linkt naar de online versie van het
item.

Als de tekst niet langer is dan 200 karakters, wordt het gewoon
geplaatst.

~~~~ {.language-javascript}
<xsl:choose>
    <xsl:when test="string-length(description) > '200'">
        <xsl:value-of select="substring(description, 1, 200)" disable-output-escaping="yes"/>...
        <br/>
        <a href="{link}">Lees meer</a>
    </xsl:when>
    <xsl:otherwise>
        <xsl:value-of select="description" disable-output-escaping="yes"/>
    </xsl:otherwise>
</xsl:choose>
~~~~

### Google Analytics UTM codes meesturen

Copernica verwerkt bij een uitgaande mailing een RSS-feed als een van de
laatste dingen, zodat altijd de nieuwste items worden weergegeven. Als
je hyperlinks in de feed wil uitbreiden met UTM-tags, dan zal dat dus in
de XSLT moeten gebeuren. Dit kan eenvoudig door de tags aan de *{link}*
te plakken. (Let op, & moet worden geschreven als &amp;) Een voorbeeld:

~~~~ {.language-javascript}
<a class="feedlink" href="{link}?utm_source=feed&amp;utm_medium=e-mail&amp;utm_campaign=sale">Tekst_van_link</a>
~~~~

Indien gewenst is het mogelijk om de *{link}* uit te breiden met
bijvoorbeeld de titel van het item. Dit gaat als volgt:

~~~~ {.language-javascript}
<a class="feedlink" href="{link}?title={title}">Tekst_van_link</a>
~~~~

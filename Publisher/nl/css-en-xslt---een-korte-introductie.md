Van de afkorting CSS hebben de meeste mensen nog wel gehoord. Bij XSLT
gaan echter vaak wenkbrauwen fronsen. Ten onrechte worden de twee termen
nog wel eens door elkaar gehaald.

Als je werkt met Copernica hoef je geen kennis te hebben van XSLT en
CSS. Alle publicaties werken met een standaard XSLT en CSS stylesheet,
die je eventueel naar hartelust kunt aanpassen. Zowel stijlsheets als
XSLT-bestanden beheer je in het onderdeel Stijl.

XSLT - omzetten van XML naar HTML
---------------------------------

Mailings en websites die door Copernica worden samengesteld, zijn
opgebouwd uit HTML code. Wanneer daarin content wordt gevoegd met XML
code, zoals bijvoorbeeld een content feed of een webformulier, is het
daarom nodig om de XML code om te zetten naar HTML code. Hiervoor is een
standaardtechnologie beschikbaar: XSLT.

XSLT is een taal waarmee regels kunnen worden opgesteld die beschrijven
op welke wijze een XML bestand moet worden omgezet naar (onder andere)
HTML. In een XSLT bestand kan bijvoorbeeld worden aangegeven dat elke
titel uit een RSS feed moet worden omgezet naar vetgedrukte tekst in
HTML, dat de publicatiedatum van het artikel niet hoeft te worden
omgezet naar HTML, en dat de hoofdtekst van elk artikel tussen
\<blockquote\> tags moet worden geplaatst.

Zoals gezegd, XSLT is een standaardtechnologie waar op internet veel
over te vinden is. Onder meer op
[http://www.w3schools.com/xsl/](http://www.w3schools.com/xsl/) staat een
uitleg hoe je dergelijke bestanden kunt opbouwen.

Copernica voegt een standaard XSLT toe aan content feeds, enquetes en
webformulieren. Het is dus niet noodzakelijk zelf XSLT's te bouwen voor
het publiceren van Content!

We hebben geprobeerd om de voorgedefinieerde XSLT bestanden zo te
ontwerpen, dat de meeste gebruikers tevreden zijn met de wijze waarop ze
de content omzetten naar HTML. Het ontwikkelen van een XSLT bestand
vergt namelijk flink wat kennis en ervaring met XML en het kan soms een
tijdrovende klus zijn. Omdat de applicatie de meeste content feeds,
enquêtes en formulieren al op een goede manier omzet naar HTML, is het
echter vaak niet nodig om zelf dergelijke XSLT-bestanden te ontwerpen.\
 Door geen XSLT attribuut op te nemen, wordt teruggevallen op de
standaard XSLT:

`{feed name=my_feed}   {survey name=my_survey}   {webform name=my_webform}`

De standaard XSLT bestanden zijn beschikbaar, zodat je - als er behoefte
is om een eigen XSLT te ontwerpen - deze standaardbestanden kunt
gebruiken als uitvalsbasis of voorbeeld voor uw eigen omzetregels. Als u
in de applicatie een nieuw XSLT bestand aanmaakt, ziet u een optie om
het nieuw aan te maken XSLT bestand alvast te voorzien van
voorbeeldcode.

Stylesheets: opmaak toevoegen
-----------------------------

Zoals besproken wordt content aangeleverd in XML formaat en met behulp
van een XSLT bestand omgezet naar HTML code. In dit XSLT bestand kun je
dus bepalen welke gegevens uit de XML moeten worden overgezet, en welke
gegevens kunnen worden genegeerd. Ook kun je aangeven welke kleuren en
welke lettertypes er moeten worden gebruikt.

Dit heeft echter een nadeel: als je twee mailings op basis van een
content feed maakt, die allebei dezelfde layout hebben, maar wel een
verschillende lettertype, is het ongewenst om voor beide feeds een eigen
XSLT te ontwikkelen. De twee XSLT bestanden zouden namelijk nagenoeg
identiek aan elkaar zijn, op het lettertype na. Het is veel beter om
deze lettertypes (en andere stijlkenmerken) in een stylesheet op te
nemen.

Als je in het XSLT-bestand voor een RSS feed bijvoorbeeld aangeeft dat
elke titel wordt voorzien van \<div class="title"\> tags, en elke datum
van \<div class="date"\> tags, dan kunt u dit XSLT bestand voor vele
verschillende RSS feeds gebruiken, en kunt u in de stylesheet opnemen
dat de titels - bijvoorbeeld - vetgedrukt en paars moeten zijn, en de
data lichtgrijs en onderstreept. Deze stylesheet kun je bijvoorbeeld
opnemen in de \<head\> van de template.

De voorgedefinieerde XSLT's die in de applicatie standaard beschikbaar
zijn, en die worden gebruikt als er geen specifieke XSLT is
gespecificeerd, werken op deze wijze. In deze XSLT's wordt geen
opmaakcode gebruikt, maar worden de gegevens voorzien van \<div\>
elementen met allerlei 'classnames', zodat in de stylesheet nog kan
worden bepaald op welke wijze de content wordt getoond.

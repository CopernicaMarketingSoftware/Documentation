# CSS en XSLT in Publisher

Het **Stijl** component in Copernica is volledig ontworpen met het 
maken en beheren van je eigen huisstijl. 

## CSS Stylesheets gebruiken in Publisher

Met CSS kun je regels instellen voor het weergeven van verschillende HTML 
elemeneten. Met CSS kun je bijvoorbeeld aangeven dat alle paragrafen 
lettergrootte 12 moeten hebben.

Webformulieren, enquêtes en feeds hebben een standaard style sheet, maar 
je kunt deze aanpassen zoveel je wil of zelf een stylesheet aanmaken. 
Met duidelijk commentaar tussen /\* en \*/, zodat je meteen aan de slag 
kan.

Gebruik bijvoorbeeld CSS voor:

-   Het bepalen van de kleur en lettergrootte van paragrafen
-   Het centreren van alle headers
-   Het veranderen van het symbool voor elk element van een opsomming
-   Afgeronde hoeken om een textveld
-   Et cetera.

Copernica heeft een standaard stijl, maar je kunt deze aanpassen naar je 
eigen smaak. Omdat de standaard sheet veel commentaar bevat is het snel 
duidelijk hoe je dit kunt doen. Een stylesheet is nooit gelinkt aan een 
document of webformulier maar aan het template of webpagina waar deze binnen valt. 

Lees ook het artikel over het [beheren van CSS stylesheet files](./manage-css-stylesheet-files.md)

### Stylesheets gebruiken

Om een stylesheet te gebruiken navigeer je naar de optie **Stijl instellen...** 
in het menu. Er wordt nu een **Stijl** tab toegevoegd bij het document 
of de template, waardoor je de stijl meteen makkelijk aan kan passen.

Een groot aantal e-mailclients kunnen of willen geen externe CSS styling accepteren. 
Copernica zet daarom je CSS om naar inline CSS. Dit betekent dat 
je CSS regels binnen de HTML elementen wordt gekopieerd. Dit zorgt ervoor 
dat je stylesheet niet zomaar genegeerd kan worden en zorgt ervoor dat 
jouw e-mail er voor de ontvanger ook daadwerkelijk zo uitziet als jij hem 
hebt gestijld.

Als je de stijl voor je document instelt krijg je een aantal opties:

-   Kiezen om CSS niet inline te plaatsen.
-   Kiezen om CSS inline te plaatsen.
-   Kies de derde optie om zowel de blokken te behouden als de CSS inline 
    te maken.

## XSLT in Copernica

Webformulieren, enquêtes en content feeds (RSS & Atom) zijn gebouwd met XML. De XML 
file bevat en omschrijft de data. De XSLT, wat staat voor Extensible Stylesheet 
Language Transformations, zet de XML om naar markup voor de internet browser. 

Toepassingen van XSLT:

-   Alle titels binnen HTML header tags `<h1>` plaatsen
-   Een paragraaf binnen paragraaf tags plaatsen
-   Een CSS class toekennen aan een afbeelding
-   Informatie selecteren en structureren.
-   Et cetera...

In tegenstelling tot CSS is XSLT programmeren een complexe taak die 
specifieke kennis vereist. Er is echter veel informatie hierover beschikbaar 
op het web, aangezien dit een standaard technologie is.

![](../images/xslt-image.png)

### XSLT in de praktijk

Zoals eerder genoemd begint het gebruiken van een webformulier met 
informatie in XML formaat. De XML code in dit voorbeeld representeert 
een web formulier en bevat informatie over zijn velden, label texten en 
zijn unieke identifier.

    <webform>    
        <id>42</id>   
        <buttontext>Send</buttontext>   
        <field>     
        <id>2b3616f2a90c96c8193b932bded51985</id>     
        <label>Voornaam</label>     
        <required>yes</required>      
        <type>text</type>     
        <value/>    
        </field>  
    </webform>  

Deze informatie is echter nutteloos tot deze omgezet wordt naar HTML, wat 
de browser kan lezen. In de XSLT wordt gedefinieerd hoe XML aangeboden 
moet worden aan de browser. De code hieronder plaatst de label van de XML 
in een *div* met een CSS klasse. Wanneer een veld verplicht is wordt 
hier een ster achter geplaatst.

    <!-- Add a label in front of the input field -->  
    <div class="label">     
        <xsl:value-of select="label" />     
        <div class="colon">:</div>     
        <xsl:if test="required = 'yes'">
        <div class="required">*</div></xsl:if>  
    </div>

### XSLT maken

De software bevat een standaard XSLT voor alle content. Het is daarom niet 
verplicht XSLT te maken voor het publiceren van content in de applicatie. 
Je kunt zelf XSLT maken door te navigeren naar het XSLT menu in het 
**Stijl** component. Je kunt hier kiezen waar je XSLT voor aan wil maken en 
of er standaard code in de XSLT moet staan, zodat je deze makkelijk aan kan maken.

### XSLT gebruiken

Als je XSLT hebt aangemaakt of aangepast kun je deze makkelijk gebruiken 
in de publicatie waar deze voor geschikt is. Je kunt in de tag die 
je gebruikt voor de content namelijk een aparte XSLT parameter gebruiken 
zoals in het voorbeeld hieronder.

    {feed name=my_feed xslt=myxslt}     
    {survey name=my_survey xslt=myxslt}     
    {webform name=my_webform xslt=myxslt}

## Meer informatie

* [Publisher exclusieve functies](./publisher-only)
* [Stylesheets beheren](./stylesheets)

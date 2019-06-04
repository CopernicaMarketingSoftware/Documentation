# XSLT in Publisher

Webformulieren, enquêtes en content feeds worden gebouwd door middel van XML. 
Een XML broncode bevat en omschrijft de data. XSLT (eXtensible Stylesheet Language Transformations) 
kan vervolgens gebruikt worden om de data om te zetten naar HTML broncode 
die geïnterpreteerd kan worden door internet browsers en e-mailcliënten.

Met XSLT kun je regels opstellen, bijvoorbeeld voor het plaatsen van 
tekst binnen HTML tags (`<h1>` en `<p>` voor titels en paragrafen respectievelijk, bijvoorbeeld), 
het toewijzen van CSS klasses, het structuren van informatie etc.

Het programmeren van XSLT is in vergelijking met [CSS](./css) een 
complexere taak die meer specifieke kennis vereist. XSLT is echter een 
wijdverspreide technologie, waardoor er veel middelen beschikbaar zijn 
om je deze taal te leren. Voorbeelden van deze middelen vind je onder het 
kopje [Meer informatie](./xslt#meer-informatie).

## XSLT in de praktijk

Zoals eerder genoemd begint een webformulier met een XML bestand 
dat de data beschrijft. De code hieronder representeert een webformulier, 
met informatie over de velden, labels en het unieke ID hiervan.

```
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
```

Deze informatie is echter niet nuttig voor een browser of e-mailcliënt. 
Het XSLT bestand maakt deze informatie nuttig door te definiëren 
hoe deze informatie aan de browser of e-mailcliënt getoond moet worden. 
In dit geval kunnen we de onderstaande XSLT code gebruiken om het 
label van een veld in een *div* te plaatsen met een CSS klasse. Daarnaast 
geven we aan dat er een asterisk geplaatst moet worden achter 
vereiste velden (velden met de 'required' klasse).

```
    <!-- Add a label in front of the input field -->  
    <div class="label">     
        <xsl:value-of select="label" />     
        <div class="colon">:</div>     
        <xsl:if test="required = 'yes'">
        <div class="required">*</div>
        </xsl:if>
    </div>
```

## XSLT aanmaken

De software bevat een standaard XSLT stylesheet voor alle content feeds, 
enquêtes en webformulieren. Door deze stylesheet is het schrijven van je 
eigen XSLT geen vereiste, hoewel je door deze aan te passen of te vervangen 
je content een specifieke uitstraling kunt geven.

Je kunt een nieuw XSLT bestand creëren door te navigeren naar het 
**Stijl** component waar de functies gerelateerd aan het aanmaken en onderhouden 
van XSLT bestanden binnen een apart menu te vinden zijn. Je kunt vanaf 
hier kiezen voor welk type je een XSLT bestand aan wilt maken en of je 
hiervoor de standaard stylesheet wilt gebruiken of niet.

## HTML comments in XSLT

Het is goed mogelijk dat je in de resulterende HTML ook comments wilt 
plaatsen om de code te verduidelijken. De gebruikelijke tags (`<!--` om 
te openen en `-->` om te sluiten) worden echter ook binnen de XML comment 
syntax gebruikt, waardoor deze uiteindelijk door de parser uit de 
resulterende broncode worden gefilterd.

Om dit probleem te voorkomen moeten HTML comments binnen speciale tags 
geplaatst worden, zoals hieronder wordt getoond:

    <xsl:comment> This is a comment </xsl:comment>

Dit resulteert in een HTML comment die er als volgt uit ziet:

    <!-- This is a comment -->

## Conditionele code

Bepaalde HTML comments worden door verschillende browsers en e-mailcliënten 
geïnterpreteerd als instructies. De volgende code wordt bijvoorbeeld in HTML 
gebruikt om een stukje tekst alleen in de Internet Explorer browser te tonen:

    <!--[if IE]> This line is only visible in Internet Explorer <![endif]-->

Hoewel de meeste browsers en e-mailcliënten dit als een normale comment 
zullen beschouwen zullen sommige browser dit herkennen als een `[if]` statement.

Dit soort conditionele comments kunnen gebruikt worden om specifieke styling 
toe te passen op bepaalde browsers en e-mailcliënten, aangezien sommigen 
styling niet correct afhandelen. Dezelfde techniek als hierboven kan 
ook gebruikt worden om specifieke stylesheets te gebruiken voor browsers 
en e-mailcliënten:

    <!--[if IE]> <link rel="stylesheet" type="text/css" href="ie.css" /> <![endif]-->

Deze mogelijkheid bestaat ook in XSLT, maar de syntax is enigzins ingewikkeld:

    <xsl:comment>[if IE]>
        &lt;link rel="stylesheet" type="text/css" href="ie.css" />
    &lt;![endif]</xsl:comment>

Zorg er in dit geval voor dat de `<` karakters binnen de comment vervangen 
worden door `&lt;` om deze correct te parsen. Anders zal deze comment 
genegeerd worden.

## XSLT linken aan content

Om XSLT stylesheets te linken aan content kun je deze simpelweg 
toevoegen aan de XSLT eigenschap in de tag die een feed, enquête of 
webformulier invoegt.

```
    {feed name=my_feed xslt=myxslt}
    {survey name=my_survey xslt=myxslt}
    {webform name=my_webform xslt=myxslt}
```

## Meer informatie

* [Styling in Publisher](./emailings-publisher-styling)
* [CSS](./css)

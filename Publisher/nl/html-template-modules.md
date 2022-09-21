# Modules maken voor je HTML-templates

Binnen je [HTML-templates](https://www.copernica.com/nl/documentation/email-editor-html-templates) maak je vaak gebruik van vaste elementen die in alle templates dezelfde content bevatten. Bekende voorbeelden hiervan zijn de header en de footer. Zodra er een wijziging doorgevoerd moet worden, zal je dit vaak in tientallen templates moeten doorvoeren.

Hier liep ook [Ronald Vesterink](https://www.linkedin.com/in/ronaldvesterink/) van Pricewise tegenaan. Hij bedacht een workaround om 'modules' te maken binnen zijn template op basis van feeds en een XSLT-bestand. 

In dit artikel nemen we je mee hoe je dit ook kunt opzetten.

## Stap 1: Blanco feed aanmaken
Als eerst beginnen we met het aanmaken van een blanco feed. Dit is nodig omdat een XSLT-bestand enkel ingeladen kan worden als er ook een feed aanwezig is. Het aanmaken van een feed is mogelijk in de Publisher-omgeving onder '[Inhoud](https://ms.copernica.com/#/menu/publisher/content)'. In het submenu vind je de optie 'Feed -> Nieuwe feed'.  

Als voorbeeld maken we een feed aan met de naam '**Footer**'.

## Stap 2: HTML toevoegen aan je XSLT-bestand
In de [XSLT-module](https://ms.copernica.com/#/xslt) maken we vervolgens een nieuw XSLT-bestand aan. Hierbij gebruiken we als voorbeeld de naam '**XSLT_footer**'. In dit XSLT-bestand plaats je de HTML-code die je gebruikt voor je footer.

Voorbeeld:
```
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <table>
            <tr>
                <td>Hier plaats je de code voor de footer</td>
            </tr>
        </table>
    </xsl:template>
</xsl:stylesheet>
```

## Stap 3: Inladen van de module in je template
Nu we alle losse onderdelen hebben klaargezet, is het mogelijk om deze gegevens in te laden in je template. Dit doen we met de [loadfeed-tag](https://www.copernica.com/nl/documentation/personalization-functions-loadfeed).

Voorbeeld:  
```
{capture assign="content_footer"}{loadfeed feed="Footer" xslt="XSLT_footer" personalizable="true"}{/capture}{eval var=$content_footer}
```

In je template zie je nu de tekst die je in je XSLT-bestand hebt geplaatst.

## Tips & trics

### Smarty personalisatie
In je XSLT-bestand kun je waardes uit (sub)profielen inladen op dezelfde manier als je dit gewend bent in HTML-templates. Daarnaast zijn ook de overige Smarty variabelen beschikbaar.

Voorbeeld:
```
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <table>
            <tr>
                <td>
                    Dit is een test voor profiel: {$profile.id}.<br/>
                    &#169; Copernica {$smarty.now|date_format:"%Y"}</td>
            	</tr>
        </table>
    </xsl:template>
</xsl:stylesheet>
```

### Tekstblokken gebruiken als variabele
Als je per template bepaalde waardes wilt gebruiken die niet in alle templates of documenten hetzelfde zijn kun je met tekstblokken variabelen aanmaken.

Code in de broncode van je HTML-template:
```
{capture assign="url"}[text name='URL' editor="poor"]{/capture}
{capture assign="content_footer"}{loadfeed feed="Footer" xslt="XSLT_footer" personalizable="true"}{/capture}{eval var=$content_footer} 
```

Code om de variabele op te halen in je XSLT-bestand:
```
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <table>
            <tr>
                <td>
                    {$url}
                </td>
            </tr>
        </table>
    </xsl:template>
</xsl:stylesheet>
```
Of
```
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <table>
            <tr>
                <td>
                    <xsl:variable name="url">{$url}</xsl:variable><xsl:value-of select="$url" />
                </td>
            </tr>
        </table>
    </xsl:template>
</xsl:stylesheet>

```

### CSS-code zichtbaar in je template
Als je nog geen CSS-bestand aan je document hebt gekoppeld kan het zijn dat de standaard CSS-code zichtbaar wordt in je template. In dit geval dien je een blanco CSS-bestand aan te maken. Dit kun je doen onder '[Vormgeving-CSS](https://ms.copernica.com/#/styles)'.

Als voorbeeld maken we een CSS-bestand aan met de naam '**Leeg**'.  
*Let op: vul je bestand niet vooraf in met de standaard stijl.* 

Na het aanmaken kun je deze stijl koppelen aan je template of document onder 'Configuratie -> Stijl' in de [e-mail-editor](https://ms.copernica.com/#/design/).

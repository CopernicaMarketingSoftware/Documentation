# Enquêtes: De \# voor nummering verwijderen

Standaard wordt elke vraag genummerd met een nummer symbool (\#). Je kunt 
er echter voor kiezen deze weg te halen door de standaard [XSLT](./css-and-xslt) aan te passen. 
Deze bepaalt namelijk de stijl van de enquête.

Open eerst een (nieuwe) XSLT onder het *Stijl* kopje en vindt de volgende 
regel:

`<div class="number">#<xsl:value-of select="number"/></div>`

Verwijder vervolgens het symbool of vervang deze door het 
gewenste symbool:

`<div class="number"><xsl:value-of select="number"/></div>`

Sla de XSLT op en zorg ervoor dat deze gebruikt wordt bij je enquête.

## Meer informatie

* [Surveys](./surveys)
* [Enquêtes](./stylesheets.md)
* [CSS en XSLT](./css-and-xslt)


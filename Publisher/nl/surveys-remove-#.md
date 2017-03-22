# Enquêtes: Verwijder het hekje voor nummering

Verwijder het hekje (#) voor nummering dat wordt weergegeven bij elke 
enquêtevraag.

Standaard wordt er bij elke enquête vraag een hekje (#) weergegeven. 
Je kunt dit teken verwijderen door de standaard XSLT een klein beetje te 
wijzigen:

* Navigeer naar de Stijl sectie.
* Maak een nieuwe XSLT voor onderzoeken (of bewerk een bestaande XSLT).
* Open de XSLT, en vind de volgende code:

`<div class="number">#<xsl:value-of select="number"/></div>`

* Verwijder de # (of vervang dit door iets anders):

`<div class="number"><xsl:value-of select="number"/></div>`

* Bewaar de XSLT, en zorg ervoor in de enquête-tag naar deze XSLT wordt verwezen:

`{survey name="name survey" xslt="name of the xslt"}`

## Meer informatie

* [Enquêtes](./surveys)
* [Stylesheets](./creating-and-using-your-stylesheets.md)

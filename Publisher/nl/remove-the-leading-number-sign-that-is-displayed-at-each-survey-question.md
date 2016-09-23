Verwijder het hekje (\#) teken dat wordt weergegeven bij elke
enquêtevraag

Standaard wordt er bij elke enquête vraag een hekje (\#) weergegeven. Je
kunt dit teken verwijderen door de standaard XSLT een klein beetje te
wijzigen:

1.  Navigeer naar de **Stijl** sectie.
2.  Maak een nieuwe XSLT voor onderzoeken (of bewerk een bestaande
    XSLT).
3.  Open de XSLT, en vind de volgende code:\
     `<div class="number">#<xsl:value-of select="number"/></div>`
4.  Verwijder de \# (of vervang dit door iets anders):\
     `<div class="number"><xsl:value-of select="number"/></div>`
5.  Bewaar de XSLT, en zorg ervoor in de enquête-tag naar deze XSLT
    wordt verwezen:\
     `{survey name="name survey" xslt="name of the xslt"}`


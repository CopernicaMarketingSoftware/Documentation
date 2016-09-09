PDFlib biedt vele mogelijkheden om de lay-out van een PDF tekst blok op
documentniveau aan te passen. De gebruikte syntax lijkt erg op die van
HTML, maar verschilt tegelijkertijd ook wezenlijk.

**Wanneer je besluit de opmaak van een tekstblok aan te gaan passen,
dien je met de volgende punten rekening te houden.**

1.  **Wijzigingen in de opmaak leiden niet tot het gewenste resultaat**\
     Voor ieder blok dat je op documentniveau van een eigen opmaak wilt
    voorzien, moet je TextFlow op ‘on’ zetten, en deze moet de
    instelling van het template overschrijven. Deze instelling vind je
    achter het tabblad 'opties'. Klik TextFlow aan (achtste optie van
    onder) en sla de nieuwe instellingen op.
2.  **Wijzigingen in de opmaak zijn niet zichtbaar in de PDF**\
     Ieder element/attribuut dat u op documentniveau gebruikt voor uw
    opmaak (bijvoorbeeld TextSize) dien je eerst op documentniveau te
    activeren. Anders wordt automatisch de instelling van de template
    gebruikt. Dit doe je vanuit het tabblad 'Opties'. Zoek de optie en
    selecteer de optie ‘instelling van de template overschrijven’.
3.  **Wijzigingen zijn eerst niet zichtbaar, maar later ineens wel**\
     Wanneer je de opmaak verandert, zal het resultaat hiervan niet
    direct zichtbaar zijn. Dit is geen fout, maar heeft te maken met de
    tijd die het systeem nodig heeft de voorvertoning op te bouwen. Om
    het resultaat van de wijzigingen direct te testen/bekijken raden wij
    aan het document naar je harde schijf te downloaden. Dit kan via
    document menu \> document downloaden…
4.  **Ik heb de opmaak veranderd, maar na het opslaan/downloaden is de
    inhoud volledig verdwenen**\
     De syntax van PDFlib is behoorlijk streng en foutgevoelig. Als er
    een syntaxfout in staat (TekstSize in plaats van TextSize) zal de
    inhoud van het blok niet worden getoond (je ziet een leeg blok). 

Raadpleeg voor meer informatie eventueel de
[tutorial/documentatie](http://www.pdflib.com/fileadmin/pdflib/pdf/manuals/PDFlib-blocks-E.pdf)
van PDF lib (in PDF uiteraard).

![](../images/pdf1.jpg)

**Image 2.**Some simple text formatting. The output is shown in image 3.

![](../images/pdf2.jpg)

**Image 3.**Output of text block above

![](../images/pdf3.png)

**Image 4.**Some more text formatting

![](../images/pdf4.png)

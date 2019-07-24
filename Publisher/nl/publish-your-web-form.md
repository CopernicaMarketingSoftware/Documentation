# Webformulier inladen op je website

Om webformuilieren te plaatsen op een webpagina, gebruik je een speciale code. De code kan je zowel in de template broncode, als in het document kwijt. 

### Webformulieren kunnen niet worden toegevoegd aan e-maildocumenten!

Om het webformulier aan de webpagina toe te voegen, gebruik je de volgende tag:
    
      {webform name='naamwebformulier'}

### Extra opties

Deze functionaliteit heeft één extra optie: <strong>xslt=</strong>

Hiermee kan je jouw webformulier inladen via een aangepaste of eigen <em>XSLT</em>-bestand. Indien je geen eigen <em>XSLT</em> specificeert, wordt automatisch teruggevallen op de standaard <em>XSLT</em>van de software.

    {webform name='naamwebformulier' xslt='naamvanxslt'}

 ...waar je *naamvanxslt* vervangt met de naam van de *XSLT* die u in het onderdeel *Stijl* hebt gemaakt. 

    {survey name='naamwebformulier' xslt='adresxslt'}

...waar je *adresxslt* vervangt met het internetadres van de <em>XSLT</em> die elders is gehost.

Bijvoorbeeld: *http://www.uwbedrijf.nl/files/mijnxslt.xsl*

Tutorial: [Webformulier aanmaken en op een website plaatsen](./create-and-publish-a-webform)
